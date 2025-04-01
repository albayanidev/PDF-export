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

with(fn () => ['offers' => Offer::where('user_id', Auth::id())->paginate(10)]);

state(['work_nature' => fn () => array_filter(Data::pluck('work_nature')->map(fn($item) => trim(strip_tags($item)))->toArray())]);

state(['report_issuance_date' => fn () => array_filter(Data::pluck('report_issuance_date')->map(fn($item) => trim(strip_tags($item)))->toArray())]);

state(['purchasing_commission_member_name' => fn () => array_filter(Data::pluck('purchasing_commission_member_name')->map(fn($item) => trim(strip_tags($item)))->toArray())]);

$download = function(){
    return Excel::download(new SecondPageExport, 'SecondPage.xlsx');
};

?>

<section class="w-full space-y-5">
    <div class="flex justify-between items-center">
        <flux:button variant="filled" class="ml-2" wire:click="download">Download</flux:button>
        <div class="flex flex-col items-center gap-2">
            <h2  class="text-lg text-center">{{ implode(', ', $report_issuance_date) }}</h2>
            <h2  class="text-lg text-center">{{ implode(', ', $purchasing_commission_member_name) }}</h2>
        </div>
    </div>
    <h1 class="text-2xl text-center">{{ implode(', ', $work_nature) }}</h1>
    <h2 class="text-lg text-center">The list of needs for our school's stationery purchase is given below. I kindly request it.</h2>

    <table class="min-w-full divide-y divide-gray-200 mt-10">
        <thead>
            <tr>
                <th>S.NO</th>
                <th wire:click="handleSort('type')">Type</th>
                <th wire:click="handleSort('quantity')">Quantity</th>
                <th wire:click="handleSort('measurement')">Measurement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-center pt-10">
            @foreach ($offers as $offer)
                <tr>
                    <td class="p-4">{{ $loop->iteration }}</td>
                    <td>{{ $offer->type }}</td>
                    <td>{{ $offer->quantity }}</td>
                    <td>{{ $offer->measurement }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $offers->links() }}
    </div>
</section>
