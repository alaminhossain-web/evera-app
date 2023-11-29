@extends('admin.master')

@section('title','Edit Product Offer')

@section('body')

 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Offer Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Offer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Offer</li>
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
                <form action="{{ route('offer.update',$offer->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Product Name</label>
                        <div class="col-md-9 form-group">
                            <select class="form-control select2 form-select" name="product_id">
                                <option value="" disabled selected>--Select Product--</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"@selected($product->id == $product->id)>{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Title One</label>
                                <div class="col-md-9">
                                    <input type="text" name="title_one" class="form-control" value="{{ $offer->title_one }}" placeholder="Title One" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Title Two</label>
                                <div class="col-md-9">
                                    <input type="text" name="title_two" class="form-control" value="{{ $offer->title_one }}" placeholder="Title Two" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Title Three</label>
                                <div class="col-md-9">
                                    <input type="text" name="title_three" class="form-control" value="{{ $offer->title_one }}" placeholder="Title Three" />
                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="description" placeholder="Offer Description" rows="3" >{{ $offer->title_one }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="imgInp" class="form-control file-input">
                            <img src="{{ asset($offer->image) }}" alt="" id="categoryImage" style="height: 70px">

                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" {{ $offer->status == 1 ? 'checked' : '' }} value="1" checked><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" {{ $offer->status == 0 ? 'checked' : '' }} value="0"><span>Unpublished</span>
                            </label>
                        
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success rounded-0" value="Update Offer Info">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection