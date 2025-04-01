<?php

namespace App\Livewire\Forms;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;
class OfferForm extends Form
{
    public $offerId = null;
    public $type = '';
    public $quantity = '';
    public $quantity_written = '';
    public $measurement = '';
    public $price = '';
    public $amount = '';

    protected function rules()
    {
        return [
            'type' => 'required|min:1',
            'quantity' => 'required|min:1',
            'quantity_written' => 'required|min:1',
            'measurement' => 'required|min:1',
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
                'quantity' => $this->quantity,
                'quantity_written' => $this->quantity_written,
                'measurement' => $this->measurement,
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
        $this->quantity = $offer->quantity;
        $this->quantity_written = $offer->quantity_written;
        $this->measurement = $offer->measurement;
        $this->price = $offer->price;
        $this->amount = $offer->amount;
    }
}
