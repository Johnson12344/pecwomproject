<!DOCTYPE html>
<html>
<head>
  @include('home.css')
  <style>
    .section-pad{padding-top:40px;padding-bottom:40px}
    .account-card{border:1px solid rgba(135,206,235,.25);box-shadow:0 4px 22px rgba(0,0,0,.12);border-radius:14px}
    .account-card .card-header{background:#fff;border-bottom:1px solid #eee;font-weight:800;text-transform:uppercase}
    .account-card .form-control{border-radius:10px}
    .account-sidebar a{display:block;padding:10px 12px;border-radius:10px;margin-bottom:10px;color:#000}
    .account-sidebar a:hover{color:var(--pecwom-accent,#ffb366)}
    .logout-btn{display:inline-block;padding:10px 24px;border:1px solid #ff4304;background:#ff4304;color:#fff;border-radius:10px;transition:all .25s}
    .logout-btn:hover{color:var(--pecwom-accent,#ffb366);border-color:var(--pecwom-accent,#ffb366);background:transparent}
  </style>
</head>
<body>
  <div class="hero_area">
    @include('home.header')
  </div>

  <section class="layout_padding animate-fade-in section-pad">
    <div class="container">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="account-sidebar">
            <a href="{{ url('myorders') }}"><i class="fa fa-list mr-1"></i> My Orders</a>
            <a href="{{ url('mycart') }}"><i class="fa fa-shopping-bag mr-1"></i> My Cart</a>
            <a href="#profile">Profile</a>
            <a href="#security">Security</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="logout-btn w-100 mt-2">Logout</button>
            </form>
          </div>
        </div>

        <div class="col-md-9">
          <div id="profile" class="card account-card mb-4">
            <div class="card-header">Profile</div>
            <div class="card-body">
              <form method="POST" action="{{ route('account.profile.update') }}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone',$user->phone ?? '') }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address',$user->address ?? '') }}">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </form>
            </div>
          </div>

          <div id="security" class="card account-card">
            <div class="card-header">Security</div>
            <div class="card-body">
              <form method="POST" action="{{ route('account.password.update') }}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>New Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  @include('home.footer')
</body>
</html>
