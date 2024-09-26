<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categories.create') }}" class="rounded-md bg-[#7aa12a] px-3.5 py-2.5  text-sm font-semibold text-white shadow-sm hover:bg-[#88b42f] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-[#7aa12a]">Add New Category</a>
                    <div class="relative overflow-hidden shadow-md rounded-lg mt-6">
                        <table class="table-auto w-full text-left">
                            <thead class="uppercase bg-[#7aa12a] text-[#ffffff]" style="background-color: #7aa12a; color: #ffffff;">
                                <tr>
                                    <td class="py-3 border text-center font-bold p-4" >ID</td>
                                    <td class="py-3 border text-center font-bold p-4" >Name</td>
                                    <td class="py-3 border text-center font-bold p-4" >Action</td>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#6b7280]" style="background-color: #FFFFFF; color: #6b7280;">
                                
                                @foreach($categories as $category)
                                <tr class="py-2">
                                    <td class="py-2 border text-center  p-4" >{{ $category->id }}</td>
                                    <td class="py-2 border text-center  p-4" >{{ $category->name }}</td>
                                    <td class="py-2 border text-center  p-4 text-[#7aa12a]" >
                                        <a class="" href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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