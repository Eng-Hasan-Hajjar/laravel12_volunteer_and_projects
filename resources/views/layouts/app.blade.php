<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'منصة التطوع') - إعادة الإعمار</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    {{-- Bootstrap RTL --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary:      #2E7D4F;
            --primary-light:#4CAF72;
            --primary-pale: #E8F5EE;
            --accent:       #F4A024;
            --accent-light: #FFF3DC;
            --danger:       #E53935;
            --warning:      #FB8C00;
            --info:         #1976D2;
            --text-dark:    #1A2332;
            --text-mid:     #4A5568;
            --text-light:   #718096;
            --bg-main:      #F7F9FC;
            --bg-card:      #FFFFFF;
            --border:       #E2E8F0;
            --shadow-sm:    0 1px 4px rgba(0,0,0,.06);
            --shadow-md:    0 4px 16px rgba(0,0,0,.10);
            --shadow-lg:    0 8px 32px rgba(0,0,0,.12);
            --radius:       14px;
            --radius-sm:    8px;
            --sidebar-w:    260px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
            background: var(--bg-main);
            color: var(--text-dark);
            min-height: 100vh;
            font-size: 15px;
            line-height: 1.7;
        }

        /* ─── Scrollbar ─────────────────────────────────── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-main); }
        ::-webkit-scrollbar-thumb { background: #CBD5E0; border-radius: 3px; }

        /* ─── NAVBAR ────────────────────────────────────── */
        .main-navbar {
            background: #fff;
            border-bottom: 2px solid var(--primary-pale);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 1040;
        }

        .navbar-brand {
            font-family: 'Cairo', sans-serif;
            font-weight: 900;
            font-size: 1.4rem;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.1rem;
        }

        .nav-link {
            color: var(--text-mid) !important;
            font-weight: 500;
            padding: 8px 14px !important;
            border-radius: var(--radius-sm);
            transition: all .2s;
            font-size: .95rem;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
            background: var(--primary-pale);
        }

        .btn-nav-primary {
            background: var(--primary);
            color: #fff !important;
            padding: 8px 20px !important;
            border-radius: 25px;
            font-weight: 600;
            transition: all .2s;
        }

        .btn-nav-primary:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(46,125,79,.3);
        }

        .notification-badge {
            position: absolute;
            top: 2px;
            left: 2px;
            background: var(--danger);
            color: #fff;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: .65rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* ─── MAIN LAYOUT ───────────────────────────────── */
        .page-wrapper {
            display: flex;
            min-height: calc(100vh - 66px);
        }

        /* ─── SIDEBAR ───────────────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: #fff;
            border-left: 1px solid var(--border);
            padding: 24px 0;
            position: sticky;
            top: 66px;
            height: calc(100vh - 66px);
            overflow-y: auto;
            flex-shrink: 0;
        }

        .sidebar-section-title {
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: var(--text-light);
            font-weight: 700;
            padding: 8px 20px 4px;
            margin-top: 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            color: var(--text-mid);
            text-decoration: none;
            font-weight: 500;
            font-size: .92rem;
            border-right: 3px solid transparent;
            transition: all .2s;
        }

        .sidebar-link:hover {
            background: var(--primary-pale);
            color: var(--primary);
            border-right-color: var(--primary);
        }

        .sidebar-link.active {
            background: var(--primary-pale);
            color: var(--primary);
            border-right-color: var(--primary);
            font-weight: 700;
        }

        .sidebar-link i { font-size: 1.05rem; width: 20px; text-align: center; }

        /* ─── CONTENT ───────────────────────────────────── */
        .main-content {
            flex: 1;
            padding: 28px;
            min-width: 0;
        }

        /* ─── CARDS ─────────────────────────────────────── */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            transition: box-shadow .2s;
        }

        .card:hover { box-shadow: var(--shadow-md); }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border);
            padding: 16px 20px;
            font-weight: 700;
            font-size: 1rem;
        }

        /* ─── STATS CARDS ───────────────────────────────── */
        .stat-card {
            border-radius: var(--radius);
            padding: 22px;
            position: relative;
            overflow: hidden;
            border: none;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            opacity: .12;
        }

        .stat-card.green  { background: linear-gradient(135deg,#E8F5EE,#d4ead9); }
        .stat-card.amber  { background: linear-gradient(135deg,#FFF3DC,#fde9b8); }
        .stat-card.blue   { background: linear-gradient(135deg,#E3F2FD,#bde0fb); }
        .stat-card.red    { background: linear-gradient(135deg,#FDECEA,#f9c9c6); }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 900;
            font-family: 'Cairo', sans-serif;
            line-height: 1;
        }

        .stat-label { font-size: .85rem; color: var(--text-mid); margin-top: 4px; }
        .stat-icon {
            position: absolute;
            bottom: 12px;
            left: 18px;
            font-size: 2.5rem;
            opacity: .18;
        }

        /* ─── PROJECT CARD ──────────────────────────────── */
        .project-card {
            border-radius: var(--radius);
            overflow: hidden;
            transition: all .25s;
            border: 1px solid var(--border);
        }

        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .project-card .card-img-top {
            height: 190px;
            object-fit: cover;
        }

        .project-card .card-img-placeholder {
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            background: var(--primary-pale);
            color: var(--primary);
        }

        /* ─── PROGRESS ──────────────────────────────────── */
        .progress {
            height: 8px;
            border-radius: 4px;
            background: var(--border);
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            border-radius: 4px;
        }

        /* ─── BADGES ────────────────────────────────────── */
        .badge { font-size: .75rem; padding: 4px 10px; border-radius: 20px; font-weight: 600; }

        .priority-critical { background: #7c3aed22; color: #7c3aed; }
        .priority-high     { background: #fecaca;   color: #b91c1c; }
        .priority-medium   { background: #fef3c7;   color: #b45309; }
        .priority-low      { background: #dcfce7;   color: #15803d; }

        .status-pending    { background: #fef3c7; color: #b45309; }
        .status-approved   { background: #dbeafe; color: #1d4ed8; }
        .status-in_progress{ background: #e0f2fe; color: #0369a1; }
        .status-completed  { background: #dcfce7; color: #15803d; }
        .status-rejected   { background: #fecaca; color: #b91c1c; }

        /* ─── BUTTONS ───────────────────────────────────── */
        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            font-weight: 600;
            border-radius: var(--radius-sm);
        }

        .btn-primary:hover {
            background: var(--primary-light);
            border-color: var(--primary-light);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            font-weight: 600;
            border-radius: var(--radius-sm);
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* ─── FORMS ─────────────────────────────────────── */
        .form-control, .form-select {
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border);
            padding: 10px 14px;
            font-family: 'Tajawal', sans-serif;
            font-size: .95rem;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(46,125,79,.12);
        }

        .form-label { font-weight: 600; font-size: .9rem; color: var(--text-mid); margin-bottom: 6px; }

        /* ─── ALERTS ────────────────────────────────────── */
        .alert { border-radius: var(--radius-sm); border: none; font-weight: 500; }
        .alert-success { background: #dcfce7; color: #15803d; }
        .alert-danger  { background: #fecaca; color: #b91c1c; }
        .alert-warning { background: #fef3c7; color: #b45309; }
        .alert-info    { background: #dbeafe; color: #1d4ed8; }

        /* ─── PAGE HEADER ───────────────────────────────── */
        .page-header {
            background: linear-gradient(135deg, var(--primary) 0%, #1B5E35 100%);
            color: #fff;
            padding: 40px 28px;
            border-radius: var(--radius);
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .page-header::after {
            content: '';
            position: absolute;
            top: -40px;
            left: -40px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,.06);
        }

        .page-header h1 { font-size: 1.8rem; font-weight: 900; font-family: 'Cairo', sans-serif; }
        .page-header p  { opacity: .85; margin: 0; }

        /* ─── TABLES ────────────────────────────────────── */
        .table { font-size: .92rem; }
        .table thead th {
            background: var(--bg-main);
            color: var(--text-mid);
            font-weight: 700;
            font-size: .82rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            border-bottom: 2px solid var(--border);
            padding: 12px 16px;
        }
        .table td { padding: 12px 16px; vertical-align: middle; }
        .table tbody tr:hover { background: var(--primary-pale); }

        /* ─── AVATAR ────────────────────────────────────── */
        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border);
        }

        .avatar-lg { width: 80px; height: 80px; }
        .avatar-xl { width: 120px; height: 120px; }

        /* ─── STAR RATING ───────────────────────────────── */
        .stars { color: var(--accent); letter-spacing: 1px; }

        /* ─── FOOTER ────────────────────────────────────── */
        .main-footer {
            background: var(--text-dark);
            color: rgba(255,255,255,.7);
            padding: 40px 0 20px;
            margin-top: 60px;
        }

        .footer-logo { color: #fff; font-weight: 900; font-size: 1.3rem; font-family: 'Cairo',sans-serif; }

        /* ─── ANIMATIONS ────────────────────────────────── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up { animation: fadeInUp .4s ease forwards; }

        /* ─── TOAST ─────────────────────────────────────── */
        .toast-container { position: fixed; top: 80px; left: 20px; z-index: 9999; }

        /* ─── MOBILE ────────────────────────────────────── */
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-content { padding: 16px; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- ═══════════════════ NAVBAR ════════════════════ --}}
<nav class="navbar navbar-expand-lg main-navbar px-4">
    <a class="navbar-brand" href="{{ route('home') }}">
        <div class="brand-icon"><i class="bi bi-house-heart-fill"></i></div>
        <span>منصة<span style="color:var(--accent)">إعمار</span></span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav me-auto gap-1">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="bi bi-house me-1"></i>الرئيسية
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                    <i class="bi bi-buildings me-1"></i>المشاريع
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('volunteers.index') || request()->routeIs('volunteers.show') ? 'active' : '' }}" href="{{ route('volunteers.index') }}">
                    <i class="bi bi-people me-1"></i>المتطوعون
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('volunteers.leaderboard') ? 'active' : '' }}" href="{{ route('volunteers.leaderboard') }}">
                    <i class="bi bi-trophy me-1"></i>المتصدرون
                </a>
            </li>
        </ul>

        <div class="d-flex align-items-center gap-2">
            @auth
                {{-- Notifications --}}
                <a href="{{ route('notifications.index') }}" class="btn btn-light btn-sm position-relative" style="border-radius:50%;width:38px;height:38px;padding:0;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-bell"></i>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="notification-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                </a>

                {{-- User Dropdown --}}
                <div class="dropdown">
                    <button class="btn btn-light btn-sm d-flex align-items-center gap-2" data-bs-toggle="dropdown" style="border-radius:25px;padding:6px 14px;">
                        <img src="{{ auth()->user()->avatar_url }}" class="avatar" style="width:28px;height:28px;">
                        <span style="font-size:.9rem;font-weight:600;">{{ auth()->user()->name }}</span>
                        <i class="bi bi-chevron-down" style="font-size:.7rem;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start shadow border-0" style="border-radius:var(--radius);min-width:200px;">
                        <li><h6 class="dropdown-header text-muted">{{ auth()->user()->role_arabic }}</h6></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-grid me-2"></i>لوحة التحكم</a></li>
                        @if(auth()->user()->isVolunteer())
                            <li><a class="dropdown-item" href="{{ route('volunteer.profile') }}"><i class="bi bi-person-gear me-2"></i>ملفي الشخصي</a></li>
                            <li><a class="dropdown-item" href="{{ route('volunteer.applications') }}"><i class="bi bi-clipboard-check me-2"></i>طلباتي</a></li>
                        @endif
                        @if(auth()->user()->isProjectOwner())
                            <li><a class="dropdown-item" href="{{ route('projects.mine') }}"><i class="bi bi-buildings me-2"></i>مشاريعي</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>تسجيل الخروج</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">تسجيل الدخول</a>
                <a href="{{ route('register') }}" class="nav-link btn-nav-primary btn btn-sm">إنشاء حساب</a>
            @endauth
        </div>
    </div>
</nav>

{{-- ═══════════════════ BODY ═══════════════════════ --}}
@if(auth()->check() && !request()->routeIs('home'))
<div class="page-wrapper">
    {{-- SIDEBAR --}}
    <aside class="sidebar">
        @include('layouts.sidebar')
    </aside>

    {{-- CONTENT --}}
    <main class="main-content">
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-x-circle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger mb-4">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>يرجى تصحيح الأخطاء التالية:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</div>
@else
    <main>
        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        @yield('content')

        {{-- Footer --}}
        <footer class="main-footer">
            <div class="container">
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="footer-logo mb-3">🏗️ منصة إعمار</div>
                        <p style="font-size:.9rem;">منصة إلكترونية متكاملة تربط المتطوعين بمشاريع إعادة الإعمار الصغيرة.</p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-white fw-bold mb-3">روابط سريعة</h6>
                        <ul class="list-unstyled" style="font-size:.9rem;">
                            <li class="mb-1"><a href="{{ route('projects.index') }}" class="text-decoration-none" style="color:rgba(255,255,255,.7)">المشاريع</a></li>
                            <li class="mb-1"><a href="{{ route('volunteers.index') }}" class="text-decoration-none" style="color:rgba(255,255,255,.7)">المتطوعون</a></li>
                            <li class="mb-1"><a href="{{ route('register') }}" class="text-decoration-none" style="color:rgba(255,255,255,.7)">انضم إلينا</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6 class="text-white fw-bold mb-3">إحصائيات المنصة</h6>
                        <div style="font-size:.9rem;">
                            <div class="mb-1">🏗️ {{ \App\Models\Project::count() }} مشروع مسجّل</div>
                            <div class="mb-1">👥 {{ \App\Models\User::where('role','volunteer')->count() }} متطوع فعّال</div>
                            <div>✅ {{ \App\Models\Project::where('status','completed')->count() }} مشروع مكتمل</div>
                        </div>
                    </div>
                </div>
                <hr style="border-color:rgba(255,255,255,.1)">
                <p class="text-center mb-0" style="font-size:.85rem;">© {{ date('Y') }} منصة إعمار - جميع الحقوق محفوظة | صُنع بـ ❤️ لخدمة المجتمع</p>
            </div>
        </footer>
    </main>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-dismiss alerts after 5s
    setTimeout(() => {
        document.querySelectorAll('.alert-dismissible').forEach(a => {
            let bsAlert = bootstrap.Alert.getOrCreateInstance(a);
            bsAlert.close();
        });
    }, 5000);
</script>
@stack('scripts')
</body>
</html>