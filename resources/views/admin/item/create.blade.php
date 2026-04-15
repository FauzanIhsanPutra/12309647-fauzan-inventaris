@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center mb-4">
                <h2>Create New Item</h2>
            </div>
            <div class="text-center justify-content-between mb-3">
                <a href="{{ route('items.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('items.store') }}" method="POST">
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

                {{-- Category --}}
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        placeholder="Input the total items here" value="{{ old('total') }}">
                    @error('total')
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
