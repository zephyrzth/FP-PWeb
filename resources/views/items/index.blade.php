@extends('layouts.app')

@section('content')
<!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>TOKO</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            @if (count($items) > 0)    
                                <!-- Single Product -->
                                @foreach ($items as $item)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img style="height:200px; width:200px" src="/storage/cover_images/{{$item->cover_image}}" alt="">
                                            <!-- Hover Thumb -->
                                            <img style="height:200px; width:200px" class="hover-img" src="/storage/cover_images/{{$item->cover_image}}" alt="">
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span>{{$item->user->nama_toko}}</span>
                                            <a href="/items/{{$item->id}}">
                                                <h6>{{$item->name}}</h6>
                                            </a>
                                            <p class="product-price">${{$item->price}}</p>

                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                    <a href="/items/{{$item->id}}" class="btn essence-btn">Beli</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p>Data not found.</p>
                            @endif   
                            

                        </div>
                    </div>
                    <!-- Pagination -->
                    {{$items->links()}}
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
@endsection