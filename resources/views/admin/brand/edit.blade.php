@extends('admin.master')

@section('title','Edit brand Page')

@section('body')

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Brand Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Edit brand Form</h3>
            </div>
            <div class="card-body">
                <p class="text-muted"></p>
                <form action="{{ route('brand.update',$brand->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">brand Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="brand Name" value="{{ $brand->name }}" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">brand Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description"  placeholder="brand Description" rows="3" >{{ $brand->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">brand Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="imgInp" class="form-control file-input">
                            <img src="{{ asset($brand->image) }}" alt="" id="categoryImage" style="height: 70px">

                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" {{ $brand->status == 1 ? 'checked' : '' }} value="1" checked><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" {{ $brand->status == 0 ? 'checked' : '' }} value="0"><span>Unpublished</span>
                            </label>
                        
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success rounded-0" value="Update brand">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection