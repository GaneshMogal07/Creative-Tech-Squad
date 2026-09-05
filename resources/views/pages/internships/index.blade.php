@extends('layouts.app')

@section('title', 'Internship & Developer Skill Programs — Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content container-narrow">
    <span class="eyebrow">Career Acceleration</span>
    <h1 class="hero-title">Build Real Production Systems. <br><span class="gradient-accent">Launch Your Engineering Career.</span></h1>
    <p class="section-subtitle mx-auto">
      Creative Tech Squad offers intensive, project-driven internship programs where you write real production code, submit pull requests, and learn directly from senior architects.
    </p>

    <div style="display:flex; justify-content:center; gap:16px;">
      <a href="#applySection" class="btn btn-primary btn-lg">Apply for Internship</a>
    </div>
  </div>
</section>

<!-- Internship Highlights -->
<section class="section" style="background:var(--cts-white);">
  <div class="container">
    <div class="text-center" style="margin-bottom:50px;">
      <span class="eyebrow">The CTS Advantage</span>
      <h2 class="section-title">What Makes Our Internship Unique</h2>
    </div>

    <div class="grid grid-3">
      <div class="card card-glass">
        <div style="font-size:2rem; margin-bottom:12px;">💻</div>
        <h3 style="font-size:1.25rem; margin-bottom:8px;">Live Codebases</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem;">
          No fake toy projects. You will write code for real modular ERPs, client APIs, and database migrations with Git version control.
        </p>
      </div>

      <div class="card card-glass">
        <div style="font-size:2rem; margin-bottom:12px;">👨‍💻</div>
        <h3 style="font-size:1.25rem; margin-bottom:8px;">1-on-1 Senior Mentorship</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem;">
          Experienced architects review every single pull request, giving you actionable feedback on design patterns, query efficiency, and security.
        </p>
      </div>

      <div class="card card-glass">
        <div style="font-size:2rem; margin-bottom:12px;">📜</div>
        <h3 style="font-size:1.25rem; margin-bottom:8px;">Verifiable Certification</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem;">
          Receive an official CTS Certificate of Internship and Letter of Recommendation highlighting the exact technologies and platforms you delivered.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Internship Tracks -->
<section class="section">
  <div class="container">
    <div class="text-center" style="margin-bottom:48px;">
      <span class="eyebrow">Available Tracks</span>
      <h2 class="section-title">Choose Your Engineering Focus</h2>
    </div>

    <div class="grid grid-4">
      <div class="card">
        <span class="badge badge-purple" style="margin-bottom:12px;">Backend & Full Stack</span>
        <h4 style="font-size:1.2rem; margin-bottom:8px;">Laravel & PHP 8.2+</h4>
        <p style="color:var(--cts-text-muted); font-size:0.88rem; margin-bottom:16px;">
          Build RESTful APIs, Eloquent ORM relationships, background queues, and modular ERP controllers.
        </p>
        <span style="font-size:0.8rem; font-weight:700; color:var(--cts-blue);">Track 01</span>
      </div>

      <div class="card">
        <span class="badge badge-blue" style="margin-bottom:12px;">Enterprise Backend</span>
        <h4 style="font-size:1.2rem; margin-bottom:8px;">Java Spring Boot</h4>
        <p style="color:var(--cts-text-muted); font-size:0.88rem; margin-bottom:16px;">
          Master Spring Data JPA, Microservices communication, Spring Security with JWT, and Docker setups.
        </p>
        <span style="font-size:0.8rem; font-weight:700; color:var(--cts-blue);">Track 02</span>
      </div>

      <div class="card">
        <span class="badge badge-success" style="margin-bottom:12px;">Frontend Platform</span>
        <h4 style="font-size:1.2rem; margin-bottom:8px;">Angular & TypeScript</h4>
        <p style="color:var(--cts-text-muted); font-size:0.88rem; margin-bottom:16px;">
          Develop reactive user interfaces, component design systems, RxJS state flows, and clean API consumption.
        </p>
        <span style="font-size:0.8rem; font-weight:700; color:var(--cts-blue);">Track 03</span>
      </div>

      <div class="card">
        <span class="badge badge-purple" style="margin-bottom:12px;">Emerging Tech</span>
        <h4 style="font-size:1.2rem; margin-bottom:8px;">AI & Doc Intelligence</h4>
        <p style="color:var(--cts-text-muted); font-size:0.88rem; margin-bottom:16px;">
          Build RAG pipelines with vector databases (pgvector), OCR invoice extractors, and LLM automation.
        </p>
        <span style="font-size:0.8rem; font-weight:700; color:var(--cts-blue);">Track 04</span>
      </div>
    </div>
  </div>
</section>

<!-- Application Form Section -->
<section class="section" id="applySection" style="background:var(--cts-white);">
  <div class="container container-narrow">
    <div class="card" style="padding:48px; border-radius:var(--cts-radius-xl); box-shadow:var(--cts-shadow-lg);">
      <div style="text-align:center; margin-bottom:36px;">
        <span class="eyebrow">Online Application</span>
        <h2 style="font-size:2rem; color:var(--cts-navy); margin-bottom:8px;">Apply for CTS Internship</h2>
        <p style="color:var(--cts-text-muted); font-size:0.95rem;">
          Applications are reviewed on a rolling basis. Shortlisted candidates are invited for a technical discussion.
        </p>
      </div>

      <form action="{{ route('internships.apply') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="form-label">Full Name *</label>
          <input type="text" name="name" class="form-control" placeholder="e.g. Ramesh Kulkarni" required>
        </div>

        <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
          <div>
            <label class="form-label">Email Address *</label>
            <input type="email" name="email" class="form-control" placeholder="ramesh@gmail.com" required>
          </div>
          <div>
            <label class="form-label">WhatsApp / Contact Phone *</label>
            <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210" required>
          </div>
        </div>

        <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
          <div>
            <label class="form-label">College / Institute *</label>
            <input type="text" name="college" class="form-control" placeholder="e.g. Pune Institute of Computer Technology" required>
          </div>
          <div>
            <label class="form-label">Course / Degree *</label>
            <input type="text" name="course" class="form-control" placeholder="e.g. B.E. Computer Engineering / MCA" required>
          </div>
        </div>

        <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
          <div>
            <label class="form-label">Graduation Year *</label>
            <select name="graduation_year" class="form-control form-select" required>
              <option value="2024">2024 (Graduated)</option>
              <option value="2025">2025 (Final Year)</option>
              <option value="2026" selected>2026 (Third Year)</option>
              <option value="2027">2027</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div>
            <label class="form-label">Preferred Internship Track *</label>
            <select name="preferred_track" class="form-control form-select" required>
              <option value="Laravel / Full Stack PHP">Laravel / Full Stack PHP</option>
              <option value="Java Spring Boot Backend">Java Spring Boot Backend</option>
              <option value="Angular & Frontend Development">Angular & Frontend Development</option>
              <option value="AI & Document Intelligence">AI & Document Intelligence</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Resume / CV (PDF, DOCX - Max 5MB)</label>
          <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <div class="form-group">
          <label class="form-label">Brief Introduction & Why You Want to Join CTS</label>
          <textarea name="message" class="form-control" rows="3" placeholder="Tell us about your coding experience, projects you've created, and what you aim to achieve..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg" style="width:100%;" id="submitInternshipBtn">
          Submit Internship Application
        </button>
      </form>
    </div>
  </div>
</section>
@endsection
