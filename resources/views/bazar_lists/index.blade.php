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
                    <x-form.a href="{{ route('bazar_lists.create') }}" class="btn btn-primary">Create New Bazar List</x-form.a>

                    <div class="relative overflow-hidden shadow-md rounded-lg mt-6">
                        <table class="table-auto w-full text-left">
                            <thead class="uppercase bg-[#7aa12a] text-[#ffffff]" style="background-color: #7aa12a; color: #ffffff;">
                                <tr>
                                    <td class="py-3 border text-center font-bold p-4" >ID</td>
                                    <td class="py-3 border text-center font-bold p-4" >Name</td>
                                    <td class="py-3 border text-center font-bold p-4" >Status</td>
                                    <td class="py-3 border text-center font-bold p-4" >Actions</td>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#6b7280]" style="background-color: #FFFFFF; color: #6b7280;">
                                
                                @foreach($bazarLists as $list)
                                <tr class="py-2">
                                    <td class="py-2 border text-center  p-4" >{{ $list->id }}</td>
                                    <td class="py-2 border text-center  p-4" >{{ $list->name }}</td>
                                    <td class="py-2 border text-center  p-4" >{{ $list->status }}</td>
                                    <td class="py-2 border text-center  p-4 text-[#7aa12a]" >
                                        <a href="{{ route('bazar_lists.show', $list->id) }}">View</a>
                                        <form action="{{ route('bazar_lists.destroy', $list->id) }}" method="POST" style="display:inline;">
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

