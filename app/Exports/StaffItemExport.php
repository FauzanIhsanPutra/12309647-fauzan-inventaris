<?php

namespace App\Exports;

use App\Models\Lendings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StaffItemExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lendings::all();
    }
}
