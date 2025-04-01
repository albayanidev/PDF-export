<?php

use App\Models\User;
use App\Models\Data;
use App\Livewire\Forms\DataForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use function Livewire\Volt\{form, mount};

form(DataForm::class);

mount(function () {
    $this->form->resetForm();
});

$updateData = function () {
    $this->form->store();
    $this->dispatch('data-updated');
};

?>

<section class="w-full">
    <form wire:submit="updateData">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <flux:input wire:model="form.work_nature" label="Nature of the Work" />
            <flux:input wire:model="form.work_quality" label="Quality of the Work" />
            <flux:input wire:model="form.purchased_items" label="Number of Items Purchased" />
            <flux:input wire:model="form.approvals_number" label="Number of Approvals" />
            <flux:input wire:model="form.offer_1" label="1st Offer" />
            <flux:input wire:model="form.offer_2" label="2nd Offer" />
            <flux:input wire:model="form.offer_3" label="3rd Offer" />
            <flux:input wire:model="form.offer_4" label="4th Offer" />
            <flux:input wire:model="form.amount_without_vat" label="Amount Without VAT" />
            <flux:input wire:model="form.company_receiving_offer" label="Company Receiving the Offer" />
            <flux:input wire:model="form.address" label="Address" />
            <flux:input wire:model="form.tax_number" label="Tax Number" />
            <flux:input wire:model="form.bank_branch_name" label="Bank Branch Name"  />
            <flux:input wire:model="form.bank_branch_code" label="Bank Branch Code" />
            <flux:input wire:model="form.bank_account_number" label="Bank Account Number" />
            <flux:input wire:model="form.tax_office" label="Tax Office" />
            <flux:input wire:model="form.invoice_amount" label="Invoice Amount" />
            <flux:input wire:model="form.purchasing_commission_member_name" label="Purchasing Commission Member's Name" />
            <flux:input wire:model="form.commission_member_title" label="Commission Memeber's Title" />
            <flux:input wire:model="form.department_head" label="Department Head" />
            <flux:input wire:model="form.department" label="Department" />
            <flux:input wire:model="form.inspection_member_name" label="Inspection Member's Name" />
            <flux:input wire:model="form.inspection_member_title" label="Inspection Member's Title" />
            <flux:input wire:model="form.warehouse_depot_sequence_number" label="Warehouse-Depot Sequence Number" />
            <flux:input wire:model="form.warehouse_depot_volumn_number" label="Warehouse-Depot Volume Number" />
            <flux:input wire:model="form.school_principal" label="School Prinicipal" />
            <flux:input wire:model="form.vice_principal" label="Vice Prinicipal" />
            <flux:input wire:model="form.nys_budget_amount" label="NYS Available Budget Amount" />
            <flux:input wire:model="form.document_number" label="Document Number" />
            <flux:input wire:model="form.to_office" label="To the Directorate" />
            <flux:input wire:model="form.nys_budget_allocation" label="To the Office" />
            <flux:input wire:model="form.to_directorate" label="NYS Budget Allocation" />
            <flux:input wire:model="form.approval_date" label="Approval Date" type="date" />
            <flux:input wire:model="form.report_issuance_date" label="Need Report Issuance Date" type="date" />
            <flux:input wire:model="form.report_issuance_time" label="Need Report Issuance Time" type="date" />
            <flux:input wire:model="form.invoice_date" label="Invoice Date" type="date" />
            <flux:input wire:model="form.need_notification_date" label="Need Notification Date" type="date" />
        </div>
        <div class="flex items-center gap-4 mt-6">
            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
            </div>

            <x-action-message class="me-3" on="data-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>

