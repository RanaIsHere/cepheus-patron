<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function seller_det()
    {
        return $this->hasMany(SellerDetails::class, 'item_id');
    }
}
