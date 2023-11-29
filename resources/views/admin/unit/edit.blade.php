@extends('admin.master')

@section('title','Edit Unit')

@section('body')

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Unit Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Unit</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Edit Unit Form</h3>
            </div>
            <div class="card-body">
                <p class="text-muted"></p>
                <form action="{{ route('unit.update',$unit->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Unit Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="unit Name" value="{{ $unit->name }}" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Unit Code</label>
                                <div class="col-md-9">
                                    <input type="text" name="code" class="form-control" placeholder="unit Name" value="{{ $unit->code }}" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">unit Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description"  placeholder="unit Description" rows="3" >{{ $unit->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" {{ $unit->status == 1 ? 'checked' : '' }} value="1" checked><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" {{ $unit->status == 0 ? 'checked' : '' }} value="0"><span>Unpublished</span>
                            </label>
                        
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success rounded-0" value="Update unit">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection