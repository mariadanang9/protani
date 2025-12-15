<x-layout>
    <x-slot:title>Daftar - Protani</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 auth-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="auth-icon mb-3">🌾</div>
                        <h2 class="fw-bold">Daftar Akun Baru</h2>
                        <p class="text-muted">Bergabunglah dengan Protani sekarang!</p>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text"
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="John Doe"
                                   required
                                   autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="nama@email.com"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon (Opsional)</label>
                            <input type="text"
                                   class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="08123456789">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                   class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                                   placeholder="Minimal 8 karakter"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Minimal 8 karakter</div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                   class="form-control form-control-lg"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Ketik ulang password"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">
                            ✨ Daftar Sekarang
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-success fw-bold">Masuk di sini</a>
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

    <script>
        // Real-time validation feedback
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password_confirmation');
            const email = document.getElementById('email');

            // Password strength indicator
            password.addEventListener('input', function() {
                const strength = checkPasswordStrength(this.value);
                const feedback = document.getElementById('password-strength');

                if (!feedback) {
                    const div = document.createElement('div');
                    div.id = 'password-strength';
                    div.className = 'form-text';
                    this.parentElement.appendChild(div);
                }

                document.getElementById('password-strength').innerHTML = strength.html;
            });

            // Password match indicator
            passwordConfirm.addEventListener('input', function() {
                if (this.value && password.value) {
                    if (this.value === password.value) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                }
            });

            // Email format check
            email.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value && !emailRegex.test(this.value)) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        });

        function checkPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]+/)) strength++;
            if (password.match(/[A-Z]+/)) strength++;
            if (password.match(/[0-9]+/)) strength++;
            if (password.match(/[$@#&!]+/)) strength++;

            const colors = ['danger', 'danger', 'warning', 'info', 'success'];
            const texts = ['Sangat Lemah', 'Lemah', 'Cukup', 'Kuat', 'Sangat Kuat'];

            return {
                html: `<span class="text-${colors[strength - 1] || 'muted'}">
                    Kekuatan Password: ${texts[strength - 1] || 'Terlalu Pendek'}
                </span>`
            };
        }
    </script>
</x-layout>
