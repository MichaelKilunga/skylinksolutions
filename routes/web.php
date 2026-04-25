<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\NewsController;

// ─── Public Website Pages ─────────────────────────────────────────────────────
Route::get('/',                 fn() => view('pages.home.index'));
Route::get('/about',            [\App\Http\Controllers\AboutController::class, 'index']);
Route::get('/contact',          fn() => view('pages.company.contact'));
Route::get('/biometry',         fn() => view('pages.services.biometry'));
Route::get('/cctv-camera',      fn() => view('pages.services.cctv-camera'));
Route::get('/electric-fencing', fn() => view('pages.services.electric-fencing'));
Route::get('/eletric-fencing',  fn() => view('pages.services.electric-fencing')); // legacy
Route::get('/graphics',         fn() => view('pages.services.graphics'));
Route::get('/ict-cleaning',     fn() => view('pages.services.ict-cleaning'));
Route::get('/ict-maintenance',  fn() => view('pages.services.ict-maintenance'));
Route::get('/networking',       fn() => view('pages.services.networking'));
Route::get('/project',          fn() => view('pages.portfolio.project'));
Route::get('/news',             [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}',       [NewsController::class, 'show'])->name('news.show');
Route::get('/remote',           fn() => view('pages.services.remote'));
Route::get('/setups',           fn() => view('pages.services.setups'));
Route::get('/software-development', fn() => view('pages.services.software-development'));

// ─── Public Contact Form ───────────────────────────────────────────────────────
Route::post('/contact/send',      [ContactController::class, 'send'])->name('contact.send');
Route::post('/newsletter/subscribe', [ContactController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/quote/request',       [ContactController::class, 'requestQuote'])->name('quote.request');
Route::post('/volunteer/apply',     [ContactController::class, 'applyVolunteer'])->name('volunteer.apply');
Route::post('/field-application/apply', [ContactController::class, 'applyField'])->name('field.apply');
Route::get('/volunteer',           fn() => view('pages.company.volunteer'))->name('volunteer');

// ─── Admin Auth (guest) ────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

    // ─── Admin Protected ──────────────────────────────────────────────────────
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profile
        Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [\App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::post('/profile/deletion', [\App\Http\Controllers\Admin\ProfileController::class, 'requestDeletion'])->name('profile.deletion');

        Route::middleware('super-admin')->group(function () {
            // Messages
        Route::get('/messages',              [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}',    [ContactMessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

        // Subscribers
        Route::get('/subscribers',               [SubscriberController::class, 'index'])->name('subscribers.index');
        Route::delete('/subscribers/{subscriber}',[SubscriberController::class, 'destroy'])->name('subscribers.destroy');

        // Volunteers
        Route::get('/volunteers',              [VolunteerController::class, 'index'])->name('volunteers.index');
        Route::get('/volunteers/{volunteer}',   [VolunteerController::class, 'show'])->name('volunteers.show');
        Route::delete('/volunteers/{volunteer}',[VolunteerController::class, 'destroy'])->name('volunteers.destroy');

        // Field Applications
        Route::get('/field-applications',               [\App\Http\Controllers\Admin\FieldApplicationController::class, 'index'])->name('field-applications.index');
        Route::get('/field-applications/{application}', [\App\Http\Controllers\Admin\FieldApplicationController::class, 'show'])->name('field-applications.show');
        Route::delete('/field-applications/{application}', [\App\Http\Controllers\Admin\FieldApplicationController::class, 'destroy'])->name('field-applications.destroy');

        // Announcements
        Route::get('/announcements',                        [AnnouncementController::class, 'index'])->name('announcements.index');
        Route::get('/announcements/create',                 [AnnouncementController::class, 'create'])->name('announcements.create');
        Route::post('/announcements',                       [AnnouncementController::class, 'store'])->name('announcements.store');
        Route::get('/announcements/{announcement}/edit',    [AnnouncementController::class, 'edit'])->name('announcements.edit');
        Route::put('/announcements/{announcement}',         [AnnouncementController::class, 'update'])->name('announcements.update');
        Route::delete('/announcements/{announcement}',      [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
        Route::post('/announcements/{announcement}/toggle', [AnnouncementController::class, 'togglePublish'])->name('announcements.toggle');

        // Services
        Route::get('/services',                     [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create',              [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services',                    [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{service}/edit',      [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}',           [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}',        [ServiceController::class, 'destroy'])->name('services.destroy');
        Route::post('/services/{service}/toggle',   [ServiceController::class, 'toggleActive'])->name('services.toggle');

        // News
        Route::get('/news',                        [App\Http\Controllers\Admin\NewsController::class, 'index'])->name('news.index');
        Route::get('/news/create',                 [App\Http\Controllers\Admin\NewsController::class, 'create'])->name('news.create');
        Route::post('/news',                       [App\Http\Controllers\Admin\NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit',            [App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}',                 [App\Http\Controllers\Admin\NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}',              [App\Http\Controllers\Admin\NewsController::class, 'destroy'])->name('news.destroy');
        Route::post('/news/{news}/toggle',         [App\Http\Controllers\Admin\NewsController::class, 'togglePublish'])->name('news.toggle');

        // Projects
        Route::get('/projects',                     [\App\Http\Controllers\Admin\ProjectLinkController::class, 'index'])->name('projects.index');
        Route::get('/projects/create',              [\App\Http\Controllers\Admin\ProjectLinkController::class, 'create'])->name('projects.create');
        Route::post('/projects',                    [\App\Http\Controllers\Admin\ProjectLinkController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit',      [\App\Http\Controllers\Admin\ProjectLinkController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}',           [\App\Http\Controllers\Admin\ProjectLinkController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}',        [\App\Http\Controllers\Admin\ProjectLinkController::class, 'destroy'])->name('projects.destroy');
        Route::post('/projects/{project}/toggle',   [\App\Http\Controllers\Admin\ProjectLinkController::class, 'toggleActive'])->name('projects.toggle');

        // Settings
        Route::get('/settings', [CompanySettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [CompanySettingController::class, 'update'])->name('settings.update');

        // Analytics
        Route::get('/analytics', [\App\Http\Controllers\Admin\AnalyticsController::class, 'index'])->name('analytics.index');

        // Users
        Route::get('/users',                       [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/users/create',                [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post('/users',                      [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit',           [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}',                [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}',             [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{user}/toggle-visibility', [App\Http\Controllers\Admin\UserController::class, 'toggleVisibility'])->name('users.toggle-visibility');
        Route::post('/users/{user}/toggle-login',      [App\Http\Controllers\Admin\UserController::class, 'toggleLogin'])->name('users.toggle-login');
        });
    });
});

// ─── Jetstream Dashboard (legacy) ─────────────────────────────────────────────
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    
    // Account Deletion Request
    Route::post('/profile/request-deletion', [\App\Http\Controllers\AccountDeletionController::class, 'requestDeletion'])->name('profile.request-deletion');
    Route::post('/profile/cancel-deletion',  [\App\Http\Controllers\AccountDeletionController::class, 'cancelDeletion'])->name('profile.cancel-deletion');
});
