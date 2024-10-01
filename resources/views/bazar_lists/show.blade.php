
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
<table id='bazar-list-items' class="table-auto w-full text-left ">
    <thead class="uppercase bg-[#7aa12a] text-[#ffffff]" style="background-color: #7aa12a; color: #ffffff;">
        <tr>
            <td class="py-3 border text-center font-bold p-4" >Product</td>
            <td class="py-3 border text-center font-bold p-4" >Quantity</td>
            <td class="py-3 border text-center font-bold p-4" >Actions</td>
        </tr>
    </thead>
    <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#6b7280]" style="background-color: #FFFFFF; color: #6b7280;">
        
        @foreach($bazarList->items as $item)
        <tr class="py-2 " id="item-{{ $item->id }}">
            <td class="py-2 border text-center  p-4" >{{ $item->product->name }}</td>
            <td class="py-2 border text-center  p-4" >{{ $item->quantity }}</td>
            <td class="py-2 border text-center  p-4 text-[#7aa12a]" >
                <button type="button" wire:click="removeItem({{ $item->id }})" wire:confirm="Are you sure you want to delete this post?"  >Remove</button>
                <button >Click</button>
            </td>
        </tr>
    @endforeach
        
    </tbody>
</table>

<h3>Add Item</h3>
    <livewire:add-bazar-list-item :bazarListId="$bazarList->id" />
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('itemAdded', () => {
                    location.reload(); // Reload the page to update the list, or you can add more dynamic updates
                });
            
                Livewire.on('itemRemoved', () => {
                    location.reload(); // You can use this to refresh the page or update the list dynamically without refreshing
                });
            });
        </script>
        
        
</div>
                   
</div>
</div>
</div>
</div>



</x-app-layout>

