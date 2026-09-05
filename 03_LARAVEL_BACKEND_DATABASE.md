# Creative Tech Squad --- Laravel Backend, Admin Panel and Database

## Recommended Architecture

Use Laravel as the main web application and CMS backend.

``` text
Browser
   |
   v
Laravel Routes
   |
Controllers
   |
Services
   |
Models / Eloquent
   |
MySQL
```

For future enterprise applications:

``` text
Angular / Mobile App
        |
        v
Laravel REST API
        |
        +---- MySQL
        |
        +---- AI Services
        |
        +---- External APIs
```

## Laravel Setup

Recommended: - Laravel 11+ - PHP 8.2+ - MySQL 8+ - Composer -
Node.js/npm - Apache via XAMPP for local development

Example:

``` bash
composer create-project laravel/laravel creative-tech-squad
cd creative-tech-squad

cp .env.example .env
php artisan key:generate

php artisan migrate
npm install
npm run build
php artisan serve
```

## XAMPP Configuration

Place project inside:

``` text
C:\xampp\htdocs\creative-tech-squad
```

Apache:

``` text
Port 80
```

MySQL:

``` text
Port 3306
```

Example `.env`:

``` env
APP_NAME="Creative Tech Squad"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost/creative-tech-squad

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=creative_tech_squad
DB_USERNAME=root
DB_PASSWORD=
```

## Production Recommendation

Do not use XAMPP as the production server.

For production use: - Linux server - Nginx/Apache - PHP-FPM - MySQL -
SSL - Queue worker - Scheduler - Backups - Environment variables

## Admin Panel

Create:

``` text
/admin/login
/admin/dashboard
/admin/products
/admin/projects
/admin/services
/admin/blog
/admin/programs
/admin/internships
/admin/careers
/admin/inquiries
/admin/team
/admin/settings
```

## Admin Roles

### Super Admin

Full access.

### Content Admin

Manage: - Pages - Blog - Products - Projects - Programs

### Recruitment Admin

Manage: - Careers - Internship applications

### Inquiry Admin

Manage: - Contact inquiries - Project inquiries

## Core Tables

### users

``` text
id
name
email
password
role
status
created_at
updated_at
```

### services

``` text
id
title
slug
short_description
description
icon
image
sort_order
status
created_at
updated_at
```

### products

``` text
id
name
slug
category
short_description
description
features
technology_stack
image
demo_url
status
is_featured
created_at
updated_at
```

### projects

``` text
id
title
slug
client_name
category
description
challenge
solution
technology_stack
image
project_url
status
is_featured
created_at
updated_at
```

### blog_posts

``` text
id
title
slug
excerpt
content
featured_image
category_id
author_id
meta_title
meta_description
status
published_at
created_at
updated_at
```

### categories

``` text
id
name
slug
type
status
created_at
updated_at
```

### programs

``` text
id
title
slug
type
duration
level
description
skills
project_details
certificate
fee
image
status
created_at
updated_at
```

### internship_applications

``` text
id
name
email
phone
college
course
graduation_year
preferred_track
resume_path
message
status
created_at
updated_at
```

### careers

``` text
id
title
slug
department
location
employment_type
experience
description
requirements
salary_range
status
created_at
updated_at
```

### job_applications

``` text
id
career_id
name
email
phone
resume_path
cover_letter
status
created_at
updated_at
```

### inquiries

``` text
id
name
email
phone
company
inquiry_type
budget_range
message
status
assigned_to
created_at
updated_at
```

### contact_messages

``` text
id
name
email
phone
subject
message
status
created_at
updated_at
```

### testimonials

``` text
id
name
designation
company
message
image
rating
status
created_at
updated_at
```

### settings

``` text
id
key
value
type
created_at
updated_at
```

## Recommended Relationships

``` text
Category
  |
  +---- Blog Posts

Career
  |
  +---- Job Applications

User
  |
  +---- Blog Posts

Admin User
  |
  +---- Inquiries
```

## Validation

Contact:

``` php
$request->validate([
    'name' => ['required', 'string', 'max:100'],
    'email' => ['required', 'email'],
    'phone' => ['nullable', 'string', 'max:20'],
    'message' => ['required', 'string', 'max:5000'],
]);
```

## Security

Implement: - CSRF protection - Request validation - Authentication -
Authorization/policies - Rate limiting - Password hashing - Secure file
uploads - MIME/type validation - Maximum upload size - XSS-safe output -
SQL injection protection through Eloquent/query builder - HTTPS in
production - Regular database backups

## Dynamic CMS Rule

Do not hard-code products, projects, blogs, testimonials, jobs, or
internship programs in Blade.

Admin should be able to create/edit/delete/publish them.
