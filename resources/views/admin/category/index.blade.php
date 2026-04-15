@extends('layout.template')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div>
            <h2>CRUD Division Item Category Management</h2>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('categories.create') }}">Create New</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Division</th>
                <th>Total Items</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($categories as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->division }}</td>
                            <td>{{ $value->items_count }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $value->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('categories.edit', $value->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
@endsection