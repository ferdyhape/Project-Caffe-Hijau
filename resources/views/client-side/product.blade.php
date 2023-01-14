@extends('client-side.layouts.main')
@section('content')
<!-- Page Content -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>new arrivals</h4>
          <h2>Brownies Santri products</h2>
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
            <li data-filter=".{{ str_replace(" ",'_', " $c->name" ) }}">{{ $c->name }}</li>
            @endforeach
            <li data-filter="uncategorized">Uncategorized</li>
          </ul>
        </div>
      </div>
      <div class="col-md-12">
        <div class="filters-content">
          <div class="row grid">
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
            @php
            $category = $i->item_category->name
            @endphp

            <div class="col-lg-4 col-md-4 all {{ str_replace(" ", '_', " $category" ) }}">
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
    <div class="d-flex jusitfy-content-center">
      {{$item->render()}}
    </div>
  </div>
</div>
@endsection