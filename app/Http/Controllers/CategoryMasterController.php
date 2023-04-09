<?php

namespace App\Http\Controllers;

use App\Models\CategoryMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryList = CategoryMaster::all();
        return view("Category.categoryList", compact('categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryMaster = null;

        return view("Category.CategorysForm", compact('categoryMaster'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "category" => 'required|string',
            "code" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('categorys/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            // dd($data);
            CategoryMaster::create($data);
            return redirect("/categorys");
        }
    }

    public function show(CategoryMaster $categoryMaster)
    {
        return view("Category.CategorysForm", compact('categoryMaster'));
    }

    public function edit(CategoryMaster $categoryMaster)
    {
        return view("Category.CategorysForm", compact('categoryMaster'));
    }

    public function update(Request $request, CategoryMaster $categoryMaster)
    {
        $validator = Validator::make($request->all(), [
            "category" => 'required|string',
            "code" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('categorys/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();

            $categoryMaster->update($data);
            return redirect("/categorys");
        }
    }

    public function destroy(CategoryMaster $categoryMaster)
    {
        $categoryMaster->delete();
        return redirect("/categorys");
    }
}
