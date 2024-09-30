<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        <div>
                            <x-form.label>Name</x-form.label>
                            <x-form.input type="text" name="name" id="name" value="{{$category->name}}" />
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