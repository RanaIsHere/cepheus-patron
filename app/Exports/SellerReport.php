<?php

namespace App\Exports;

use App\Models\Seller;
use Maatwebsite\Excel\Concerns\FromCollection;

class SellerReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Seller::all();
    }
}
