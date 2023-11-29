@extends('admin.master')

@section('title','Add Brand')

@section('body')
    

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Brand Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Add Brand Form</h3>
            </div>
            <div class="card-body">
               @if (session('message'))
                   <script>
                        swal("{{ session('message') }}")
                   </script>               
               @endif
                <p class="badge bg-primary">{{ session()->get('message') }}</p>
                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Brand Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="Brand Name" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Brand Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description" placeholder="Brand Description" rows="3" ></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Brand Image</label>
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
                               <input type="submit" class="btn btn-success rounded-0" value="Create New Brand">
                                
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection