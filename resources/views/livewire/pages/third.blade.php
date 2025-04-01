<?php

use App\Models\Data;
use App\Models\User;
use App\Models\Offer;
use App\Exports\SecondPageExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use function Livewire\Volt\{state, mount, computed, with, usesPagination};
use Maatwebsite\Excel\Facades\Excel;

state(['work_nature' => fn () => array_filter(Data::pluck('work_nature')->map(fn($item) => trim(strip_tags($item)))->toArray())]);
state(['approval_date' => fn () => array_filter(Data::pluck('approval_date')->map(fn($item) => trim(strip_tags($item)))->toArray())]);


$download = function(){
    return Excel::download(new ThirdPageExport, 'ThirdPage.xlsx');
};

?>

<section class="w-full space-y-5">
    <flux:button variant="filled" class="ml-2" wire:click="download">Download</flux:button>

    <h1 class="text-2xl text-center">CERTIFICATE OF APPROVAL</h1>
    <div class="grid grid-cols-3 gap-4 text-center">
        <div class="">Name of the administration making the tender</div>
        <div class="col-span-2 ">{{ implode(', ', $work_nature) }}</div>
        <div class="">Document date number</div>
        <div class="">{{ implode(', ', $approval_date) }}</div>
        <div class="">{{ implode(', ', $approval_date) }}</div>
      </div>
</section>
