@extends('admin.master')

@section('title','Edit Sub Category')

@section('body')
    

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Sub Category Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Edit Sub Category Form</h3>
            </div>
            <div class="card-body">
                <p class="text-success">{{ session()->get('message') }}</p>
                <form action="{{ route('sub-category.store') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Category Name</label>
                        <div class="col-md-9 form-group">
                            <select class="form-control select2" name="category_id">
                                <option value="" disabled selected>--Select Category--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $sub_category->category_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Sub Category Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{ $sub_category->name }}" class="form-control" placeholder="Sub Category Name" />
                                    <span class="text-danger" >{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Sub Category Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description" placeholder="Sub Category Description" rows="3" >{{ $sub_category->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Sub Category Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="imgInp" class="form-control file-input">
                            <img src="{{ asset($sub_category->image) }}" id="categoryImage" alt="" height="100" width="100">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" {{ $sub_category->status == 1 ? 'checked' : '' }} value="1" checked><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" {{ $sub_category->status == 0 ? 'checked' : '' }} value="0"><span>Unpublished</span>
                            </label>
                        
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success rounded-0" value="Update Sub Category">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection