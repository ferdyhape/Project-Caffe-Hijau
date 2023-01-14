@extends('admin-side.dashboard.layouts.main')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary my-auto">Banner List</h6>
            <a href="{{ url('dashboard/banner/create') }}" class="btn btn-primary">Add Banner</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($banner as $b)
                        <tr>
                            <td>{{ $b->name }}</td>
                            {{-- if image not included --}}
                            @if (is_null($b->picture))
                            <td>Image not included</td>
                            @else
                            <td class="text-center">
                                <img src="{{ asset('storage/'. $b->picture) }}" alt="banner-image" width="300">
                            </td>
                            @endif
                            <td class="d-flex justify-content-around">
                                <a href="banner/{{ $b->id }}" class="badge bg-success text-white p-2 mx-2"><i
                                        class="fas fa-fw fa-eye" style="font-size: 18px;"></i></a>
                                <a href="banner/{{ $b->id }}/edit" class="badge bg-warning text-white p-2 mx-2"><i
                                        class="fas fa-fw fa-pencil" style="font-size: 18px;"></i></a>
                                <form action="banner/{{ $b->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0 p-2 mx-2"
                                        onclick="return confirm('deleting {{ $b->name }} banners??')"><i
                                            class="fas fa-fw fa-trash text-white" style="font-size: 18px;"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection