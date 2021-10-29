<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    use HasFactory;

    protected $table = 'payment_details';

    protected $guarded = ['id'];

    public function purchases()
    {
        return $this->belongsTo(Purchases::class, 'purchase_id');
    }

    public function items()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }
}
