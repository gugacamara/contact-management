@extends('contacts.layout')
@section('content')

<h3>New Contact</h3>
<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label>Contact</label>
        <input type="number" name="contact" class="form-control" value="{{ old('contact') }}">
        @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    <button class="btn btn-primary">Save</button>
</form>
@endsection