<?php

namespace App\Http\Controllers;

use App\Models\CategoryMaster;
use App\Models\itemMaster;
use App\Models\orderMaster;
use App\Models\ProjectMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderList = orderMaster::get();
        return view("Order.orderList", compact('orderList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryList = CategoryMaster::get();
        $projectList = ProjectMaster::get();
        $itemList = itemMaster::get();
        $orderMaster = null;
        return view('Order.OrderForm', compact('orderMaster', 'categoryList', 'projectList', 'itemList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            "name" => 'required',
            "remarks" => 'required',
            "qnt" => 'required',
            "category_id" => 'required',
            "project_id" => 'required',
            "item_id" => 'required'

        ]);

        if ($validator->fails()) {
            return redirect('order/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            // dd($data);
            orderMaster::create($data);
            return redirect("/order");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(orderMaster $orderMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orderMaster $orderMaster)
    {
        $categoryList = CategoryMaster::get();
        $projectList = ProjectMaster::get();
        $itemList = itemMaster::get();
        return view('Order.orderForm', compact('orderMaster', 'categoryList', 'projectList', 'itemList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orderMaster $orderMaster)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "remarks" => 'required',
            "qnt" => 'required',
            "category_id" => 'required',
            "project_id" => 'required',
            "item_id" => 'required'

        ]);

        if ($validator->fails()) {
            return redirect('order/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            // dd($data);
            $orderMaster->update($data);
            return redirect("/order");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orderMaster $orderMaster)
    {
        $orderMaster->delete();
        return redirect('/order');
    }
}
