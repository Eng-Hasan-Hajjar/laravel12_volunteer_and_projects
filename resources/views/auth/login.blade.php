<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة إعمار</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&family=Cairo:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary:#2E7D4F; --primary-light:#4CAF72; --primary-pale:#E8F5EE;
            --accent:#F4A024; --text-dark:#1A2332; --text-mid:#4A5568; --border:#E2E8F0;
        }
        * { box-sizing: border-box; }
        body { font-family:'Tajawal',sans-serif; margin:0; min-height:100vh; display:flex; background:#f7f9fc; }
        .auth-left {
            width: 45%;
            background: linear-gradient(160deg, var(--primary) 0%, #1B5E35 60%, #0f3d22 100%);
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            padding: 60px 48px; color: #fff; position: relative; overflow: hidden;
        }
        .auth-left::before {
            content: '';
            position: absolute; top: -100px; right: -100px;
            width: 400px; height: 400px; border-radius: 50%;
            background: rgba(255,255,255,.05);
        }
        .auth-left::after {
            content: '';
            position: absolute; bottom: -80px; left: -80px;
            width: 300px; height: 300px; border-radius: 50%;
            background: rgba(244,160,36,.1);
        }
        .auth-brand { font-family:'Cairo',sans-serif; font-size:2rem; font-weight:900; margin-bottom:8px; }
        .auth-tagline { opacity:.8; font-size:1rem; text-align:center; margin-bottom:48px; }
        .auth-feature {
            display: flex; align-items: center; gap: 14px;
            background: rgba(255,255,255,.1); border-radius: 12px;
            padding: 14px 18px; margin-bottom: 12px; width: 100%; max-width: 340px;
        }
        .auth-feature-icon { font-size:1.5rem; flex-shrink:0; }
        .auth-feature h6 { margin:0 0 2px; font-weight:700; font-size:.92rem; }
        .auth-feature p { margin:0; font-size:.8rem; opacity:.75; }

        .auth-right {
            flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px;
        }
        .auth-box {
            width: 100%; max-width: 420px;
            background: #fff; border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0,0,0,.1);
            padding: 44px 40px;
        }
        .auth-title { font-family:'Cairo',sans-serif; font-size:1.7rem; font-weight:900; color:var(--text-dark); margin-bottom:6px; }
        .auth-sub { color:var(--text-mid); font-size:.92rem; margin-bottom:32px; }
        .form-label { font-weight:600; font-size:.88rem; color:var(--text-mid); margin-bottom:5px; }
        .form-control {
            border-radius:10px; border:1.5px solid var(--border);
            padding:11px 14px; font-family:'Tajawal',sans-serif;
            font-size:.95rem; transition: all .2s;
        }
        .form-control:focus { border-color:var(--primary); box-shadow:0 0 0 3px rgba(46,125,79,.12); outline:none; }
        .input-group-text {
            border-radius:10px 0 0 10px; background:var(--primary-pale);
            border:1.5px solid var(--border); border-left:none; color:var(--primary);
        }
        .btn-auth {
            width:100%; padding:13px; border-radius:10px; font-weight:700;
            font-size:1rem; border:none; cursor:pointer; transition:all .2s;
            background:linear-gradient(135deg, var(--primary), var(--primary-light));
            color:#fff; font-family:'Tajawal',sans-serif;
        }
        .btn-auth:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(46,125,79,.35); }
        .divider { display:flex; align-items:center; gap:12px; margin:20px 0; }
        .divider::before, .divider::after { content:''; flex:1; height:1px; background:var(--border); }
        .divider span { font-size:.82rem; color:#aaa; }
        .is-invalid { border-color:#dc3545 !important; }
        .invalid-feedback { display:block; font-size:.82rem; color:#dc3545; margin-top:4px; }
        @media(max-width:768px) { .auth-left{display:none;} .auth-right{padding:20px;} }
    </style>
</head>
<body>
<div class="auth-left">
    <div class="position-relative z-1 text-center">
        <div class="auth-brand">🏗️ منصة إعمار</div>
        <p class="auth-tagline">ربط المتطوعين بمشاريع إعادة الإعمار</p>

        <div class="auth-feature">
            <div class="auth-feature-icon">🤝</div>
            <div>
                <h6>نظام مطابقة ذكي</h6>
                <p>ربطك بالمشروع المناسب لمهاراتك</p>
            </div>
        </div>
        <div class="auth-feature">
            <div class="auth-feature-icon">📊</div>
            <div>
                <h6>تتبع التقدم</h6>
                <p>متابعة إنجازاتك ونقاطك لحظة بلحظة</p>
            </div>
        </div>
        <div class="auth-feature">
            <div class="auth-feature-icon">🏆</div>
            <div>
                <h6>نظام المكافآت</h6>
                <p>اكسب نقاط وشارات على كل مشروع تكمله</p>
            </div>
        </div>
    </div>
</div>

<div class="auth-right">
    <div class="auth-box">
        <h1 class="auth-title">مرحباً بعودتك 👋</h1>
        <p class="auth-sub">سجّل دخولك للمتابعة من حيث توقفت</p>

        @if($errors->any())
            <div style="background:#fecaca;color:#b91c1c;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:.9rem;">
                <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="example@email.com" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between">
                    <label class="form-label">كلمة المرور</label>
                    <a href="{{ route('password.request') }}" style="font-size:.82rem;color:var(--primary);text-decoration:none;">نسيت كلمة المرور؟</a>
                </div>
                <div class="position-relative">
                    <input type="password" name="password" id="pwField"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••" required>
                    <button type="button" onclick="togglePw()"
                        style="position:absolute;left:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#aaa;cursor:pointer;">
                        <i class="bi bi-eye" id="pwIcon"></i>
                    </button>
                </div>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <label class="d-flex align-items-center gap-2" style="cursor:pointer;font-size:.9rem;color:var(--text-mid);">
                    <input type="checkbox" name="remember" style="accent-color:var(--primary);">
                    تذكّرني
                </label>
            </div>

            <button type="submit" class="btn-auth">
                <i class="bi bi-box-arrow-in-right me-2"></i>تسجيل الدخول
            </button>
        </form>

        <div class="divider"><span>أو</span></div>

        <p class="text-center mb-0" style="font-size:.9rem;color:var(--text-mid);">
            ليس لديك حساب؟
            <a href="{{ route('register') }}" style="color:var(--primary);font-weight:700;text-decoration:none;">أنشئ حساباً مجانياً</a>
        </p>
    </div>
</div>

<script>
function togglePw() {
    const f = document.getElementById('pwField');
    const i = document.getElementById('pwIcon');
    f.type = f.type === 'password' ? 'text' : 'password';
    i.className = f.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
}
</script>
</body>
</html>