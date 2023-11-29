@extends('admin.master')

@section('title','Manage Brand ')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Offer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Offer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Offer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    
    <div class="row py-5">
        <div class="col-md-12 mx-auto" >
                <div class="card">
                    <div class="card-header">
                        <h3>Manage Offer</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           
                            <p class="badge bg-danger" role="alert">{{ session()->get('message') }}</p>
                            <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">SL NO</th>
                                        <th class="border-bottom-0">Product Name</th>
                                        <th class="border-bottom-0">Title One</th>
                                        <th class="border-bottom-0">Title Two</th>
                                        <th class="border-bottom-0">Title Three</th>
                                        <th class="border-bottom-0">Description</th>
                                        <th class="border-bottom-0">Image</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $offer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $offer->product->name }}</td>
                                        <td> {{ $offer->title_one }} </td>
                                        <td> {{ $offer->title_two }} </td>
                                        <td> {{ $offer->title_three }} </td>
                                        <td> {{ $offer->description }} </td>
                                        <td>
                                            <img src="{{ asset($offer->image) }}" alt="" style="height: 50px">
                                        </td>
                                        <td>{{ $offer->status==1 ? 'Published':'Unpublished' }}</td>
                                        <td >
                                            <a href="{{ route('offer.edit',$offer->id) }}" class="btn btn-sm btn-info me-2" >
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('offer.destroy',$offer->id) }}" method="post" class="d-inline-flex">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" id="liveAlertPlaceholder" class="btn btn-sm btn-danger" >
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