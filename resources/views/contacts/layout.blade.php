<!DOCTYPE html>
<html>
<head>
    <title>Contact management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
        <nav class="mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('contacts.index') }}" class="btn btn-link btn-lg">Contacts</a>
                <div>
                    @guest
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                    @endguest        
                    @auth
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Logout</button>
                            </form>
                    @endauth
                </div>
            </div>
        </nav>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</body>
</html>