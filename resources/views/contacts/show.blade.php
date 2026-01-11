@extends('contacts.layout')
@section('content')

<div class="card">
    <div class="card-header">Contact Details #{{ $contact->id }}</div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Contact:</strong> {{ $contact->contact }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
        @auth
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure? Operation cannot be undone.')">Delete</button>
            </form>
        @endauth
    </div>
</div>
@endsection