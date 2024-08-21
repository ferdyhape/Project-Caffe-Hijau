@extends('client-side.layouts.main')
@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            @foreach ($banner as $b)
                <div class="banner-item"
                    style="background-image: radial-gradient(circle, rgba(0, 0, 0, 0.7903536414565826) 0%, rgba(0, 0, 0, 0.5186449579831933) 100%), url(storage/{{ $b->picture }});">
                    <div class="text-content">
                        @if (is_null($b->attention))
                        @else
                            <h4 class="btn px-4 attention" style="font-size: {{ $b->fzAttention }}px;">{{ $b->attention }}
                            </h4>
                            <h2 style=" font-size: {{ $b->fzOffer }}px;">{{ $b->offer }}</h2>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Banner Ends Here -->
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="{{ url('product') }}">view all products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach ($item as $i)
                    @if (is_null($i->item_category))
                        <div class="col-lg-4 col-md-4 all uncategorized">
                            <div class="product-item">
                                @if (is_null($i->picture))
                                    <a href="#"><img src="{{ asset('storage/item-picture/comingsoon.jpg') }}"
                                            class="img-fluid" alt="item-picture"></a>
                                @else
                                    <a href="#"><img src="{{ asset('storage/' . $i->picture) }}" class="img-fluid"
                                            alt="item-picture"></a>
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
                                    <a href="#"><img src="{{ asset('storage/item-picture/comingsoon.jpg') }}"
                                            class="img-fluid" alt="item-picture"></a>
                                @else
                                    <a href="#"><img src="{{ asset('storage/' . $i->picture) }}" class="img-fluid"
                                            alt="item-picture"></a>
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
                        <h2>About Cafe Hijau</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>Apa itu Cafe Hijau?</h4>
                        <p>Cafe Hijau adalah usaha kopi yang berdiri sejak tahun 2021. Kami menyediakan berbagai macam kopi
                            yang
                            berkualitas tinggi dan harga yang terjangkau. Kami juga menyediakan berbagai macam makanan
                            ringan yang
                            cocok untuk menemani kopi Anda.</p>
                        {{-- <a href="{{ url('about') }}" class="filled-button">Read More</a> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        {{-- <img src="{{ URL::asset('assets/images/feature-image.jpg') }}" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
