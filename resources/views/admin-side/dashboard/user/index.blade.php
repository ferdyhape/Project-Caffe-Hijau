@extends('admin-side.dashboard.layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary my-auto">List of Users</h6>
            <button class="btn text-white bg-success" data-bs-toggle="modal" data-bs-target="#createModal">Add
                user</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->level }}</td>
                            <td>{{ $u->password }}</td>
                            <td class="d-flex justify-content-around">
                                <button class="badge bg-success border-0 text-white p-2 mx-2 view-image"
                                    data-image_path="{{$u->picture}}" data-name="{{ $u->name }}"><i
                                        class="fas fa-fw fa-images" style="font-size: 18px;"></i></button>
                                <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{$u->id}}"><i class="fas fa-fw fa-pencil"
                                        style="font-size: 18px;"></i></button>
                                <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm" data-id="{{$u->id}}"
                                    data-name="{{$u->name}}"><i class="fas fa-fw fa-trash text-white"
                                        style="font-size: 18px;"></i></button>
                                <form action="user/{{ $u->id }}" id="form-delete-{{ $u->id }}" method="POST"
                                    style="display: none">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="" value="Delete">
                                </form>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal-{{$u->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">
                                                    Edit user
                                                    {{$u->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('dashboard/user/'.$u->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <img src="{{ asset('storage/'. $u->picture) }}"
                                                        class="card-img-top mb-4" alt="user-image">
                                                    <input type="hidden" name="oldPicture"
                                                        value="{{ $u->picture }}"><br>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                                            name="name" placeholder="Name" value="{{ $u->name }}"
                                                            required autofocus>
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email"
                                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                                            name="email" placeholder="email" value="{{ $u->email }}"
                                                            required>
                                                        @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control form-control-user @error('description') is-invalid @enderror"
                                                            name="description" placeholder="Description"
                                                            value="{{ $u->description }}">
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
                                                        <select
                                                            class="form-control @error('level') is-invalid @enderror"
                                                            id="level" name="level">
                                                            @foreach ($options as $option)
                                                            @if( $u->level == $option)
                                                            <option value="{{ $option }}" selected>{{ $option }}
                                                            </option>
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
                                                            name="password" required placeholder="Password"
                                                            value="{{ $u->password }}">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    @if (is_null($u->picture))
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
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="editPicture({{$u->id}})">Change Image</button>

                                                    <div class="input-group my-3">
                                                        <input type="file" class="form-control"
                                                            id="newpicture-{{$u->id}}" name="picture"
                                                            onchange="previewImageEdit({{$u->id}})"
                                                            style="display: none">
                                                    </div>

                                                    <div class="card-body" id="card-preview-{{$i->id}}"
                                                        style="display: none">
                                                        <div class="card-header p-0">
                                                            Preview new Image
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <img class="card-img-top img-fluid mt-1" alt="new-image"
                                                                id="img-preview-edit-{{$u->id}}">
                                                        </div>
                                                    </div>
                                                    @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning mt-2">Edit user</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add New user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('dashboard/user') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            name="name" placeholder="Name" required value="{{old('name')}}" autofocus>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" placeholder="Email" required>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control @error('level') is-invalid @enderror" id="level"
                                            name="level" required>
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
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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
                                    user</button>
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