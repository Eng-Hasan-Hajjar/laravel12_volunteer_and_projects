<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - منصة إعمار</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&family=Cairo:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --primary:#2E7D4F; --primary-light:#4CAF72; --primary-pale:#E8F5EE; --accent:#F4A024; --text-dark:#1A2332; --text-mid:#4A5568; --border:#E2E8F0; }
        body { font-family:'Tajawal',sans-serif; background:linear-gradient(135deg,#f0faf4 0%,#fff8ed 100%); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:30px 16px; }
        .register-box {
            width:100%; max-width:580px;
            background:#fff; border-radius:20px;
            box-shadow:0 8px 40px rgba(0,0,0,.10); overflow:hidden;
        }
        .reg-header {
            background:linear-gradient(135deg,var(--primary),#1B5E35);
            color:#fff; padding:32px 40px; text-align:center;
        }
        .reg-header h1 { font-family:'Cairo',sans-serif; font-weight:900; font-size:1.6rem; margin-bottom:4px; }
        .reg-header p { opacity:.85; font-size:.92rem; margin:0; }
        .reg-body { padding:36px 40px; }
        .form-label { font-weight:600; font-size:.88rem; color:var(--text-mid); margin-bottom:5px; }
        .form-control, .form-select {
            border-radius:10px; border:1.5px solid var(--border);
            padding:11px 14px; font-family:'Tajawal',sans-serif; font-size:.95rem; transition:all .2s;
        }
        .form-control:focus, .form-select:focus { border-color:var(--primary); box-shadow:0 0 0 3px rgba(46,125,79,.12); outline:none; }
        .role-selector { display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:20px; }
        .role-option input { display:none; }
        .role-option label {
            display:flex; flex-direction:column; align-items:center; gap:8px;
            padding:16px 12px; border:2px solid var(--border); border-radius:12px;
            cursor:pointer; transition:all .2s; text-align:center;
        }
        .role-option label:hover { border-color:var(--primary); background:var(--primary-pale); }
        .role-option input:checked + label { border-color:var(--primary); background:var(--primary-pale); }
        .role-emoji { font-size:2rem; }
        .role-name { font-weight:700; font-size:.92rem; color:var(--text-dark); }
        .role-desc { font-size:.78rem; color:var(--text-mid); line-height:1.4; }
        .btn-register {
            width:100%; padding:13px; border-radius:10px; font-weight:700;
            font-size:1rem; border:none; cursor:pointer; transition:all .2s;
            background:linear-gradient(135deg,var(--primary),var(--primary-light));
            color:#fff; font-family:'Tajawal',sans-serif; margin-top:8px;
        }
        .btn-register:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(46,125,79,.35); }
        .is-invalid { border-color:#dc3545 !important; }
        .invalid-feedback { display:block; font-size:.82rem; color:#dc3545; margin-top:4px; }
        .password-strength { height:4px; border-radius:2px; margin-top:6px; transition:all .3s; }
        @media(max-width:576px) { .reg-body{padding:24px 20px;} .reg-header{padding:24px 20px;} }
    </style>
</head>
<body>
<div class="register-box">
    <div class="reg-header">
        <a href="{{ route('home') }}" style="color:rgba(255,255,255,.7);text-decoration:none;font-size:.85rem;display:block;margin-bottom:12px;">
            <i class="bi bi-arrow-right me-1"></i>العودة للرئيسية
        </a>
        <h1>🏗️ إنشاء حساب جديد</h1>
        <p>انضم إلى مجتمع المتطوعين وكن جزءاً من إعادة البناء</p>
    </div>

    <div class="reg-body">
        @if($errors->any())
            <div style="background:#fecaca;color:#b91c1c;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:.9rem;">
                <i class="bi bi-exclamation-circle me-2"></i>
                <ul class="mb-0 mt-1 ps-3">@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Role Selection --}}
            <div class="mb-4">
                <label class="form-label d-block mb-2">أنا أريد التسجيل كـ</label>
                <div class="role-selector">
                    <div class="role-option">
                        <input type="radio" name="role" id="role_volunteer" value="volunteer"
                            {{ old('role','volunteer') === 'volunteer' ? 'checked' : '' }}>
                        <label for="role_volunteer">
                            <span class="role-emoji">🙋</span>
                            <span class="role-name">متطوع</span>
                            <span class="role-desc">أقدّم مهاراتي لمساعدة المتضررين</span>
                        </label>
                    </div>
                    <div class="role-option">
                        <input type="radio" name="role" id="role_owner" value="project_owner"
                            {{ old('role') === 'project_owner' ? 'checked' : '' }}>
                        <label for="role_owner">
                            <span class="role-emoji">🏪</span>
                            <span class="role-name">صاحب مشروع</span>
                            <span class="role-desc">أبحث عن متطوعين لإعادة إعمار مشروعي</span>
                        </label>
                    </div>
               </div>
                @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- تظهر فقط عند اختيار "متطوع" --}}
            <div class="mb-4" id="volunteerSkillsSection">
                <label class="form-label d-block mb-2">
                    ما هي مهاراتك؟
                    <span class="text-muted" style="font-weight:400;">(اختياري، بتساعدنا نرشّح لك المشاريع المناسبة)</span>
                </label>
                <div class="row g-2">
                    @foreach(\App\Models\VolunteerProfile::allSkills() as $key => $label)
                    <div class="col-6 col-md-4">
                        <label class="d-flex align-items-center gap-2 p-2 border rounded-2" style="cursor:pointer;">
                            <input type="checkbox" name="skills[]" value="{{ $key }}"
                                {{ in_array($key, old('skills', [])) ? 'checked' : '' }}
                                style="accent-color:var(--primary);">
                            <span style="font-size:.88rem;">{{ $label }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                @error('skills')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            </div>

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">الاسم الكامل <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="أدخل اسمك الكامل" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="example@email.com" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">رقم الهاتف</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}"
                        class="form-control @error('phone') is-invalid @enderror"
                        placeholder="09XXXXXXXX">
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">المدينة</label>
                    <select name="city" class="form-select @error('city') is-invalid @enderror">
                        <option value="">اختر مدينتك</option>
                        @foreach(['دمشق','حلب','حمص','حماة','اللاذقية','طرطوس','درعا','السويداء','دير الزور','الرقة','القامشلي','إدلب'] as $city)
                            <option value="{{ $city }}" {{ old('city') === $city ? 'selected' : '' }}>{{ $city }}</option>
                        @endforeach
                    </select>
                    @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">كلمة المرور <span class="text-danger">*</span></label>
                    <div class="position-relative">
                        <input type="password" name="password" id="pw1"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="8 أحرف على الأقل" required oninput="checkStrength(this.value)">
                        <button type="button" onclick="togglePw('pw1','icon1')"
                            style="position:absolute;left:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#aaa;cursor:pointer;">
                            <i class="bi bi-eye" id="icon1"></i>
                        </button>
                    </div>
                    <div class="password-strength mt-1" id="strengthBar" style="background:var(--border);"></div>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label">تأكيد كلمة المرور <span class="text-danger">*</span></label>
                    <div class="position-relative">
                        <input type="password" name="password_confirmation" id="pw2"
                            class="form-control" placeholder="أعد إدخال كلمة المرور" required>
                        <button type="button" onclick="togglePw('pw2','icon2')"
                            style="position:absolute;left:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#aaa;cursor:pointer;">
                            <i class="bi bi-eye" id="icon2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-3">
                <label class="d-flex align-items-start gap-2" style="cursor:pointer;font-size:.88rem;color:var(--text-mid);">
                    <input type="checkbox" required style="accent-color:var(--primary);margin-top:2px;flex-shrink:0;">
                    أوافق على <a href="{{ route('terms') }}" style="color:var(--primary);">شروط الاستخدام</a> و<a href="{{ route('privacy') }}" style="color:var(--primary);">سياسة الخصوصية</a>
                </label>
            </div>

            <button type="submit" class="btn-register">
                <i class="bi bi-person-check me-2"></i>إنشاء الحساب
            </button>
        </form>

        <p class="text-center mt-4 mb-0" style="font-size:.9rem;color:var(--text-mid);">
            لديك حساب بالفعل؟
            <a href="{{ route('login') }}" style="color:var(--primary);font-weight:700;text-decoration:none;">سجّل دخولك</a>
        </p>
    </div>
</div>

<script>
function togglePw(id, iconId) {
    const f = document.getElementById(id);
    const i = document.getElementById(iconId);
    f.type = f.type === 'password' ? 'text' : 'password';
    i.className = f.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
}
function checkStrength(pw) {
    const bar = document.getElementById('strengthBar');
    let score = 0;
    if (pw.length >= 8) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;
    const colors = ['#ef4444','#f59e0b','#22c55e','#16a34a'];
    const widths  = ['25%','50%','75%','100%'];
    bar.style.background = colors[score-1] || '#e2e8f0';
    bar.style.width      = widths[score-1] || '0%';
}

function toggleSkillsSection() {
    const isVolunteer = document.getElementById('role_volunteer').checked;
    document.getElementById('volunteerSkillsSection').style.display = isVolunteer ? 'block' : 'none';
}
document.getElementById('role_volunteer').addEventListener('change', toggleSkillsSection);
document.getElementById('role_owner').addEventListener('change', toggleSkillsSection);
document.addEventListener('DOMContentLoaded', toggleSkillsSection);


</script>
</body>
</html>