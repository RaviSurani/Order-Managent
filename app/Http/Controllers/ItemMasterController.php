<?php

namespace App\Http\Controllers;

use App\Models\CategoryMaster;
use App\Models\itemMaster;
use App\Models\ProjectMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemList = itemMaster::get();
        return view('Item.itemList', compact('itemList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemMaster = null;
        $categoryList = CategoryMaster::get();
        $projectList = ProjectMaster::get();
        return view('Item.itemForm', compact('itemMaster', 'categoryList', 'projectList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
            "code" => 'required|string',
            "category_id" => 'required|string',
            "project_id" => 'required|string',
            "gross_weight" => 'required|string',
            "image" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('item/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            // dd($data);
            $image = $data['image'];
            $extension = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('image/', $filename);
            $data['image'] = "$filename";
            itemMaster::create($data);
            return redirect("/item");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(itemMaster $itemMaster)
    {
        $categoryList = CategoryMaster::get();
        $projectList = ProjectMaster::get();
        return view('Item.itemForm', compact('itemMaster', 'categoryList', 'projectList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(itemMaster $itemMaster)
    {
        $categoryList = CategoryMaster::get();
        $projectList = ProjectMaster::get();
        return view('Item.itemForm', compact('itemMaster', 'categoryList', 'projectList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, itemMaster $itemMaster)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
            "code" => 'required|string',
            "category_id" => 'required|string',
            "project_id" => 'required|string',
            "gross_weight" => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('item/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();


            $itemMaster->update($data);
            return redirect("/item");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(itemMaster $itemMaster)
    {
        $itemMaster->delete();
        return redirect("/item");
    }
}
