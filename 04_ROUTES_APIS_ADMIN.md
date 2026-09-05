# Creative Tech Squad --- Routes, APIs and Admin Structure

## Public Web Routes

``` php
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
Route::post('/internships/apply', [InternshipApplicationController::class, 'store'])
    ->name('internships.apply');

Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [ProjectController::class, 'show'])->name('portfolio.show');

Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/{career}/apply', [JobApplicationController::class, 'store'])
    ->name('careers.apply');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
```

## Admin Routes

Protect all admin routes with authentication and authorization.

``` php
Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('services', AdminServiceController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('projects', AdminProjectController::class);
        Route::resource('blog', AdminBlogController::class);
        Route::resource('programs', AdminProgramController::class);
        Route::resource('internships', AdminInternshipController::class);
        Route::resource('careers', AdminCareerController::class);
        Route::resource('testimonials', AdminTestimonialController::class);

        Route::get('/inquiries', [AdminInquiryController::class, 'index'])
            ->name('inquiries.index');

        Route::patch('/inquiries/{inquiry}', [AdminInquiryController::class, 'update'])
            ->name('inquiries.update');

        Route::get('/settings', [AdminSettingController::class, 'index'])
            ->name('settings');
    });
```

## REST API

Base:

``` text
/api/v1
```

Public endpoints:

``` text
GET    /api/v1/services
GET    /api/v1/products
GET    /api/v1/products/{slug}
GET    /api/v1/projects
GET    /api/v1/blog
GET    /api/v1/blog/{slug}
GET    /api/v1/programs
POST   /api/v1/contact
POST   /api/v1/internships/apply
POST   /api/v1/careers/{career}/apply
```

Future authenticated APIs:

``` text
POST   /api/v1/auth/login
POST   /api/v1/auth/logout
GET    /api/v1/me
```

## API Response Standard

Success:

``` json
{
  "success": true,
  "message": "Products fetched successfully.",
  "data": []
}
```

Validation error:

``` json
{
  "success": false,
  "message": "Validation failed.",
  "errors": {
    "email": [
      "The email field is required."
    ]
  }
}
```

## Admin Dashboard

Dashboard widgets:

-   Total Products
-   Total Projects
-   Published Blogs
-   Contact Inquiries
-   Internship Applications
-   Job Applications
-   Active Programs
-   Open Careers

Charts: - Monthly inquiries - Internship applications - Job
applications - Blog views - Product/project statistics

## CRUD Pattern

Every CMS module should have:

``` text
Index
Create
Store
Show
Edit
Update
Destroy
```

Use: - Form Request validation - Policies - Service classes where
business logic grows - Eloquent models - Pagination - Search - Filters -
Sorting - Soft deletes where appropriate

## File Upload

Store public media under:

``` text
storage/app/public
```

Run:

``` bash
php artisan storage:link
```

Validate uploads and generate optimized versions where necessary.
