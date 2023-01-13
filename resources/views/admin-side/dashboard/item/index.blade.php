@extends('admin-side.dashboard.layouts.main')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary my-auto">Item List</h6>
            <a href="{{ url('dashboard/item/create') }}" class="btn btn-primary">Add Item</a>
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
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($item as $i)
                        <tr>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->price }}</td>
                            {{-- if category not connected --}}
                            @if (is_null($i->item_category))
                            <td>
                                <p>[Category not selected]<br><strong><a href="item/{{ $i->id }}/edit">Select
                                            Category</a></strong></p>
                            </td>
                            @else
                            <td>{{ $i->item_category->name }}</td>
                            @endif

                            {{-- if description is null --}}
                            @if (is_null($i->description))
                            <td>
                                <p>[No description]<br><strong><a href="item/{{ $i->id }}/edit">Add
                                            Description</a></strong></p>
                            </td>
                            @else
                            <td>{{ $i->description }}</td>
                            @endif

                            {{-- if image not included --}}
                            @if (is_null($i->picture))
                            <td>Image not included</td>
                            @else
                            <td class="text-center">
                                <img src="{{ asset('storage/'. $i->picture) }}" alt="item-image" width="150">
                            </td>
                            @endif
                            <td class="d-flex justify-content-around">
                                <a href="item/{{ $i->id }}" class="badge bg-success text-white p-2 mx-2"><i
                                        class="fas fa-fw fa-eye" style="font-size: 18px;"></i></a>
                                <a href="item/{{ $i->id }}/edit" class="badge bg-warning text-white p-2 mx-2"><i
                                        class="fas fa-fw fa-pencil" style="font-size: 18px;"></i></a>
                                <form action="item/{{ $i->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0 p-2 mx-2"
                                        onclick="return confirm('deleting {{ $i->name }} items??')"><i
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