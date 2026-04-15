@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center mb-4">
                <h2>Create New Item Lending</h2>
            </div>
            <div class="text-center justify-content-between mb-3">
                <a href="{{ route('lending.index') }}" class="btn btn-primary">Back to List</a>
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

            <form action="{{ route('lending.store') }}" method="POST">
                @csrf

                {{-- nama peminjam --}}
                <div class="mb-3">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror"
                        placeholder="Input the name here" value="{{ old('nama_peminjam') }}">
                    @error('nama_peminjam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- form item --}}
                <div class="mb-3">
                    <label class="form-label">Item</label>
                    <select name="item_id" class="form-control @error('item_id') is-invalid @enderror">
                        <option value="">-- Select Item --</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('item_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                {{-- Total Item --}}
                <div class="mb-3">
                    <label class="form-label">Total Item <span class="text-muted">(current available: {{ $item->available }})</span></label>
                    <input type="number" name="total" class="form-control @error('total') is-invalid @enderror"
                        placeholder="Input the total item here" value="{{ old('total') }}">
                    @error('total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- keterangan --}}
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                        placeholder="Input the keterangan here" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
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
