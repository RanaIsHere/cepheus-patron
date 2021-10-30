<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayBuffer extends Model
{
    use HasFactory;

    protected $table = 'pay_buffer';

    protected $guarded = ['id'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }
}
