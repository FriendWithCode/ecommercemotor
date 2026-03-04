<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MustPart - Sparepart Motor Listrik Terlengkap</title>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary:#FF6B00;--primary-dark:#E05A00;--accent:#00D4FF;
            --dark:#0A0E1A;--dark2:#111827;--card-bg:#161D2E;
            --border:#1E2A3A;--text:#E2E8F0;--muted:#94A3B8;
            --success:#10B981;--danger:#EF4444;--warning:#F59E0B;
            --shadow:0 4px 24px rgba(0,0,0,.4);
            --radius:14px;--transition:all .3s ease;
        }
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Inter',sans-serif;background:var(--dark);color:var(--text);padding-top:76px;}
        h1,h2,h3,h4,h5,h6{font-family:'Rajdhani',sans-serif;}
        a{text-decoration:none;color:inherit;transition:var(--transition);}

        /* NAVBAR */
        .navbar-main{background:rgba(10,14,26,.95);backdrop-filter:blur(12px);border-bottom:2px solid var(--primary);padding:.8rem 0;position:fixed;top:0;left:0;width:100%;z-index:1050;}
        .brand-logo{font-family:'Rajdhani',sans-serif;font-size:1.9rem;font-weight:700;letter-spacing:1px;}
        .brand-logo .must{color:white;}.brand-logo .part{color:var(--primary);}
        .brand-logo i{color:var(--accent);margin-right:6px;}
        .nav-link-custom{color:var(--muted)!important;font-weight:500;padding:.5rem 1rem!important;border-radius:8px;transition:var(--transition);}
        .nav-link-custom:hover,.nav-link-custom.active{color:var(--primary)!important;background:rgba(255,107,0,.1);}
        .btn-login{background:transparent;border:1.5px solid var(--primary);color:var(--primary)!important;padding:.45rem 1.2rem;border-radius:8px;font-weight:600;transition:var(--transition);}
        .btn-login:hover{background:var(--primary);color:white!important;}
        .btn-register{background:var(--primary);color:white!important;padding:.45rem 1.2rem;border-radius:8px;font-weight:600;transition:var(--transition);}
        .btn-register:hover{background:var(--primary-dark);}
        .cart-btn{position:relative;background:rgba(255,107,0,.15);border:1.5px solid var(--primary);color:var(--primary);padding:.45rem .9rem;border-radius:8px;cursor:pointer;transition:var(--transition);font-size:1.1rem;}
        .cart-btn:hover{background:var(--primary);color:white;}
        .cart-badge{position:absolute;top:-8px;right:-8px;background:var(--accent);color:var(--dark);font-size:.65rem;font-weight:700;width:18px;height:18px;border-radius:50%;display:flex;align-items:center;justify-content:center;line-height:1;}

        /* HERO */
        .hero{min-height:90vh;background:url('{{ asset("assets/img/banner-1.jpg") }}') center/cover no-repeat;position:relative;display:flex;align-items:center;}
        .hero-overlay{position:absolute;inset:0;background:linear-gradient(120deg,rgba(10,14,26,.92) 55%,rgba(255,107,0,.18) 100%);}
        .hero-content{position:relative;z-index:2;}
        .hero-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(255,107,0,.15);border:1px solid rgba(255,107,0,.4);color:var(--primary);padding:.35rem 1rem;border-radius:50px;font-size:.85rem;font-weight:600;letter-spacing:1px;margin-bottom:1.5rem;}
        .hero-title{font-size:clamp(2.2rem,5vw,4rem);font-weight:700;line-height:1.15;margin-bottom:1.2rem;}
        .hero-title span{color:var(--primary);}
        .hero-sub{color:var(--muted);font-size:1.1rem;max-width:560px;margin-bottom:2rem;line-height:1.7;}
        .hero-btn-primary{background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:white;padding:.75rem 2rem;border-radius:10px;font-weight:600;border:none;transition:var(--transition);display:inline-flex;align-items:center;gap:8px;}
        .hero-btn-primary:hover{transform:translateY(-3px);box-shadow:0 8px 24px rgba(255,107,0,.4);color:white;}
        .hero-stat{text-align:center;padding:1.2rem 1.8rem;background:rgba(255,255,255,.04);border:1px solid var(--border);border-radius:12px;backdrop-filter:blur(8px);}
        .hero-stat .num{font-size:1.8rem;font-weight:700;color:var(--primary);font-family:'Rajdhani',sans-serif;}
        .hero-stat .lbl{font-size:.8rem;color:var(--muted);margin-top:.2rem;}

        /* PRODUCTS */
        .products-section{padding:5rem 0;background:var(--dark2);}
        .section-badge{display:inline-block;background:rgba(255,107,0,.15);color:var(--primary);border:1px solid rgba(255,107,0,.3);padding:.3rem 1rem;border-radius:50px;font-size:.8rem;font-weight:600;letter-spacing:1px;margin-bottom:.8rem;}
        .section-title{font-size:2.2rem;font-weight:700;color:white;margin-bottom:.5rem;}
        .section-sub{color:var(--muted);font-size:1rem;}
        .divider{width:60px;height:3px;background:linear-gradient(90deg,var(--primary),var(--accent));border-radius:2px;margin:1rem 0;}

        /* FILTER */
        .filter-wrap{display:flex;flex-wrap:wrap;gap:.6rem;margin-bottom:2.5rem;}
        .filter-btn{padding:.45rem 1.2rem;border:1.5px solid var(--border);background:transparent;color:var(--muted);border-radius:8px;font-size:.85rem;font-weight:500;cursor:pointer;transition:var(--transition);}
        .filter-btn:hover,.filter-btn.active{border-color:var(--primary);color:var(--primary);background:rgba(255,107,0,.1);}

        /* PRODUCT CARD */
        .product-card{background:var(--card-bg);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;height:100%;transition:var(--transition);}
        .product-card:hover{transform:translateY(-8px);border-color:var(--primary);box-shadow:0 12px 40px rgba(255,107,0,.2);}
        .product-img-wrap{height:200px;overflow:hidden;position:relative;background:#0d1220;}
        .product-img-wrap img{width:100%;height:100%;object-fit:cover;transition:transform .5s ease;}
        .product-card:hover .product-img-wrap img{transform:scale(1.07);}
        .prod-badge{position:absolute;top:12px;left:12px;padding:.25rem .7rem;border-radius:6px;font-size:.75rem;font-weight:700;letter-spacing:.5px;}
        .badge-instock{background:rgba(16,185,129,.2);color:var(--success);border:1px solid rgba(16,185,129,.4);}
        .badge-low{background:rgba(245,158,11,.2);color:var(--warning);border:1px solid rgba(245,158,11,.4);}
        .badge-out{background:rgba(239,68,68,.2);color:var(--danger);border:1px solid rgba(239,68,68,.4);}
        .product-body{padding:1.2rem;}
        .prod-jenis{font-size:.75rem;color:var(--accent);font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:.4rem;}
        .prod-name{font-size:1.1rem;font-weight:700;color:white;margin-bottom:.4rem;line-height:1.3;}
        .prod-desc{font-size:.82rem;color:var(--muted);margin-bottom:.8rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
        .prod-price{font-size:1.25rem;font-weight:700;color:var(--primary);font-family:'Rajdhani',sans-serif;margin-bottom:.8rem;}
        .prod-footer{display:flex;justify-content:space-between;align-items:center;border-top:1px solid var(--border);padding-top:.8rem;margin-top:.5rem;}
        .stok-label{font-size:.8rem;color:var(--muted);}
        .stok-label.ok{color:var(--success);}.stok-label.low{color:var(--warning);}.stok-label.out{color:var(--danger);}
        .prod-actions{display:flex;gap:.4rem;}
        .btn-detail{background:transparent;border:1.5px solid var(--border);color:var(--muted);padding:.35rem .7rem;border-radius:8px;cursor:pointer;transition:var(--transition);font-size:.9rem;}
        .btn-detail:hover{border-color:var(--accent);color:var(--accent);}
        .btn-cart{background:rgba(255,107,0,.15);border:1.5px solid var(--primary);color:var(--primary);padding:.35rem .7rem;border-radius:8px;cursor:pointer;transition:var(--transition);font-size:.9rem;}
        .btn-cart:hover{background:var(--primary);color:white;}
        .btn-buy-direct{background:linear-gradient(135deg,var(--primary),var(--primary-dark));border:none;color:white;padding:.35rem .7rem;border-radius:8px;cursor:pointer;transition:var(--transition);font-size:.9rem;}
        .btn-buy-direct:hover{transform:translateY(-2px);box-shadow:0 4px 12px rgba(255,107,0,.4);}

        /* MODALS */
        .modal-content{background:var(--card-bg);border:1px solid var(--border);border-radius:var(--radius);}
        .modal-header{background:linear-gradient(135deg,var(--dark),#1a2235);border-bottom:1px solid var(--border);}
        .modal-header .modal-title{color:white;font-family:'Rajdhani',sans-serif;font-size:1.3rem;}
        .btn-close{filter:invert(1);}
        .modal-img{width:100%;height:260px;object-fit:cover;border-radius:10px;border:1px solid var(--border);}
        .detail-row{display:flex;justify-content:space-between;padding:.6rem 0;border-bottom:1px solid rgba(255,255,255,.06);font-size:.9rem;}
        .detail-row:last-child{border-bottom:none;}
        .detail-row .lbl{color:var(--muted);}
        .detail-row .val{color:white;font-weight:500;}
        .price-big{font-size:1.8rem;font-weight:700;color:var(--primary);font-family:'Rajdhani',sans-serif;}

        /* QTY SELECTOR */
        .qty-wrap{display:flex;align-items:center;gap:.8rem;background:var(--dark);border:1px solid var(--border);border-radius:10px;padding:.5rem 1rem;width:fit-content;}
        .qty-btn{background:rgba(255,107,0,.15);border:1px solid var(--primary);color:var(--primary);width:32px;height:32px;border-radius:6px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:1.1rem;transition:var(--transition);}
        .qty-btn:hover{background:var(--primary);color:white;}
        .qty-inp{width:50px;text-align:center;background:transparent;border:none;color:white;font-size:1.1rem;font-weight:600;outline:none;}
        .total-box{background:linear-gradient(135deg,rgba(255,107,0,.1),rgba(0,212,255,.05));border:1px solid rgba(255,107,0,.3);border-radius:10px;padding:1rem 1.2rem;}
        .total-label{color:var(--muted);font-size:.85rem;}
        .total-amount{font-size:1.5rem;font-weight:700;color:var(--primary);font-family:'Rajdhani',sans-serif;}

        .btn-confirm{background:linear-gradient(135deg,var(--primary),var(--primary-dark));border:none;color:white;padding:.75rem;border-radius:10px;font-weight:600;width:100%;font-size:1rem;transition:var(--transition);}
        .btn-confirm:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(255,107,0,.4);}
        .btn-add-to-cart-modal{background:rgba(0,212,255,.1);border:1.5px solid var(--accent);color:var(--accent);padding:.75rem;border-radius:10px;font-weight:600;width:100%;font-size:1rem;transition:var(--transition);}
        .btn-add-to-cart-modal:hover{background:var(--accent);color:var(--dark);}

        /* CART SIDEBAR */
        .cart-overlay{position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:1100;opacity:0;visibility:hidden;transition:var(--transition);}
        .cart-overlay.show{opacity:1;visibility:visible;}
        .cart-sidebar{position:fixed;right:-420px;top:0;width:min(420px,100vw);height:100%;background:var(--dark2);border-left:1px solid var(--border);z-index:1101;transition:right .35s ease;display:flex;flex-direction:column;padding:0;}
        .cart-sidebar.open{right:0;}
        .cart-head{background:var(--dark);border-bottom:1px solid var(--border);padding:1.2rem 1.5rem;display:flex;justify-content:space-between;align-items:center;}
        .cart-title{font-family:'Rajdhani',sans-serif;font-size:1.3rem;font-weight:700;color:white;display:flex;align-items:center;gap:8px;}
        .cart-close-btn{background:rgba(255,255,255,.08);border:none;color:var(--muted);width:32px;height:32px;border-radius:8px;cursor:pointer;font-size:1.1rem;transition:var(--transition);}
        .cart-close-btn:hover{background:var(--danger);color:white;}
        .cart-body{flex:1;overflow-y:auto;padding:1rem 1.5rem;}
        .cart-empty{display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;color:var(--muted);gap:1rem;}
        .cart-empty i{font-size:3rem;color:var(--border);}
        .cart-item{display:flex;gap:.8rem;padding:.9rem;background:var(--card-bg);border:1px solid var(--border);border-radius:10px;margin-bottom:.7rem;transition:var(--transition);animation: fadeIn .3s ease-out;}
        .cart-item:hover{border-color:var(--primary);}
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .cart-item-img{width:64px;height:64px;object-fit:cover;border-radius:8px;flex-shrink:0;}
        .cart-item-info{flex:1;min-width:0;}
        .cart-item-name{font-size:.9rem;font-weight:600;color:white;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
        .cart-item-price{font-size:.85rem;color:var(--primary);font-weight:600;margin:.2rem 0;}
        .cart-item-actions{display:flex;align-items:center;gap:.5rem;}
        .cart-qty-btn{background:rgba(255,107,0,.1);border:1px solid rgba(255,107,0,.3);color:var(--primary);width:24px;height:24px;border-radius:5px;cursor:pointer;font-size:.85rem;transition:var(--transition);display:flex;align-items:center;justify-content:center;}
        .cart-qty-btn:hover{background:var(--primary);color:white;}
        .cart-qty-num{color:white;font-weight:600;font-size:.85rem;min-width:20px;text-align:center;}
        .cart-remove-btn{background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.3);color:var(--danger);width:24px;height:24px;border-radius:5px;cursor:pointer;font-size:.8rem;transition:var(--transition);display:flex;align-items:center;justify-content:center;margin-left:.3rem;}
        .cart-remove-btn:hover{background:var(--danger);color:white;}
        .cart-foot{border-top:1px solid var(--border);padding:1.2rem 1.5rem;}
        .cart-subtotal{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;}
        .cart-subtotal .lbl{color:var(--muted);font-size:.9rem;}
        .cart-subtotal .val{font-size:1.3rem;font-weight:700;color:white;font-family:'Rajdhani',sans-serif;}
        .btn-checkout{background:linear-gradient(135deg,var(--primary),var(--primary-dark));border:none;color:white;padding:.8rem;border-radius:10px;font-weight:600;width:100%;font-size:1rem;transition:var(--transition);}
        .btn-checkout:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(255,107,0,.5);}

        /* ALERT */
        .toast-notif{position:fixed;bottom:24px;right:24px;background:var(--card-bg);border:1px solid var(--success);color:var(--success);padding:.8rem 1.4rem;border-radius:10px;z-index:9999;transform:translateY(80px);opacity:0;transition:var(--transition);font-weight:500;display:flex;align-items:center;gap:.6rem;}
        .toast-notif.show{transform:translateY(0);opacity:1;}
        .toast-notif.error{border-color:var(--danger);color:var(--danger);}

        /* FOOTER */
        .footer{background:var(--dark);border-top:1px solid var(--border);padding:3rem 0 1.5rem;}
        .footer-brand{font-family:'Rajdhani',sans-serif;font-size:1.7rem;font-weight:700;margin-bottom:.8rem;}
        .footer-brand .part{color:var(--primary);}
        .footer-desc{color:var(--muted);font-size:.9rem;max-width:280px;line-height:1.6;}
        .footer-heading{color:white;font-weight:600;margin-bottom:1rem;font-size:.95rem;}
        .footer-links{list-style:none;padding:0;}
        .footer-links li{margin-bottom:.5rem;}
        .footer-links a{color:var(--muted);font-size:.875rem;transition:var(--transition);}
        .footer-links a:hover{color:var(--primary);padding-left:4px;}
        .footer-bottom{border-top:1px solid var(--border);margin-top:2rem;padding-top:1.5rem;text-align:center;color:var(--muted);font-size:.85rem;}
        @media(max-width:768px){
            .hero{min-height:75vh;}
            .hero-stats{flex-direction:column;gap:.7rem;}
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar-main">
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
            <a class="navbar-brand brand-logo me-4" href="/">
                <i class="bi bi-lightning-charge-fill"></i><span class="must">Must</span><span class="part">Part</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                <span class="navbar-toggler-icon" style="filter:invert(1)"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link nav-link-custom active" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#about">Tentang</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    @auth
                        <button class="cart-btn" onclick="toggleCart()" title="Keranjang">
                            <i class="bi bi-cart3"></i>
                            <span class="cart-badge" id="cartBadge">0</span>
                        </button>
                        <div class="dropdown">
                            <button class="btn-login dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i>{{ Auth::user()->name ?? Auth::user()->email }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="background:var(--card-bg);border:1px solid var(--border);">
                                <li><a class="dropdown-item text-muted" href="/admin"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                                <li><hr class="dropdown-divider border-secondary"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="px-3 py-1">
                                        @csrf
                                        <button class="btn btn-sm btn-danger w-100" type="submit"><i class="bi bi-box-arrow-right me-1"></i>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="btn-login" href="/admin"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a>
                        <a class="btn-register" href="/register"><i class="bi bi-person-plus me-1"></i>Register</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- SUCCESS ALERT -->
@if(session('success'))
<div class="alert alert-success text-center m-0 py-2 rounded-0" style="background:rgba(16,185,129,.15);border:none;border-bottom:1px solid var(--success);color:var(--success);">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
</div>
@endif

<!-- HERO -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content py-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-eyebrow"><i class="bi bi-lightning-charge-fill"></i>SPAREPART MOTOR LISTRIK #1</div>
                <h1 class="hero-title">Upgrade Motor Listrik<br><span>Kamu dengan Part</span><br>Terbaik Indonesia</h1>
                <p class="hero-sub">Dapatkan sparepart motor listrik berkualitas tinggi — baterai, motor, kontroler, ban, dan lebih banyak lagi. Garansi resmi & pengiriman cepat ke seluruh Indonesia.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#produk" class="hero-btn-primary"><i class="bi bi-grid-3x3-gap-fill"></i>Lihat Produk</a>
                </div>
                <div class="d-flex gap-3 mt-4 flex-wrap hero-stats">
                    <div class="hero-stat"><div class="num">500+</div><div class="lbl">Jenis Part</div></div>
                    <div class="hero-stat"><div class="num">10rb+</div><div class="lbl">Pelanggan</div></div>
                    <div class="hero-stat"><div class="num">100%</div><div class="lbl">Garansi Resmi</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCTS SECTION -->
<section id="produk" class="products-section">
    <div class="container">
        <div class="mb-4">
            <span class="section-badge">KATALOG PRODUK</span>
            <h2 class="section-title">Sparepart Motor Listrik</h2>
            <p class="section-sub">Temukan part yang kamu butuhkan — stok selalu tersedia</p>
            <div class="divider"></div>
        </div>

        <div class="filter-wrap">
            <button class="filter-btn active" data-filter="all">Semua</button>
            @foreach($produk as $p)
            <button class="filter-btn" data-filter="{{ $p->jenis }}">{{ $p->jenis }}</button>
            @endforeach
        </div>

        <div class="row g-4" id="productGrid">
            @foreach($produk as $p)
            <div class="col-xl-3 col-lg-4 col-md-6 prod-item" data-jenis="{{ $p->jenis }}">
                <div class="product-card">
                    <div class="product-img-wrap">
                        @if($p->stok > 50)
                            <span class="prod-badge badge-instock"><i class="bi bi-check-circle me-1"></i>Tersedia</span>
                        @elseif($p->stok > 0)
                            <span class="prod-badge badge-low"><i class="bi bi-exclamation-triangle me-1"></i>Stok Terbatas</span>
                        @else
                            <span class="prod-badge badge-out"><i class="bi bi-x-circle me-1"></i>Habis</span>
                        @endif
                        <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->nama }}" loading="lazy">
                    </div>
                    <div class="product-body">
                        <div class="prod-jenis">{{ $p->jenis }}</div>
                        <div class="prod-name">{{ $p->nama }}</div>
                        <div class="prod-desc">{{ $p->tipe }} — Sparepart motor listrik berkualitas tinggi</div>
                        <div class="prod-price">Rp {{ number_format($p->harga,0,',','.') }}</div>
                        <div class="prod-footer">
                            <div>
                                @if($p->stok > 50)
                                    <span class="stok-label ok"><i class="bi bi-check-circle-fill me-1"></i>Stok: {{ $p->stok }}</span>
                                @elseif($p->stok > 0)
                                    <span class="stok-label low"><i class="bi bi-exclamation-triangle-fill me-1"></i>Stok: {{ $p->stok }}</span>
                                @else
                                    <span class="stok-label out"><i class="bi bi-x-circle-fill me-1"></i>Habis</span>
                                @endif
                            </div>
                            <div class="prod-actions">
                                <button class="btn-detail" onclick="openDetailModal({{ $p->id }})" title="Detail"><i class="bi bi-eye"></i></button>
                                @auth
                                    @if(Auth::user()->role == 'Guest' && $p->stok > 0)
                                        <button class="btn-cart" onclick="addToCartDirect({{ $p->id }},1)" title="Keranjang"><i class="bi bi-cart-plus"></i></button>
                                        <button class="btn-buy-direct" onclick="openBuyModal({{ $p->id }})" title="Beli"><i class="bi bi-bag-check"></i></button>
                                    @else
                                        <button class="btn-cart" disabled style="opacity:.4;cursor:not-allowed"><i class="bi bi-cart-plus"></i></button>
                                    @endif
                                @else
                                    <button class="btn-cart" onclick="needLogin()" title="Keranjang"><i class="bi bi-cart-plus"></i></button>
                                    <button class="btn-buy-direct" onclick="needLogin()"><i class="bi bi-bag-check"></i></button>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL: DETAIL PRODUK -->
            <div class="modal fade" id="modalDetail{{ $p->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-info-circle me-2 text-primary" style="color:var(--primary)!important"></i>{{ $p->nama }}</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="row g-4">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/'.$p->image) }}" class="modal-img" alt="{{ $p->nama }}">
                                    <div class="price-big mt-3">Rp {{ number_format($p->harga,0,',','.') }}</div>
                                </div>
                                <div class="col-md-7">
                                    <div class="detail-row"><span class="lbl">Nama Produk</span><span class="val">{{ $p->nama }}</span></div>
                                    <div class="detail-row"><span class="lbl">Jenis</span><span class="val">{{ $p->jenis }}</span></div>
                                    <div class="detail-row"><span class="lbl">Tipe</span><span class="val">{{ $p->tipe }}</span></div>
                                    <div class="detail-row"><span class="lbl">Stok</span>
                                        <span class="val">
                                            @if($p->stok > 50) <span style="color:var(--success)">{{ $p->stok }} unit tersedia</span>
                                            @elseif($p->stok > 0) <span style="color:var(--warning)">{{ $p->stok }} unit tersisa</span>
                                            @else <span style="color:var(--danger)">Habis</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="detail-row"><span class="lbl">Harga Satuan</span><span class="val" style="color:var(--primary)">Rp {{ number_format($p->harga,0,',','.') }}</span></div>
                                    <div class="mt-3 p-3" style="background:rgba(255,255,255,.04);border-radius:8px;border:1px solid var(--border);">
                                        <div class="mb-1" style="color:var(--muted);font-size:.8rem;font-weight:600;">DESKRIPSI</div>
                                        <div style="color:var(--text);font-size:.9rem;line-height:1.6;">{{ $p->tipe }} - Sparepart motor listrik berkualitas tinggi dengan performa andal.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="border-top:1px solid var(--border);">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            @auth
                                @if(Auth::user()->role == 'Guest' && $p->stok > 0)
                                    <button class="btn" style="background:rgba(0,212,255,.15);border:1.5px solid var(--accent);color:var(--accent);" data-bs-dismiss="modal" onclick="addToCartDirect({{ $p->id }},1)">
                                        <i class="bi bi-cart-plus me-1"></i>Tambah Keranjang
                                    </button>
                                    <button class="btn" style="background:var(--primary);border:none;color:white;" data-bs-dismiss="modal" onclick="openBuyModal({{ $p->id }})">
                                        <i class="bi bi-bag-check me-1"></i>Beli Sekarang
                                    </button>
                                @endif
                            @else
                                <a href="/admin" class="btn" style="background:var(--primary);color:white;"><i class="bi bi-box-arrow-in-right me-1"></i>Login untuk Membeli</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL: BELI LANGSUNG -->
            <div class="modal fade" id="modalBuy{{ $p->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="bi bi-bag-check me-2" style="color:var(--primary)"></i>Beli Langsung</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="d-flex gap-3 mb-4" style="background:var(--dark);border-radius:10px;padding:.8rem;border:1px solid var(--border);">
                                <img src="{{ asset('storage/'.$p->image) }}" style="width:70px;height:70px;object-fit:cover;border-radius:8px;" alt="{{ $p->nama }}">
                                <div>
                                    <div style="font-weight:700;color:white;font-size:1rem;">{{ $p->nama }}</div>
                                    <div style="font-size:.8rem;color:var(--muted);">{{ $p->jenis }} · {{ $p->tipe }}</div>
                                    <div style="color:var(--primary);font-weight:600;margin-top:.3rem;">Rp {{ number_format($p->harga,0,',','.') }}/unit</div>
                                    <div style="font-size:.8rem;margin-top:.2rem;
                                        @if($p->stok > 50) color:var(--success)
                                        @elseif($p->stok > 0) color:var(--warning)
                                        @else color:var(--danger)
                                        @endif">
                                        Stok tersedia: {{ $p->stok }} unit
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 p-3" style="background:rgba(255,255,255,.04);border-radius:8px;border:1px solid var(--border);font-size:.85rem;color:var(--muted);">
                                {{ $p->tipe }} - Sparepart motor listrik berkualitas tinggi dengan performa andal.
                            </div>
                            <form action="/pembelian/storeinput" method="POST" id="buyForm{{ $p->id }}">
                                @csrf
                                <input type="hidden" name="kodeproduk" value="{{ $p->id }}">
                                <input type="hidden" name="harga" value="{{ $p->harga }}">
                                <div class="mb-3">
                                    <label class="form-label" style="color:var(--muted);font-size:.85rem;font-weight:600;">JUMLAH PEMBELIAN</label>
                                    <div class="qty-wrap">
                                        <button type="button" class="qty-btn" onclick="changeQtyBuy({{ $p->id }},-1,{{ $p->stok }},{{ $p->harga }})">−</button>
                                        <input type="number" name="banyak" class="qty-inp" id="buyQty{{ $p->id }}" value="1" min="1" max="{{ $p->stok }}" oninput="calcBuyTotal({{ $p->id }},{{ $p->harga }})">
                                        <button type="button" class="qty-btn" onclick="changeQtyBuy({{ $p->id }},1,{{ $p->stok }},{{ $p->harga }})">+</button>
                                    </div>
                                    <small style="color:var(--muted);">Maks. {{ $p->stok }} unit</small>
                                </div>
                                <div class="total-box mb-4">
                                    <div class="total-label">Total Pembayaran</div>
                                    <div class="total-amount" id="buyTotal{{ $p->id }}">Rp {{ number_format($p->harga,0,',','.') }}</div>
                                </div>
                                <button type="submit" class="btn-confirm"><i class="bi bi-check-circle me-2"></i>Konfirmasi Pembelian</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

        @if(count($produk)===0)
        <div class="text-center py-5">
            <i class="bi bi-box-seam fs-1" style="color:var(--border)"></i>
            <h4 class="mt-3" style="color:var(--muted)">Belum ada produk tersedia</h4>
            <p style="color:var(--muted)">Silakan hubungi admin</p>
        </div>
        @endif
    </div>
</section>

<!-- ABOUT SECTION -->
<section id="about" class="py-5" style="background:var(--dark);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-badge">TENTANG KAMI</span>
                <h2 class="section-title">Spesialis Sparepart<br>Motor Listrik Indonesia</h2>
                <div class="divider"></div>
                <p style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem;">MustPart adalah toko sparepart motor listrik terpercaya yang menyediakan komponen berkualitas tinggi untuk semua jenis motor listrik di Indonesia. Kami berkomitmen memberikan produk terbaik dengan harga kompetitif.</p>
                <div class="row g-3">
                    @foreach([['bi-lightning-charge','Komponen Original','Part resmi bergaransi'],['bi-truck','Pengiriman Cepat','Ke seluruh Indonesia'],['bi-headset','Support 24/7','Siap membantu']] as $f)
                    <div class="col-sm-4">
                        <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:10px;padding:1rem;text-align:center;">
                            <i class="bi {{ $f[0] }} fs-2" style="color:var(--primary)"></i>
                            <div style="color:white;font-weight:600;font-size:.9rem;margin-top:.5rem;">{{ $f[1] }}</div>
                            <div style="color:var(--muted);font-size:.78rem;">{{ $f[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;aspect-ratio:4/3;">
                    <img src="{{ asset('assets/img/banner-1.jpg') }}" style="width:100%;height:100%;object-fit:cover;opacity:.8;" alt="MustPart">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-brand"><i class="bi bi-lightning-charge-fill" style="color:var(--accent)"></i> Must<span class="part">Part</span></div>
                <p class="footer-desc">Toko sparepart motor listrik terpercaya. Kualitas terjamin, harga bersaing.</p>
            </div>
            <div class="col-lg-2 col-6">
                <div class="footer-heading">Navigasi</div>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="#produk">Produk</a></li>
                    <li><a href="#about">Tentang</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <div class="footer-heading">Kategori</div>
                <ul class="footer-links">
                    @foreach($produk->take(5) as $p)
                    <li><a href="#produk">{{ $p->jenis }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="footer-heading">Kontak</div>
                <ul class="footer-links">
                    <li><i class="bi bi-geo-alt me-1" style="color:var(--primary)"></i>Jakarta, Indonesia</li>
                    <li><i class="bi bi-whatsapp me-1" style="color:var(--success)"></i>0812-3456-7890</li>
                    <li><i class="bi bi-envelope me-1" style="color:var(--accent)"></i>info@mustpart.id</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">&copy; {{ date('Y') }} <strong>MustPart</strong>. All rights reserved.</div>
    </div>
</footer>

<!-- CART SIDEBAR -->
<div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>
<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-head">
        <div class="cart-title"><i class="bi bi-cart3" style="color:var(--primary)"></i>Keranjang Belanja</div>
        <button class="cart-close-btn" onclick="toggleCart()"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="cart-body" id="cartBody">
        <div class="cart-empty"><i class="bi bi-cart-x"></i><span>Keranjang kosong</span></div>
    </div>
    <div class="cart-foot" id="cartFoot" style="display:none;">
        <div class="cart-subtotal">
            <span class="lbl">Subtotal</span>
            <span class="val" id="cartSubtotal">Rp 0</span>
        </div>
        @auth
        <button class="btn-checkout" onclick="checkoutCart()"><i class="bi bi-bag-check me-2"></i>Checkout Sekarang</button>
        @else
        <a href="/admin" class="btn-checkout text-center d-block"><i class="bi bi-box-arrow-in-right me-2"></i>Login untuk Checkout</a>
        @endauth
    </div>
</div>

<!-- TOAST -->
<div class="toast-notif" id="toastMsg"><i class="bi bi-check-circle-fill"></i><span id="toastText"></span></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').content;

// -------- FILTER --------
document.querySelectorAll('.filter-btn').forEach(btn=>{
    btn.addEventListener('click',()=>{
        document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));
        btn.classList.add('active');
        const f=btn.dataset.filter;
        document.querySelectorAll('.prod-item').forEach(el=>{
            el.style.display=(f==='all'||el.dataset.jenis===f)?'':'none';
        });
    });
});

// -------- MODALS --------
function openDetailModal(id){new bootstrap.Modal(document.getElementById('modalDetail'+id)).show();}
function openBuyModal(id){new bootstrap.Modal(document.getElementById('modalBuy'+id)).show();}
function needLogin(){showToast('Silakan login terlebih dahulu',true);}

// -------- BUY MODAL QTY --------
function changeQtyBuy(id,delta,maxStok,harga){
    const inp=document.getElementById('buyQty'+id);
    let v=parseInt(inp.value)+delta;
    if(v<1)v=1; if(v>maxStok)v=maxStok;
    inp.value=v; calcBuyTotal(id,harga);
}
function calcBuyTotal(id,harga){
    const v=parseInt(document.getElementById('buyQty'+id).value)||1;
    const total=v*harga;
    document.getElementById('buyTotal'+id).textContent='Rp '+total.toLocaleString('id-ID');
}

// -------- CART --------
function toggleCart(){
    document.getElementById('cartSidebar').classList.toggle('open');
    document.getElementById('cartOverlay').classList.toggle('show');
}

function addToCartDirect(produkId,qty=1){
    @auth
    fetch('/cart/add',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF},body:JSON.stringify({produk_id:produkId,qty:qty})})
    .then(r=>r.json()).then(data=>{
        if(data.success){
            updateCartBadge(data.cart_count);
            renderCart(data.cart);
            showToast('Produk ditambahkan ke keranjang');
            document.getElementById('cartSidebar').classList.add('open');
            document.getElementById('cartOverlay').classList.add('show');
        } else { showToast(data.message,true); }
    });
    @else
    needLogin();
    @endauth
}

function updateCartQty(produkId,qty){
    fetch('/cart/update',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF},body:JSON.stringify({produk_id:produkId,qty:qty})})
    .then(r=>r.json()).then(data=>{
        if(data.success){updateCartBadge(data.cart_count);renderCart(data.cart);document.getElementById('cartSubtotal').textContent='Rp '+data.subtotal.toLocaleString('id-ID');}
    });
}

function removeFromCart(produkId){
    fetch('/cart/remove',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF},body:JSON.stringify({produk_id:produkId})})
    .then(r=>r.json()).then(data=>{
        updateCartBadge(data.cart_count);renderCart(data.cart);
        document.getElementById('cartSubtotal').textContent='Rp '+data.subtotal.toLocaleString('id-ID');
        if(data.cart_count===0){document.getElementById('cartFoot').style.display='none';}
    });
}

function checkoutCart(){
    const checkedBoxes = document.querySelectorAll('.cart-item-check:checked');
    const selected = Array.from(checkedBoxes).map(cb => cb.value);
    
    if(selected.length === 0) {
        showToast('Pilih minimal satu produk untuk checkout', true);
        return;
    }
    
    if(!confirm(`Konfirmasi checkout ${selected.length} item terpilih di keranjang?`)) return;
    
    const checkoutBtn = document.querySelector('.btn-checkout');
    if(checkoutBtn) {
        checkoutBtn.disabled = true;
        checkoutBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';
    }

    fetch('/cart/checkout',{
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF},
        body: JSON.stringify({ product_ids: selected })
    })
    .then(r=>r.json()).then(data=>{
        if(data.success){
            showToast(data.message);
            // Refresh local cart state
            fetch('/cart').then(r=>r.json()).then(d => {
                renderCart(d.cart);
                updateCartBadge(d.cart_count);
            });
            setTimeout(()=>window.location.href='/admin/pembelians', 1500);
        } else { 
            showToast(data.message,true); 
            if(checkoutBtn) {
                checkoutBtn.disabled = false;
                checkoutBtn.innerHTML = '<i class="bi bi-bag-check me-2"></i>Checkout Sekarang';
            }
        }
    }).catch(err => {
        console.error('Checkout error:', err);
        showToast('Terjadi kesalahan saat checkout', true);
        if(checkoutBtn) {
            checkoutBtn.disabled = false;
            checkoutBtn.innerHTML = '<i class="bi bi-bag-check me-2"></i>Checkout Sekarang';
        }
    });
}

function updateCartBadge(count){
    const b=document.getElementById('cartBadge');
    if(b){b.textContent=count;b.style.display=count>0?'flex':'none';}
}

let currentCart = {};

function renderCart(cart){
    currentCart = cart;
    const body=document.getElementById('cartBody');
    const foot=document.getElementById('cartFoot');
    const keys=Object.keys(cart);
    if(keys.length===0){
        body.innerHTML='<div class="cart-empty"><i class="bi bi-cart-x"></i><span>Keranjang kosong</span></div>';
        if(foot)foot.style.display='none'; return;
    }
    
    let html = `
        <div class="d-flex align-items-center mb-3 px-2">
            <input type="checkbox" id="selectAllCart" class="form-check-input me-2" onchange="selectAllCartItems(this.checked)" checked>
            <label for="selectAllCart" class="text-white small fw-600" style="cursor:pointer">Pilih Semua</label>
        </div>
    `;
    
    keys.forEach(pid=>{
        const item=cart[pid];
        const displayStok = item.stok - item.qty;
        html+=`<div class="cart-item">
            <div class="me-2 d-flex align-items-center">
                <input type="checkbox" class="form-check-input cart-item-check" data-pid="${pid}" value="${pid}" onchange="updateCartSubtotal()" checked>
            </div>
            <img class="cart-item-img" src="/storage/${item.image}" alt="${item.nama}">
            <div class="cart-item-info">
                <div class="cart-item-name">${item.nama}</div>
                <div class="cart-item-price">Rp ${(item.harga).toLocaleString('id-ID')}/unit</div>
                <div style="font-size: .75rem; color: var(--muted); margin-bottom: .4rem;">
                    Sisa Stok: <span class="${displayStok <= 5 ? 'text-warning' : ''}">${displayStok}</span> 
                    <small>(di keranjang: ${item.qty})</small>
                </div>
                <div class="cart-item-actions">
                    <button class="cart-qty-btn" onclick="updateCartQty(${pid},${item.qty-1})">−</button>
                    <span class="cart-qty-num">${item.qty}</span>
                    <button class="cart-qty-btn" onclick="updateCartQty(${pid},${item.qty+1})">+</button>
                    <button class="cart-remove-btn" onclick="removeFromCart(${pid})"><i class="bi bi-trash3"></i></button>
                </div>
            </div>
        </div>`;
    });
    body.innerHTML=html;
    if(foot)foot.style.display='block';
    updateCartSubtotal();
}

function selectAllCartItems(checked) {
    document.querySelectorAll('.cart-item-check').forEach(cb => cb.checked = checked);
    updateCartSubtotal();
}

function updateCartSubtotal() {
    let sub = 0;
    let anyUnchecked = false;
    let anyChecked = false;
    const checks = document.querySelectorAll('.cart-item-check');
    
    checks.forEach(cb => {
        if (cb.checked) {
            anyChecked = true;
            const pid = cb.dataset.pid;
            if (currentCart[pid]) {
                sub += currentCart[pid].harga * currentCart[pid].qty;
            }
        } else {
            anyUnchecked = true;
        }
    });

    const selectAll = document.getElementById('selectAllCart');
    if (selectAll) selectAll.checked = checks.length > 0 && !anyUnchecked;
    
    const subtotalEl = document.getElementById('cartSubtotal');
    if(subtotalEl) {
        // Smooth transition for numbers
        subtotalEl.textContent='Rp '+sub.toLocaleString('id-ID');
    }

    const checkoutBtn = document.querySelector('.btn-checkout');
    if(checkoutBtn) {
        checkoutBtn.style.opacity = anyChecked ? '1' : '0.5';
        checkoutBtn.style.pointerEvents = anyChecked ? 'auto' : 'none';
    }
}

// -------- TOAST --------
function showToast(msg,isError=false){
    const t=document.getElementById('toastMsg');
    document.getElementById('toastText').textContent=msg;
    t.classList.toggle('error',isError);
    t.classList.add('show');
    setTimeout(()=>t.classList.remove('show'),3000);
}

// -------- INIT: load cart on page load --------
document.addEventListener('DOMContentLoaded',()=>{
    @auth
    fetch('/cart').then(r=>r.json()).then(data=>{
        updateCartBadge(data.cart_count);
        if(data.cart_count>0)renderCart(data.cart);
    });
    @endauth
    // badge hide on 0
    const b=document.getElementById('cartBadge');
    if(b&&parseInt(b.textContent)===0)b.style.display='none';
});
</script>
</body>
</html>