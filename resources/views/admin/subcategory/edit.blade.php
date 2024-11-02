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
                <li class="breadcrumb-item"><a href="javascript:void(0);">Edit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Sub-Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('subcategory.update',['id'=>$subCategories->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value=""> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @selected($category->id == $subCategories->category_id)>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Sub Category Name" type="text" name="name" value="{{$subCategories->name}}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="" placeholder="Sub Category Description" name="description">{{$subCategories->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id=""  type="file" name="image"/>
                                <img src="{{asset($subCategories->image)}}" alt="" height="100" width="100" class="pt-3" />
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 form-label">Publications Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input  type="radio" {{$subCategories->status == 1 ? 'Checked' : '' }}  name="status" value="1">Published</label>
                                <label><input  type="radio" {{$subCategories->status == 0 ? 'Checked' : '' }} name="status" value="0">Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update SubCategory Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
