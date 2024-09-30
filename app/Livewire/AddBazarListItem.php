<?php

namespace App\Livewire;

use Livewire\Component;

class AddBazarListItem extends Component
{
    // public $bazarListId;
    // public $product_id;
    // public $quantity = 1;
    // public $products = [];

    // public function mount($bazarListId)
    // {
    //     $this->bazarListId = $bazarListId;
    //     $this->products = Product::all(); // Load available products
    // }

    // public function addItem()
    // {
    //     $this->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $bazarList = BazarList::findOrFail($this->bazarListId);

    //     // Check if the item already exists
    //     if ($bazarList->items()->where('product_id', $this->product_id)->exists()) {
    //         session()->flash('error', 'Item already exists in the list');
    //         return;
    //     }

    //     BazarListItem::create([
    //         'bazar_list_id' => $this->bazarListId,
    //         'product_id' => $this->product_id,
    //         'quantity' => $this->quantity,
    //     ]);

    //     // Reset the form fields
    //     $this->product_id = null;
    //     $this->quantity = 1;

    //     // Emit an event to notify the parent component or other listeners
    //     $this->emit('itemAdded');

    //     session()->flash('success', 'Item added successfully');
    // }

    public $name = 'Nayeem';
    public function render()
    {
        return view('livewire.add-bazar-list-item');
    }
}
