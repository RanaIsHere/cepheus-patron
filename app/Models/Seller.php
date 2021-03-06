<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = "seller";

    protected $guarded = ['id'];

    public function sellerDetails()
    {
        return $this->hasOne(SellerDetails::class, 'seller_id');
    }

    public function payBuffer()
    {
        return $this->hasOne(PayBuffer::class, 'seller_id');
    }

    public function patrons()
    {
        return $this->belongsTo(Patrons::class);
    }
}
