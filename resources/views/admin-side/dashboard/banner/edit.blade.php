</html>
@extends('admin-side.dashboard.layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container row justify-content-center">
    <div class="col-lg-6 mt-2 mb-4">
        <div class="card border-0 shadow-sm">
            <h5 class="card-header text-center text-uppercase">Edit banner <strong>[{{ $banner->name }}]</strong></h5>
            <div class="card-body p-5">
                <form action="{{ url('dashboard/banner/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <img src="{{ asset('storage/'. $banner->picture) }}" class="card-img-top mb-4" alt="banner-image">
                    <input type="hidden" name="oldPicture" value="{{ $banner->picture }}"><br>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            name="name" placeholder="banner Name" value="{{ $banner->name }}" required autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text"
                            class="form-control form-control-user @error('attention') is-invalid @enderror"
                            name="attention" placeholder="Attention Text (Optional)" value="{{ $banner->attention }}">
                        @error('attention')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number"
                            class="form-control form-control-user @error('fzAttention') is-invalid @enderror"
                            name="fzAttention" placeholder="Font Size for Attention (Optional, default 35px)"
                            value="{{ $banner->fzAttention }}">
                        @error('fzAttention')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('offer') is-invalid @enderror"
                            name="offer" placeholder="Offer text (Optional)" value="{{ $banner->offer }}">
                        @error('offer')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number"
                            class="form-control form-control-user @error('fzOffer') is-invalid @enderror" name="fzOffer"
                            placeholder="Font Size for Offer (Optional, default 40px)" value="{{ $banner->fzOffer }}">
                        @error('fzOffer')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary" onclick="editPicture()">Change Image</button>

                    <div class="input-group my-3">
                        <input type="file" class="form-control" id="newpicture" name="picture" onchange="previewImage()"
                            style="display: none">
                    </div>

                    <div class="card-body" id="card-preview" style="display: none">
                        <div class="card-header p-0">
                            Preview new Image
                        </div>
                        <div class="card-body p-0">
                            <img class="card-img-top img-preview img-fluid mt-1" alt="new-image" id="img-preview">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block mt-2">Edit banner</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const card = document.querySelector('#card-preview');

        if (card.style.display === "none") {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }

        const image = document.querySelector('#newpicture');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    function editPicture() {
        var x = document.getElementById("newpicture");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
@endsection