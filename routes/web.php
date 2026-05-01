<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\ValuedServiceController;
use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\NewsController;

// ─── Public Website Pages ─────────────────────────────────────────────────────
Route::get('/',                 [\App\Http\Controllers\HomeController::class, 'index']);
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

// Dynamic Services
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// ─── Public Contact Form ───────────────────────────────────────────────────────
Route::post('/contact/send',      [ContactController::class, 'send'])->name('contact.send');
Route::post('/newsletter/subscribe', [ContactController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{token}', [ContactController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::post('/quote/request',       [ContactController::class, 'requestQuote'])->name('quote.request');
Route::post('/volunteer/apply',     [ContactController::class, 'applyVolunteer'])->name('volunteer.apply');
Route::post('/field-application/apply', [ContactController::class, 'applyField'])->name('field.apply');
Route::get('/community', function () {
    $partners = \App\Models\Partner::where('is_active', true)->get();
    return view('pages.company.community', compact('partners'));
})->name('community');

// ─── Admin Auth (guest) ────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Password Reset Routes
    Route::get('/forgot-password', [\App\Http\Controllers\Admin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [\App\Http\Controllers\Admin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/verify-code', [\App\Http\Controllers\Admin\CodeVerificationController::class, 'showVerifyForm'])->name('password.verify.form');
    Route::post('/verify-code', [\App\Http\Controllers\Admin\CodeVerificationController::class, 'verify'])->name('password.verify.post');

    Route::get('/reset-password/{token?}', [\App\Http\Controllers\Admin\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\Admin\ResetPasswordController::class, 'reset'])->name('password.update');

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
            Route::post('/subscribers/{subscriber}/toggle', [SubscriberController::class, 'toggleStatus'])->name('subscribers.toggle');
            Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');

            // Volunteers
            Route::get('/volunteers',              [VolunteerController::class, 'index'])->name('volunteers.index');
            Route::get('/volunteers/{volunteer}',   [VolunteerController::class, 'show'])->name('volunteers.show');
            Route::delete('/volunteers/{volunteer}', [VolunteerController::class, 'destroy'])->name('volunteers.destroy');

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

            // Valued Services (Homepage Featured)
            Route::get('/valued-services',                     [ValuedServiceController::class, 'index'])->name('valued_services.index');
            Route::get('/valued-services/create',              [ValuedServiceController::class, 'create'])->name('valued_services.create');
            Route::post('/valued-services',                    [ValuedServiceController::class, 'store'])->name('valued_services.store');
            Route::get('/valued-services/{valued_service}/edit', [ValuedServiceController::class, 'edit'])->name('valued_services.edit');
            Route::put('/valued-services/{valued_service}',    [ValuedServiceController::class, 'update'])->name('valued_services.update');
            Route::delete('/valued-services/{valued_service}', [ValuedServiceController::class, 'destroy'])->name('valued_services.destroy');
            Route::post('/valued-services/{valued_service}/toggle', [ValuedServiceController::class, 'toggleActive'])->name('valued_services.toggle');

            // Services
            Route::get('/services',                     [AdminServiceController::class, 'index'])->name('services.index');
            Route::get('/services/create',              [AdminServiceController::class, 'create'])->name('services.create');
            Route::post('/services',                    [AdminServiceController::class, 'store'])->name('services.store');
            Route::get('/services/{service}/edit',      [AdminServiceController::class, 'edit'])->name('services.edit');
            Route::put('/services/{service}',           [AdminServiceController::class, 'update'])->name('services.update');
            Route::delete('/services/{service}',        [AdminServiceController::class, 'destroy'])->name('services.destroy');
            Route::post('/services/{service}/toggle',   [AdminServiceController::class, 'toggleActive'])->name('services.toggle');

            // Service Related Items
            Route::post('/services/{service}/images',   [AdminServiceController::class, 'addImage'])->name('services.images.add');
            Route::put('/service-images/{image}',       [AdminServiceController::class, 'updateImage'])->name('services.images.update');
            Route::delete('/service-images/{image}',    [AdminServiceController::class, 'deleteImage'])->name('services.images.delete');
            
            Route::post('/services/{service}/features', [AdminServiceController::class, 'addFeature'])->name('services.features.add');
            Route::put('/service-features/{feature}',   [AdminServiceController::class, 'updateFeature'])->name('services.features.update');
            Route::delete('/service-features/{feature}', [AdminServiceController::class, 'deleteFeature'])->name('services.features.delete');
            
            Route::post('/services/{service}/projects', [AdminServiceController::class, 'addProject'])->name('services.projects.add');
            Route::put('/service-projects/{project}',   [AdminServiceController::class, 'updateProject'])->name('services.projects.update');
            Route::delete('/service-projects/{project}', [AdminServiceController::class, 'deleteProject'])->name('services.projects.delete');



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
            // Partners
            Route::get('/partners',                       [\App\Http\Controllers\Admin\PartnerController::class, 'index'])->name('partners.index');
            Route::get('/partners/create',                [\App\Http\Controllers\Admin\PartnerController::class, 'create'])->name('partners.create');
            Route::post('/partners',                      [\App\Http\Controllers\Admin\PartnerController::class, 'store'])->name('partners.store');
            Route::get('/partners/{partner}/edit',        [\App\Http\Controllers\Admin\PartnerController::class, 'edit'])->name('partners.edit');
            Route::put('/partners/{partner}',             [\App\Http\Controllers\Admin\PartnerController::class, 'update'])->name('partners.update');
            Route::delete('/partners/{partner}',          [\App\Http\Controllers\Admin\PartnerController::class, 'destroy'])->name('partners.destroy');
            Route::post('/partners/{partner}/toggle',     [\App\Http\Controllers\Admin\PartnerController::class, 'toggleActive'])->name('partners.toggle');

            // Sliders
            Route::get('/sliders',                       [\App\Http\Controllers\Admin\SliderController::class, 'index'])->name('sliders.index');
            Route::get('/sliders/create',                [\App\Http\Controllers\Admin\SliderController::class, 'create'])->name('sliders.create');
            Route::post('/sliders',                      [\App\Http\Controllers\Admin\SliderController::class, 'store'])->name('sliders.store');
            Route::get('/sliders/{slider}/edit',         [\App\Http\Controllers\Admin\SliderController::class, 'edit'])->name('sliders.edit');
            Route::put('/sliders/{slider}',              [\App\Http\Controllers\Admin\SliderController::class, 'update'])->name('sliders.update');
            Route::delete('/sliders/{slider}',           [\App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('sliders.destroy');
            Route::post('/sliders/{slider}/toggle',      [\App\Http\Controllers\Admin\SliderController::class, 'toggleActive'])->name('sliders.toggle');

            // Core Values
            Route::get('/core-values',                       [\App\Http\Controllers\Admin\CoreValueController::class, 'index'])->name('core_values.index');
            Route::get('/core-values/create',                [\App\Http\Controllers\Admin\CoreValueController::class, 'create'])->name('core_values.create');
            Route::post('/core-values',                      [\App\Http\Controllers\Admin\CoreValueController::class, 'store'])->name('core_values.store');
            Route::get('/core-values/{coreValue}/edit',      [\App\Http\Controllers\Admin\CoreValueController::class, 'edit'])->name('core_values.edit');
            Route::put('/core-values/{coreValue}',           [\App\Http\Controllers\Admin\CoreValueController::class, 'update'])->name('core_values.update');
            Route::delete('/core-values/{coreValue}',        [\App\Http\Controllers\Admin\CoreValueController::class, 'destroy'])->name('core_values.destroy');
            Route::post('/core-values/{coreValue}/toggle',   [\App\Http\Controllers\Admin\CoreValueController::class, 'toggleActive'])->name('core_values.toggle');

            // Home Service Items (Nationwide list)
            Route::get('/home-service-items',                       [\App\Http\Controllers\Admin\HomeServiceItemController::class, 'index'])->name('home_service_items.index');
            Route::get('/home-service-items/create',                [\App\Http\Controllers\Admin\HomeServiceItemController::class, 'create'])->name('home_service_items.create');
            Route::post('/home-service-items',                      [\App\Http\Controllers\Admin\HomeServiceItemController::class, 'store'])->name('home_service_items.store');
            Route::get('/home-service-items/{homeServiceItem}/edit', [\App\Http\Controllers\Admin\HomeServiceItemController::class, 'edit'])->name('home_service_items.edit');
            Route::put('/home-service-items/{homeServiceItem}',     [\App\Http\Controllers\Admin\HomeServiceItemController::class, 'update'])->name('home_service_items.update');
            Route::delete('/home-service-items/{homeServiceItem}',  [\App\Http\Controllers\Admin\HomeServiceItemController::class, 'destroy'])->name('home_service_items.destroy');
            Route::post('/home-service-items/{homeServiceItem}/toggle', [\App\Http\Controllers\Admin\HomeServiceItemController::class, 'toggleActive'])->name('home_service_items.toggle');

            // About Features
            Route::get('/about-features',                       [\App\Http\Controllers\Admin\AboutFeatureController::class, 'index'])->name('about_features.index');
            Route::get('/about-features/create',                [\App\Http\Controllers\Admin\AboutFeatureController::class, 'create'])->name('about_features.create');
            Route::post('/about-features',                      [\App\Http\Controllers\Admin\AboutFeatureController::class, 'store'])->name('about_features.store');
            Route::get('/about-features/{aboutFeature}/edit',      [\App\Http\Controllers\Admin\AboutFeatureController::class, 'edit'])->name('about_features.edit');
            Route::put('/about-features/{aboutFeature}',           [\App\Http\Controllers\Admin\AboutFeatureController::class, 'update'])->name('about_features.update');
            Route::delete('/about-features/{aboutFeature}',        [\App\Http\Controllers\Admin\AboutFeatureController::class, 'destroy'])->name('about_features.destroy');
            Route::post('/about-features/{aboutFeature}/toggle',   [\App\Http\Controllers\Admin\AboutFeatureController::class, 'toggleActive'])->name('about_features.toggle');
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
