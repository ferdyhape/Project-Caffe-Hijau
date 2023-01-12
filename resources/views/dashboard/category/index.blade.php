@extends('dashboard.layouts.main')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary my-auto">List of Categories</h6>
            <a href="{{ url('dashboard/category/create') }}" class="btn btn-primary">Add Category</a>
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
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->description }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="category/{{ $c->id }}" class="badge bg-success text-white p-2 mx-2"><i
                                        class="fas fa-fw fa-eye" style="font-size: 18px;"></i></a>
                                <a href="category/{{ $c->id }}/edit" class="badge bg-warning text-white p-2 mx-2"><i
                                        class="fas fa-fw fa-pencil" style="font-size: 18px;"></i></a>
                                <form action="category/{{ $c->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0 p-2 mx-2"
                                        onclick="return confirm('deleting {{ $c->name }} items??')"><i
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