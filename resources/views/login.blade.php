@extends('contacts.layout')
@section('content')

<div class="card p-4 mx-auto" style="max-width: 400px;">
    <h4>Login</h4>
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="mb-3">
            <label>User</label>
            <input type="text" name="name" class="form-control" placeholder="Username" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        @if ($errors->any())
            <div class="text-danger mb-3">{{ $errors->first() }}</div>
        @endif
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
