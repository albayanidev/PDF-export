<?php

namespace App\Exports;

use App\Models\Offer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OffersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Offer::select('type', 'custom', 'written_in_price', 'sizewater', 'price', 'amount')->get();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'TYPE',
            'CUSTOM',
            'WRITTEN IN PIECE',
            'SIZEWATER',
            'PRICE',
            'AMOUNT',
        ];
    }
}
