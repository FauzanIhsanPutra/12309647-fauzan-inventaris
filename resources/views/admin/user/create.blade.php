@extends('layout.template')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Create New Staff</h3>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    </div>

    {{-- Error Alert --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada kesalahan pada input kamu.
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Input the name here"
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Input the email here"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="">-- Select Role --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Button --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        Submit
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection