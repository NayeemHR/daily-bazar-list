<div>

    <input type="text" wire:model.live="name" type="text">
                    {{$name}}
    {{-- @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="addItem">
        <div>
            <label for="product_id">Product:</label>
            <select wire:model="product_id" id="product_id" required>
                <option value="">Select a product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" wire:model="quantity" id="quantity" min="1" required>
        </div>
        
        <button type="submit">Add Item</button>
    </form> --}}
</div>
