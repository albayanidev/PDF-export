<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('work_nature')->nullable();
            $table->string('work_quality')->nullable();
            $table->string('purchased_items')->nullable();
            $table->dateTime('approval_date')->nullable();
            $table->string('approvals_number')->nullable();
            $table->string('offer_1')->nullable();
            $table->string('offer_2')->nullable();
            $table->string('offer_3')->nullable();
            $table->string('offer_4')->nullable();
            $table->string('amount_without_vat')->nullable();
            $table->dateTime('report_issuance_date')->nullable();
            $table->dateTime('report_issuance_time')->nullable();
            $table->string('company_receiving_offer')->nullable();
            $table->string('address')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('bank_branch_name')->nullable();
            $table->string('bank_branch_code')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('tax_office')->nullable();
            $table->string('invoice_amount')->nullable();
            $table->string('purchasing_commission_member_name')->nullable();
            $table->string('commission_member_title')->nullable();
            $table->string('department_head')->nullable();
            $table->string('department')->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->string('inspection_member_name')->nullable();
            $table->string('inspection_member_title')->nullable();
            $table->string('warehouse_depot_sequence_number')->nullable();
            $table->string('warehouse_depot_volumn_number')->nullable();
            $table->dateTime('need_notification_date')->nullable();
            $table->string('school_principal')->nullable();
            $table->string('vice_principal')->nullable();
            $table->string('nys_budget_amount')->nullable();
            $table->string('document_number')->nullable();
            $table->string('to_office')->nullable();
            $table->string('nys_budget_allocation')->nullable();
            $table->string('to_directorate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
