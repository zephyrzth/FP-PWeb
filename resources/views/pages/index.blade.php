@extends('layouts.app')

@section('content')
    
<!-- <header class="masthead text-center text-white">
        <div class="masthead-content">
          <div class="container">
            <h1 class="masthead-heading mb-0">Toko Paling Maju</h1>
            <h2 class="masthead-subheading mb-0">Terdepan sampai menutupi jalan</h2>
            <a href="#belanja" class="btn btn-primary btn-xl rounded-pill mt-5">Lihat Lebih</a>
          </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
      </header>-->
      <section class="welcome_area bg-img background-overlay" style="background-image: url(template/img/bg-1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
        <div class="col-12">
        <!--<img class="img-fluid background-overlay" src="{{ asset('template/img/bg-1.jpg') }}" alt="">-->
          <div class="hero-content">
            <h6>Terdepan hingga menutupi jalan</h6>
            <h2>Toko Paling Maju</h2>
            <a href="#belanja" class="btn essence-btn">Lihat Barang</a>
          </div>
        </div>
    </div>
  </div>
</section>
  
      <section>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
              <div class="p-5">
                <img class="img-fluid rounded-circle" src="{{ asset('template/img/01.jpg') }}" alt="">
              </div>
            </div>
            <div class="col-lg-6 order-lg-1">
              <div class="p-5">
                <h2 class="display-4">Mari belanja Online!</h2>
                <p>Di zaman modern ini semua bisa dilakukan secara virtual. web ini menyediakan layanan penghubung antara seorang penjual yang hendak menjual barangnya dengan calon pembelinya.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <section>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="p-5">
                <img class="img-fluid rounded-circle" src="{{ asset('template/img/02.jpg') }}" alt="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <h2 class="display-4">Belanja hanya dengan sekali klik!</h2>
                <p>Dimanapun anda berada, anda dapat melakukan pembelian dengan mudah dan nyaman.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <section>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
              <div class="p-5">
                <img class="img-fluid rounded-circle" src="{{ asset('template/img/03.jpg') }}" alt="">
              </div>
            </div>
            <div class="col-lg-6 order-lg-1">
              <div class="p-5">
                <h2 class="display-4">Masih ragu untuk belanja Online?</h2>
                <p>Ayo segera daftar ke website kami!</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <br>
      <section id="belanja" style="text-align:center;">
          <br><br><br><br><br><br><br><br>
          <a href="/items" class="btn btn-primary btn-xl rounded-pill mt-5">Mulai Belanja</a>
          <br><br><br><br>
      </section>
      <br>
      
@endsection
    