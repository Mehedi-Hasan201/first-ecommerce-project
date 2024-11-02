<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index',['brands'=>Brand::all()]);
    }

    public function create()
    {
        return view('admin.brand.add');
    }

    public function store(Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message','Create Brand Info Successfully.....');

    }

    public function edit($id)
    {
        return view('admin.brand.edit',['brand'=>Brand::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrandInfo($request,$id);
        return redirect('/brand/manage')->with('message','Update Brand Info Successfully.........');
    }

    public  function delete($id)
    {
        Brand::deleteBrand($id);
        return back()->with('message','Brand Info Delete Successfully.......');
    }


}
