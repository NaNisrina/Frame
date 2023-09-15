<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

// Admin & Dashboard
Route::get('/', [HomeController::class, 'index'])->name('admin');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// Master Siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('mastersiswa');
Route::get('/createsiswa', [SiswaController::class, 'create'])->name('createsiswa');
Route::post('/storesiswa', [SiswaController::class, 'store'])->name('storesiswa');
Route::get('/siswa/{id}/editsiswa', [SiswaCOntroller::class, 'edit'])->name('editsiswa');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('updatesiswa');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('destroysiswa');

// Master Projects
Route::get('/projects', [ProjectsController::class, 'index'])->name('masterprojects');
Route::get('/createprojects', [ProjectsController::class, 'create'])->name('createprojects');
Route::get('/editprojects', [ProjectsController::class, 'edit'])->name('editprojects');
// Master Contact
Route::get('/contact', [ContactController::class, 'index'])->name('mastercontact');
Route::get('/createcontact', [ContactController::class, 'create'])->name('createcontact');
Route::get('/editcontact', [ContactController::class, 'edit'])->name('editcontact');

// Portofolio
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/about', [AboutController::class, 'index'])->name('about');
// Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// welcome
// Route::get('/', [HomeController::class, 'index']);

// // Page 2
// Route::get('/page2', [HomeController::class, 'show']);
// Route::get('/page2', function() {
//     return view('page2');
// });
