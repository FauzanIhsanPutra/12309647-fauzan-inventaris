@extends('layout.template')

@section('content')
    <div class="container">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-0">Edit Item</h3>
                <small class="text-muted">Update the item information below</small>
            </div>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">
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

                <form action="{{ route('items.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $item->name) }}" placeholder="Input the name here">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Total Items --}}
                    <div class="mb-3">
                        <label class="form-label">Total Items</label>
                        <input type="number" name="total" class="form-control @error('total') is-invalid @enderror"
                            value="{{ old('total', $item->total) }}" placeholder="Input the total items here">
                        @error('total')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- New Broken Items --}}
                    <div class="mb-3">
                        <label class="form-label">New Broken Items <span class="text-muted">(Current : {{ $item->repair }})</span></label>
                        <input type="number" name="repair" class="form-control @error('repair') is-invalid @enderror"
                            value="{{ old('repair', $item->repair) }}" placeholder="Input the new broken items here">
                        @error('repair')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('items.index') }}" class="btn btn-light">
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
