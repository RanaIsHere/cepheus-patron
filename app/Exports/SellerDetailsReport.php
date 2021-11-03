<?php

namespace App\Exports;

use App\Models\SellerDetails;
use Maatwebsite\Excel\Concerns\FromCollection;

class SellerDetailsReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SellerDetails::all();
    }
}
