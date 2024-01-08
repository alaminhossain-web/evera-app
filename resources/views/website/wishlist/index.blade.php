@extends('website.master')
@section('title','Wishlist')
@section('body')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index-2.html" rel="nofollow">Home</a>
            <span></span> Shop
            <span></span> Wishlist
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    @if(count($products)>0)
                    <table class="table shopping-summery text-center">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            <p class="text-primary">{{session('message')}}</p>
                            
                                @foreach ($products as $item)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{asset($item->product->image)}}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{route('product-detail',$item->product_id)}}">{{$item->product->name}}</a></h5>
                                        <p class="font-xs">{{$item->product->short_description}}.
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span>${{$item->product->selling_price}}.00 </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <span class="color3 font-weight-bold">In Stock</span>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                    </td>
                                    
                                    <td class="action" data-title="Remove">
                                    <form action="{{ route('wishlist.destroy',$item->id) }}" method="post" id="deleteItem">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-small ms-5"><i class="fi-rs-trash"></i></button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            @else
                            <p class="text-danger">{{session('message')}}</p>

                                <p class="text-center">No Product ...</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection