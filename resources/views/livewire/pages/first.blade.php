<?php

use App\Models\User;
use App\Models\Offer;
use App\Livewire\Forms\OfferForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use function Livewire\Volt\{state, mount,form, computed, with, usesPagination};

form(OfferForm::class);

usesPagination();

with(fn () => ['offers' => Offer::paginate(10)]);

$store = function () {
    $this->form->store();

    $this->dispatch('offer-updated');
};

?>

<section class="w-full">

    <flux:modal name="edit-offer" class="md:w-200">
        <form wire:submit="store" class=" space-y-6">
            <div>
                <flux:heading size="lg">Company offer price</flux:heading>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 ">
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
        <input type="text" wire:model="search" placeholder="Search...">
        <flux:modal.trigger name="edit-offer">
            <flux:button variant="primary">Create</flux:button>
        </flux:modal.trigger>
    </div>
    <table class="min-w-full divide-y divide-gray-200 mt-10">
        <thead>
            <tr>
                <th>S.NO</th>
                <th wire:click="handleSort('type')" class="cursor-pointer">Type</th>
                <th wire:click="handleSort('custom')" class="cursor-pointer">Custom</th>
                <th wire:click="handleSort('written_in_price')" class="cursor-pointer">Written in price</th>
                <th wire:click="handleSort('sizewater')" class="cursor-pointer">Sizewater</th>
                <th wire:click="handleSort('price')" class="cursor-pointer">Price</th>
                <th wire:click="handleSort('amount')" class="cursor-pointer">Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $offer->type }}</td>
                    <td>{{ $offer->custom }}</td>
                    <td>{{ $offer->written_in_price }}</td>
                    <td>{{ $offer->sizewater }}</td>
                    <td>{{ $offer->price }}</td>
                    <td>{{ $offer->amount }}</td>
                    <td>
                        <button wire:click="edit({{ $offer->id }})">Edit</button>
                        <button wire:click="delete({{ $offer->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $offers->links() }}
    </div>
</section>
