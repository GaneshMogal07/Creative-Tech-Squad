<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login — Creative Tech Squad</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background:var(--cts-navy); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:20px;">

  <div class="card" style="width:100%; max-width:440px; padding:40px; border-radius:24px; box-shadow:0 25px 60px rgba(0,0,0,0.5);">
    <div class="text-center" style="margin-bottom:30px;">
      <img src="{{ asset('images/logo.png') }}" alt="Creative Tech Squad" style="height:52px; max-width:240px; margin-bottom:14px; object-fit:contain;">
      <h2 style="font-size:1.4rem; color:var(--cts-navy); margin-top:8px;">Admin Management Portal</h2>
      <p style="color:var(--cts-text-muted); font-size:0.9rem;">Creative Tech Squad CMS</p>
    </div>

    @if($errors->any())
      <div style="background:#FEE2E2; color:#991B1B; padding:12px; border-radius:8px; margin-bottom:20px; font-size:0.88rem;">
        {{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('admin.login.post') }}" method="POST">
      @csrf
      <div class="form-group">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', 'admin@creativetechsquad.in') }}" required autofocus>
      </div>

      <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" value="password" required>
      </div>

      <div class="form-group" style="display:flex; justify-content:space-between; align-items:center; font-size:0.88rem;">
        <label style="display:flex; align-items:center; gap:6px; cursor:pointer;">
          <input type="checkbox" name="remember"> Remember me
        </label>
        <span style="color:#64748B;">Protected Access</span>
      </div>

      <button type="submit" class="btn btn-primary" style="width:100%; padding:14px;">
        Sign In to Admin Portal
      </button>
    </form>

    <div style="margin-top:24px; text-align:center; border-top:1px solid var(--cts-border); padding-top:16px;">
      <a href="{{ route('home') }}" style="font-size:0.88rem; color:var(--cts-blue); font-weight:600;">
        &larr; Return to Public Website
      </a>
    </div>
  </div>

</body>
</html>
