@extends('layouts.app')

@section('content')
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

<script>
    $(document).ready(function() {
        // Add Item AJAX
        $('#add-item-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("bazar_list_items.store", $bazarList->id) }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: $('#product_id').val(),
                    quantity: $('#quantity').val()
                },
                success: function(response) {
                    $('#bazar-list-items tbody').append(`
                        <tr id="item-${response.id}">
                            <td>${response.product.name}</td>
                            <td>${response.quantity}</td>
                            <td>
                                <button class="remove-item" data-id="${response.id}" data-list-id="{{ $bazarList->id }}">Remove</button>
                            </td>
                        </tr>
                    `);
                    $('#add-item-form')[0].reset();
                },
                error: function(error) {
                    alert('Error adding item');
                }
            });
        });

        // Remove Item AJAX
        $(document).on('click', '.remove-item', function() {
            var itemId = $(this).data('id');
            var listId = $(this).data('list-id');

            $.ajax({
                url: `/bazar_lists/${listId}/items/${itemId}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $(`#item-${itemId}`).remove();
                },
                error: function(error) {
                    alert('Error removing item');
                }
            });
        });
    });
</script>
@endsection
