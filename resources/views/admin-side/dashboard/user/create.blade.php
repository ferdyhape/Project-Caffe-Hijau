</html>
@extends('admin-side.dashboard.layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container row justify-content-center">
    <div class="col-lg-6 mt-2 mb-4">
        <div class="card border-0 shadow-sm">
            <h5 class="card-header text-center text-uppercase">Add New user</h5>
            <div class="card-body p-5">
                <form action="{{ url('dashboard/user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            name="name" placeholder="Name" required autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                            name="email" placeholder="Email" required autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-control @error('level') is-invalid @enderror" id="level" name="level"
                            required>
                            <option value="">Select User Level</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
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
                            name="password" required placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control form-control-user @error('password') is-invalid @enderror"
                            name="password_confirmation" required placeholder="Repeat Password">
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
                    <button type="submit" class="btn btn-primary btn-user btn-block mt-3">Add User</button>
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