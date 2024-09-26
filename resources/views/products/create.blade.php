<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div>
                            <label>Name:</label>
                            <input type="text" name="name" required>
                        </div>
                        <div>
                            <label>Category:</label>
                            <select name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Price:</label>
                            <input type="number" name="price" step="0.01" required>
                        </div>
                        <div>
                            <label>Description:</label>
                            <textarea name="description"></textarea>
                        </div>
                        <button type="submit">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>