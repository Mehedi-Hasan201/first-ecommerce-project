@extends('admin.master')
@section('title','Manage Category Page')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Basic Datatable</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Sl No</th>
                                <th class="wd-15p border-bottom-0">Category Name</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-20p border-bottom-0">Description</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{isset($subCategory->category->name) ? $subCategory->category->name : ''}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>{{$subCategory->description}}</td>
                                <td><img src="{{asset($subCategory->image)}}" alt="" height="50" width="60"/></td>
                                <td>{{$subCategory->status}}</td>
                                <td>
                                    <a href="{{route('subcategory.edit',['id'=>$subCategory->id])}}" class="btn btn-success btn-sm rounded-0">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('subcategory.delete',['id'=>$subCategory->id])}}" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are You Sure To Delete This..?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
