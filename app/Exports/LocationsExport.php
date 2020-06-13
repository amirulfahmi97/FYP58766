<?php

namespace App\Exports;

use App\Location;
use Maatwebsite\Excel\Concerns\FromCollection;

class LocationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Location::all();
    }
}
