<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCareerController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminInquiryController;
use App\Http\Controllers\Admin\AdminInternshipController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProgramController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{slug}', [SolutionController::class, 'show'])->name('solutions.show');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/ai', [AiController::class, 'index'])->name('ai');

Route::get('/education', [ProgramController::class, 'index'])->name('education');
Route::get('/education/{slug}', [ProgramController::class, 'show'])->name('education.show');

Route::get('/internships', [InternshipController::class, 'index'])->name('internships');
Route::post('/internships/apply', [InternshipController::class, 'apply'])->name('internships.apply');

Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [ProjectController::class, 'show'])->name('portfolio.show');

Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/{career}/apply', [CareerController::class, 'apply'])->name('careers.apply');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact/message', [ContactController::class, 'messageStore'])->name('contact.message');

Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [PageController::class, 'terms'])->name('terms');


/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Admin CMS Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('services', AdminServiceController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('projects', AdminProjectController::class);
        Route::resource('blog', AdminBlogController::class);
        Route::resource('programs', AdminProgramController::class);
        Route::resource('testimonials', AdminTestimonialController::class);

        // Internships
        Route::get('/internships', [AdminInternshipController::class, 'index'])->name('internships.index');
        Route::get('/internships/{internship}', [AdminInternshipController::class, 'show'])->name('internships.show');
        Route::patch('/internships/{internship}/status', [AdminInternshipController::class, 'updateStatus'])->name('internships.status');
        Route::delete('/internships/{internship}', [AdminInternshipController::class, 'destroy'])->name('internships.destroy');

        // Careers & Job Applications
        Route::resource('careers', AdminCareerController::class);
        Route::get('/careers/{career}/applications', [AdminCareerController::class, 'applications'])->name('careers.applications');
        Route::get('/job-applications', [AdminCareerController::class, 'allApplications'])->name('careers.all_applications');
        Route::patch('/job-applications/{application}/status', [AdminCareerController::class, 'updateApplicationStatus'])->name('careers.application_status');
        Route::delete('/job-applications/{application}', [AdminCareerController::class, 'destroyApplication'])->name('careers.application_destroy');

        // Inquiries & Messages
        Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
        Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
        Route::patch('/inquiries/{inquiry}', [AdminInquiryController::class, 'update'])->name('inquiries.update');
        Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

        Route::get('/contact-messages', [AdminContactController::class, 'index'])->name('contact_messages.index');
        Route::get('/contact-messages/{message}', [AdminContactController::class, 'show'])->name('contact_messages.show');
        Route::delete('/contact-messages/{message}', [AdminContactController::class, 'destroy'])->name('contact_messages.destroy');

        // Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
