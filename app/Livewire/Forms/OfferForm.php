<?php

namespace App\Livewire\Forms;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;
class OfferForm extends Form
{
    public $offerId = null;
    public $type = '';
    public $custom = '';
    public $written_in_price = '';
    public $sizewater = '';
    public $price = '';
    public $amount = '';

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

        if (!$user) {
            // Handle the case where the user is not authenticated
            // You can throw an exception or return an error response
            throw new \Exception('User not authenticated');
        }


        Offer::updateOrCreate(
            ['id' => $this->offerId],
            [
                'user_id' => $user->id,
                'type' => $this->type,
                'custom' => $this->custom,
                'written_in_price' => $this->written_in_price,
                'sizewater' => $this->sizewater,
                'price' => $this->price,
                'amount' => $this->amount,
            ]
        );

        $this->reset();
    }

    public function resetForm()
    {
        $this->reset();
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);

        $this->offerId = $offer->id;
        $this->type = $offer->type;
        $this->custom = $offer->custom;
        $this->written_in_price = $offer->written_in_price;
        $this->sizewater = $offer->sizewater;
        $this->price = $offer->price;
        $this->amount = $offer->amount;
    }
}
