@extends('admin.layouts.master')

@section('title', 'Products & ERP Management')
@section('page_title', 'Products & Platforms')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Products & ERP Platforms</div>
    <a href="{{ route('admin.products.create') }}" class="admin-btn admin-btn-primary">+ Add New Product</a>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Status</th>
          <th>Featured</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($products as $prod)
          <tr>
            <td>
              <strong>{{ $prod->name }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">/products/{{ $prod->slug }}</div>
            </td>
            <td><span class="admin-badge admin-badge-blue">{{ $prod->category }}</span></td>
            <td>
              <span class="admin-badge {{ $prod->status === 'published' ? 'admin-badge-success' : 'admin-badge-warning' }}">
                {{ ucfirst($prod->status) }}
              </span>
            </td>
            <td>
              @if($prod->is_featured)
                <span class="admin-badge admin-badge-purple">Featured</span>
              @else
                <span style="color:#94A3B8; font-size:0.85rem;">Standard</span>
              @endif
            </td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.products.edit', $prod->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Edit</a>
                <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" style="text-align:center;">No products created yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
