@extends('admin.master')
@section('title','Edit Category Page')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('category.update',['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Category Name" value="{{$category->name}}" type="text" name="name"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="" placeholder="Category Description" name="description">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id=""  type="file" name="image"/>
                                <img src="{{asset($category->image)}}" alt="" height="100" width="100" />
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 form-label">Publications Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input  type="radio"  name="status" {{$category->status == 1 ? 'checked' : ''}} value="1">Published</label>
                                <label><input  type="radio"  name="status" {{$category->status == 0 ? 'checked' : ''}} value="0">Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Category Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
