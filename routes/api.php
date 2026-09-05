<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

// REST API v1
Route::get('/services', [ApiController::class, 'getServices']);
Route::get('/products', [ApiController::class, 'getProducts']);
Route::get('/products/{slug}', [ApiController::class, 'getProduct']);
Route::get('/projects', [ApiController::class, 'getProjects']);
Route::get('/blog', [ApiController::class, 'getBlogs']);
Route::get('/blog/{slug}', [ApiController::class, 'getBlog']);
Route::get('/programs', [ApiController::class, 'getPrograms']);

Route::post('/contact', [ApiController::class, 'postContact']);
Route::post('/internships/apply', [ApiController::class, 'postInternshipApply']);
Route::post('/careers/{career}/apply', [ApiController::class, 'postCareerApply']);
