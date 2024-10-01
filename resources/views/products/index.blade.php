<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-form.a href="{{ route('products.create') }}" > Add New Product </x-a>
                    <div class="relative overflow-hidden shadow-md rounded-lg mt-6">
                        <table class="table-auto w-full text-left">
                            <thead class="uppercase bg-[#7aa12a] text-[#ffffff]" style="background-color: #7aa12a; color: #ffffff;">
                                <tr>
                                    <th class="py-3 border text-center font-bold p-4">Name</th>
                                    <th class="py-3 border text-center font-bold p-4">Category</th>
                                    <th class="py-3 border text-center font-bold p-4">Price</th>
                                    <th class="py-3 border text-center font-bold p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#6b7280]" style="background-color: #FFFFFF; color: #6b7280;">
                                @foreach($products as $product)
                                    <tr class="py-2">
                                        <td class="py-2 border text-center  p-4" >{{ $product->name }}</td>
                                        <td class="py-2 border text-center  p-4" >{{ $product->category->name }}</td>
                                        <td class="py-2 border text-center  p-4" >{{ $product->price }}</td>
                                        <td class="py-2 border text-center  p-4" >
                                            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>



</x-app-layout>

