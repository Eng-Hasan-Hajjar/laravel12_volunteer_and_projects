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
};
use Illuminate\Support\Facades\Route;

// ─── Public Routes ───────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/volunteers', [VolunteerController::class, 'index'])->name('volunteers.index');
Route::get('/volunteers/leaderboard', [VolunteerController::class, 'leaderboard'])->name('volunteers.leaderboard');
Route::get('/volunteers/{volunteer}', [VolunteerController::class, 'show'])->name('volunteers.show');

// ─── Auth Routes (Breeze) ────────────────────────────────────
require __DIR__.'/auth.php';

// ─── Authenticated Routes ────────────────────────────────────
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    // ─── Project Owner & Admin ───────────────────────────────
    Route::middleware('role:project_owner,admin')->group(function () {
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::post('/projects/{project}/upload-after', [ProjectController::class, 'uploadAfterImages'])->name('projects.uploadAfter');
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
    });

    // ─── Volunteer Routes ────────────────────────────────────
    Route::middleware('role:volunteer')->group(function () {
        Route::get('/my-profile', [VolunteerController::class, 'profile'])->name('volunteer.profile');
        Route::post('/my-profile', [VolunteerController::class, 'updateProfile'])->name('volunteer.profile.update');
        Route::post('/projects/{project}/apply', [VolunteerController::class, 'apply'])->name('volunteer.apply');
        Route::get('/my-applications', [VolunteerController::class, 'myApplications'])->name('volunteer.applications');
    });

    // Allow volunteers to update their own task status
    Route::post('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
         ->middleware('role:volunteer,project_owner,admin')
         ->name('tasks.status');

    // Ratings (any authenticated user)
    Route::post('/projects/{project}/rate', [RatingController::class, 'store'])->name('ratings.store');

    // Donations (any authenticated user)
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
        Route::get('/settings', function() { return view('admin.settings'); })->name('settings');
        Route::post('/cache/clear', function() {
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('view:clear');
            return back()->with('success', 'تم مسح الكاش بنجاح.');
        })->name('cache.clear');

        // Reports & Donations
        Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
        Route::get('/donations', [AdminController::class, 'donations'])->name('donations');
    });
});