<?php

use App\Models\User;
use App\Models\Offer;
use App\Livewire\Forms\OfferForm;
use App\Exports\OffersExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use function Livewire\Volt\{state, mount, form, computed, with, usesPagination};
use Maatwebsite\Excel\Facades\Excel;

form(OfferForm::class);

usesPagination();

state(['search' => '']);

with(fn () => ['offers' => Offer::paginate(10)]);

$store = function () {
    $this->form->store();

    $this->dispatch('offer-updated');
    $this->modal('edit-offer')->close();
};

$edit = function ($id) {
    $this->form->edit($id);
    $this->modal('edit-offer')->show();
};

$resetForm = function () {
    $this->form->resetForm();
};

$delete = function ($id) {
    Offer::find($id)->delete();
};

$download = function(){
    return Excel::download(new OffersExport, 'offers.xlsx');
};
?>

<section class="w-full">

    <flux:modal name="edit-offer" class="md:w-200">
        <form wire:submit="store" class="space-y-6">
            <div>
                <flux:heading size="lg">Company offer price</flux:heading>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <input type="hidden" wire:model="form.offerId">
                <flux:input wire:model="form.type" label="Type" placeholder="OKUL İLETİŞİM PAKETİ ALIMLARI" />
                <flux:input wire:model="form.custom" label="Custom" placeholder="1" />
                <flux:input wire:model="form.written_in_price" label="Written in price" placeholder="BİR" />
                <flux:input wire:model="form.sizewater" label="Sizewater" placeholder="Adet" />
                <flux:input wire:model="form.price" label="Price" placeholder="8,000.00" />
                <flux:input wire:model="form.amount" label="Amount" placeholder="8,000.00" />
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>

    <div class="flex justify-between items-center">
            <flux:modal.trigger name="edit-offer">
                <flux:button variant="primary" wire:click="resetForm">Create</flux:button>
            </flux:modal.trigger>
            <flux:button variant="filled" class="ml-2" wire:click="download">Download</flux:button>
    </div>
    <table class="min-w-full divide-y divide-gray-200 mt-10">
        <thead>
            <tr>
                <th>S.NO</th>
                <th wire:click="handleSort('type')">Type</th>
                <th wire:click="handleSort('custom')">Custom</th>
                <th wire:click="handleSort('written_in_price')">Written in price</th>
                <th wire:click="handleSort('sizewater')">Sizewater</th>
                <th wire:click="handleSort('price')">Price</th>
                <th wire:click="handleSort('amount')">Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-center pt-10">
            @foreach ($offers as $offer)
                <tr>
                    <td class="p-4">{{ $loop->iteration }}</td>
                    <td>{{ $offer->type }}</td>
                    <td>{{ $offer->custom }}</td>
                    <td>{{ $offer->written_in_price }}</td>
                    <td>{{ $offer->sizewater }}</td>
                    <td>{{ $offer->price }}</td>
                    <td>{{ $offer->amount }}</td>
                    <td class="flex justify-center gap-2">
                        <flux:button size="sm" variant="ghost" wire:click="edit({{ $offer->id }})" class="cursor-pointer">Edit</flux:button>
                        <flux:button size="sm" variant="ghost" wire:confirm="Are you sure you want to delete this offer?" class="curosr-pointer"
                        wire:click="delete({{ $offer->id }})">Delete</flux:button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $offers->links() }}
    </div>
</section>

<script>
    document.addEventListener('livewire:load', function () {
        @this.on('offer-updated', function () {
            Livewire.emit('closeModal', 'edit-offer');
        });
    });
</script>
