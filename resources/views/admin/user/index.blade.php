@extends('layout.template')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div>
            <h2>CRUD Staff Management</h2>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('users.create') }}">Create New</a>
            <a class="btn btn-primary" href="{{ route('users.export') }}">Export to Excel</a>
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
                <th>Name</th>
                <th>Email</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $value->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('users.edit', $value->id) }}">Edit</a>
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
