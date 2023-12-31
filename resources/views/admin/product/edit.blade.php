@extends('admin.master')

@section('title','Add Product')

@section('body')


 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Product Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-10 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Edit Product Form</h3>
            </div>
            <div class="card-body">
                {{-- <p class="text-success">{{ session()->get('message') }}</p> --}}
                <form action="{{ route('product.update',$product->id)  }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Category Name</label>
                        <div class="col-md-9 form-group">
                            <select class="form-control select2 form-select" onchange="setSubCategory(this.value)" name="category_id">
                                <option value="" disabled selected>--Select Category--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Sub Category Name</label>
                        <div class="col-md-9 form-group ">
                            <select class=" form-control select2 form-select" id="subCategoryId"  name="sub_category_id">
                                <option value="" disabled selected>--Select Sub Category--</option>
                                @foreach ($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}" @selected($sub_category->id == $product->sub_category_id)>{{ $sub_category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('sub_category_id') ? $errors->first('sub_category_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Brand Name</label>
                        <div class="col-md-9 form-group">
                            <select class=" form-control  select2 form-select" name="brand_id">
                                <option value="" disabled selected>--Select Brand--</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected($brand->id == $product->brand_id)>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Unit Name</label>
                        <div class="col-md-9 form-group">
                            <select class=" form-control select2 form-select" name="unit_id">
                                <option value="" disabled selected>--Select Unit--</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" @selected($unit->id == $product->unit_id)>{{ $unit->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Color Name</label>
                        <div class="col-md-9 form-group">
                            <select multiple class="form-control select2 form-select" data-placeholder="Select Product Color" name="colors[]">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" @foreach($product->colors as $singleColor) @selected($color->id == $singleColor->color_id)  @endforeach >{{ $color->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('color_id') ? $errors->first('color_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Size Name</label>
                        <div class="col-md-9 form-group">
                            <select multiple class=" form-control select2 form-select" data-placeholder="Select Product Size" name="sizes[]">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}" @foreach($product->sizes as $singleSize) @selected($size->id == $singleSize->size_id)  @endforeach>{{ $size->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" >{{ $errors->has('size_id') ? $errors->first('size_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Product Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Product Name" />
                                    <span class="text-danger" >{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Product Code</label>
                                <div class="col-md-9">
                                    <input type="text" name="code" value="{{ $product->code }}" class="form-control" placeholder="Product Code" />
                                    <span class="text-danger" >{{ $errors->has('code') ? $errors->first('code') : '' }}</span>

                                </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Short Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" name="short_description" placeholder="Short Description" rows="3" >{{ $product->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Long Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" id="summernote" name="long_description" placeholder="Long Description" rows="3" >{{ $product->long_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Product Image</label>
                        <div class="col-md-9">
                            <input type="file" name="image" class="dropify" data-height="200" />
                            <img src="{{ asset($product->image) }}" alt="" height="100" width="100">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Product Other Image</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="other_images[]" multiple />
                            @foreach ($product->productImages as $productImage)
                                <img src="{{ asset($productImage->image) }}" alt="" height="100" width="100">
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3  form-label">Product Price</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input class="form-control" name="regular_price" value="{{ $product->regular_price }}" placeholder="Regular Price" type="number">
                                <input class="form-control" name="selling_price" value="{{ $product->selling_price }}"placeholder="Selling Price" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Stock Amount</label>
                        <div class="col-md-9">
                            <input type="number" name="stock_amount" id="stockAmount" value="{{ $product->stock_amount }}"placeholder="Stock Amount" class="form-control">
                            <span class="text-danger" >{{ $errors->has('stock_amount') ? $errors->first('stock_amount') : '' }}</span>

                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Publication Status</label>
                        <div class="col-md-9 pt-3">
                            <label><input type="radio" name="status" value="1" {{ $product->status == 1 ? 'checked' : '' }}><span>Published</span></label>
                            <label>
                                <input type="radio" name="status" {{ $product->status == 0 ? 'checked' : '' }}value="0"><span>Unpublished</span>
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success rounded-0" value="Update Product Info">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
