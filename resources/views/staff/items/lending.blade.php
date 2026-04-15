@extends('layout.template')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>CRUD Staff Item Lending Management</h2>

    <div class="d-flex gap-2">
        <a class="btn btn-success" href="{{ route('lending.create') }}">
            + Create New Lending
        </a>
        <a href="{{ route('item.index') }}" class="btn btn-secondary">
            Back to Items
        </a>
        <div>
            <a href="{{ route('item.export') }}" class="btn btn-secondary">Export to Excel</a>
        </div>
    </div>
</div>

{{-- Success Message --}}
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p class="mb-0">{{ $message }}</p>
</div>
@endif

{{-- Error Message --}}
@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p class="mb-0">{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>Total</th>
            <th>Name</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Pemberi</th>
            <th>Penerima</th>
            <th width="250px">Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($lendings as $value)
        <tr>
            <td>{{ $value->id }}</td>

            {{-- Item --}}
            <td>{{ $value->item->name ?? '-' }}</td>

            {{-- Total --}}
            <td>{{ $value->total }}</td>

            {{-- Nama --}}
            <td>{{ $value->nama_peminjam }}</td>

            {{-- Keterangan --}}
            <td>{{ $value->keterangan ?? '-' }}</td>

            {{-- Tanggal --}}
            <td>{{ $value->created_at->format('d-m-Y H:i') }}</td>

            {{-- Status --}}
            <td>
                @if($value->status === 'Dipinjam')
                <span class="badge bg-warning text-dark">Dipinjam</span>
                @else
                <span class="badge bg-success">Dikembalikan</span>
                @endif
            </td>

            <!-- pemberi pinjaman -->
             <td>{{ $value->created_by }}</td>

            {{-- Staff --}}
            <td>{{ $value->edited_by ?? '-' }}</td>

            {{-- Action --}}
            <td class="d-flex gap-1">

                {{-- RETURN BUTTON --}}
                @if($value->status === 'Dipinjam')
                <form action="{{ route('lending.update', $value->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary btn-sm">
                        Return
                    </button>
                </form>
                @else
                <button class="btn btn-success btn-sm" disabled>
                    Returned
                </button>
                @endif

                {{-- DELETE --}}
                <form action="{{ route('lending.destroy', $value->id) }}" method="POST"
                    onsubmit="return confirm('Yakin mau hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>

            </td>
        </tr>

        @empty
        <tr>
            <td colspan="9" class="text-center">No data available</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection