<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Illuminate\Support\Facades\Auth;

class DataForm extends Form
{
    public $work_nature = '';
    public $work_quality= '';
    public $purchased_items= '';
    public $approval_date= '';
    public $approvals_number= '';
    public $offer_1= '';
    public $offer_2= '';
    public $offer_3= '';
    public $offer_4= '';
    public $amount_without_vat= '';
    public $report_issuance_date= '';
    public $report_issuance_time= '';
    public $company_receiving_offer= '';
    public $address= '';
    public $tax_number= '';
    public $bank_branch_name= '';
    public $bank_branch_code= '';
    public $bank_account_number= '';
    public $tax_office= '';
    public $invoice_amount= '';
    public $purchasing_commission_member_name= '';
    public $commission_member_title= '';
    public $department_head= '';
    public $department= '';
    public $invoice_date= '';
    public $inspection_member_name= '';
    public $inspection_member_title= '';
    public $warehouse_depot_sequence_number= '';
    public $warehouse_depot_volume_number= '';
    public $need_notification_date= '';
    public $school_principal= '';
    public $vice_principal= '';

    protected $rules = [
        'approval_date' => 'nullable|date',
        'report_issuance_date' => 'nullable|date',
        'report_issuance_time' => 'nullable|date',
        'invoice_date' => 'nullable|date',
        'need_notification_date' => 'nullable|date',
    ];

    public function mount()
    {
       $this->resetForm();
    }

    public function resetForm()
    {
        $user = Auth::user();
        $data = $user->data()->first();

        $this->fill($data->toArray());
    }

    public function store()
    {
        $this->validate();

        $user = Auth::user();
        $data = $user->data()->updateOrCreate(
            ['user_id' => $user->id],
            $this->formatDates($this->only([
                'work_nature', 'work_quality', 'purchased_items', 'approval_date', 'approvals_number',
                'offer_1', 'offer_2', 'offer_3', 'offer_4', 'amount_without_vat', 'report_issuance_date',
                'report_issuance_time', 'company_receiving_offer', 'address', 'tax_number', 'bank_branch_name',
                'bank_branch_code', 'bank_account_number', 'tax_office', 'invoice_amount', 'purchasing_commission_member_name',
                'commission_member_title', 'department_head', 'department', 'invoice_date', 'inspection_member_name',
                'inspection_member_title', 'warehouse_depot_sequence_number', 'warehouse_depot_volume_number',
                'need_notification_date', 'school_principal', 'vice_principal'
            ]))
        );

       $this->resetForm();
    }

    private function formatDates($data)
    {
        foreach (['approval_date', 'report_issuance_date', 'report_issuance_time', 'invoice_date', 'need_notification_date'] as $field) {
            if (empty($data[$field])) {
                $data[$field] = null;
            }
        }
        return $data;
    }
}
