@extends('admin.master')

@section('title','Manage Category Page')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Size Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Size</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    
    <div class="row py-5">
        <div class="col-md-12 mx-auto" >
                <div class="card">
                    <div class="card-header">
                        <h3>Manage Size</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p class="text-success">{{ session()->get('message') }}</p>
                            <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">SL NO</th>
                                        <th class="border-bottom-0">size Name</th>
                                        <th class="border-bottom-0">size Code</th>
                                        <th class="border-bottom-0">size Description</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sizes as $size)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td>{{ $size->code }}</td>
                                        <td> {{ $size->description }} </td>
                                        <td>{{ $size->status==1 ? 'Published':'Unpublished' }}</td>
                                        <td >
                                            <a href="{{ route('size.edit',$size->id) }}" class="btn btn-sm btn-info" >
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('size.destroy',$size->id) }}" method="post" class="d-inline ms-2">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" >
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