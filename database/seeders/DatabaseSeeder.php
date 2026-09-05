<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Career;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Inquiry;
use App\Models\InternshipApplication;
use App\Models\Product;
use App\Models\Program;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin Users
        $superAdmin = User::updateOrCreate(
            ['email' => 'admin@creativetechsquad.in'],
            [
                'name' => 'Creative Tech Squad Admin',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'status' => 'active',
            ]
        );

        $recruitmentAdmin = User::updateOrCreate(
            ['email' => 'recruitment@creativetechsquad.in'],
            [
                'name' => 'CTS Recruitment Team',
                'password' => Hash::make('password'),
                'role' => 'recruitment_admin',
                'status' => 'active',
            ]
        );

        // 2. Settings
        $settings = [
            'site_name' => 'Creative Tech Squad',
            'site_tagline' => 'Building smart digital solutions with teamwork, creativity, and technology.',
            'site_domain' => 'creativetechsquad.in',
            'contact_email' => 'creativetechsquad.official@gmail.com',
            'contact_phone' => '+91 95119 51568',
            'contact_address' => 'Creative Tech Squad Innovation Hub, Pune / Nashik, Maharashtra, India',
            'hero_headline' => 'Technology that moves your business forward.',
            'hero_subheading' => 'Creative Tech Squad builds ERP solutions, custom software products, AI-powered applications, and practical technology programs.',
            'linkedin_url' => 'https://linkedin.com/company/creativetechsquad',
            'github_url' => 'https://github.com/creativetechsquad',
            'twitter_url' => 'https://twitter.com/creativetechsquad',
            'instagram_url' => 'https://instagram.com/creativetechsquad',
            'meta_description' => 'Creative Tech Squad is a modern software company building scalable ERP platforms, custom digital products, AI solutions, and engineering programs.',
            'meta_keywords' => 'Creative Tech Squad, ERP Solutions, Custom Software, AI Applications, Laravel Development, Java Spring Boot, Angular, Internship Programs',
        ];

        foreach ($settings as $key => $val) {
            Setting::set($key, $val);
        }

        // 3. Categories
        $categories = [
            ['name' => 'Technology', 'slug' => 'technology', 'type' => 'blog'],
            ['name' => 'Laravel & PHP', 'slug' => 'laravel-php', 'type' => 'blog'],
            ['name' => 'Java & Spring Boot', 'slug' => 'java-spring-boot', 'type' => 'blog'],
            ['name' => 'Artificial Intelligence', 'slug' => 'artificial-intelligence', 'type' => 'blog'],
            ['name' => 'ERP & Operations', 'slug' => 'erp-operations', 'type' => 'blog'],
            ['name' => 'Career & Learning', 'slug' => 'career-learning', 'type' => 'blog'],
            ['name' => 'ERP Solutions', 'slug' => 'erp-solutions', 'type' => 'product'],
            ['name' => 'AI Products', 'slug' => 'ai-products', 'type' => 'product'],
            ['name' => 'Business Apps', 'slug' => 'business-apps', 'type' => 'product'],
            ['name' => 'EdTech', 'slug' => 'edtech', 'type' => 'product'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 4. Services
        $services = [
            [
                'title' => 'ERP Solutions',
                'slug' => 'erp-solutions',
                'short_description' => 'End-to-end enterprise resource planning tailored to streamline HR, payroll, attendance, inventory, and operations.',
                'description' => 'We engineer unified ERP ecosystems that eliminate operational silos. Built with modular architectures, our ERP platforms handle multi-branch management, automated payroll rules, role-based workflows, shift scheduling, real-time analytics, and secure data audits. Designed for high throughput and flawless reliability.',
                'icon' => 'grid-outline',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'title' => 'Custom Software Products',
                'slug' => 'custom-software',
                'short_description' => 'Purpose-built web platforms, SaaS architectures, and bespoke client applications crafted to solve specific business hurdles.',
                'description' => 'From initial blueprint to production deployment, we transform complex domain requirements into resilient digital products. We leverage modern full-stack architectures to build high-performance client portals, B2B marketplaces, workflow engines, and enterprise dashboard suites.',
                'icon' => 'code-slash-outline',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'title' => 'AI-Powered Solutions',
                'slug' => 'ai-solutions',
                'short_description' => 'Infuse practical machine learning, document intelligence, intelligent conversational agents, and predictive workflows into your business.',
                'description' => 'Practical AI that provides measurable ROI. We build custom retrieval-augmented generation (RAG) knowledge assistants, automated document scanning and invoice extraction pipelines, smart search indexing, and predictive analytics that give leadership actionable clarity.',
                'icon' => 'sparkles-outline',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'title' => 'API & Cloud Integrations',
                'slug' => 'api-integrations',
                'short_description' => 'Robust RESTful API design, microservices integration, third-party payment gateways, CRM, and cloud synchronization.',
                'description' => 'Seamlessly connect disparate legacy systems, external SaaS services, payment processors, WhatsApp/SMS communication channels, and automated webhook pipelines with rock-solid security, rate limiting, and 99.9% uptime reliability.',
                'icon' => 'git-network-outline',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'title' => 'Education & Skill Programs',
                'slug' => 'education-programs',
                'short_description' => 'Industry-grade project-based training and intensive internship programs for emerging engineers in Laravel, Spring Boot, and AI.',
                'description' => 'Bridging academia with enterprise reality. Our cohort-based programs focus on real codebases, production deployments, pull request reviews, architecture patterns, database design, and real-world delivery confidence.',
                'icon' => 'school-outline',
                'sort_order' => 5,
                'status' => 'active',
            ],
            [
                'title' => 'Dashboards & BI Analytics',
                'slug' => 'dashboards-analytics',
                'short_description' => 'Executive telemetry, real-time KPI monitoring, automated reporting, and interactive data visualizations.',
                'description' => 'Convert raw business data into actionable executive insights. We build intuitive dashboards with granular drill-down filters, scheduled PDF/Excel reports, role-based visibility, and high-performance aggregate database queries.',
                'icon' => 'pie-chart-outline',
                'sort_order' => 6,
                'status' => 'active',
            ],
        ];

        foreach ($services as $srv) {
            Service::updateOrCreate(['slug' => $srv['slug']], $srv);
        }

        // 5. Products
        $products = [
            [
                'name' => 'CTS Enterprise ERP',
                'slug' => 'cts-enterprise-erp',
                'category' => 'ERP',
                'short_description' => 'Comprehensive modular ERP system for workforce management, payroll automation, biometric sync, and departmental workflows.',
                'description' => 'CTS Enterprise ERP is an all-in-one operational backbone engineered for mid-to-large enterprises, educational institutions, and healthcare providers. It provides automated multi-shift attendance tracking, statutory tax compliance, flexible leave management, customizable approval hierarchies, asset tracking, and instant executive analytics.',
                'features' => [
                    'Multi-branch and multi-department organization hierarchy',
                    'Automated biometric & geo-fenced attendance synchronization',
                    'Configurable salary rules, deductions, PF, and statutory taxes',
                    'Automated PDF pay-slip generation and employee self-service portal',
                    'Dynamic role-based permissions and granular audit trails',
                    'Instant Excel/PDF exports and scheduled executive reports',
                ],
                'technology_stack' => ['Laravel 11', 'MySQL 8', 'REST APIs', 'Blade', 'Chart.js', 'Redis'],
                'image' => 'erp_suite.webp',
                'demo_url' => 'https://creativetechsquad.in/demo/erp',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'name' => 'DocIntel AI Assistant',
                'slug' => 'docintel-ai-assistant',
                'category' => 'AI',
                'short_description' => 'Next-gen enterprise document intelligence platform for PDF parsing, contract analysis, and conversational knowledge base.',
                'description' => 'DocIntel transforms unstructured enterprise documents into searchable, conversational knowledge. Upload thousands of internal SOPs, contracts, financial statements, and technical documentation to query them in natural language with strict source citations and zero data leakage.',
                'features' => [
                    'Multi-format OCR & parsing (PDF, DOCX, Scanned Invoices)',
                    'Semantic search & Retrieval-Augmented Generation (RAG)',
                    'Automated invoice line-item extraction into accounting DB',
                    'Context-aware contract clause risk analysis',
                    'Role-governed document privacy and end-to-end encryption',
                ],
                'technology_stack' => ['Python / FastAPI', 'Laravel API Gateway', 'PostgreSQL pgvector', 'OpenAI / Claude LLMs', 'Tailwind'],
                'image' => 'ai_docintel.webp',
                'demo_url' => 'https://creativetechsquad.in/demo/docintel',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'name' => 'EduPulse LMS & Academy Hub',
                'slug' => 'edupulse-lms',
                'category' => 'Education',
                'short_description' => 'Modern learning management platform with live assessments, assignment review workflow, and automated certification.',
                'description' => 'EduPulse is crafted for universities, training institutes, and EdTech startups. Features structured video course delivery, automated coding challenge evaluations, batch management, student performance telemetry, and verifiable digital certificate issuance.',
                'features' => [
                    'Curriculum builder with video, quizzes, and code assessments',
                    'Automated attendance tracking and assignment grading pipelines',
                    'Live student progress analytics and drop-off detection',
                    'Verifiable cryptographic certificate issuance with QR codes',
                    'Integrated discussion forums and mentor 1-on-1 booking',
                ],
                'technology_stack' => ['Laravel', 'Angular', 'MySQL', 'WebSockets', 'AWS S3'],
                'image' => 'edupulse_lms.webp',
                'demo_url' => 'https://creativetechsquad.in/demo/edupulse',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'name' => 'SmartBiz Invoicing & CRM',
                'slug' => 'smartbiz-crm-invoicing',
                'category' => 'Business',
                'short_description' => 'Streamlined lead management, recurring billing, GST compliant invoicing, and client payment portal.',
                'description' => 'SmartBiz empowers service agencies, consultants, and IT companies to track leads from first outreach to invoice settlement. Automate milestone payments, recurring retainer invoices, payment gateway reminders, and client milestone delivery portals.',
                'features' => [
                    'Visual Kanban sales pipeline and lead scoring',
                    'GST-compliant invoice generation with automated tax breakdown',
                    'Integrated Razorpay & Stripe checkout with instant webhooks',
                    'Client portal for viewing quotes, project milestones, and receipts',
                    'Financial forecast dashboard and cash flow projections',
                ],
                'technology_stack' => ['Laravel 11', 'Bootstrap 5', 'MySQL', 'Stripe / Razorpay API'],
                'image' => 'smartbiz_crm.webp',
                'demo_url' => 'https://creativetechsquad.in/demo/smartbiz',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'name' => 'FleetFlow Dispatch & Logistics',
                'slug' => 'fleetflow-logistics',
                'category' => 'Business',
                'short_description' => 'Real-time vehicle tracking, route optimization, driver assignment, and preventative maintenance logs.',
                'description' => 'FleetFlow offers transportation and delivery companies total visibility over vehicle fleets. Optimize delivery routes, monitor fuel expenditures, log preventative maintenance intervals, and automate delivery confirmation with signature capture.',
                'features' => [
                    'GPS vehicle telemetry and live geofencing alerts',
                    'Smart delivery route clustering and fuel optimization',
                    'Maintenance scheduler with mileage alerts and expense tracking',
                    'Mobile driver companion web application with proof-of-delivery',
                ],
                'technology_stack' => ['Laravel', 'Vue.js', 'Leaflet / OpenStreetMap', 'MySQL', 'Pusher'],
                'image' => 'fleetflow.webp',
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => false,
            ],
            [
                'name' => 'HealthCare 360 Clinic Suite',
                'slug' => 'healthcare-360-suite',
                'category' => 'Healthcare',
                'short_description' => 'Electronic Medical Records (EMR), doctor appointment scheduling, pharmacy inventory, and lab reports.',
                'description' => 'A secure, HIPAA/ABDM aligned medical practice management solution. Enables clinics and multi-specialty hospitals to register patients, record clinical consultations, generate digital prescriptions, manage pharmaceutical inventory, and dispatch lab test results.',
                'features' => [
                    'Online patient booking with SMS/WhatsApp appointment reminders',
                    'EMR clinical notes with ICD-10 diagnostic coding',
                    'Pharmacy inventory tracking with expiry batch warnings',
                    'Secure patient record sharing with OTP verification',
                ],
                'technology_stack' => ['Java Spring Boot', 'Angular', 'MySQL', 'Docker'],
                'image' => 'healthcare360.webp',
                'demo_url' => null,
                'status' => 'published',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $prd) {
            Product::updateOrCreate(['slug' => $prd['slug']], $prd);
        }

        // 6. Portfolio Projects
        $projects = [
            [
                'title' => 'Precision Manufacturing ERP Overhaul',
                'slug' => 'precision-manufacturing-erp',
                'client_name' => 'Apex Industrial Tech Ltd.',
                'category' => 'ERP',
                'description' => 'A full modernization of a multi-plant manufacturing ERP replacing legacy spreadsheets with automated work orders, bill of materials (BOM), and biometric attendance.',
                'challenge' => 'The client operated across 3 regional manufacturing hubs with disconnected paper logs, resulting in frequent inventory stockouts, inaccurate payroll calculations, and 48-hour reporting delays.',
                'solution' => 'Creative Tech Squad designed and deployed CTS Enterprise ERP with live plant floor synchronization, automated biometric sync across all hubs, and real-time inventory ledger tracking.',
                'technology_stack' => ['Laravel 11', 'MySQL', 'REST API', 'Redis', 'Docker'],
                'image' => 'case_study_manufacturing.webp',
                'project_url' => 'https://creativetechsquad.in/portfolio/precision-manufacturing-erp',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title' => 'AI Document Intelligence & KYC Automation',
                'slug' => 'fintech-kyc-document-ai',
                'client_name' => 'VeriFinance Global',
                'category' => 'AI',
                'description' => 'Automated identity verification and bank statement OCR processing for a fast-scaling FinTech lending platform.',
                'challenge' => 'Manual loan verification teams took over 24 hours per applicant to read scanned bank statements, verify tax documents, and check fraud parameters.',
                'solution' => 'Built an intelligent document pipeline using deep OCR and LLM-assisted verification, parsing financial data in under 4 seconds with 99.4% accuracy.',
                'technology_stack' => ['Python', 'Laravel API Gateway', 'PostgreSQL', 'FastAPI', 'AWS Textract'],
                'image' => 'case_study_fintech.webp',
                'project_url' => 'https://creativetechsquad.in/portfolio/fintech-kyc-document-ai',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title' => 'EduMaster University Examination & LMS Portal',
                'slug' => 'edumaster-university-portal',
                'client_name' => 'Apex Education Foundation',
                'category' => 'Education',
                'description' => 'A unified student portal serving 12,000+ students with semester enrollment, hall tickets, online assignments, and digital grade cards.',
                'challenge' => 'High server load during exam results release caused frequent system crashes and prolonged student distress.',
                'solution' => 'Engineered a highly optimized caching layer with MySQL indexing and asynchronous queue workers, handling 15,000 concurrent student hits with sub-100ms response times.',
                'technology_stack' => ['Laravel', 'Angular', 'MySQL 8', 'Redis', 'Nginx'],
                'image' => 'case_study_education.webp',
                'project_url' => 'https://creativetechsquad.in/portfolio/edumaster-university-portal',
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title' => 'OmniChannel Retail POS & Multi-Store Inventory',
                'slug' => 'retail-pos-multi-store',
                'client_name' => 'UrbanTrend Fashion Group',
                'category' => 'Business',
                'description' => 'Real-time billing counter POS with offline-first synchronization across 18 retail outlets.',
                'challenge' => 'Internet connectivity fluctuations at mall outlets previously caused stalled checkout lines.',
                'solution' => 'Constructed an offline-capable browser application that queues offline receipts locally and syncs back to central MySQL once connection is restored.',
                'technology_stack' => ['Laravel API', 'IndexedDB', 'Bootstrap', 'MySQL', 'WebSockets'],
                'image' => 'case_study_retail.webp',
                'project_url' => 'https://creativetechsquad.in/portfolio/retail-pos-multi-store',
                'status' => 'published',
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $prj) {
            Project::updateOrCreate(['slug' => $prj['slug']], $prj);
        }

        // 7. Education Programs
        $programs = [
            [
                'title' => 'Full-Stack Web Engineering with Laravel & Blade',
                'slug' => 'full-stack-laravel-engineering',
                'type' => 'Professional Course & Internship',
                'duration' => '3 Months (Live Cohort)',
                'level' => 'Beginner to Advanced',
                'description' => 'Master real-world enterprise web engineering. Learn modern Laravel 11 architecture, Eloquent ORM, RESTful API design, database normalization, authentication, payment gateways, and live production deployment on Linux servers.',
                'skills' => ['PHP 8.2+', 'Laravel 11', 'MySQL Optimization', 'REST APIs', 'Blade Engine', 'Git & CI/CD', 'Server Deployment'],
                'project_details' => 'Build a multi-tenant ERP system from scratch, complete with role permissions, payment webhooks, and background queues.',
                'certificate' => true,
                'fee' => '₹14,999 (Scholarships Available)',
                'image' => 'prog_laravel.webp',
                'status' => 'active',
            ],
            [
                'title' => 'Enterprise Java Backend & Spring Boot Masterclass',
                'slug' => 'enterprise-java-spring-boot',
                'type' => 'Advanced Specialization',
                'duration' => '4 Months',
                'level' => 'Intermediate to Advanced',
                'description' => 'Deep dive into enterprise Java engineering. Master Spring Boot 3, Spring Data JPA, Microservices architecture, Spring Security with JWT, Docker containers, and high-concurrency message queues with RabbitMQ.',
                'skills' => ['Java 21', 'Spring Boot 3', 'Spring Data JPA', 'Microservices', 'Spring Security / JWT', 'Docker', 'PostgreSQL'],
                'project_details' => 'Architect a distributed microservices banking & transaction ledger engine with automated test coverage.',
                'certificate' => true,
                'fee' => '₹17,999',
                'image' => 'prog_java.webp',
                'status' => 'active',
            ],
            [
                'title' => 'Modern Frontend Development with Angular & TypeScript',
                'slug' => 'modern-frontend-angular',
                'type' => 'Frontend Specialization',
                'duration' => '3 Months',
                'level' => 'Intermediate',
                'description' => 'Build lightning-fast, reactive enterprise web applications using modern standalone Angular, RxJS observables, NgRx state management, responsive UI design systems, and seamless REST API integrations.',
                'skills' => ['Angular 18+', 'TypeScript', 'RxJS', 'NgRx State Management', 'Tailwind / Bootstrap', 'REST Integration'],
                'project_details' => 'Develop a high-performance interactive B2B analytics dashboard with live charts, search filters, and responsive layout.',
                'certificate' => true,
                'fee' => '₹12,999',
                'image' => 'prog_angular.webp',
                'status' => 'active',
            ],
            [
                'title' => 'Applied AI Engineering & LLM Application Development',
                'slug' => 'applied-ai-engineering',
                'type' => 'Emerging Tech Intensive',
                'duration' => '2 Months',
                'level' => 'Intermediate',
                'description' => 'Learn how to build AI-powered applications that businesses actually pay for. Cover prompt engineering, embeddings, vector databases, RAG architecture, LangChain, and API-driven automation.',
                'skills' => ['Python', 'OpenAI / Anthropic APIs', 'RAG Architecture', 'Vector Databases (Chroma/pgvector)', 'FastAPI', 'AI Agent Workflows'],
                'project_details' => 'Build a multi-document AI Q&A search system with conversational memory and custom data citation.',
                'certificate' => true,
                'fee' => '₹15,999',
                'image' => 'prog_ai.webp',
                'status' => 'active',
            ],
        ];

        foreach ($programs as $prg) {
            Program::updateOrCreate(['slug' => $prg['slug']], $prg);
        }

        // 8. Careers
        $careers = [
            [
                'title' => 'Senior Laravel / PHP Backend Engineer',
                'slug' => 'senior-laravel-backend-engineer',
                'department' => 'Software Engineering',
                'location' => 'Pune / Nashik / Hybrid',
                'employment_type' => 'Full-time',
                'experience' => '3 - 6 Years',
                'description' => 'We are seeking an experienced Laravel engineer to lead the backend architecture of our flagship ERP systems and enterprise client products. You will design scalable database schemas, optimize high-throughput queries, and build robust RESTful APIs.',
                'requirements' => "• Strong command over PHP 8.2+ and Laravel 10/11\n• Deep understanding of MySQL database design, query optimization, and indexing\n• Experience building clean RESTful APIs and webhook integrations\n• Familiarity with Redis, queues, caching, and Linux deployment environments\n• Strong code review practices and commitment to clean architectural patterns",
                'salary_range' => '₹8,00,000 - ₹14,00,000 / annum',
                'status' => 'active',
            ],
            [
                'title' => 'Java Spring Boot Microservices Developer',
                'slug' => 'java-spring-boot-developer',
                'department' => 'Enterprise Platforms',
                'location' => 'Pune / Hybrid',
                'employment_type' => 'Full-time',
                'experience' => '2 - 5 Years',
                'description' => 'Join our enterprise development squad to build robust microservices architectures for healthcare and fintech clients using Java Spring Boot, Docker, and distributed message brokers.',
                'requirements' => "• Proficiency in Java 17/21 and Spring Boot ecosystem (Data JPA, Security, Cloud)\n• Solid understanding of RESTful API architecture and JSON contracts\n• Experience with relational databases (MySQL / PostgreSQL)\n• Hands-on experience with Docker, CI/CD, and Git workflows\n• Good problem-solving skills and enthusiasm for team mentorship",
                'salary_range' => '₹7,00,000 - ₹13,00,000 / annum',
                'status' => 'active',
            ],
            [
                'title' => 'Full Stack Developer (Laravel + Angular / Vue)',
                'slug' => 'full-stack-developer-laravel-angular',
                'department' => 'Product Team',
                'location' => 'Nashik / Remote',
                'employment_type' => 'Full-time',
                'experience' => '1 - 3 Years',
                'description' => 'Build dynamic, user-friendly business software interfaces and connect them to rock-solid Laravel backends. Perfect for a driven developer who loves creating polished user experiences.',
                'requirements' => "• Experience with modern JavaScript frameworks (Angular or Vue) and PHP/Laravel\n• Strong CSS3/SCSS styling skills and responsive design capabilities\n• Clean REST API consumption and state management\n• Positive attitude, eagerness to learn, and strong teamwork ethics",
                'salary_range' => '₹4,50,000 - ₹8,00,000 / annum',
                'status' => 'active',
            ],
        ];

        foreach ($careers as $car) {
            Career::updateOrCreate(['slug' => $car['slug']], $car);
        }

        // 9. Blog Posts
        $catLaravel = Category::where('slug', 'laravel-php')->first();
        $catAI = Category::where('slug', 'artificial-intelligence')->first();
        $catERP = Category::where('slug', 'erp-operations')->first();
        $catTech = Category::where('slug', 'technology')->first();

        $blogs = [
            [
                'title' => 'Architecting Scalable ERP Systems with Laravel 11 and MySQL',
                'slug' => 'architecting-scalable-erp-laravel-mysql',
                'excerpt' => 'A practical engineering guide on designing multi-branch databases, queue-backed payroll processing, and modular domain architectures in Laravel.',
                'content' => "<p>Enterprise Resource Planning (ERP) systems represent one of the most demanding classes of business software. Unlike simple CRUD applications, ERPs must manage intricate transactional dependencies, enforce strict multi-level approvals, maintain tamper-proof audit trails, and calculate statutory compliance in real time.</p><h3>1. Domain-Driven Modular Organization</h3><p>When developing an enterprise ERP in Laravel, keeping all models and controllers inside standard app directories quickly leads to maintenance bottlenecks. Organizing your modules into explicit domains (e.g., <code>App/Domains/HRMS</code>, <code>App/Domains/Payroll</code>, <code>App/Domains/Inventory</code>) allows teams to work independently without code collisions.</p><h3>2. Leveraging Database Transactions & Row Locking</h3><p>Financial and inventory deductions must never result in race conditions. Utilizing Laravel's <code>DB::transaction()</code> alongside pessimistic row locking (<code>lockForUpdate()</code>) ensures that concurrent user operations always maintain data integrity.</p><h3>3. Asynchronous Payroll & Report Generation</h3><p>Processing thousands of employee pay slips or recalculating tax deductions should never block the HTTP response cycle. By dispatching queued jobs to Redis-backed workers, the system guarantees a snappy experience for HR managers while processing intensive batch computations in the background.</p>",
                'category_id' => $catERP ? $catERP->id : null,
                'author_id' => $superAdmin->id,
                'meta_title' => 'Architecting Scalable ERP Systems with Laravel 11 - Creative Tech Squad',
                'meta_description' => 'Learn the best architectural patterns for building high-concurrency ERP applications using Laravel 11 and MySQL.',
                'status' => 'published',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Practical AI Integration: Bringing LLMs into Everyday Business Workflows',
                'slug' => 'practical-ai-integration-llms-business-workflows',
                'excerpt' => 'How to move beyond generic chatbot hype and build genuine ROI with Retrieval-Augmented Generation (RAG) and intelligent document parsing.',
                'content' => "<p>Artificial Intelligence is at its best when it seamlessly removes friction from daily administrative operations rather than acting as a standalone novelty. At Creative Tech Squad, we build AI solutions that integrate directly into existing business portals.</p><h3>The Power of Retrieval-Augmented Generation (RAG)</h3><p>Off-the-shelf language models cannot access your private enterprise data and often hallucinate when queried on internal policies. By storing vectorized embeddings of your internal company documentation in PostgreSQL using pgvector, your application can inject relevant, verified context directly into the prompt before sending it to the model.</p><h3>Automating Manual Invoice Entry</h3><p>Using vision-language models combined with structured JSON schema outputs, our systems extract invoice numbers, vendor details, tax line items, and totals directly from scanned supplier receipts into the database in seconds, eliminating manual data entry errors.</p>",
                'category_id' => $catAI ? $catAI->id : null,
                'author_id' => $superAdmin->id,
                'meta_title' => 'Practical AI Integration in Business Workflows - Creative Tech Squad',
                'meta_description' => 'Explore how RAG and document intelligence can transform enterprise efficiency without security compromises.',
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Why Practical Project-Based Internships Build Confident Software Engineers',
                'slug' => 'why-project-based-internships-build-confident-engineers',
                'excerpt' => 'The gap between college theory and enterprise delivery is vast. Here is why building production-grade projects accelerates a software developer’s career trajectory.',
                'content' => "<p>Many computer science graduates understand basic syntax and algorithmic puzzles, yet struggle when tasked with setting up a production database connection, debugging asynchronous race conditions, or creating a secure multi-role authentication system.</p><h3>Building for Real Users</h3><p>At Creative Tech Squad, our internship programs immerse students directly in real-world application architectures. Interns learn how to structure database migrations, manage version control branches with Git, write clean API endpoints, and test for edge cases.</p><p>By the conclusion of the program, participants have built functional software platforms they can confidently showcase to prospective employers.</p>",
                'category_id' => $catTech ? $catTech->id : null,
                'author_id' => $superAdmin->id,
                'meta_title' => 'Project-Based Internships for Software Engineers - Creative Tech Squad',
                'meta_description' => 'Discover how Creative Tech Squad practical internship programs prepare aspiring engineers for top software engineering careers.',
                'status' => 'published',
                'published_at' => now()->subDays(12),
            ],
        ];

        foreach ($blogs as $blg) {
            BlogPost::updateOrCreate(['slug' => $blg['slug']], $blg);
        }

        // 10. Testimonials
        $testimonials = [
            [
                'name' => 'Rajesh Sharma',
                'designation' => 'Chief Technology Officer',
                'company' => 'Apex Industrial Tech Ltd.',
                'message' => 'Creative Tech Squad delivered our multi-plant ERP on schedule with exceptional engineering quality. Our attendance sync and payroll calculation cycle time dropped from 3 days to less than 15 minutes.',
                'rating' => 5,
                'status' => 'active',
            ],
            [
                'name' => 'Dr. Meera Kulkarni',
                'designation' => 'Dean of Academics',
                'company' => 'Apex Education Foundation',
                'message' => 'The EduMaster university portal built by CTS handled our peak semester results announcement without a glitch. Their team’s responsiveness and architecture competence are truly outstanding.',
                'rating' => 5,
                'status' => 'active',
            ],
            [
                'name' => 'Siddharth Patil',
                'designation' => 'Software Engineer (Alumnus)',
                'company' => 'Global IT Services',
                'message' => 'The Full-Stack Laravel internship at Creative Tech Squad transformed my coding confidence. Building real products with senior mentors gave me the exact skills I needed to crack my first software engineering job.',
                'rating' => 5,
                'status' => 'active',
            ],
        ];

        foreach ($testimonials as $tst) {
            Testimonial::updateOrCreate(['name' => $tst['name']], $tst);
        }

        // 12. Sample Job Applications & Internship Applications
        $laravelJob = Career::where('slug', 'senior-laravel-backend-engineer')->first();
        if ($laravelJob) {
            \App\Models\JobApplication::updateOrCreate(
                ['email' => 'rahul.desai@devmail.com'],
                [
                    'career_id' => $laravelJob->id,
                    'name' => 'Rahul Desai',
                    'phone' => '+91 98112 34567',
                    'resume_path' => null,
                    'cover_letter' => '4 years of experience building high-performance Laravel 10/11 backends, MySQL optimization, and REST API microservices.',
                    'status' => 'pending',
                ]
            );
        }

        InternshipApplication::updateOrCreate(
            ['email' => 'sakshi.shinde@college.edu'],
            [
                'name' => 'Sakshi Shinde',
                'phone' => '+91 97651 23456',
                'college' => 'MIT World Peace University, Pune',
                'course' => 'B.Tech IT (Final Year)',
                'graduation_year' => '2026',
                'preferred_track' => 'Laravel / Full Stack PHP',
                'resume_path' => null,
                'message' => 'Built academic projects in PHP and MySQL. Looking forward to writing production code under senior mentorship at Creative Tech Squad.',
                'status' => 'pending',
            ]
        );
    }
}
