<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .login-box {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        .login-box h2 {
            margin-bottom: 25px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box">
        <h2 class="text-center">Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Please fix the following:
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{route('register.form')}}" class="btn btn-success  m-1">Register</a>

            </div>

        </form>
    </div>
</div>

</body>
</html>
