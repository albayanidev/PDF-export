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
            $table->string('work_nature')->nullable();
            $table->string('work_quality')->nullable();
            $table->integer('purchased_items')->nullable();
            $table->dateTime('approval_date')->nullable();
            $table->integer('approvals')->nullable();
            $table->string('1_offer')->nullable();
            $table->string('2_offer')->nullable();
            $table->string('3_offer')->nullable();
            $table->string('4_offer')->nullable();
            $table->integer('without_vat')->nullable();
            $table->dateTime('report_issuance_date')->nullable();
            $table->dateTime('report_issuance_time')->nullable();
            $table->string('company_receiving_offer')->nullable();
            $table->string('address')->nullable();
            $table->integer('tax_number')->nullable();
            $table->string('bank_branch_name')->nullable();
            $table->integer('bank_branch_code')->nullable();
            $table->integer('bank_account_number')->nullable();
            $table->string('tax_office')->nullable();
            $table->integer('invoice_amount')->nullable();
            $table->string('purchasing_commission_member_name')->nullable();
            $table->string('commission_member_title')->nullable();
            $table->string('department_head')->nullable();
            $table->string('department')->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->string('inspection_member_name')->nullable();
            $table->string('inspection_member_title')->nullable();
            $table->integer('warehouse_depot_sequence_number')->nullable();
            $table->integer('warehouse_depot_volumn_number')->nullable();
            $table->dateTime('need_notification_date')->nullable();
            $table->string('school_priniciple')->nullable();
            $table->string('vice_principle')->nullable();
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
