@extends('admin.master')

@section('title','Add Offer')

@section('body')
    

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Offer Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Offer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Offer</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Add Offer Form</h3>
            </div>
            <div class="card-body">
                <p class="badge bg-primary">{{ session()->get('message') }}</p>
                <form action="{{ route('offer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Product Name</label>
                        <div class="col-md-9 form-group">
                            <select class="form-control select2-show-search form-select" data-placeholder="Choose one" name="product_id">
                                
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Title One</label>
                                <div class="col-md-9">
                                    <input type="text" name="title_one" class="form-control" placeholder="Title One" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Title Two</label>
                                <div class="col-md-9">
                                    <input type="text" name="title_two" class="form-control" placeholder="Title Two" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Title Three</label>
                                <div class="col-md-9">
                                    <input type="text" name="title_three" class="form-control" placeholder="Title Three" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description" placeholder="Offer Description" rows="3" ></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Offer Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="imgInp" class="form-control file-input">
                            <img src="" id="categoryImage" alt="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" value="1" ><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" value="0"><span>Unpublished</span>
                            </label>
                        
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                               <input type="submit" class="btn btn-success rounded-0" value="Create New Offer">
                                
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection