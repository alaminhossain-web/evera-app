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
                                        <th class="border-bottom-0">Unit Name</th>
                                        <th class="border-bottom-0">Unit Code</th>
                                        <th class="border-bottom-0">Unit Description</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->code }}</td>
                                        <td> {{ $unit->description }} </td>
                                        <td>{{ $unit->status==1 ? 'Published':'Unpublished' }}</td>
                                        <td >
                                            <a href="{{ route('unit.edit',$unit->id) }}" class="btn btn-sm btn-info" >
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('unit.destroy',$unit->id) }}" method="post" class="d-inline ms-2">
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