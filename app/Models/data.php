<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'user_id',
        'work_nature',
        'work_quality',
        'purchased_items',
        'approval_date',
        'approvals_number',
        'offer_1',
        'offer_2',
        'offer_3',
        'offer_4',
        'amount_without_vat',
        'report_issuance_date',
        'report_issuance_time',
        'company_receiving_offer',
        'address',
        'tax_number',
        'bank_branch_name',
        'bank_branch_code',
        'bank_account_number',
        'tax_office',
        'invoice_amount',
        'purchasing_commission_member_name',
        'commission_member_title',
        'department_head',
        'department',
        'invoice_date',
        'inspection_member_name',
        'inspection_member_title',
        'warehouse_depot_sequence_number',
        'warehouse_depot_volumn_number',
        'need_notification_date',
        'school_principal',
        'vice_principal',
        'nys_budget_amount',
        'document_number',
        'to_office',
        'nys_budget_allocation',
        'to_directorate',
    ];

    protected $casts = [
        'approval_date' => 'datetime',
        'report_issuance_date' => 'datetime',
        'report_issuance_time' => 'datetime',
        'invoice_date' => 'datetime',
        'need_notification_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
