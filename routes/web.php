<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

Route::prefix('tr')->name('tr.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/hakkimizda', [PageController::class, 'about'])->name('about');
    Route::get('/hizmetler', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/hizmetler/{slug}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/projeler', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projeler/{slug}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
    Route::post('/iletisim', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/kvkk', [PageController::class, 'kvkk'])->name('kvkk');
});

Route::prefix('en')->name('en.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/privacy-policy', [PageController::class, 'kvkk'])->name('kvkk');
});

Route::get('/', function () {
    return redirect('/tr');
});

require __DIR__ . '/admin.php';
