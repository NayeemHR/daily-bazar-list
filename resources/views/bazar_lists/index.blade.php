@extends('layouts.app')

@section('content')
<h1>My Bazar Lists</h1>
<a href="{{ route('bazar_lists.create') }}" class="btn btn-primary">Create New Bazar List</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bazarLists as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->status }}</td>
                <td>
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
@endsection
