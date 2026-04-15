@extends('layout.template')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div>
            <h2>CRUD Admin Item Management</h2>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('items.create') }}">Create New</a>
        </div>
    </div>

    @if ($message=Session::get('success'))
        <div class="alert aler-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Name</th>
                <th>Total</th>
                <th>on-repair</th>
                <th>lending</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->category->name }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->total }}</td>
                    <td>{{ $value->repair }}</td>
                    <td>{{ $value->lending }}</td>
                    <td>
                        <form action="{{ route('items.destroy', $value->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('items.edit', $value->id) }}">Edit</a>
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