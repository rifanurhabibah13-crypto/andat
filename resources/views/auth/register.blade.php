<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register - Studio Musik</title>
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
            padding: 2rem 0;
        }
        .register-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
        }
        .register-image {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
        }
        .register-form {
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
                <div class="register-card">
                    <div class="row g-0">
                        <div class="col-lg-5 register-image">
                            <div class="text-center text-white">
                                <i class="bi bi-music-note-beamed" style="font-size: 100px;"></i>
                                <h2 class="mt-4 fw-bold">Bergabunglah!</h2>
                                <p class="mt-3">Daftar sekarang dan mulai booking studio musik favoritmu</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="register-form">
                                <h3 class="fw-bold mb-2">Buat Akun Baru</h3>
                                <p class="text-muted mb-4">Isi form di bawah untuk mendaftar</p>
                                
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill"></i> 
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-bold"><i class="bi bi-person"></i> Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" 
                                               placeholder="John Doe" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-bold"><i class="bi bi-envelope"></i> Email</label>
                                        <input type="email" name="email" class="form-control" 
                                               placeholder="email@example.com" value="{{ old('email') }}" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-bold"><i class="bi bi-lock"></i> Password</label>
                                        <input type="password" name="password" class="form-control" 
                                               placeholder="Minimal 8 karakter" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-bold"><i class="bi bi-lock-fill"></i> Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" 
                                               placeholder="Ulangi password" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">
                                        <i class="bi bi-person-plus"></i> Daftar Sekarang
                                    </button>
                                    
                                    <div class="text-center">
                                        <span class="text-muted">Sudah punya akun?</span>
                                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Login</a>
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
