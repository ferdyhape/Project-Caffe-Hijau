@extends('general-page.layouts.main')
@section('content')
<!-- Page Content -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>new arrivals</h4>
          <h2>sixteen products</h2>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="filters">
          <ul>
            <li class="active" data-filter="*">All Products</li>
            @foreach ($category as $c)
            <li data-filter=".{{ $c->name }}">{{ $c->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-md-12">
        <div class="filters-content">
          <div class="row grid">
            @foreach ($item as $i)
            <div class="col-lg-4 col-md-4 all {{ $i->item_category->name }}">
              <div class="product-item">
                <a href="#"><img src="{{ asset('storage/'. $i->picture) }}" alt=""></a>
                <div class="down-content">
                  <a href="#">
                    <h4>{{ $i->name }}</h4>
                  </a>
                  <h6>{{ $i->price }}</h6>
                  <p><i class="fa fa-tags"> </i> {{ $i->item_category->name }}</p>
                  <ul class="stars">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul>
                  <span>Reviews (12)</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <ul class="pages">
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection