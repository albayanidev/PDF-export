<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use App\Models\Data;
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

    public function store()
    {
        $user = Auth::user();
        $data = $user->data()->updateOrCreate(
            ['user_id' => $user->id],
            $this->validate()
        );
    }
}
