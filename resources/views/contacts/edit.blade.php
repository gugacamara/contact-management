@extends('contacts.layout')
@section('content')

<h3>Edit Contact</h3>
<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $contact->name) }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label>Contact</label>
        <input type="text" name="contact" class="form-control" value="{{ old('contact', $contact->contact) }}">
        @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    <button class="btn btn-primary">Update</button>
</form>
@endsection