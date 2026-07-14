<?php

use App\Http\Controllers\{
    DashboardController,
    ProjectController,
    VolunteerController,
    TaskController,
    ApplicationController,
    RatingController,
    ProjectUpdateController,
    DonationController,
    NotificationController,
    AdminController,
    ProjectFinanceController,
    ProjectMilestoneController,
    ProjectMediaController,
    ProjectApprovalController,
    ProjectTimelineController,
};
use Illuminate\Support\Facades\Route;

// ─── Public Routes ───────────────────────────────────────────
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/volunteers', [VolunteerController::class, 'index'])->name('volunteers.index');
Route::get('/volunteers/leaderboard', [VolunteerController::class, 'leaderboard'])->name('volunteers.leaderboard');
Route::get('/volunteers/{volunteer}', [VolunteerController::class, 'show'])->name('volunteers.show');

Route::get('/terms',   fn() => view('pages.terms'))->name('terms');
Route::get('/privacy', fn() => view('pages.privacy'))->name('privacy');

// ─── Auth Routes ────────────────────────────────────────────
require __DIR__.'/auth.php';

// ─── Authenticated Routes ────────────────────────────────────
Route::middleware('auth')->group(function () {

    // Dashboard (handles all roles)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    // ═══════════════════════════════════════════════════════════
    // طلب الدكتور رقم 5: المتابعة الشاملة (Timeline)
    // متاحة لأي مستخدم مصرّح له بمشاهدة المشروع (Policy تتحقق داخلياً)
    // وُضعت هنا، قبل أي مسار {project} عام، لتفادي أي تعارض بالترتيب
    // ═══════════════════════════════════════════════════════════
    Route::get('/projects/{project}/timeline', [ProjectTimelineController::class, 'show'])
        ->name('projects.timeline');

    // ═══════════════════════════════════════════════════════════
    // طلب الدكتور رقم 3 (جزء ثاني): معرض الصور والفيديوهات
    // القراءة متاحة لأي مستخدم مسجّل دخول مصرّح له بمشاهدة المشروع
    // ═══════════════════════════════════════════════════════════
    Route::get('/projects/{project}/media', [ProjectMediaController::class, 'index'])->name('media.index');
    Route::get('/projects/{project}/media/compare/{milestone}', [ProjectMediaController::class, 'compare'])->name('media.compare');

    // ═══════════════════════════════════════════════════════════
    // طلب الدكتور رقم 4: عرض الموافقات الخطية (القراءة)
    // ═══════════════════════════════════════════════════════════
    Route::get('/projects/{project}/approvals', [ProjectApprovalController::class, 'index'])->name('approvals.index');

    // ─── Project Owner & Admin ───────────────────────────────
    Route::middleware('role:project_owner,admin')->group(function () {
        // IMPORTANT: /projects/create MUST come before /projects/{project}
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/my-projects', [ProjectController::class, 'myProjects'])->name('projects.mine');

        // Applications
        Route::get('/projects/{project}/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::post('/applications/{application}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');
        Route::post('/applications/{application}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');

        // Tasks
        Route::get('/projects/{project}/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

        // Project Updates
        Route::post('/projects/{project}/updates', [ProjectUpdateController::class, 'store'])->name('projects.updates.store');
        Route::delete('/project-updates/{update}', [ProjectUpdateController::class, 'destroy'])->name('projects.updates.destroy');

        // Edit / Delete project
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::post('/projects/{project}/upload-after', [ProjectController::class, 'uploadAfterImages'])->name('projects.uploadAfter');

        // ═══════════════════════════════════════════════════════
        // طلب الدكتور رقم 1: المتابعة المالية (إضافة/إدارة)
        // ═══════════════════════════════════════════════════════
        Route::get('/projects/{project}/finances', [ProjectFinanceController::class, 'index'])->name('finances.index');
        Route::get('/projects/{project}/finances/create', [ProjectFinanceController::class, 'create'])->name('finances.create');
        Route::post('/projects/{project}/finances', [ProjectFinanceController::class, 'store'])->name('finances.store');
        Route::delete('/finances/{finance}', [ProjectFinanceController::class, 'destroy'])->name('finances.destroy');

        // ═══════════════════════════════════════════════════════
        // طلب الدكتور رقم 3 (جزء أول): مراحل المشروع (Milestones)
        // ═══════════════════════════════════════════════════════
        Route::post('/projects/{project}/milestones', [ProjectMilestoneController::class, 'store'])->name('milestones.store');
        Route::put('/milestones/{milestone}', [ProjectMilestoneController::class, 'update'])->name('milestones.update');
        Route::post('/milestones/{milestone}/status', [ProjectMilestoneController::class, 'updateStatus'])->name('milestones.status');
        Route::delete('/milestones/{milestone}', [ProjectMilestoneController::class, 'destroy'])->name('milestones.destroy');
        Route::post('/projects/{project}/milestones/reorder', [ProjectMilestoneController::class, 'reorder'])->name('milestones.reorder');

        // رفع الوسائط (صور/فيديوهات قبل وبعد)
        Route::post('/projects/{project}/media', [ProjectMediaController::class, 'store'])->name('media.store');
        Route::delete('/media/{media}', [ProjectMediaController::class, 'destroy'])->name('media.destroy');

        // ═══════════════════════════════════════════════════════
        // طلب الدكتور رقم 4: رفع الموافقة الخطية (لصاحب المشروع)
        // ═══════════════════════════════════════════════════════
        Route::post('/projects/{project}/approvals', [ProjectApprovalController::class, 'store'])->name('approvals.store');
        Route::delete('/approvals/{approval}', [ProjectApprovalController::class, 'destroy'])->name('approvals.destroy');
    });

    // ─── Volunteer Routes ────────────────────────────────────
    Route::middleware('role:volunteer')->group(function () {
        Route::get('/my-profile', [VolunteerController::class, 'profile'])->name('volunteer.profile');
        Route::post('/my-profile', [VolunteerController::class, 'updateProfile'])->name('volunteer.profile.update');
        Route::post('/projects/{project}/apply', [VolunteerController::class, 'apply'])->name('volunteer.apply');
        Route::get('/my-applications', [VolunteerController::class, 'myApplications'])->name('volunteer.applications');
    });

    // Task status update (volunteer + owner + admin)
    Route::post('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
         ->middleware('role:volunteer,project_owner,admin')
         ->name('tasks.status');

    // Ratings & Donations (any authenticated user)
    Route::post('/projects/{project}/rate', [RatingController::class, 'store'])->name('ratings.store');
    Route::post('/projects/{project}/donate', [DonationController::class, 'store'])->name('donations.store');

    // ─── Admin Routes ────────────────────────────────────────
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {

        // Users
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');
        Route::post('/users/{user}/toggle', [AdminController::class, 'toggleUser'])->name('users.toggle');
        Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');

        // Projects
        Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
        Route::post('/projects/{project}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
        Route::post('/projects/{project}/reject', [ProjectController::class, 'reject'])->name('projects.reject');
        Route::post('/projects/{project}/start', [ProjectController::class, 'start'])->name('projects.start');
        Route::post('/projects/{project}/complete', [ProjectController::class, 'complete'])->name('projects.complete');

        // Announcements
        Route::get('/announcements', [AdminController::class, 'announcements'])->name('announcements');
        Route::get('/announcements/create', [AdminController::class, 'createAnnouncement'])->name('announcements.create');
        Route::post('/announcements', [AdminController::class, 'storeAnnouncement'])->name('announcements.store');
        Route::delete('/announcements/{announcement}', [AdminController::class, 'destroyAnnouncement'])->name('announcements.destroy');

        // Settings & Cache
        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('settings');
        Route::post('/cache/clear', function () {
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('view:clear');
            return back()->with('success', 'تم مسح الكاش بنجاح.');
        })->name('cache.clear');

        // Reports & Donations
        Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
        Route::get('/donations', [AdminController::class, 'donations'])->name('donations');

        // ═══════════════════════════════════════════════════════
        // طلب الدكتور رقم 1: اعتماد/رفض الحركات المالية (للمشرف فقط)
        // ═══════════════════════════════════════════════════════
        Route::post('/finances/{finance}/verify', [ProjectFinanceController::class, 'verify'])->name('finances.verify');
        Route::post('/finances/{finance}/reject', [ProjectFinanceController::class, 'reject'])->name('finances.reject');

        // ═══════════════════════════════════════════════════════
        // طلب الدكتور رقم 4: اعتماد/رفض الموافقات الخطية (للمشرف فقط)
        // ═══════════════════════════════════════════════════════
        Route::post('/approvals/{approval}/approve', [ProjectApprovalController::class, 'approve'])->name('approvals.approve');
        Route::post('/approvals/{approval}/reject', [ProjectApprovalController::class, 'reject'])->name('approvals.reject');
    });
});

// ─── Public project routes (after auth group to avoid conflicts) ──
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::middleware(['auth', 'role:committee'])->group(function () {
    Route::get('/committee/reviews', [CommitteeController::class, 'index'])->name('committee.reviews');
    Route::post('/committee/review/{project}', [CommitteeController::class, 'review'])->name('committee.review');
});

use App\Http\Controllers\ProjectVerificationController;

// مسارات لوحة اللجنة
Route::middleware(['auth'])->prefix('committee')->name('committee.')->group(function () {
    Route::get('/reviews', [ProjectVerificationController::class, 'index'])->name('index');
    Route::get('/review/{project}', [ProjectVerificationController::class, 'show'])->name('show');
    Route::post('/review/{project}', [ProjectVerificationController::class, 'review'])->name('review');
});

