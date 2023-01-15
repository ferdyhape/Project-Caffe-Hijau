</html>
@extends('admin-side.dashboard.layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container row justify-content-center">
    <div class="col-lg-6 mt-2 mb-4">
        <div class="card border-0 shadow-sm">
            <h5 class="card-header text-center text-uppercase">Add New banner</h5>
            <div class="card-body p-5">
                <form action="{{ url('dashboard/banner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            name="name" placeholder="Banner Name" required autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text"
                            class="form-control form-control-user @error('attention') is-invalid @enderror"
                            name="attention" placeholder="Attention Text (Optional)">
                        @error('attention')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number"
                            class="form-control form-control-user @error('fzAttention') is-invalid @enderror"
                            name="fzAttention" placeholder="Font Size for Attention (Optional, default 35px)">
                        @error('fzAttention')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('offer') is-invalid @enderror"
                            name="offer" placeholder="Offer text (Optional)">
                        @error('offer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number"
                            class="form-control form-control-user @error('fzOffer') is-invalid @enderror" name="fzOffer"
                            placeholder="Font Size for Offer (Optional, default 40px)">
                        @error('fzOffer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label class="input-group-text" for="picture">Picture</label>
                        <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture"
                            name="picture" onchange="previewImage()">
                        @error('picture')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <img class="img-preview img-fluid mt-3 mx-auto" id="img-preview">
                    <button type="submit" class="btn btn-primary btn-user btn-block mt-3">Add banner</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#picture');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection