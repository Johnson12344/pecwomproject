<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.siderbar')
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h3 style="color:white">Send Newsletter Broadcast</h3>
          <form method="POST" action="{{ route('admin.broadcast.send') }}" style="max-width:800px">
            @csrf
            <div class="form-group">
              <label style="color:white">Subject</label>
              <input type="text" name="subject" class="form-control" required>
            </div>
            <div class="form-group" style="margin-top:10px">
              <label style="color:white">Message</label>
              <textarea name="message" rows="8" class="form-control" placeholder="Write your message..." required></textarea>
            </div>
            <div style="margin-top:12px">
              <button type="submit" class="btn btn-primary">Queue Broadcast</button>
              <a href="{{ url('admin/dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  </body>
</html>


