<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class OfferForm extends Form
{
    public $type = '';
    public $custom= '';
    public $written_in_price= '';
    public $sizewater= '';
    public $price= '';
    public $amount= '';

    protected function rules()
    {
        return [
            'type' => 'required|min:1',
            'custom' => 'required|min:1',
            'written_in_price' => 'required|min:1',
            'sizewater' => 'required|min:1',
            'price' => 'required|min:1',
            'amount' => 'required|min:1',
        ];
    }

    public function store()
    {
        $this->validate();

        $user = Auth::user();

        $user->offer()->updateOrCreate(
            ['user_id' => $user->id],
            $this->only([
                'type', 'custom', 'written_in_price', 'sizewater', 'price',
                'amount',
            ])
        );

        $this->reset();
    }

}
