<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Toko Kelontong</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2A9D8F;
            --primary-dark: #21867A;
            --secondary: #E9C46A;
            --accent: #E76F51;
            --light: #F8F9FA;
            --dark: #264653;
            --gray: #6C757D;
            --success: #2A9D8F;
            --warning: #E9C46A;
            --danger: #E76F51;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.12);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.15);
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .register-container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            min-height: 650px;
        }

        .register-left {
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: white;
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,59.4,779.4,97.9,500,97z" fill="%23ffffff" opacity="0.1"/></svg>');
            background-size: 100% 100px;
            background-repeat: no-repeat;
            background-position: bottom;
        }

        .register-left h2 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
            line-height: 1.3;
        }

        .register-left p {
            opacity: 0.9;
            margin-bottom: 2.5rem;
            position: relative;
            z-index: 1;
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin-top: 2.5rem;
            position: relative;
            z-index: 1;
        }

        .features-list li {
            margin-bottom: 1.8rem;
            display: flex;
            align-items: flex-start;
        }

        .features-list i {
            background: rgba(255, 255, 255, 0.15);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
            color: var(--secondary);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .feature-content {
            flex: 1;
        }

        .feature-content strong {
            display: block;
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .feature-content p {
            margin: 0;
            font-size: 0.95rem;
            opacity: 0.85;
            line-height: 1.5;
        }

        .register-right {
            padding: 3rem 2.5rem;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 2.5rem;
            color: var(--primary);
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .logo i {
            margin-right: 12px;
            font-size: 2.2rem;
            color: var(--accent);
        }

        .form-header {
            margin-bottom: 2.5rem;
        }

        .form-header h2 {
            color: var(--dark);
            font-size: 2rem;
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .form-header p {
            color: var(--gray);
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.8rem;
            color: var(--dark);
            display: block;
            font-size: 1rem;
        }

        .form-label i {
            margin-right: 10px;
            color: var(--primary);
        }

        .form-control {
            padding: 0.85rem 1.2rem;
            border: 2px solid #e0e0e0;
            border-radius: var(--radius);
            font-size: 1rem;
            transition: var(--transition);
            background-color: white;
            width: 100%;
            height: 50px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(42, 157, 143, 0.2);
            outline: none;
        }

        .password-toggle {
            position: absolute;
            right: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
            transition: var(--transition);
            background: none;
            border: none;
            font-size: 1.1rem;
            padding: 5px;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .role-badge {
            background: linear-gradient(135deg, var(--secondary), #FFB347);
            color: var(--dark);
            padding: 0.7rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            margin-top: 0.5rem;
            font-size: 0.95rem;
        }

        .role-badge i {
            margin-right: 8px;
            font-size: 1.1rem;
        }

        .role-description {
            display: block;
            color: var(--gray);
            margin-top: 0.8rem;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .alert {
            border-radius: var(--radius);
            padding: 1.2rem 1.5rem;
            border: none;
            margin-bottom: 1.8rem;
            display: flex;
            align-items: flex-start;
        }

        .alert-success {
            background: rgba(42, 157, 143, 0.1);
            color: var(--success);
            border-left: 4px solid var(--success);
        }

        .alert-danger {
            background: rgba(231, 111, 81, 0.1);
            color: var(--danger);
            border-left: 4px solid var(--danger);
        }

        .alert i {
            margin-right: 12px;
            font-size: 1.3rem;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .form-check {
            margin: 2rem 0;
        }

        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0.2em;
            margin-right: 0.8em;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            color: var(--gray);
            font-size: 0.95rem;
            line-height: 1.5;
            cursor: pointer;
        }

        .form-check-label a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
        }

        .form-check-label a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .btn-register {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 1rem;
            height: 55px;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            color: white;
        }

        .login-link {
            text-align: center;
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 1px solid #eee;
            color: var(--gray);
            font-size: 1rem;
        }

        .login-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            margin-left: 5px;
        }

        .login-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .error-message {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .error-message i {
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .register-container {
                max-width: 800px;
            }
            
            .register-left, .register-right {
                padding: 2.5rem 2rem;
            }
            
            .register-left h2 {
                font-size: 2rem;
            }
            
            .form-header h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                max-width: 600px;
                min-height: auto;
            }
            
            .register-left {
                padding: 2.5rem 2rem;
                border-radius: var(--radius) var(--radius) 0 0;
            }
            
            .register-right {
                padding: 2.5rem 2rem;
                border-radius: 0 0 var(--radius) var(--radius);
            }
            
            .register-left h2 {
                font-size: 1.8rem;
            }
            
            .features-list {
                margin-top: 2rem;
            }
            
            .features-list li {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 15px;
            }
            
            .register-left, .register-right {
                padding: 2rem 1.5rem;
            }
            
            .register-left h2 {
                font-size: 1.6rem;
            }
            
            .form-header h2 {
                font-size: 1.6rem;
            }
            
            .logo {
                font-size: 1.6rem;
                margin-bottom: 2rem;
            }
            
            .logo i {
                font-size: 1.8rem;
            }
            
            .form-control {
                padding: 0.8rem 1rem;
                height: 48px;
            }
            
            .btn-register {
                padding: 0.9rem 1.5rem;
                font-size: 1rem;
                height: 52px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, var(--primary), var(--primary-dark));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, var(--primary-dark), var(--dark));
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-right {
            animation: fadeIn 0.6s ease-out;
        }

        .register-left {
            animation: fadeIn 0.6s ease-out 0.1s both;
        }
    </style>
</head>

<body>
    <div class="register-container d-flex">
        <!-- Left Panel -->
        <div class="register-left col-lg-6">
            <div>
                <h2>Bergabung dengan Toko Kelontong</h2>
                <p>Daftar sekarang dan nikmati berbagai kemudahan berbelanja kebutuhan harian dengan harga terjangkau dan kualitas terbaik.</p>
                
                <ul class="features-list">
                    <li>
                        <i class="fas fa-shopping-cart"></i>
                        <div class="feature-content">
                            <strong>Belanja Mudah & Cepat</strong>
                            <p>Akses ribuan produk kebutuhan harian dengan sistem pencarian yang canggih</p>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-truck"></i>
                        <div class="feature-content">
                            <strong>Gratis Ongkos Kirim</strong>
                            <p>Dapatkan gratis ongkir untuk pembelian minimal Rp 50.000 di area tertentu</p>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-shield-alt"></i>
                        <div class="feature-content">
                            <strong>Keamanan Transaksi</strong>
                            <p>Transaksi aman dan terpercaya dengan sistem pembayaran yang terlindungi</p>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-percentage"></i>
                        <div class="feature-content">
                            <strong>Promo & Diskon Menarik</strong>
                            <p>Nikmati diskon dan penawaran spesial setiap hari untuk member setia</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Panel (Form) -->
        <div class="register-right col-lg-6">
            <div class="logo">
                <i class="bi bi-shop-window"></i>
                <span>Toko Kelontong</span>
            </div>

            <div class="form-header">
                <h2>Buat Akun Baru</h2>
                <p>Isi form berikut untuk mendaftar sebagai member Toko Kelontong</p>
            </div>

            @if (session('message'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div>{{ session('message') }}</div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <strong>Mohon periksa kembali:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('actionregister') }}" method="post" id="registerForm">
                @csrf

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Alamat Email
                    </label>
                    <input type="email" name="email" class="form-control" 
                           placeholder="contoh@email.com" required
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user"></i> Username
                    </label>
                    <input type="text" name="username" class="form-control" 
                           placeholder="pilih username unik" required
                           value="{{ old('username') }}">
                    @error('username')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-key"></i> Kata Sandi
                    </label>
                    <div class="position-relative">
                        <input type="password" name="password" id="password" 
                               class="form-control" placeholder="buat kata sandi yang kuat" required>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="password-strength mt-2">
                        <small class="text-muted">Kata sandi minimal 8 karakter</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-key"></i> Konfirmasi Kata Sandi
                    </label>
                    <div class="position-relative">
                        <input type="password" name="password_confirmation" id="confirmPassword" 
                               class="form-control" placeholder="ulangi kata sandi" required>
                        <button type="button" class="password-toggle" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user-tag"></i> Tipe Akun
                    </label>
                    <div class="role-badge">
                        <i class="fas fa-user-check"></i>
                        Guest Member
                    </div>
                    <span class="role-description">
                        Sebagai Guest Member, Anda dapat melakukan pembelian produk, melihat riwayat transaksi, dan mendapatkan promo khusus member.
                    </span>
                    <input type="hidden" name="role" value="Guest">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                    <label class="form-check-label" for="termsCheck">
                        Saya menyetujui <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Syarat & Ketentuan</a> 
                        dan <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Kebijakan Privasi</a> Toko Kelontong
                    </label>
                </div>

                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="/admin">Login disini</a>
            </div>
        </div>
    </div>

    <!-- Terms & Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Syarat & Ketentuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h6>1. Pendaftaran Akun</h6>
                    <p>Dengan mendaftar, Anda menyetujui untuk memberikan informasi yang akurat dan valid.</p>
                    
                    <h6>2. Penggunaan Akun</h6>
                    <p>Anda bertanggung jawab penuh atas kerahasiaan password dan semua aktivitas yang terjadi di akun Anda.</p>
                    
                    <h6>3. Pembelian Produk</h6>
                    <p>Semua pembelian yang dilakukan melalui akun Anda adalah tanggung jawab Anda.</p>
                    
                    <h6>4. Perubahan Ketentuan</h6>
                    <p>Toko Kelontong berhak mengubah syarat dan ketentuan ini kapan saja tanpa pemberitahuan sebelumnya.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kebijakan Privasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h6>1. Pengumpulan Data</h6>
                    <p>Kami mengumpulkan informasi pribadi yang Anda berikan saat mendaftar dan menggunakan layanan kami.</p>
                    
                    <h6>2. Penggunaan Data</h6>
                    <p>Data digunakan untuk memproses pesanan, meningkatkan layanan, dan mengirim informasi promosi.</p>
                    
                    <h6>3. Perlindungan Data</h6>
                    <p>Kami melindungi data pribadi Anda dengan sistem keamanan yang terenkripsi.</p>
                    
                    <h6>4. Berbagi Data</h6>
                    <p>Kami tidak menjual atau membagikan data pribadi Anda kepada pihak ketiga tanpa izin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle Password Visibility
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });

            // Toggle Confirm Password Visibility
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPassword = document.getElementById('confirmPassword');
            
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });

            // Form Validation
            const form = document.getElementById('registerForm');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const termsCheck = document.getElementById('termsCheck');

            // Real-time password match indicator
            confirmPasswordInput.addEventListener('input', function() {
                if (passwordInput.value !== this.value && this.value.length > 0) {
                    this.style.borderColor = 'var(--danger)';
                    this.style.boxShadow = '0 0 0 3px rgba(231, 111, 81, 0.2)';
                } else {
                    if (passwordInput.value.length >= 8) {
                        this.style.borderColor = 'var(--success)';
                        this.style.boxShadow = '0 0 0 3px rgba(42, 157, 143, 0.2)';
                    } else {
                        this.style.borderColor = '#e0e0e0';
                        this.style.boxShadow = 'none';
                    }
                }
            });

            // Password strength indicator
            passwordInput.addEventListener('input', function() {
                const strengthIndicator = document.querySelector('.password-strength small');
                const password = this.value;
                
                // Reset border color
                this.style.borderColor = '#e0e0e0';
                this.style.boxShadow = 'none';
                
                if (password.length === 0) {
                    strengthIndicator.textContent = 'Kata sandi minimal 8 karakter';
                    strengthIndicator.className = 'text-muted';
                } else if (password.length < 8) {
                    strengthIndicator.textContent = 'Kata sandi terlalu pendek';
                    strengthIndicator.className = 'text-danger';
                    this.style.borderColor = 'var(--danger)';
                    this.style.boxShadow = '0 0 0 3px rgba(231, 111, 81, 0.2)';
                } else if (password.length < 12) {
                    strengthIndicator.textContent = 'Kata sandi cukup kuat';
                    strengthIndicator.className = 'text-warning';
                    this.style.borderColor = 'var(--warning)';
                    this.style.boxShadow = '0 0 0 3px rgba(233, 196, 106, 0.2)';
                } else {
                    strengthIndicator.textContent = 'Kata sandi sangat kuat';
                    strengthIndicator.className = 'text-success';
                    this.style.borderColor = 'var(--success)';
                    this.style.boxShadow = '0 0 0 3px rgba(42, 157, 143, 0.2)';
                }
                
                // Update confirm password border if needed
                if (confirmPasswordInput.value.length > 0) {
                    confirmPasswordInput.dispatchEvent(new Event('input'));
                }
            });

            form.addEventListener('submit', function(e) {
                let isValid = true;
                let errorMessage = '';

                // Check if passwords match
                if (passwordInput.value !== confirmPasswordInput.value) {
                    isValid = false;
                    errorMessage = 'Kata sandi dan konfirmasi kata sandi tidak sama!';
                }
                // Check password length
                else if (passwordInput.value.length < 8) {
                    isValid = false;
                    errorMessage = 'Kata sandi minimal 8 karakter!';
                }
                // Check terms and conditions
                else if (!termsCheck.checked) {
                    isValid = false;
                    errorMessage = 'Anda harus menyetujui Syarat & Ketentuan!';
                }

                if (!isValid) {
                    e.preventDefault();
                    alert(errorMessage);
                    
                    // Focus on problematic field
                    if (!termsCheck.checked) {
                        termsCheck.focus();
                    } else if (passwordInput.value.length < 8) {
                        passwordInput.focus();
                    } else {
                        confirmPasswordInput.focus();
                    }
                    
                    return false;
                }

                // Add loading state to button
                const submitBtn = form.querySelector('.btn-register');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                submitBtn.disabled = true;

                return true;
            });

            // Auto focus on first field
            const emailField = document.querySelector('input[name="email"]');
            if (emailField && !emailField.value) {
                emailField.focus();
            }
        });
    </script>
</body>

</html>