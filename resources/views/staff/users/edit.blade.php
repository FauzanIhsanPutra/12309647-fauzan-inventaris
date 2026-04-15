@extends('layout.template')

@section('content')
<div class="card p-4">
    <h3>Edit Password</h3>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>
        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>
@endsection