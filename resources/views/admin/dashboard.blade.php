@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')
@section('page_title', 'Overview Dashboard')

@section('content')

<!-- Metrics Stat Cards -->
<div class="admin-stats-grid">
  <div class="admin-stat-card">
    <div>
      <div class="admin-stat-title">Products & ERP</div>
      <div class="admin-stat-number">{{ $stats['total_products'] }}</div>
    </div>
    <div class="admin-stat-icon" style="background:#E0F2FE; color:#0284C7;">📦</div>
  </div>

  <div class="admin-stat-card">
    <div>
      <div class="admin-stat-title">New Inquiries</div>
      <div class="admin-stat-number" style="color:#007EFA;">{{ $stats['new_inquiries'] }}</div>
    </div>
    <div class="admin-stat-icon" style="background:#EBF5FF; color:#007EFA;">💼</div>
  </div>

  <div class="admin-stat-card">
    <div>
      <div class="admin-stat-title">Job Candidates</div>
      <div class="admin-stat-number" style="color:#059669;">{{ $stats['job_applications'] }}</div>
    </div>
    <div class="admin-stat-icon" style="background:#DCFCE7; color:#059669;">👔</div>
  </div>

  <div class="admin-stat-card">
    <div>
      <div class="admin-stat-title">Internship Applicants</div>
      <div class="admin-stat-number" style="color:#7B2CFF;">{{ $stats['internship_applications'] }}</div>
    </div>
    <div class="admin-stat-icon" style="background:#F3E8FF; color:#7B2CFF;">🎓</div>
  </div>
</div>

<!-- Two-Column Overview -->
<div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">

  <!-- Recent Project Inquiries -->
  <div class="admin-card">
    <div class="admin-card-header">
      <div class="admin-card-title">Recent Project Inquiries</div>
      <a href="{{ route('admin.inquiries.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">View All</a>
    </div>
    <div class="admin-table-wrapper">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Client</th>
            <th>Type</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentInquiries as $inq)
            <tr>
              <td>
                <strong>{{ $inq->name }}</strong>
                <div style="font-size:0.8rem; color:#64748B;">{{ $inq->email }}</div>
              </td>
              <td><span class="admin-badge admin-badge-blue">{{ $inq->inquiry_type }}</span></td>
              <td>
                <span class="admin-badge {{ $inq->status === 'new' ? 'admin-badge-warning' : 'admin-badge-success' }}">
                  {{ ucfirst($inq->status) }}
                </span>
              </td>
              <td style="font-size:0.85rem; color:#64748B;">{{ $inq->created_at->format('M d') }}</td>
            </tr>
          @empty
            <tr><td colspan="4" style="text-align:center; color:#64748B;">No recent inquiries.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Recent Job Applications -->
  <div class="admin-card">
    <div class="admin-card-header">
      <div class="admin-card-title">Recent Career Candidates</div>
      <a href="{{ route('admin.careers.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">Manage Jobs</a>
    </div>
    <div class="admin-table-wrapper">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Candidate</th>
            <th>Position</th>
            <th>Resume</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentJobs as $jobApp)
            <tr>
              <td>
                <strong>{{ $jobApp->name }}</strong>
                <div style="font-size:0.8rem; color:#64748B;">{{ $jobApp->email }} | {{ $jobApp->phone }}</div>
              </td>
              <td><span class="admin-badge admin-badge-blue">{{ $jobApp->career->title ?? 'General' }}</span></td>
              <td>
                @if($jobApp->resume_path)
                  <a href="{{ asset('storage/' . $jobApp->resume_path) }}" target="_blank" class="admin-badge admin-badge-purple">
                    📄 Resume ↗
                  </a>
                @else
                  <span style="font-size:0.8rem; color:#94A3B8;">No resume</span>
                @endif
              </td>
              <td style="font-size:0.85rem; color:#64748B;">{{ $jobApp->created_at->format('M d') }}</td>
            </tr>
          @empty
            <tr><td colspan="4" style="text-align:center; color:#64748B;">No job applications received yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Recent Internship Applications Full Row -->
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Recent Internship Applications</div>
    <a href="{{ route('admin.internships.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">View All ({{ $stats['internship_applications'] }})</a>
  </div>
  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Applicant</th>
          <th>College / Degree</th>
          <th>Track</th>
          <th>Status</th>
          <th>Resume</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($recentInternships as $app)
          <tr>
            <td>
              <strong>{{ $app->name }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">{{ $app->email }} | {{ $app->phone }}</div>
            </td>
            <td>
              <div>{{ $app->college ?? 'N/A' }}</div>
              <div style="font-size:0.8rem; color:#64748B;">{{ $app->course }} (Grad: {{ $app->graduation_year }})</div>
            </td>
            <td><span class="admin-badge admin-badge-purple">{{ $app->preferred_track }}</span></td>
            <td>
              <span class="admin-badge {{ $app->status === 'pending' ? 'admin-badge-warning' : 'admin-badge-success' }}">
                {{ ucfirst(str_replace('_', ' ', $app->status)) }}
              </span>
            </td>
            <td>
              @if($app->resume_path)
                <a href="{{ asset('storage/' . $app->resume_path) }}" target="_blank" class="admin-badge admin-badge-blue">
                  📄 View PDF ↗
                </a>
              @else
                <span style="color:#94A3B8; font-size:0.8rem;">No file</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.internships.show', $app->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Review &rarr;</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center; color:#64748B;">No internship applications yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
