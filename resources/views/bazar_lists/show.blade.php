
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bazar Lists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-hidden shadow-md rounded-lg mt-6">
                        <h1>Bazar List #{{ $bazarList->id }}</h1>

<h2>Items</h2>
<table id="bazar-list-items">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bazarList->items as $item)
            <tr id="item-{{ $item->id }}">
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <button class="remove-item" data-id="{{ $item->id }}" data-list-id="{{ $bazarList->id }}">Remove</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3>Add Item</h3>
<form id="add-item-form">
    @csrf
    <div>
        <label>Product:</label>
        <select name="product_id" id="product_id" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" required>
    </div>
    <button type="submit">Add Item</button>
</form>
<h3>Add Item</h3>
    <livewire:add-bazar-list-item :bazarListId="$bazarList->id" />
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('itemAdded', () => {
                    location.reload(); // Reload the page to update the list, or you can add more dynamic updates
                });
            });
        </script>
        
</div>
                   
</div>
</div>
</div>
</div>



</x-app-layout>

