<x-layout>
    <x-slot:title>Login - Protani</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 auth-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="auth-icon mb-3">🌾</div>
                        <h2 class="fw-bold">Masuk ke Protani</h2>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="nama@email.com"
                                   required
                                   autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                   class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                                   placeholder="Masukkan password"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">
                            Masuk
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Belum punya akun?
                                <a href="{{ route('register') }}" class="text-success fw-bold">Daftar sekarang</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .auth-card {
            animation: slideUp 0.5s ease;
            border-radius: 20px;
        }

        .auth-icon {
            font-size: 4rem;
            animation: bounce 2s infinite;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .btn-success {
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 80, 22, 0.3);
        }
    </style>
</x-layout>
