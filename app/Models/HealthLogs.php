<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthLogs extends Model
{
    use HasFactory;

    protected $table = 'health_logs';

    protected $guarded = ['id'];

    public function items()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }
}
