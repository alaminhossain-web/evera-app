@extends('admin.master')

@section('title','Add size')

@section('body')
    

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Size Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Size</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Add Size Form</h3>
            </div>
            <div class="card-body">
                <p class="text-success">{{ session()->get('message') }}</p>
                <form action="{{ route('size.store') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">size Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="size Name" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">size Code</label>
                                <div class="col-md-9">
                                    <input type="text" name="code" class="form-control" placeholder="size Code" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">size Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description" placeholder="size Description" rows="3" ></textarea>
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
                                <input type="submit" class="btn btn-success rounded-0" value="Create New size">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection