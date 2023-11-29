@extends('admin.master')

@section('title','Add Category')

@section('body')
    

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Category Module</h1>
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
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Add Category Form</h3>
            </div>
            <div class="card-body">
                <p class="text-success">{{ session()->get('message') }}</p>
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Category Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="Category Name" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Category Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description" placeholder="Category Description" rows="3" ></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Category Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="imgInp" class="form-control file-input">
                            <img src="" id="categoryImage" alt="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" value="1" checked><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" value="0"><span>Unpublished</span>
                            </label>
                        
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success rounded-0" value="Create New Category">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection