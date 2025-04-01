<?php

namespace App\Exports;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OffersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Offer::where('user_id', Auth::id())->select('type', 'quantity', 'quantity_written', 'measurement', 'price', 'amount')->get();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'Type',
            'Quantity',
            'Quantity Written',
            'Measurement',
            'Price',
            'Amount',
        ];
    }
}
