<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
use App\Http\Controllers\{DashboardController, StudentController, TeacherController, SubjectController, GroupController, PaymentController};

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Students
    Route::get('/students/export-pdf', [StudentController::class, 'exportPdf'])->name('students.pdf');
    Route::resource('students', StudentController::class);

    // Other Resources (To be built)
    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('groups', GroupController::class);
    
    // Payments
    Route::resource('payments', PaymentController::class);
    Route::post('/payments/{payment}/toggle-status', [PaymentController::class, 'toggleStatus'])->name('payments.toggle');
});

// routes/web.php

// Group & Enrollment Management
Route::post('/groups/{group}/enroll', [GroupController::class, 'enrollStudent'])->name('groups.enroll');
Route::delete('/groups/{group}/students/{student}', [GroupController::class, 'removeStudent'])->name('groups.remove_student');
Route::resource('groups', GroupController::class);
Route::middleware(['auth'])->group(function () {
    // ... (Previous routes for Dashboard, Students, Groups)

    // Payments
    Route::get('/students/{student}/payments', [PaymentController::class, 'history'])->name('payments.history');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::post('/payments/{payment}/toggle', [PaymentController::class, 'toggleStatus'])->name('payments.toggle');

    // Teachers & Subjects
    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class)->except(['create', 'edit', 'show']); 
    // ^ Excepted because Subjects are usually managed via simple modals or a single page
});


Route::resource('students', StudentController::class);
Route::get('students-export-pdf', [StudentController::class, 'exportPdf'])->name('students.export');

Route::resource('teachers', TeacherController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('groups', GroupController::class);


// Routes ديال groups
Route::prefix('groups')->name('groups.')->group(function() {
    Route::get('/', [GroupController::class, 'index'])->name('index');
    Route::get('/create', [GroupController::class, 'create'])->name('create');
    Route::post('/', [GroupController::class, 'store'])->name('store');
    Route::get('/{group}', [GroupController::class, 'show'])->name('show');

    // Enrollment
    Route::post('/{group}/enroll', [GroupController::class, 'enrollStudent'])->name('enrollStudent');
    Route::delete('/{group}/student/{student}', [GroupController::class, 'removeStudent'])->name('removeStudent');

    // Edit & Update & Destroy
    Route::get('/{group}/edit', [GroupController::class, 'edit'])->name('edit');
    Route::put('/{group}', [GroupController::class, 'update'])->name('update');
    Route::delete('/{group}', [GroupController::class, 'destroy'])->name('destroy');
});
Route::get('/students/{student}/payments/pdf', [PaymentController::class, 'exportPdf'])
    ->name('payments.exportPdf');


Route::get('/students/{student}/payments/create', 
    [PaymentController::class, 'create']
)->name('payments.create');

Route::post('/payments', [PaymentController::class, 'store'])
    ->name('payments.store');

Route::get('/payments/{payment}/receipt',
    [PaymentController::class, 'exportReceipt'])
    ->name('payments.receipt');
Route::resource('payments', PaymentController::class);

Route::get('/teachers/export/pdf', [TeacherController::class, 'exportPdf'])
    ->name('teachers.export');

Route::get('/', function () {
    return view('layouts.home', [
        'totalStudents' => \App\Models\Student::count(),
        'totalTeachers' => \App\Models\Teacher::count(),
        'totalGroups' => \App\Models\Group::count(),
        'totalSubjects' => \App\Models\Subject::count(),
        'monthlyRevenue' => \App\Models\Payment::whereMonth('payment_date', now()->month)->sum('amount'),
        'activeGroups' => \App\Models\Group::has('students')->count(),
        'successRate' => 95 
    ]);
})->name('home');