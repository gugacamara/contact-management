@extends('contacts.layout')
@section('content')

    @auth
        <a href="{{ route('contacts.create') }}" class="btn btn-success mb-3">New Contact</a>
    @endauth
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Details</a>
                        @auth
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? Operation cannot be undone.')">Delete</button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection