<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - Studio Musik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
        }
        .login-image {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
        }
        .login-form {
            padding: 3rem;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="login-card">
                    <div class="row g-0">
                        <div class="col-lg-5 login-image">
                            <div class="text-center text-white">
                                <i class="bi bi-music-note-beamed" style="font-size: 100px;"></i>
                                <h2 class="mt-4 fw-bold">Studio Musik</h2>
                                <p class="mt-3">Sistem Booking Studio Musik Profesional</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="login-form">
                                <h3 class="fw-bold mb-2">Selamat Datang!</h3>
                                <p class="text-muted mb-4">Silakan login untuk melanjutkan</p>
                                
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill"></i> {{ $errors->first() }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-bold"><i class="bi bi-envelope"></i> Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg" 
                                               placeholder="email@example.com" value="{{ old('email') }}" required autofocus>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-bold"><i class="bi bi-lock"></i> Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg" 
                                               placeholder="••••••••" required>
                                    </div>
                                    
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Ingat saya</label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">
                                        <i class="bi bi-box-arrow-in-right"></i> Login
                                    </button>
                                    
                                    <div class="text-center">
                                        <span class="text-muted">Belum punya akun?</span>
                                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar Sekarang</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
