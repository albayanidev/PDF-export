<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $fillable = [
        'work_nature',
        'work_quality',
        'purchased_items',
        'approval_date',
        'approvals',
        '1_offer',
        '2_offer',
        '3_offer',
        '4_offer',
        'without_vat',
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
        'school_priniciple',
        'vice_principle',
    ];
}
