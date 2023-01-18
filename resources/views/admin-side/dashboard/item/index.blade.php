@extends('admin-side.dashboard.layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary my-auto">Item List</h6>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Add Item</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($item as $i)
                        <tr>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->price }}</td>
                            <td>{{ $i->item_category->name }}</td>
                            <td>{{ $i->description }}</td>
                            <td class="d-flex justify-content-around">
                                <button class="badge bg-success border-0 text-white p-2 mx-2 view-image"
                                    data-image_path="{{$i->picture}}" data-name="{{ $i->name }}"><i
                                        class="fas fa-fw fa-images" style="font-size: 18px;"></i></button>
                                <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{$i->id}}"><i class="fas fa-fw fa-pencil"
                                        style="font-size: 18px;"></i></button>
                                <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm" data-id="{{$i->id}}"
                                    data-name="{{$i->name}}"><i class="fas fa-fw fa-trash text-white"
                                        style="font-size: 18px;"></i></button>

                                <form action="item/{{ $i->id }}" id="form-delete" method="POST" style="display: none">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="" value="Delete">
                                </form>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{$i->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">
                                                    Edit Item
                                                    <strong>[{{$i->name }}]</strong>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('dashboard/item/'.$i->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <img src="{{ asset('storage/'. $i->picture) }}"
                                                        class="card-img-top mb-4" alt="item-image">
                                                    <input type="hidden" name="oldPicture"
                                                        value="{{ $i->picture }}"><br>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                                            name="name" placeholder="Item Name" value="{{ $i->name }}"
                                                            required autofocus>
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number"
                                                            class="form-control form-control-user @error('price') is-invalid @enderror"
                                                            name="price" placeholder="Price" value="{{ $i->price }}"
                                                            required>
                                                        @error('price')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('description') is-invalid @enderror"
                                                            name="description" placeholder="Description"
                                                            value="{{ $i->description }}">
                                                        @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('category_id') is-invalid @enderror"
                                                            id="category_id" name="category_id">
                                                            @if(is_null($i->item_category))
                                                            <option selected class="text-danger">Select categories
                                                            </option>
                                                            @endif
                                                            @foreach($category as $c)
                                                            @if( $i->category_id == $c->id)
                                                            <option value="{{ $c->id }}" selected>{{ $c->name }}
                                                            </option>
                                                            @else
                                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @if (is_null($i->picture))
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="picture">Picture</label>
                                                        <input type="file"
                                                            class="form-control @error('picture') is-invalid @enderror"
                                                            id="picture" name="picture" onchange="previewImageEdit()">
                                                        @error('picture')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <img class="img-preview-edit img-fluid mt-1" id="img-preview-edit">

                                                    @else
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="editPicture()">Change Image</button>
                                                    </div>

                                                    <div class="input-group my-3">
                                                        <input type="file" class="form-control" id="newpicture"
                                                            name="picture" onchange="previewImageEdit()"
                                                            style="display: none">
                                                    </div>

                                                    <div class="card-body" id="card-preview" style="display: none">
                                                        <div class="card-header p-0">
                                                            Preview new Image
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <img class="card-img-top img-preview-edit img-fluid mt-1"
                                                                alt="new-image" id="img-preview-edit">
                                                        </div>
                                                    </div>
                                                    @endif
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning mt-2">Edit Item</button>
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
                                <form action="{{ url('dashboard/item') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            name="name" placeholder="Item Name" required autofocus>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="number"
                                            class="form-control form-control-user @error('price') is-invalid @enderror"
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
                                        <select class="form-control @error('Category') is-invalid @enderror"
                                            id="category_id" name="category_id" required>
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
                                    Item</button>
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