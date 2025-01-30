<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biokustik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            margin: 0;
        }
        .purple-bg {
            background-color: #6b46c1;
            flex: 2;
        }
        .form-container {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-control {
            background-color: #f9f9f9;
            border: none;
        }
        .form-control:focus {
            outline: none;
            box-shadow: none;
            border-color: #6b46c1;
        }
        .btn-purple {
            background-color: #6b46c1;
            color: #fff;
        }
        .btn-purple:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="purple-bg"></div>
    <div class="form-container">
        <div class="mb-4">
            <h2>Selamat Datang di Biokustik!</h2>
            <p class="text-muted">by PT Covwatch Karya Nusantara</p>
            <p>Silakan masukkan username dan password untuk masuk</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-control form-control-lg"
                    placeholder="Masukkan username"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control form-control-lg"
                    placeholder="Masukkan password"
                    required
                />
            </div>
            <button
                type="submit"
                class="mt-3 btn btn-purple btn-lg w-100"
            >
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
