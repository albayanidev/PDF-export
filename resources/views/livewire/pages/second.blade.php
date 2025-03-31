<?php

use App\Models\Data;
use function Livewire\Volt\state;

state(['work_nature' => fn () => array_filter(Data::pluck('work_nature')->map(fn($item) => trim(strip_tags($item)))->toArray())]);

?>

<section class="w-full space-y-5">
    <div class="flex justify-between items-center">
        <flux:modal.trigger name="edit-offer">
            <flux:button variant="primary" wire:click="resetForm">Create</flux:button>
        </flux:modal.trigger>
        <flux:button variant="filled" class="ml-2" wire:click="download">Download</flux:button>
    </div>
    <h1 class="text-2xl text-center">{{ implode(', ', $work_nature) }}</h1>

</section>
