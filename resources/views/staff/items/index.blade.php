@extends('layout.template')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div>
            <h2>CRUD Staff Item Stock & Lending Management</h2>
        </div>
        <div>
            <a href="{{ route('lending.index') }}" class="btn btn-success">Manage Lendings</a>
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
                <th>lending</th>
                <th>Broken</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->category->name }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->total }}</td>
                    <td>{{ $value->lendings->sum('total') }}</td>
                    <td>{{ $value->repair }}</td>
                    <td>{{ $value->total - $value->lendings->sum('total') - $value->repair }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection