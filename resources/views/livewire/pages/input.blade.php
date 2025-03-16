

<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

}; ?>

<section class="w-full">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <flux:input label="Nature of the Work" />
        <flux:input label="Quality of the Work" />
        <flux:input label="Number of Items Purchased" />
        <flux:input label="Approval Date" type="date" />
        <flux:input label="Number of Approvals" />
        <flux:input label="1st Offer" />
        <flux:input label="2nd Offer" />
        <flux:input label="3rd Offer" />
        <flux:input label="4th Offer" />
        <flux:input label="Amount Without VAT" />
        <flux:input label="Need Report Issuance Date" type="date" />
        <flux:input label="Need Report Issuance Time" type="date" />
        <flux:input label="Company Receiving the Offer" />
        <flux:input label="Address" />
        <flux:input label="Tax Number" />
        <flux:input label="Bank Branch Name"  />
        <flux:input label="Bank Branch Code" />
        <flux:input label="Bank Account Number" />
        <flux:input label="Tax Office" />
        <flux:input label="Invoice Amount" />
        <flux:input label="Purchasing Commission Member's Name" />
        <flux:input label="Commission Memeber's Title" />
        <flux:input label="Department Head" />
        <flux:input label="Department" />
        <flux:input label="Invoice Date" type="date" />
        <flux:input label="Inspection Member's Name" />
        <flux:input label="Inspection Member's Title" />
        <flux:input label="Warehouse-Depot Sequence Number" />
        <flux:input label="Warehouse-Depot Volume Number" />
        <flux:input label="Need Notification Date" type="date" />
        <flux:input label="School Prinicipal" />
        <flux:input label="Vice Prinicipal" />
    </div>
</section>

