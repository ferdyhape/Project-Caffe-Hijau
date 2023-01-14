@extends('client-side.layouts.main')
@section('content')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <h4>Best Offer</h4>
        <h2>New Arrivals On Sale</h2>
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <h4>Flash Deals</h4>
        <h2>Get your best products</h2>
      </div>
    </div>
    <div class="banner-item-03">
      <div class="text-content">
        <h4>Last Minute</h4>
        <h2>Grab last minute deals</h2>
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Latest Products</h2>
          <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      @foreach ($item as $i)
      @if (is_null($i->item_category))
      <div class="col-lg-4 col-md-4 all uncategorized">
        <div class="product-item">
          @if (is_null($i->picture))
          <a href="#"><img src="{{ asset('storage/item-picture/comingsoon.jpg') }}" class="img-fluid"
              alt="item-picture"></a>
          @else
          <a href="#"><img src="{{ asset('storage/'. $i->picture) }}" class="img-fluid" alt="item-picture"></a>
          @endif
          <div class="down-content">
            <a href="#">
              <h4>{{ $i->name }}</h4>
            </a>
            <p><i class="fa fa-tags"> </i> Uncategorized</p>
            <span>{{ $i->price }}</span>
          </div>
        </div>
      </div>
      @else
      <div class="col-lg-4 col-md-4 all {{ $i->item_category->name }}">
        <div class="product-item">
          @if (is_null($i->picture))
          <a href="#"><img src="{{ asset('storage/item-picture/comingsoon.jpg') }}" class="img-fluid"
              alt="item-picture"></a>
          @else
          <a href="#"><img src="{{ asset('storage/'. $i->picture) }}" class="img-fluid" alt="item-picture"></a>
          @endif
          <div class="down-content">
            <a href="#">
              <h4>{{ $i->name }}</h4>
            </a>
            <p><i class="fa fa-tags"> </i> {{ $i->item_category->name }}</p>
            <span>{{ $i->price }}</span>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</div>

<div class="best-features">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>About Brownies Santri</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <h4>Looking for the best products?</h4>
          <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This
              template</a> is free to use for your business websites. However, you have no permission to
            redistribute
            the downloadable ZIP file on any template collection website. <a rel="nofollow"
              href="https://templatemo.com/contact">Contact us</a> for more info.</p>
          <ul class="featured-list">
            <li><a href="#">Lorem ipsum dolor sit amet</a></li>
            <li><a href="#">Consectetur an adipisicing elit</a></li>
            <li><a href="#">It aquecorporis nulla aspernatur</a></li>
            <li><a href="#">Corporis, omnis doloremque</a></li>
            <li><a href="#">Non cum id reprehenderit</a></li>
          </ul>
          <a href="about.html" class="filled-button">Read More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image">
          <img src="{{ URL::asset('assets/images/feature-image.jpg')}}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection