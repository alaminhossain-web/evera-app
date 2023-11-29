@extends('admin.master')

@section('title','Manage Category Page')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    
    <div class="row py-5">
        <div class="col-md-12 mx-auto" >
                <div class="card">
                    <div class="card-header">
                        <h3>Manage Category</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p class="text-success">{{ session()->get('message') }}</p>
                            <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">SL NO</th>
                                        <th class="border-bottom-0">Color Name</th>
                                        <th class="border-bottom-0">Color Code</th>
                                        <th class="border-bottom-0">Color Description</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $color)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td>{{ $color->code }}</td>
                                        <td> {{ $color->description }} </td>
                                        <td>{{ $color->status==1 ? 'Published':'Unpublished' }}</td>
                                        <td >
                                            <a href="{{ route('color.edit',$color->id) }}" class="btn btn-sm btn-info" >
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('color.destroy',$color->id) }}" method="post" class="d-inline ms-2">
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