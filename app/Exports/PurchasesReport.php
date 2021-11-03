<?php

namespace App\Exports;

use App\Models\Purchases;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchasesReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchases::all();
    }
}
