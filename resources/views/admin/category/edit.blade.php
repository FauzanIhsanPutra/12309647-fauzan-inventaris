@extends('layout.template')

@section('content')
    <div class="container">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-0">Edit Staff</h3>
                <small class="text-muted">Update the staff information below</small>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Back
            </a>
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

        {{-- Card --}}
        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $category->name) }}" placeholder="Input the name here">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Division --}}
                    <div class="mb-3">
                        <label class="form-label">Division</label>
                        <select name="division" class="form-control @error('division') is-invalid @enderror">
                            <option value="">-- Select Division --</option>
                            <option value="Sarpras" {{ old('division') == 'Sarpras' ? 'selected' : '' }}>Sarpras</option>
                            <option value="Tata usaha" {{ old('division') == 'Tata usaha' ? 'selected' : '' }}>Tata Usaha
                            </option>
                            <option value="Tefa" {{ old('division') == 'Tefa' ? 'selected' : '' }}>Tefa</option>
                        </select>

                        @error('division')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('categories.index') }}" class="btn btn-light">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection