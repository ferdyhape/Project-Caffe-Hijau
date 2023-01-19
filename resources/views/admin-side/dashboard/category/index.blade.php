@extends('admin-side.dashboard.layouts.main')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary my-auto">List of Categories</h6>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Add Category</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($category as $c)
                        <tr>
                            <td>{{ $c->name }}</td>{{-- if description is null --}}
                            @if (is_null($c->description))
                            <td>
                                <p>[No description]<br><strong><a href="category/{{ $c->id }}/edit">Add
                                            Description</a></strong></p>
                            </td>
                            @else
                            <td>{{ $c->description }}</td>
                            @endif
                            <td class="d-flex justify-content-around">
                                <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{$c->id}}"><i class="fas fa-fw fa-pencil"
                                        style="font-size: 18px;"></i></button>
                                <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm" data-id="{{$c->id}}"
                                    data-name="{{$c->name}}"><i class="fas fa-fw fa-trash text-white"
                                        style="font-size: 18px;"></i></button>

                                <form action="category/{{ $c->id }}" id="form-delete-{{ $c->id }}" method="POST"
                                    style="display: none">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="" value="Delete">
                                </form>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{$c->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category
                                                    <strong>[{{$c->name }}]</strong>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('dashboard/category/'.$c->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                                            name="name" placeholder="category Name"
                                                            value="{{ $c->name }}" required autofocus>
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('description') is-invalid @enderror"
                                                            name="description" placeholder="Description"
                                                            value="{{ $c->description }}">
                                                        @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning mt-2">Edit
                                                    Category</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Create -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content border-0 shadow">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('dashboard/category') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            name="name" placeholder="Category Name" required autofocus>
                                        @error('name')
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary ">Add
                                    Category</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection