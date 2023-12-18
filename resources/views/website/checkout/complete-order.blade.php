@extends('website.master')

@section('title', 'Complete Order Page')

@section('body')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index-2.html" rel="nofollow">Home</a>
            <span></span> Checkout
            <span></span> Complete Order
        </div>
    </div>
</div>
<section class="py-5 bg-secondary-light">
    <div class="container">
        <div class="row">
            {{-- <div class="col">
                <div class="card card-body">
                    <p class="text-center text-success">{{ session('message')}}</p>
                </div> --}}
                <div class="w-md-80 w-lg-50 text-center mx-md-auto">
        <figure id="iconChecked" class="ie-height-90 max-width-11 mx-auto mb-3" style="">
          <img src="{{ '/' }}website/assets/imgs/cart.png" alt="">
        </figure>
        <div class="mb-5">
          <h1 class="h3 font-weight-medium">Your order is completed!</h1>
          <p class="text-center text-success">{{ session('message')}}</p>
          <p>Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.</p>
        </div>
        <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="classic.html">Continue Shopping</a>
      </div>
            </div>
        </div>
    </div>
</section>
@endsection