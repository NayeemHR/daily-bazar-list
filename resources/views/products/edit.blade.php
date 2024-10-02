<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-form.label>Name</x-form.label>
                            <x-form.input type="text" name="name" id="name" value="{{$product->name}}" />
                        </div>
                        <div>
                            <x-form.label>Category</x-form.label>
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-form.label>Price</x-form.label>
                            <x-form.input type="number" name="price" id="price" value="{{ $product->price }}" />
                        </div>
                        <div>
                            <x-form.label>Description</x-form.label>
                            <x-form.textarea name="description" id="description">{{ $product->description }}</x-form.textarea>
                        </div>
                        <x-form.button>Update</x-form.button>
                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="font-medium">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>