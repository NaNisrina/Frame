<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login & Authentication
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('login.auth');

// Auth User
Route::middleware(['auth', 'auth.session'])->group(function () {
    // Admin & Dashboard
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Master Siswa
    Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('mastersiswa');

    // Master Projects
    Route::resource('/admin/projects', ProjectsController::class);

    // Master Contact
    Route::get('/admin/contact', [ContactController::class, 'master'])->name('mastercontact');

    // Logout
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/logout', [LoginController::class, 'abort'])->name('abortlogout');
});

// Auth Admin
Route::middleware(['auth', 'role:admin', 'auth.session'])->group(function () {
    // Admin & Dashboard
    // Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
    // Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Master Siswa
    // Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('mastersiswa');
    Route::get('/admin/createsiswa', [SiswaController::class, 'create'])->name('createsiswa');
    Route::post('/admin/storesiswa', [SiswaController::class, 'store'])->name('storesiswa');
    Route::get('/admin/siswa/{id}/editsiswa', [SiswaCOntroller::class, 'edit'])->name('editsiswa');
    Route::put('/admin/siswa/{id}', [SiswaController::class, 'update'])->name('updatesiswa');
    Route::delete('/admin/siswa/{id}', [SiswaController::class, 'destroy'])->name('destroysiswa');

    // Master Projects
    // Route::resource('/admin/projects', ProjectsController::class);
    Route::get('/admin/project/{id}/create', [ProjectsController::class, 'create'])->name('projects.create');

    // Master Contact
    // Route::get('/admin/contact', [ContactController::class, 'master'])->name('mastercontact');
    Route::get('/admin/createcontact', [ContactController::class, 'create'])->name('createcontact');
    Route::get('/admin/editcontact', [ContactController::class, 'edit'])->name('editcontact');

    // Logout
    // Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::get('/projects', [ProjectsController::class, 'index'])->name('masterprojects');
// Route::get('/createprojects', [ProjectsController::class, 'create'])->name('createprojects');
// Route::get('/editprojects', [ProjectsController::class, 'edit'])->name('editprojects');

// Portofolio
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/projects', [HomeController::class, 'master'])->name('projects');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// welcome
// Route::get('/', [HomeController::class, 'index']);

// // Page 2
// Route::get('/page2', [HomeController::class, 'show']);
// Route::get('/page2', function() {
//     return view('page2');
// });
