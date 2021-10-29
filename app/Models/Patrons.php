<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrons extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function seller()
    {
        return $this->hasMany(Seller::class, 'patron_id');
    }
}
