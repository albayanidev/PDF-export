<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use function Livewire\Volt\{state, mount, computed, with};



?>

<section class="w-full">
    <div class="flex justify-between items-center">
        <flux:modal.trigger name="edit-offer">
            <flux:button variant="primary" wire:click="resetForm">Create</flux:button>
        </flux:modal.trigger>
        <flux:button variant="filled" class="ml-2" wire:click="download">Download</flux:button>
    </div>
</section>
