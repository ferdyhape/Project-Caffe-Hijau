@extends('client-side.layouts.main')
@section('content')
<div class="products" style="margin-top: 130px">
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

            {{-- if category is not connected --}}
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
                  <div class="info d-flex justify-content-between border-top pt-3">
                    <p><i class="fa fa-tags"> </i> {{ $i->item_category->name }}</p>
                    <p class="price fw-bold font-monospace">Rp {{ $i->price }}</p>
                  </div>
                </div>
              </div>
            </div>

            {{-- if category is connected --}}
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
                  <div class="info d-flex justify-content-between border-top pt-3">
                    <p><i class="fa fa-tags"> </i> {{ $i->item_category->name }}</p>
                    <p class="price fw-bold font-monospace">Rp {{ $i->price }}</p>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card-footer">
          {{$item->links()}}
        </div>
      </div>
    </div>

  </div>
</div>
@endsection