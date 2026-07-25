@extends('layouts.app')
@section('title', 'الرئيسية')

@push('styles')
<style>
html { scroll-behavior: smooth; }
.hero {
    min-height: 90vh;
    background: linear-gradient(135deg, #f0faf4 0%, #e8f5ee 40%, #fff8ed 100%);
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}
.hero::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 500px; height: 500px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(46,125,79,.08) 0%, transparent 70%);
}
.hero::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -80px;
    width: 400px; height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(244,160,36,.07) 0%, transparent 70%);
}
.hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--primary-pale); color: var(--primary);
    border-radius: 25px; padding: 6px 16px; font-size: .88rem; font-weight: 600;
    border: 1px solid rgba(46,125,79,.2);
    margin-bottom: 24px;
}
.hero h1 {
    font-family: 'Cairo', sans-serif;
    font-size: clamp(2rem, 5vw, 3.4rem);
    font-weight: 900;
    line-height: 1.2;
    color: var(--text-dark);
    margin-bottom: 20px;
}
.hero h1 .highlight {
    color: var(--primary);
    position: relative;
}
.hero p.lead {
    font-size: 1.1rem;
    color: var(--text-mid);
    max-width: 520px;
    line-height: 1.8;
}
.hero-visual {
    position: relative;
    z-index: 1;
}

/* ─── Impact Showcase Card (بدون أي بيانات مشروع منفرد، فقط أرقام إجمالية بسيطة) ─── */
.impact-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 25px 70px rgba(0,0,0,.14);
    overflow: hidden;
    transition: transform .3s;
}
.impact-card:hover { transform: translateY(-6px); }
.impact-header {
    background: linear-gradient(135deg, var(--primary), #1B5E35);
    color: #fff;
    padding: 26px 28px;
    display: flex;
    align-items: center;
    gap: 16px;
    position: relative;
    overflow: hidden;
}
.impact-header::after {
    content: '🏗️';
    position: absolute;
    font-size: 6rem;
    opacity: .1;
    left: -10px; bottom: -25px;
}
.impact-header-icon {
    width: 54px; height: 54px;
    border-radius: 14px;
    background: rgba(255,255,255,.18);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.6rem;
    flex-shrink: 0;
    position: relative; z-index: 1;
}
.impact-header-title { font-family:'Cairo',sans-serif; font-weight:900; font-size:1.2rem; position:relative; z-index:1; }
.impact-header-sub { font-size:.85rem; opacity:.85; margin-top:2px; position:relative; z-index:1; }

.impact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1px;
    background: var(--border);
}
.impact-tile {
    background: #fff;
    padding: 26px 20px;
    text-align: center;
    transition: background .2s;
}
.impact-tile:hover { background: var(--primary-pale); }
.impact-icon {
    width: 46px; height: 46px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.35rem;
    margin: 0 auto 12px;
}
.impact-num {
    font-family: 'Cairo', sans-serif;
    font-size: 1.9rem;
    font-weight: 900;
    color: var(--text-dark);
    line-height: 1;
}
.impact-label {
    font-size: .82rem;
    color: var(--text-mid);
    margin-top: 6px;
    font-weight: 600;
}
.impact-footer {
    padding: 14px 20px;
    text-align: center;
    font-size: .78rem;
    color: var(--text-light);
    background: #fafbfc;
    border-top: 1px solid var(--border);
}

/* How It Works */
.step-card {
    text-align: center;
    padding: 32px 20px;
    border-radius: var(--radius);
    background: #fff;
    border: 1px solid var(--border);
    transition: all .25s;
    height: 100%;
}
.step-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.step-num {
    width: 56px; height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    color: #fff;
    font-size: 1.4rem;
    font-weight: 900;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px;
    font-family: 'Cairo', sans-serif;
}
.step-icon {
    font-size: 2.5rem;
    margin-bottom: 16px;
    display: block;
}

/* Role Cards */
.role-card {
    border-radius: var(--radius);
    padding: 32px 24px;
    text-align: center;
    transition: all .25s;
    cursor: pointer;
    text-decoration: none;
    display: block;
    height: 100%;
}
.role-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.role-card.volunteer { background: linear-gradient(135deg,#E8F5EE,#d4ead9); border: 2px solid rgba(46,125,79,.2); }
.role-card.owner     { background: linear-gradient(135deg,#FFF3DC,#fde9b8); border: 2px solid rgba(244,160,36,.3); }
.role-icon { font-size: 3.5rem; margin-bottom: 16px; }

/* Stats Strip */
.stats-strip {
    background: linear-gradient(135deg, var(--primary) 0%, #1B5E35 100%);
    padding: 50px 0;
    color: #fff;
}
.stat-strip-item { text-align: center; }
.stat-strip-num {
    font-size: 2.8rem; font-weight: 900;
    font-family: 'Cairo', sans-serif; line-height: 1;
}
.stat-strip-label { font-size: .9rem; opacity: .8; margin-top: 4px; }

/* Announcements */
.announcement-card {
    border-radius: var(--radius);
    border: 1px solid var(--border);
    transition: all .25s;
    height: 100%;
}
.announcement-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
</style>
@endpush

@section('content')

{{-- ═══════════ HERO ══════════════ --}}
<section class="hero">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 fade-in-up">
                <div class="hero-badge">
                    <i class="bi bi-stars"></i> منصة التطوع الأولى لإعادة الإعمار
                </div>
                <h1>
                    معاً نُعيد بناء<br>
                    <span class="highlight">مجتمعنا</span> من جديد
                </h1>
                <p class="lead mb-32">
                    منصة إلكترونية متكاملة تربط المتطوعين بمشاريع إعادة إعمار الشركات الصغيرة المتضررة. سجّل، تطوّع، وكُن جزءاً من التغيير.
                </p>
                <div class="d-flex gap-3 flex-wrap mt-4">
                    <a href="#join" class="btn btn-primary btn-lg px-4" style="border-radius:12px;font-weight:700;">
                        <i class="bi bi-signpost-2 me-2"></i>ابدأ رحلتك معنا
                    </a>
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-primary btn-lg px-4" style="border-radius:12px;font-weight:700;">
                        <i class="bi bi-eye me-2"></i>تصفح المشاريع
                    </a>
                </div>
                <div class="d-flex gap-4 mt-4">
                    <div style="font-size:.85rem;color:var(--text-mid);">
                        <i class="bi bi-check-circle-fill text-success me-1"></i>مجاني تماماً
                    </div>
                    <div style="font-size:.85rem;color:var(--text-mid);">
                        <i class="bi bi-check-circle-fill text-success me-1"></i>سهل الاستخدام
                    </div>
                    <div style="font-size:.85rem;color:var(--text-mid);">
                        <i class="bi bi-check-circle-fill text-success me-1"></i>تأثير حقيقي
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-visual">
                <div class="position-relative px-4">
                    <div class="impact-card">
                        <div class="impact-header">
                            <div class="impact-header-icon">🏗️</div>
                            <div>
                                <div class="impact-header-title">أثرنا سوا</div>
                                <div class="impact-header-sub">أرقام حقيقية من مجتمعنا المتنامي</div>
                            </div>
                        </div>
                        <div class="impact-grid">
                            <div class="impact-tile">
                                <div class="impact-icon" style="background:var(--primary-pale);color:var(--primary);">🏗️</div>
                                <div class="impact-num">{{ number_format($totalProjects) }}</div>
                                <div class="impact-label">مشروع مسجّل</div>
                            </div>
                            <div class="impact-tile">
                                <div class="impact-icon" style="background:var(--accent-light);color:var(--accent);">🙋</div>
                                <div class="impact-num">{{ number_format($totalVolunteers) }}</div>
                                <div class="impact-label">متطوع فعّال</div>
                            </div>
                            <div class="impact-tile">
                                <div class="impact-icon" style="background:#dcfce7;color:#15803d;">✅</div>
                                <div class="impact-num">{{ number_format($totalCompleted) }}</div>
                                <div class="impact-label">مشروع مكتمل</div>
                            </div>
                            <div class="impact-tile">
                                <div class="impact-icon" style="background:#fef3c7;color:#b45309;">🏪</div>
                                <div class="impact-num">{{ number_format($totalOwners) }}</div>
                                <div class="impact-label">صاحب مشروع</div>
                            </div>
                        </div>
                        <div class="impact-footer">
                            <i class="bi bi-arrow-repeat me-1"></i>الأرقام تتحدّث تلقائياً لحظة بلحظة
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════ STATS STRIP ══════════════ --}}
<section class="stats-strip">
    <div class="container">
        <div class="row g-4">
            @php
                $statItems = [
                    ['num' => $totalProjects,   'label' => 'مشروع مسجّل',  'icon' => '🏗️'],
                    ['num' => $totalVolunteers, 'label' => 'متطوع فعّال',  'icon' => '🙋'],
                    ['num' => $totalCompleted,  'label' => 'مشروع مكتمل', 'icon' => '✅'],
                    ['num' => $totalOwners,     'label' => 'صاحب مشروع',  'icon' => '🏪'],
                ];
            @endphp
            @foreach($statItems as $s)
                <div class="col-6 col-md-3">
                    <div class="stat-strip-item">
                        <div style="font-size:2rem;margin-bottom:4px;">{{ $s['icon'] }}</div>
                        <div class="stat-strip-num">{{ number_format($s['num']) }}+</div>
                        <div class="stat-strip-label">{{ $s['label'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════ HOW IT WORKS ══════════════ --}}
<section class="py-5 my-3">
    <div class="container">
        <div class="text-center mb-5">
            <span style="background:var(--primary-pale);color:var(--primary);border-radius:25px;padding:5px 18px;font-size:.85rem;font-weight:600;">كيف تعمل المنصة؟</span>
            <h2 class="mt-3" style="font-family:'Cairo',sans-serif;font-weight:900;font-size:2rem;">خطوات بسيطة، تأثير عظيم</h2>
        </div>
        <div class="row g-4">
            @php
                $steps = [
                    ['num'=>'1','icon'=>'👤','title'=>'أنشئ حسابك','desc'=>'سجّل كمتطوع لتقديم مهاراتك، أو كصاحب مشروع للحصول على الدعم.'],
                    ['num'=>'2','icon'=>'🔍','title'=>'استكشف المشاريع','desc'=>'تصفح المشاريع المتاحة حسب المدينة والنوع والمهارة المطلوبة.'],
                    ['num'=>'3','icon'=>'🤝','title'=>'تواصل وتطوع','desc'=>'تقدّم للمشاريع التي تناسب مهاراتك وأوقات فراغك.'],
                    ['num'=>'4','icon'=>'🏆','title'=>'أنجز واحتفل','desc'=>'تتبّع تقدّم العمل واكتسب نقاط الإنجاز واحتفل مع فريقك.'],
                ];
            @endphp
            @foreach($steps as $step)
                <div class="col-6 col-md-3">
                    <div class="step-card">
                        <div class="step-num">{{ $step['num'] }}</div>
                        <span class="step-icon">{{ $step['icon'] }}</span>
                        <h5 style="font-weight:700;font-family:'Cairo',sans-serif;margin-bottom:10px;">{{ $step['title'] }}</h5>
                        <p style="font-size:.88rem;color:var(--text-mid);margin:0;">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════ LATEST PROJECTS ══════════════ --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 style="font-family:'Cairo',sans-serif;font-weight:900;font-size:1.7rem;margin:0;">أحدث المشاريع</h2>
                <p style="color:var(--text-mid);margin:4px 0 0;">مشاريع تحتاج لمساعدتك الآن</p>
            </div>
            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary btn-sm">عرض الكل <i class="bi bi-arrow-left ms-1"></i></a>
        </div>
        <div class="row g-4">
            @forelse($featuredProjects as $project)
                <div class="col-md-4">
                    <div class="card project-card h-100">
                        <div class="card-img-placeholder" style="background:var(--primary-pale);">
                            {{ match($project->type) {
                                'shop' => '🏪', 'workshop' => '🔧', 'clinic' => '🏥',
                                'bakery' => '🥖', 'restaurant' => '🍽️', 'mosque' => '🕌',
                                default => '🏗️'
                            } }}
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex gap-2 mb-2">
                                <span class="badge priority-{{ $project->priority }}">{{ $project->priority_arabic }}</span>
                                <span class="badge status-{{ $project->status }}">{{ $project->status_arabic }}</span>
                            </div>
                            <h6 class="card-title fw-bold">{{ $project->title }}</h6>
                            <p class="card-text text-muted small flex-grow-1">{{ Str::limit($project->description, 90) }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-2 small text-muted">
                                <span><i class="bi bi-geo-alt me-1"></i>{{ $project->city }}</span>
                                <span><i class="bi bi-people me-1"></i>{{ $project->volunteers_needed }} متطوع</span>
                            </div>
                            <div class="progress mb-3">
                                <div class="progress-bar" style="width:{{ $project->progress_percentage }}%"></div>
                            </div>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm w-100">
                                عرض التفاصيل <i class="bi bi-arrow-left ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">لا توجد مشاريع منشورة بعد</div>
            @endforelse
        </div>
    </div>
</section>

{{-- ═══════════ JOIN AS (نقطة الدخول الوحيدة للتسجيل) ══════════════ --}}
<section class="py-5" id="join">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-family:'Cairo',sans-serif;font-weight:900;font-size:1.8rem;">كيف تريد المشاركة؟</h2>
            <p style="color:var(--text-mid);">اختر الدور المناسب إلك، وبيتحدد تلقائياً بصفحة التسجيل</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <a href="{{ route('register', ['role' => 'volunteer']) }}" class="role-card volunteer">
                    <div class="role-icon">🙋</div>
                    <h4 style="font-family:'Cairo',sans-serif;font-weight:900;color:var(--primary);">متطوع</h4>
                    <p style="color:var(--text-mid);font-size:.95rem;margin:12px 0;">قدّم مهاراتك في النجارة، الكهرباء، البناء، وغيرها لمساعدة المتضررين.</p>
                    <span class="btn btn-primary mt-2">سجّل كمتطوع</span>
                </a>
            </div>
            <div class="col-md-5">
                <a href="{{ route('register', ['role' => 'project_owner']) }}" class="role-card owner">
                    <div class="role-icon">🏪</div>
                    <h4 style="font-family:'Cairo',sans-serif;font-weight:900;color:#b45309;">صاحب مشروع</h4>
                    <p style="color:var(--text-mid);font-size:.95rem;margin:12px 0;">سجّل مشروعك المتضرر واحصل على دعم المتطوعين لإعادة الإعمار بسرعة.</p>
                    <span class="btn btn-warning mt-2 text-dark fw-bold">سجّل مشروعك</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════ ANNOUNCEMENTS ══════════════ --}}
@if($announcements->isNotEmpty())
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span style="background:var(--accent-light);color:var(--accent);border-radius:25px;padding:5px 18px;font-size:.85rem;font-weight:600;">آخر الأخبار</span>
            <h2 class="mt-3" style="font-family:'Cairo',sans-serif;font-weight:900;font-size:2rem;">إعلانات المنصة</h2>
        </div>
        <div class="row g-4">
            @foreach($announcements as $a)
                <div class="col-md-4">
                    <div class="card announcement-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-megaphone-fill" style="color:var(--accent);"></i>
                                <small class="text-muted">{{ $a->created_at->diffForHumans() }}</small>
                            </div>
                            <h6 class="fw-bold mb-2">{{ $a->title }}</h6>
                            <p class="text-muted small mb-0">{{ Str::limit($a->content, 110) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection