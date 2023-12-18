@extends('admin.master')

@section('title','Add Sub Category Page')

@section('body')


 <!-- PAGE-HEADER -->
 <div class="page-header">
    <div>
        <h1 class="page-title">Sub Category Module</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-lg-12 col-md-12 mx-auto">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Manage Sub Category Form</h3>
            </div>
            <div class="card-body">
                {{-- <p class="badge bg-danger">{{ session()->get('message') }}</p> --}}
                <div class="table-responsive">
                    <table id="example3" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Sub Category Name</th>
                                <th class="border-bottom-0">Category Description</th>
                                <th class="border-bottom-0">Category Image</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_categories as $sub_category)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ isset($sub_category->category->name) ? $sub_category->category->name : '' }}</td>
                                <td>{{ $sub_category->name }}</td>
                                <td> {{ $sub_category->description }} </td>
                                <td>
                                    <img src="{{ asset($sub_category->image) }}" alt="" style="height: 50px">
                                </td>
                                <td>{{ $sub_category->status==1 ? 'Published':'Unpublished' }}</td>
                                <td >
                                    <a href="{{ route('sub-category.edit',$sub_category->id) }}" class="btn btn-sm btn-info" >
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('sub-category.destroy',$sub_category->id) }}" method="post" id="deleteItem" class="d-inline ms-2">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger  delete-item">
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
