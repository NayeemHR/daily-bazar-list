<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a New Bazar List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('bazar_lists.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-form.label>Name</x-form.label>
                            <x-form.input type="text" name="name" id="name" required />
                        </div>

                        <x-form.button>Create</x-form.button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>