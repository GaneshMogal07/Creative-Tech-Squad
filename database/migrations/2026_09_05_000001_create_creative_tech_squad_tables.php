<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('blog'); // blog, product, project, service
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 2. Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 3. Products
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->default('ERP'); // ERP, Business, Education, AI, Healthcare, Other
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->json('features')->nullable();
            $table->json('technology_stack')->nullable();
            $table->string('image')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('status')->default('published');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        // 4. Projects (Portfolio)
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('category')->default('ERP');
            $table->text('description')->nullable();
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->json('technology_stack')->nullable();
            $table->string('image')->nullable();
            $table->string('project_url')->nullable();
            $table->string('status')->default('published');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        // 5. Blog Posts
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('featured_image')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('status')->default('published');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // 6. Programs (Education)
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type')->default('Course');
            $table->string('duration')->nullable();
            $table->string('level')->default('All Levels');
            $table->longText('description')->nullable();
            $table->json('skills')->nullable();
            $table->text('project_details')->nullable();
            $table->boolean('certificate')->default(true);
            $table->string('fee')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 7. Internship Applications
        Schema::create('internship_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('college')->nullable();
            $table->string('course')->nullable();
            $table->string('graduation_year')->nullable();
            $table->string('preferred_track')->nullable();
            $table->string('resume_path')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // pending, under_review, accepted, rejected
            $table->timestamps();
        });

        // 8. Careers
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department')->nullable();
            $table->string('location')->default('Nashik / Pune / Remote');
            $table->string('employment_type')->default('Full-time');
            $table->string('experience')->nullable();
            $table->longText('description')->nullable();
            $table->longText('requirements')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 9. Job Applications
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained('careers')->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('resume_path')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // 10. Inquiries
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('inquiry_type')->default('Project'); // ERP, Custom Software, AI, Education, Other
            $table->string('budget_range')->nullable();
            $table->text('message');
            $table->string('status')->default('new'); // new, contacted, closed
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 11. Contact Messages
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('status')->default('unread'); // unread, read, replied
            $table->timestamps();
        });

        // 12. Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('company')->nullable();
            $table->text('message');
            $table->string('image')->nullable();
            $table->integer('rating')->default(5);
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 13. Settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('type')->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('job_applications');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('internship_applications');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('products');
        Schema::dropIfExists('services');
        Schema::dropIfExists('categories');
    }
};
