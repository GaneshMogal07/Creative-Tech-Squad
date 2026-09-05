<?php

namespace Tests\Feature;

use App\Models\Career;
use App\Models\Category;
use App\Models\JobApplication;
use App\Models\Product;
use App\Models\Program;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreativeTechSquadTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function test_public_pages_load_successfully(): void
    {
        $pages = [
            '/',
            '/about',
            '/solutions',
            '/solutions/erp-solutions',
            '/products',
            '/products/cts-enterprise-erp',
            '/ai',
            '/education',
            '/education/full-stack-laravel-engineering',
            '/internships',
            '/portfolio',
            '/portfolio/precision-manufacturing-erp',
            '/careers',
            '/careers/senior-laravel-backend-engineer',
            '/blog',
            '/blog/architecting-scalable-erp-laravel-mysql',
            '/contact',
            '/privacy-policy',
            '/terms-of-service',
        ];

        foreach ($pages as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    public function test_contact_form_submission(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Aditya Rathi',
            'email' => 'aditya@techcorp.in',
            'phone' => '+91 98900 12345',
            'company' => 'TechCorp Enterprises',
            'inquiry_type' => 'ERP Solutions',
            'budget_range' => '₹5,00,000 - ₹15,00,000',
            'message' => 'We need a full customized ERP for our inventory and multi-branch attendance.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'email' => 'aditya@techcorp.in',
            'company' => 'TechCorp Enterprises',
        ]);
    }

    public function test_internship_application_submission(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf');

        $response = $this->post('/internships/apply', [
            'name' => 'Pooja Patil',
            'email' => 'pooja.patil@engineering.edu',
            'phone' => '+91 97654 32100',
            'college' => 'Government College of Engineering',
            'course' => 'B.Tech Computer Science',
            'graduation_year' => '2026',
            'preferred_track' => 'Laravel / Full Stack PHP',
            'resume' => $file,
            'message' => 'Passionate about building scalable backend APIs in Laravel.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('internship_applications', [
            'email' => 'pooja.patil@engineering.edu',
            'preferred_track' => 'Laravel / Full Stack PHP',
        ]);
    }

    public function test_admin_authentication_and_dashboard_access(): void
    {
        // 1. Unauthenticated guest is redirected to login
        $this->get('/admin/dashboard')
            ->assertRedirect(route('admin.login'));

        // 2. Invalid credentials return back with error
        $this->post('/admin/login', [
            'email' => 'admin@creativetechsquad.in',
            'password' => 'wrong-password',
        ])->assertSessionHasErrors('email');

        // 3. Valid login logs user in and redirects to dashboard
        $response = $this->post('/admin/login', [
            'email' => 'admin@creativetechsquad.in',
            'password' => 'password',
        ]);
        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();

        // 4. Authenticated admin can view admin sections
        $admin = User::where('email', 'admin@creativetechsquad.in')->first();

        $this->actingAs($admin)
            ->get('/admin/dashboard')
            ->assertStatus(200)
            ->assertSee('Overview Dashboard')
            ->assertSee('Recent Project Inquiries');

        $this->actingAs($admin)
            ->get('/admin/products')
            ->assertStatus(200)
            ->assertSee('CTS Enterprise ERP');

        $this->actingAs($admin)
            ->get('/admin/inquiries')
            ->assertStatus(200);

        $this->actingAs($admin)
            ->get('/admin/settings')
            ->assertStatus(200)
            ->assertSee('Creative Tech Squad');

        // 5. Admin can log out
        $this->actingAs($admin)
            ->post('/admin/logout')
            ->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    public function test_careers_and_job_application_lifecycle(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');

        // 1. Candidate views careers list
        $this->get('/careers')
            ->assertStatus(200)
            ->assertSee('Current Openings');

        $career = Career::first();
        $this->assertNotNull($career);

        // 2. Candidate views single job opening
        $this->get('/careers/' . $career->slug)
            ->assertStatus(200)
            ->assertSee($career->title)
            ->assertSee('Apply for this Position');

        // 3. Candidate submits job application with resume file
        $fakeResume = \Illuminate\Http\UploadedFile::fake()->create('sneha_resume.pdf', 150, 'application/pdf');

        $response = $this->post('/careers/' . $career->id . '/apply', [
            'name' => 'Sneha Kulkarni',
            'email' => 'sneha.kulkarni@example.com',
            'phone' => '+91 98877 66554',
            'resume' => $fakeResume,
            'cover_letter' => 'Experienced Laravel and Vue developer with 3 years building SaaS ERP modules.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('job_applications', [
            'career_id' => $career->id,
            'email' => 'sneha.kulkarni@example.com',
            'name' => 'Sneha Kulkarni',
        ]);

        $application = JobApplication::where('email', 'sneha.kulkarni@example.com')->first();
        $this->assertNotNull($application->resume_path);
        \Illuminate\Support\Facades\Storage::disk('public')->assertExists($application->resume_path);

        // 4. Admin accesses job applications list
        $admin = User::where('email', 'admin@creativetechsquad.in')->first();

        $this->actingAs($admin)
            ->get('/admin/job-applications')
            ->assertStatus(200)
            ->assertSee('Sneha Kulkarni')
            ->assertSee('Download Resume');

        // 5. Admin updates application status to shortlisted
        $this->actingAs($admin)
            ->patch('/admin/job-applications/' . $application->id . '/status', [
                'status' => 'shortlisted',
            ])
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertDatabaseHas('job_applications', [
            'id' => $application->id,
            'status' => 'shortlisted',
        ]);

        // 6. Admin creates a new job posting
        $this->actingAs($admin)
            ->post('/admin/careers', [
                'title' => 'Senior AI / LLM Engineer',
                'department' => 'AI Engineering',
                'location' => 'Pune / Hybrid',
                'employment_type' => 'Full-time',
                'experience' => '3+ Years',
                'description' => 'Build generative AI agents and RAG pipelines for enterprise clients.',
                'status' => 'active',
            ])
            ->assertRedirect(route('admin.careers.index'));

        $this->assertDatabaseHas('careers', [
            'title' => 'Senior AI / LLM Engineer',
            'department' => 'AI Engineering',
        ]);
    }

    public function test_rest_api_v1_endpoints(): void
    {
        $this->getJson('/api/v1/services')
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    '*' => ['id', 'title', 'slug', 'short_description']
                ]
            ]);

        $this->getJson('/api/v1/products')
            ->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->getJson('/api/v1/products/cts-enterprise-erp')
            ->assertStatus(200)
            ->assertJsonPath('data.name', 'CTS Enterprise ERP');

        $this->getJson('/api/v1/projects')
            ->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->getJson('/api/v1/programs')
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }
}
