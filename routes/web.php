<?php

use Illuminate\Support\Facades\Route;

// Public Controllers
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\CommitteeController;
use App\Http\Controllers\Public\MemberDirectoryController;
use App\Http\Controllers\Public\MembershipApplyController;
use App\Http\Controllers\Public\EventController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\NoticeController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\DocumentController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\VerificationController;

// Auth Controllers
use App\Http\Controllers\Auth\AuthController;

// Member Controllers
use App\Http\Controllers\Member\MemberDashboardController;
use App\Http\Controllers\Member\MemberProfileController;
use App\Http\Controllers\Member\DigitalCardController;
use App\Http\Controllers\Member\MemberEventController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MemberAdminController;
use App\Http\Controllers\Admin\MembershipTypeAdminController;
use App\Http\Controllers\Admin\CommitteeAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\NoticeAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\DocumentAdminController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\ContactMessageAdminController;
use App\Http\Controllers\Admin\SettingAdminController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/mission-vision', [AboutController::class, 'missionVision'])->name('mission');
    Route::get('/chairman-message', [AboutController::class, 'chairmanMessage'])->name('chairman');
    Route::get('/president-message', [AboutController::class, 'presidentMessage'])->name('president');
    Route::get('/activities', [AboutController::class, 'activities'])->name('activities');
    Route::get('/constitution', [AboutController::class, 'constitution'])->name('constitution');
});

Route::get('/committee', [CommitteeController::class, 'index'])->name('committee');
Route::get('/members', [MemberDirectoryController::class, 'index'])->name('members.index');

Route::prefix('membership')->name('membership.')->group(function () {
    Route::get('/', [MembershipApplyController::class, 'index'])->name('info');
    Route::get('/apply', [MembershipApplyController::class, 'create'])->name('apply');
    Route::post('/apply', [MembershipApplyController::class, 'store'])->name('apply.store');
});

Route::get('/activities', [NewsController::class, 'index'])->name('activities');

Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/{slug}', [EventController::class, 'show'])->name('show');
    Route::post('/{slug}/register', [EventController::class, 'register'])->name('register');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('show');
});

Route::prefix('notices')->name('notices.')->group(function () {
    Route::get('/', [NoticeController::class, 'index'])->name('index');
    Route::get('/{slug}', [NoticeController::class, 'show'])->name('show');
});

Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/{slug}', [GalleryController::class, 'show'])->name('show');
});

Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Instant Public QR verification for member card
Route::get('/verify-member/{member_id}', [VerificationController::class, 'verify'])->name('verify.member');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Member Portal Routes
|--------------------------------------------------------------------------
*/
Route::prefix('member')->name('member.')->middleware('member')->group(function () {
    Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [MemberProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [MemberProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [MemberProfileController::class, 'update'])->name('profile.update');
    Route::get('/digital-card', [DigitalCardController::class, 'show'])->name('digital-card');
    Route::get('/my-events', [MemberEventController::class, 'index'])->name('my-events');
    Route::get('/change-password', [MemberProfileController::class, 'showChangePassword'])->name('change-password');
    Route::post('/change-password', [MemberProfileController::class, 'updatePassword'])->name('change-password.update');
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // ----------------------------------------------------
    // Membership & Governance (Super Admin & Member Manager)
    // ----------------------------------------------------
    Route::middleware('role:super_admin,member_manager')->group(function () {
        // Members
        Route::get('/members', [MemberAdminController::class, 'index'])->name('members.index');
        Route::get('/members/pending', [MemberAdminController::class, 'pending'])->name('members.pending');
        Route::get('/members/create', [MemberAdminController::class, 'create'])->name('members.create');
        Route::post('/members', [MemberAdminController::class, 'store'])->name('members.store');
        Route::get('/members/export', [MemberAdminController::class, 'exportCsv'])->name('members.export');
        Route::get('/members/{member}', [MemberAdminController::class, 'show'])->name('members.show');
        Route::get('/members/{member}/edit', [MemberAdminController::class, 'edit'])->name('members.edit');
        Route::put('/members/{member}', [MemberAdminController::class, 'update'])->name('members.update');
        Route::delete('/members/{member}', [MemberAdminController::class, 'destroy'])->name('members.destroy');
        Route::post('/members/{member}/approve', [MemberAdminController::class, 'approve'])->name('members.approve');
        Route::post('/members/{member}/reject', [MemberAdminController::class, 'reject'])->name('members.reject');
        Route::post('/members/{member}/reset-password', [MemberAdminController::class, 'resetPassword'])->name('members.reset-password');

        // Membership Types
        Route::get('/membership-types', [MembershipTypeAdminController::class, 'index'])->name('membership-types.index');
        Route::post('/membership-types', [MembershipTypeAdminController::class, 'store'])->name('membership-types.store');
        Route::put('/membership-types/{membershipType}', [MembershipTypeAdminController::class, 'update'])->name('membership-types.update');
        Route::delete('/membership-types/{membershipType}', [MembershipTypeAdminController::class, 'destroy'])->name('membership-types.destroy');

        // Committee Management
        Route::get('/committees', [CommitteeAdminController::class, 'index'])->name('committees.index');
        Route::post('/committees', [CommitteeAdminController::class, 'store'])->name('committees.store');
        Route::get('/committees/{committee}', [CommitteeAdminController::class, 'show'])->name('committees.show');
        Route::put('/committees/{committee}', [CommitteeAdminController::class, 'update'])->name('committees.update');
        Route::delete('/committees/{committee}', [CommitteeAdminController::class, 'destroy'])->name('committees.destroy');
        Route::post('/committees/{committee}/members', [CommitteeAdminController::class, 'addMember'])->name('committees.members.store');
        Route::delete('/committees/members/{committeeMember}', [CommitteeAdminController::class, 'removeMember'])->name('committees.members.destroy');
    });

    // ----------------------------------------------------
    // Editorial & Content Management (Content Manager & Super Admin)
    // ----------------------------------------------------
    Route::middleware('role:super_admin,content_manager')->group(function () {
        // News
        Route::get('/news', [NewsAdminController::class, 'index'])->name('news.index');
        Route::get('/news/create', [NewsAdminController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsAdminController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit', [NewsAdminController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [NewsAdminController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [NewsAdminController::class, 'destroy'])->name('news.destroy');
        Route::post('/news/categories', [NewsAdminController::class, 'storeCategory'])->name('news.categories.store');

        // Notices
        Route::get('/notices', [NoticeAdminController::class, 'index'])->name('notices.index');
        Route::get('/notices/create', [NoticeAdminController::class, 'create'])->name('notices.create');
        Route::post('/notices', [NoticeAdminController::class, 'store'])->name('notices.store');
        Route::get('/notices/{notice}/edit', [NoticeAdminController::class, 'edit'])->name('notices.edit');
        Route::put('/notices/{notice}', [NoticeAdminController::class, 'update'])->name('notices.update');
        Route::delete('/notices/{notice}', [NoticeAdminController::class, 'destroy'])->name('notices.destroy');

        // Photo Gallery
        Route::get('/gallery', [GalleryAdminController::class, 'index'])->name('gallery.index');
        Route::post('/gallery', [GalleryAdminController::class, 'store'])->name('gallery.store');
        Route::get('/gallery/{gallery}', [GalleryAdminController::class, 'show'])->name('gallery.show');
        Route::post('/gallery/{gallery}/upload', [GalleryAdminController::class, 'uploadImages'])->name('gallery.upload');
        Route::delete('/gallery/images/{image}', [GalleryAdminController::class, 'deleteImage'])->name('gallery.images.destroy');
        Route::delete('/gallery/{gallery}', [GalleryAdminController::class, 'destroy'])->name('gallery.destroy');

        // Documents
        Route::get('/documents', [DocumentAdminController::class, 'index'])->name('documents.index');
        Route::post('/documents', [DocumentAdminController::class, 'store'])->name('documents.store');
        Route::delete('/documents/{document}', [DocumentAdminController::class, 'destroy'])->name('documents.destroy');

        // Static Pages CMS
        Route::get('/pages', [PageAdminController::class, 'index'])->name('pages.index');
        Route::get('/pages/{page}/edit', [PageAdminController::class, 'edit'])->name('pages.edit');
        Route::put('/pages/{page}', [PageAdminController::class, 'update'])->name('pages.update');
    });

    // ----------------------------------------------------
    // Events & RSVPs (Super Admin, Content Manager & Member Manager)
    // ----------------------------------------------------
    Route::middleware('role:super_admin,content_manager,member_manager')->group(function () {
        Route::get('/events', [EventAdminController::class, 'index'])->name('events.index');
        Route::get('/events/create', [EventAdminController::class, 'create'])->name('events.create');
        Route::post('/events', [EventAdminController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventAdminController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventAdminController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventAdminController::class, 'destroy'])->name('events.destroy');
        Route::get('/events/registrations/list', [EventAdminController::class, 'registrations'])->name('events.registrations');
        Route::get('/events/registrations/export', [EventAdminController::class, 'exportRegistrations'])->name('events.registrations.export');
    });

    // ----------------------------------------------------
    // Contact Messages (All Administrators)
    // ----------------------------------------------------
    Route::get('/messages', [ContactMessageAdminController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [ContactMessageAdminController::class, 'show'])->name('messages.show');
    Route::post('/messages/{message}/notes', [ContactMessageAdminController::class, 'updateNotes'])->name('messages.notes');
    Route::delete('/messages/{message}', [ContactMessageAdminController::class, 'destroy'])->name('messages.destroy');

    // ----------------------------------------------------
    // System Settings & Admin Users (Super Admin Only)
    // ----------------------------------------------------
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/settings', [SettingAdminController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingAdminController::class, 'update'])->name('settings.update');

        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    });
});
