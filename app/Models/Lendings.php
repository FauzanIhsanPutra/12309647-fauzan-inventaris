<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lendings extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peminjam',
        'item_id',
        'total',
        'keterangan',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
