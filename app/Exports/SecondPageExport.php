<?php

namespace App\Exports;

use App\Models\Offer;
use App\Models\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class SecondPageExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Data section
        $data = Data::where('user_id', Auth::id())->select('work_nature', 'report_issuance_date', 'purchasing_commission_member_name')->get();

        // Offers section
        $offers = Offer::where('user_id', Auth::id())->select('type', 'quantity', 'measurement')->get();

        // Preparing the collection
        $exportData = new Collection();

        // Add headings for the Data section
        $exportData->push(new \stdClass()); // Empty row for spacing
        $exportData->push((object)[
            'work_nature' => 'School Name',
            'report_issuance_date' => 'Date',
            'purchasing_commission_member_name' => 'Member Name',
        ]);

        // Add Data records
        foreach ($data as $item) {
            $exportData->push((object)[
                'work_nature' => $item->work_nature,
                'report_issuance_date' => $item->report_issuance_date,
                'purchasing_commission_member_name' => $item->purchasing_commission_member_name,
            ]);
        }

        // Insert text between sections
        $exportData->push(new \stdClass()); // Empty row for spacing
        $exportData->push((object)[
            'work_nature' => "The list of needs for our school's stationery purchase is given below. I kindly request it.", // Custom text
            'report_issuance_date' => '',
            'purchasing_commission_member_name' => '',
        ]);
        $exportData->push(new \stdClass()); // Another empty row for spacing

        // Add headings for the Offers section
        $exportData->push((object)[
            'type' => 'Type',
            'quantity' => 'Quantity',
            'measurement' => 'Unit',
        ]);

        // Add Offer records
        foreach ($offers as $item) {
            $exportData->push((object)[
                'type' => $item->type,
                'quantity' => $item->quantity,
                'measurement' => $item->measurement,
            ]);
        }

        return $exportData;
    }
}
