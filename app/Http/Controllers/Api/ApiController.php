<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Career;
use App\Models\ContactMessage;
use App\Models\Inquiry;
use App\Models\InternshipApplication;
use App\Models\JobApplication;
use App\Models\Product;
use App\Models\Program;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function jsonSuccess($data, string $message = 'Success', int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function jsonError(string $message, $errors = null, int $code = 422): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }

    public function getServices(): JsonResponse
    {
        $services = Service::active()->get();
        return $this->jsonSuccess($services, 'Services retrieved successfully.');
    }

    public function getProducts(Request $request): JsonResponse
    {
        $category = $request->query('category');
        $query = Product::published();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        return $this->jsonSuccess($query->get(), 'Products retrieved successfully.');
    }

    public function getProduct(string $slug): JsonResponse
    {
        $product = Product::where('slug', $slug)->where('status', 'published')->first();
        if (!$product) {
            return $this->jsonError('Product not found.', null, 404);
        }
        return $this->jsonSuccess($product, 'Product details retrieved.');
    }

    public function getProjects(): JsonResponse
    {
        $projects = Project::published()->get();
        return $this->jsonSuccess($projects, 'Portfolio projects retrieved.');
    }

    public function getBlogs(): JsonResponse
    {
        $posts = BlogPost::published()->with(['category', 'author:id,name'])->paginate(10);
        return $this->jsonSuccess($posts, 'Blog posts retrieved.');
    }

    public function getBlog(string $slug): JsonResponse
    {
        $post = BlogPost::where('slug', $slug)->where('status', 'published')->with(['category', 'author:id,name'])->first();
        if (!$post) {
            return $this->jsonError('Post not found.', null, 404);
        }
        return $this->jsonSuccess($post, 'Blog post details retrieved.');
    }

    public function getPrograms(): JsonResponse
    {
        $programs = Program::active()->get();
        return $this->jsonSuccess($programs, 'Programs retrieved.');
    }

    public function postContact(Request $request): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:25',
            'company' => 'nullable|string|max:150',
            'inquiry_type' => 'required|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return $this->jsonError('Validation failed.', $validator->errors(), 422);
        }

        $inquiry = Inquiry::create($validator->validated());
        return $this->jsonSuccess($inquiry, 'Inquiry submitted successfully.', 201);
    }

    public function postInternshipApply(Request $request): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'college' => 'nullable|string|max:200',
            'course' => 'nullable|string|max:150',
            'preferred_track' => 'required|string|max:100',
            'message' => 'nullable|string|max:3000',
        ]);

        if ($validator->fails()) {
            return $this->jsonError('Validation failed.', $validator->errors(), 422);
        }

        $application = InternshipApplication::create($validator->validated());
        return $this->jsonSuccess($application, 'Internship application submitted successfully.', 201);
    }

    public function postCareerApply(Request $request, Career $career): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'cover_letter' => 'nullable|string|max:4000',
        ]);

        if ($validator->fails()) {
            return $this->jsonError('Validation failed.', $validator->errors(), 422);
        }

        $data = $validator->validated();
        $data['career_id'] = $career->id;
        $application = JobApplication::create($data);

        return $this->jsonSuccess($application, 'Job application submitted successfully.', 201);
    }
}
