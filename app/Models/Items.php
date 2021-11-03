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
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function seller_det()
    {
        return $this->hasMany(SellerDetails::class, 'item_id');
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetails::class, 'item_id');
    }

    public function healthLogs()
    {
        return $this->hasOne(HealthLogs::class, 'item_id');
    }
}
