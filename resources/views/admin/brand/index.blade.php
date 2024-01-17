@extends('admin.master')

@section('title','Manage Brand ')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    
    <div class="row py-5">
        <div class="col-md-12 mx-auto" >
                <div class="card">
                    <div class="card-header">
                        <h3>Manage Brand</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           
                            <p class="badge bg-danger" role="alert">{{ session()->get('message') }}</p>
                            <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">SL NO</th>
                                        <th class="border-bottom-0">Brand Name</th>
                                        <th class="border-bottom-0">Brand Description</th>
                                        <th class="border-bottom-0">Brand Image</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td> {{ $brand->description }} </td>
                                        <td>
                                            <img src="{{ asset($brand->image) }}" alt="" style="height: 50px">
                                        </td>
                                        <td>{{ $brand->status==1 ? 'Published':'Unpublished' }}</td>
                                        <td >
                                            <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-sm btn-info me-2" >
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('brand.destroy',$brand->id) }}" method="post" class="d-inline-flex">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" id="liveAlertPlaceholder" class="btn btn-sm btn-danger delete-item" >
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
    </div>
@endsection