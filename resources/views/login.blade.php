<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Studio Musik</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            width: 100%;
            max-width: 380px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #444;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 5px;
        }

        .btn-login:hover {
            background: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert-error {
            background: #ffe5e5;
            color: #cc0000;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>

</head>
<body>

    <div class="login-box">

        <h2>Login</h2>

        {{-- Alert Error --}}
        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="" method="POST">
            @csrf

            {{-- EMAIL --}}
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="you@example.com" required>
            </div>

            {{-- PASSWORD --}}
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="******" required>
            </div>

            <button type="submit" class="btn-login">Login</button>

        </form>

        <p class="register-link">
            Belum punya akun?
            <a href="">Daftar</a>
        </p>

    </div>

</body>
</html>