</html>
@extends('dashboard.layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container row justify-content-center">
    <div class="col-lg-6 mt-2 mb-4">
        <div class="card border-0 shadow-sm">
            <h5 class="card-header text-center text-uppercase">Add New Item</h5>
            <div class="card-body p-5">
                <form action="{{ url('dashboard/item') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            name="name" placeholder="Item Name" required autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user @error('price') is-invalid @enderror"
                            name="price" placeholder="Price" required>
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <input type="text"
                            class="form-control form-control-user @error('description') is-invalid @enderror"
                            name="description" placeholder="Description">
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <select class="form-control @error('Category') is-invalid @enderror" id="category_id"
                            name="category_id" required>
                            <option>Category</option>
                            @foreach($category as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
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
                    <img class="img-preview img-fluid mt-1" id="img-preview">
                    <button type="submit" class="btn btn-primary btn-user btn-block mt-3">Add Item</button>
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