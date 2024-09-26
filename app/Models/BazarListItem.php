<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BazarListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'bazar_list_id',
        'product_id',
        'quantity',
    ];

    public function bazarList()
    {
        return $this->belongsTo(BazarList::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
