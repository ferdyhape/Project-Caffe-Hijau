@extends('admin-side.dashboard.layouts.main')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary my-auto">Banner List</h6>
            <button class="btn text-white bg-success" data-bs-toggle="modal" data-bs-target="#createModal">Add
                Banner</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Attention Text</th>
                            <th>Font-Size Attention</th>
                            <th>Offer Text</th>
                            <th>Font-Size Offer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Attention Text</th>
                            <th>Font-Size Attention</th>
                            <th>Offer Text</th>
                            <th>Font-Size Offer</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($banner as $b)
                        <tr>
                            <td>{{ $b->name }}</td>
                            <td>{{ $b->attention }}</td>
                            <td>{{ $b->fzAttention }}px</td>
                            <td>{{ $b->offer }}</td>
                            <td>{{ $b->fzOffer }}px</td>
                            <td class="d-flex justify-content-around">
                                <button class="badge bg-success border-0 text-white p-2 mx-2 view-image"
                                    data-image_path="{{$b->picture}}" data-name="{{ $b->name }}"><i
                                        class="fas fa-fw fa-images" style="font-size: 18px;"></i></button>
                                <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{$b->id}}"><i class="fas fa-fw fa-pencil"
                                        style="font-size: 18px;"></i></button>
                                <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm" data-id="{{$b->id}}"
                                    data-name="{{$b->name}}"><i class="fas fa-fw fa-trash text-white"
                                        style="font-size: 18px;"></i></button>
                                <form action="banner/{{ $b->id }}" id="form-delete-{{ $b->id }}" method="POST"
                                    style="display: none">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="" value="Delete">
                                </form>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{$b->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Item
                                                    {{$b->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('dashboard/banner/'.$b->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <img src="{{ asset('storage/'. $b->picture) }}"
                                                        class="card-img-top mb-4" alt="banner-image">
                                                    <input type="hidden" name="oldPicture"
                                                        value="{{ $b->picture }}"><br>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                                            name="name" placeholder="banner Name" value="{{ $b->name }}"
                                                            required autofocus>
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('attention') is-invalid @enderror"
                                                            name="attention" placeholder="Attention Text (Optional)"
                                                            value="{{ $b->attention }}">
                                                        @error('attention')
                                                        <div class=" invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number"
                                                            class="form-control form-control-user @error('fzAttention') is-invalid @enderror"
                                                            name="fzAttention"
                                                            placeholder="Font Size for Attention (Optional, default 35px)"
                                                            value="{{ $b->fzAttention }}">
                                                        @error('fzAttention')
                                                        <div class=" invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('offer') is-invalid @enderror"
                                                            name="offer" placeholder="Offer text (Optional)"
                                                            value="{{ $b->offer }}">
                                                        @error('offer')
                                                        <div class=" invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number"
                                                            class="form-control form-control-user @error('fzOffer') is-invalid @enderror"
                                                            name="fzOffer"
                                                            placeholder="Font Size for Offer (Optional, default 40px)"
                                                            value="{{ $b->fzOffer }}">
                                                        @error('fzOffer')
                                                        <div class=" invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="editPicture({{$b->id}})">Change Image</button>
                                                    </div>
                                                    <div class="input-group my-3">
                                                        <input type="file" class="form-control"
                                                            id="newpicture-{{$b->id}}" name="picture"
                                                            onchange="previewImageEdit({{$b->id}})"
                                                            style="display: none">
                                                    </div>

                                                    <div class="card-body" id="card-preview-{{$i->id}}"
                                                        style="display: none">
                                                        <div class="card-header p-0">
                                                            Preview new Image
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <img class="card-img-top img-fluid mt-1" alt="new-image"
                                                                id="img-preview-edit-{{$b->id}}">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning mt-2">Edit Banner</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('dashboard/banner') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
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
                                            name="fzAttention"
                                            placeholder="Font Size for Attention (Optional, default 35px)">
                                        @error('fzAttention')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('offer') is-invalid @enderror"
                                            name="offer" placeholder="Offer text (Optional)">
                                        @error('offer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="number"
                                            class="form-control form-control-user @error('fzOffer') is-invalid @enderror"
                                            name="fzOffer" placeholder="Font Size for Offer (Optional, default 40px)">
                                        @error('fzOffer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label class="input-group-text" for="picture">Picture</label>
                                        <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                            id="picture" name="picture" onchange="previewImageCreate()">
                                        @error('picture')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                    <img class="img-preview-create img-fluid mt-3 mx-auto" id="img-preview-create">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary ">Add
                                    Banner</button>
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