<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   public function index()
   {
       return view('admin.subcategory.index',['subCategories'=>SubCategory::all()]);
   }

   public function create()
   {
       return view('admin.subcategory.add',['categories'=>Category::all()]);
   }

   public function store(Request $request)
   {
       SubCategory::newSubCategory($request);
       return back()->with('message','SubCategory Info Create Successfully....');
   }

   public function edit($id)
   {
      return view('admin.subcategory.edit',[
          'categories'=>Category::all(),
          'subCategories'=>SubCategory::find($id),
      ]);
   }

   public function update(Request $request,$id)
   {
       SubCategory::updateSubcategory($request,$id);
       return redirect('/subcategory/manage')->with('message','Update SubCategory Info Successfully....');

   }

   public function delete($id)
   {
       SubCategory::deletedSubcategory($id);
       return back()->with('message','Subcategory Info Delete Successfully...');
   }


}
