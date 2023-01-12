</html>
@extends('dashboard.layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container row justify-content-center">
    <div class="col-lg-6 mt-2 mb-4">
        <div class="card border-0 shadow-sm">
            <h5 class="card-header text-center text-uppercase">Edit category <strong>[{{ $category->name }}]</strong>
            </h5>
            <div class="card-body p-5">
                <form action="{{ url('dashboard/category/'.$category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            name="name" placeholder="category Name" value="{{ $category->name }}" required autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text"
                            class="form-control form-control-user @error('description') is-invalid @enderror"
                            name="description" placeholder="Description" value="{{ $category->description }}">
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mt-2">Edit category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection