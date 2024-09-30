<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-form.label>Name</x-form.label>
                            <x-form.input type="text" name="name" id="name" />
                            {{-- <div class="mt-2.5">
                              <input type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                            </div> --}}
                          </div>
                        <x-form.button>Save</x-form.button>
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