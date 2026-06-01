<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\SolutionPartnerController;
use App\Http\Controllers\Admin\HomepageProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;

Route::prefix('yonetim')->name('admin.')->group(function () {

    Route::get('/giris', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/giris', [AuthController::class, 'login'])->name('login.post');
    Route::post('/cikis', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('hizmetler', ServiceController::class)->names([
            'index' => 'services.index', 'create' => 'services.create',
            'store' => 'services.store', 'edit' => 'services.edit',
            'update' => 'services.update', 'destroy' => 'services.destroy',
        ]);

        Route::resource('projeler', ProjectController::class)->names([
            'index' => 'projects.index', 'create' => 'projects.create',
            'store' => 'projects.store', 'edit' => 'projects.edit',
            'update' => 'projects.update', 'destroy' => 'projects.destroy',
        ]);
        Route::post('projeler-sirala', [ProjectController::class, 'reorder'])->name('projects.reorder');

        // Anasayfa proje yönetimi
        Route::get('anasayfa-projeleri', [HomepageProjectController::class, 'index'])->name('homepage-projects.index');
        Route::post('anasayfa-projeleri/{projeler}/toggle', [HomepageProjectController::class, 'toggle'])->name('homepage-projects.toggle');
        Route::post('anasayfa-projeleri-sirala', [HomepageProjectController::class, 'reorder'])->name('homepage-projects.reorder');

        Route::resource('sektorler', SectorController::class)->parameters([
            'sektorler' => 'sector'
        ])->names([
            'index'   => 'sectors.index',  'create' => 'sectors.create',
            'store'   => 'sectors.store',  'edit'   => 'sectors.edit',
            'update'  => 'sectors.update', 'destroy'=> 'sectors.destroy',
        ]);

        Route::resource('proje-kategorileri', ProjectCategoryController::class)->parameters([
            'proje-kategorileri' => 'project_category'
        ])->names([
            'index'   => 'project-categories.index',  'create' => 'project-categories.create',
            'store'   => 'project-categories.store',  'edit'   => 'project-categories.edit',
            'update'  => 'project-categories.update', 'destroy'=> 'project-categories.destroy',
        ]);



        Route::get('sayfalar/{key}/duzenle', [PageController::class, 'edit'])->name('pages.edit');
        Route::put('sayfalar/{key}', [PageController::class, 'update'])->name('pages.update');
        Route::post('sayfalar/{key}/sertifika', [PageController::class, 'addCertificate'])->name('pages.add_certificate');
        Route::delete('sayfalar/{key}/sertifika/{index}', [PageController::class, 'deleteCertificate'])->name('pages.delete_certificate');

        Route::resource('cozum-ortaklari', \App\Http\Controllers\Admin\PartnerController::class)->parameters([
            'cozum-ortaklari' => 'partner'
        ])->names([
            'index' => 'partners.index', 'create' => 'partners.create',
            'store' => 'partners.store', 'edit' => 'partners.edit',
            'update' => 'partners.update', 'destroy' => 'partners.destroy',
        ]);

        Route::resource('cozum-ortaklari-marka', SolutionPartnerController::class)->parameters([
            'cozum-ortaklari-marka' => 'solutionPartner'
        ])->names([
            'index'   => 'solution-partners.index',  'create' => 'solution-partners.create',
            'store'   => 'solution-partners.store',  'edit'   => 'solution-partners.edit',
            'update'  => 'solution-partners.update', 'destroy'=> 'solution-partners.destroy',
        ]);
        Route::post('cozum-ortaklari-marka/{solutionPartner}/toggle', [SolutionPartnerController::class, 'toggle'])->name('solution-partners.toggle');

        Route::get('ayarlar', [SettingController::class, 'index'])->name('settings.index');
        Route::post('ayarlar', [SettingController::class, 'update'])->name('settings.update');

        Route::get('medya', [MediaController::class, 'index'])->name('media.index');
        Route::post('medya', [MediaController::class, 'store'])->name('media.store');
        Route::delete('medya/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

        Route::get('mesajlar', [MessageController::class, 'index'])->name('messages.index');
        Route::get('mesajlar/{id}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('mesajlar/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('profil', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('profil', [ProfileController::class, 'update'])->name('profile.update');
    });
});
