@extends('layouts.app')

@section('content')
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" text-center">
        <div class="order-details-confirmation">

            <div class="cart-page-heading">
                <h5>Thanks For Your Order</h5>
                <p>This is the details</p>
            </div>

            <ul class="order-details-form mb-4">
                <li><span>Product</span> <span>{{$items->name}}</span></li>
                <li><span>Price</span> <span>{{$items->price}}</span></li>
                <li><span>Shipping</span> <span>Free</span></li>
            </ul>
    </div>
@endsection
