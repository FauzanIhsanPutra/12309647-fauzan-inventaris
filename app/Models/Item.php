<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'total',
        'repair',
        'lending',
        'available',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lendings()
    {
        return $this->hasMany(\App\Models\Lendings::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
