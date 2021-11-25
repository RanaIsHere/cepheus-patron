<?php

namespace App\Exports;

use App\Models\Special;
use Maatwebsite\Excel\Concerns\FromCollection;

class SpecialReport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Special::all();
    }
}
