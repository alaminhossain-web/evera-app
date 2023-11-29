@extends('admin.master')

@section('title','Edit size')

@section('body')

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">size Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">size</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit size</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Edit size Form</h3>
            </div>
            <div class="card-body">
                <p class="text-muted"></p>
                <form action="{{ route('size.update',$size->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">size Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="size Name" value="{{ $size->name }}" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">size Code</label>
                                <div class="col-md-9">
                                    <input type="text" name="code" class="form-control" placeholder="size Name" value="{{ $size->code }}" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">size Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description"  placeholder="size Description" rows="3" >{{ $size->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" {{ $size->status == 1 ? 'checked' : '' }} value="1" checked><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" {{ $size->status == 0 ? 'checked' : '' }} value="0"><span>Unpublished</span>
                            </label>
                        
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success rounded-0" value="Update size">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection