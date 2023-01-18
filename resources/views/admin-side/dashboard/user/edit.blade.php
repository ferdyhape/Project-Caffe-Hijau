</html>
@extends('admin-side.dashboard.layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container row justify-content-center">
    <div class="col-lg-6 mt-2 mb-4">
        <div class="card border-0 shadow-sm">
            <h5 class="card-header text-center text-uppercase">Edit user <strong>[{{ $user->name }}]</strong></h5>
            <div class="card-body p-5">
                <form action="{{ url('dashboard/user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <img src="{{ asset('storage/'. $user->picture) }}" class="card-img-top mb-4" alt="user-image">
                    <input type="hidden" name="oldPicture" value="{{ $user->picture }}"><br>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            name="name" placeholder="Name" value="{{ $user->name }}" required autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                            name="email" placeholder="email" value="{{ $user->email }}" required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text"
                            class="form-control form-control-user @error('description') is-invalid @enderror"
                            name="description" placeholder="Description" value="{{ $user->description }}">
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @php
                    $options = array("admin", "user");
                    @endphp
                    <div class="form-group">
                        <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                            @foreach ($options as $option)
                            @if( $user->level == $option)
                            <option value="{{ $option }}" selected>{{ $option }}</option>
                            @else
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control form-control-user @error('password') is-invalid @enderror"
                            name="password" required placeholder="Password" value="{{ $user->password }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @if (is_null($user->picture))
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

                    @else
                    <button type="button" class="btn btn-primary" onclick="editPicture()">Change Image</button>

                    <div class="input-group my-3">
                        <input type="file" class="form-control" id="newpicture" name="picture"
                            onchange="previewImageEdit()" style="display: none">
                    </div>

                    <div class="card-body" id="card-preview" style="display: none">
                        <div class="card-header p-0">
                            Preview new Image
                        </div>
                        <div class="card-body p-0">
                            <img class="card-img-top img-preview img-fluid mt-1" alt="new-image" id="img-preview">
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary btn-user btn-block mt-2">Edit user</button>
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