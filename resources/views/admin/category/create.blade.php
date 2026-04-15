@extends('layout.template')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Create New Category</h3>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
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

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Input the name here" value="{{ old('name') }}">
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
