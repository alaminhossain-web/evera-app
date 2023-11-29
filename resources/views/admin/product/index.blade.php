@extends('admin.master')

@section('title','Add Sub Category Page')

@section('body')


 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Product Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-12 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">All Product Info</h3>
            </div>
            <div class="card-body">
                <p class="text-success">{{ session()->get('message') }}</p>
                <div class="table-responsive">
                    <table id="example3" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Stock Amount</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" alt="" style="height: 50px">
                                </td>
                                <td> {{ $product->stock_amount }} </td>

                                <td>{{ $product->status==1 ? 'Published':'Unpublished' }}</td>
                                <td>
                                    <a href="{{ route('product.show',$product->id) }}" class="btn btn-sm btn-info me-2" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-info me-2" >
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('product.destroy',$product->id) }}" method="post" class="d-inline-flex">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger " >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                </form>

                                </td>
                            </tr>


                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
