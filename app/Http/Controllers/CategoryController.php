<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index',['categories'=>Category::all()]);
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {

        Category::newCategory($request);
        return back()->with('message','Category Information Add Successfully....');
    }

    public function edit($id)
    {
        return view('admin.category.edit',['category'=>Category::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Category::categoryUpdate($request,$id);
        return redirect('/category/Manage')->with('message','Category Info Update Successfully.....');

    }

    public function delete($id)
    {
        Category::categoryDelete($id);
        return back()->with('message','Category Info Delete Successfully.... ');
    }
}
