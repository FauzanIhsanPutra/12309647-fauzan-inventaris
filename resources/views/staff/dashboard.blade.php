@extends('layout.template')

@section('content')
<div class="container mt-5">

    <div class="text-center mb-5">
        <h1>Staff Dashboard</h1>
        <p>Welcome! Choose a menu below to manage data.</p>
    </div>

    <div class="row justify-content-center">

        <!-- Items -->
        <div class="col-md-3 mb-4">
            <div class="card shadow text-center p-3">
                <h4>Items</h4>
                <p>Manage items data</p>
                <a href="{{ route('item.index') }}" class="btn btn-success">
                    Go to Items
                </a>
            </div>
        </div>

        <!-- Lending -->
        <div class="col-md-3 mb-4">
            <div class="card shadow text-center p-3">
                <h4>Lending</h4>
                <p>Manage lending records</p>
                <a href="{{ route('lending.index') }}" class="btn btn-primary">
                    Go to Lending
                </a>
            </div>
        </div>

        <!-- Users -->
        <div class="col-md-3 mb-4">
            <div class="card shadow text-center p-3">
                <h4>Users</h4>
                <p>Manage user accounts</p>
                <a href="{{ route('profile.index') }}" class="btn btn-warning">
                    Go to Users
                </a>
            </div>
        </div>

    </div>
</div>
@endsection