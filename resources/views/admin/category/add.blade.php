@extends('admin.master')
@section('title','Add Category Page')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Category Name" type="text" name="name"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="" placeholder="Category Description" name="description"> </textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id=""  type="file" name="image"/>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 form-label">Publications Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input  type="radio"  name="status" value="1">Published</label>
                                <label><input  type="radio"  name="status" value="0">Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
