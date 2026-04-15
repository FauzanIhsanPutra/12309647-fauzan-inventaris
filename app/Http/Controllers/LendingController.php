<?php

namespace App\Http\Controllers;

use App\Models\Lendings;
use Illuminate\Http\Request;


class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lendings = Lendings::with('item')->get();
        return view('staff.items.lending', compact('lendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = \App\Models\Item::all();
        return view('staff.items.createLending', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'item_id' => 'required|exists:items,id',
            'total' => 'required|integer|min:1',
            'keterangan' => 'required|string',
            ''
        ]);

        $item = \App\Models\Item::find($request->item_id);

        if ($request->total > $item->total) {
            return back()
                ->withErrors(['total' => 'Jumlah melebihi stok tersedia!'])
                ->withInput();
        }


        Lendings::create([
            'nama_peminjam' => $request->nama_peminjam,
            'item_id' => $request->item_id,
            'total' => $request->total,
            'keterangan' => $request->keterangan,
            'status' => 'Dipinjam',
            'created_by' => auth()->user()->name ?? 'Unknown',
        ]);
        
        return redirect()->route('lending.index')
            ->with('success', 'Lending created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lendings $lending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lendings $lending) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lendings $lending)
    {
        if ($lending->status === 'Dikembalikan') {
            return redirect()->back()->with('error', 'Item already returned!');
        }

        // balikin stok
        $item = $lending->item;
        $item->available += $lending->total;
        $item->save();

        // update status
        $lending->status = 'Dikembalikan';
        $lending->edited_by = auth()->user()->name ?? 'Unknown';
        $lending->save();

        return redirect()->route('lending.index')
            ->with('success', 'Item Returned');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lendings $lending)
    {
        $lending->delete();

        return redirect()->route('lending.index')
            ->with('success', 'Lending deleted successfully.');
    }
}
