<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\File;

// CMS Data helper
if (!function_exists('cms_data')) {
    function cms_data($key = null, $default = null) {
        static $cmsData = null;
        if ($cmsData === null) {
            $path = storage_path('app/cms/content.json');
            if (File::exists($path)) {
                $cmsData = json_decode(File::get($path), true);
            } else {
                $cmsData = [];
            }
        }
        if ($key === null) return $cmsData;
        return data_get($cmsData, $key, $default);
    }
}

// Admin routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate']);

Route::middleware([\App\Http\Middleware\AdminAuth::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/preview', [AdminController::class, 'preview'])->name('admin.preview');
    Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.update');

    // GrapesJS API routes for full project management
    Route::get('/admin/api/project', [AdminController::class, 'loadProject'])->name('admin.project.load');
    Route::post('/admin/api/project', [AdminController::class, 'saveProject'])->name('admin.project.save');
    Route::post('/admin/api/upload-media', [AdminController::class, 'uploadMedia'])->name('admin.upload.media');

    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/portfolio', function () { return view('portfolio'); })->name('portfolio');
Route::get('/portfolio/{slug}', function ($slug) {
    return view('portfolio.show', ['slug' => $slug]);
})->name('portfolio.show');

Route::get('/careers', function () {
    return view('careers.index', ['jobs' => cms_data('jobs', [])]);
})->name('careers.index');

Route::get('/careers/{slug}', function ($slug) {
    $jobs = cms_data('jobs', []);
    if (!isset($jobs[$slug])) {
        abort(404);
    }
    return view('careers.show', ['job' => $jobs[$slug], 'slug' => $slug]);
})->name('careers.show');

Route::get('/blog', function () {
    return view('blog.index');
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    return view('blog.show', ['slug' => $slug]);
})->name('blog.show');

// Catch-all route for custom CMS pages created via GrapesJS Page Manager
Route::get('/{slug}', [HomeController::class, 'showCustomPage'])->where('slug', '.*');
