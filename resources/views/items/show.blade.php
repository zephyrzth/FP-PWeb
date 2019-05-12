@extends('layouts.app')

@section('content')
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">
        @if (isset($items))
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <img src="/storage/cover_images/{{$items->cover_image}}" alt="">
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>{{$items->user->nama_toko}}</span>
            <a>
                <h2>{{$items->name}}</h2>
            </a>
            <p class="product-price">${{$items->price}}</p>
            <p class="product-desc"> {!!$items->description!!}</p>

            @if (!Auth::guest())
                @if (Auth::user()->id == $items->user_id)
                <a href="/items/{{$items->id}}/edit" class="btn btn-info">Edit</a>
                {!!Form::open(['action' =>['ItemsController@destroy', $items->id], 'method' =>'POST', 'class'=>'float-lg-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
                @endif
            @endif
            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    @if ($items->user_id == Auth::user()->id)

                    @else
                        <div class="add-to-cart-btn">
                            <a href="/buy/{{$items->id}}" class="btn essence-btn">Beli</a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        @endif
    </section>
    <!-- ##### Single Product Details Area End ##### -->
@endsection