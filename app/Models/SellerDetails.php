<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerDetails extends Model
{
    use HasFactory;

    protected $table = 'seller_details';
    
    protected $guarded = ['id'];
}