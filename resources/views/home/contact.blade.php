 <!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')

    <section class="contact_section layout_padding animate-fade-in">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>
              Contact Us
            </h2>
          </div>
        </div>
        <div class="container container-bg">
          <div class="row">
            <div class="col-lg-7 col-md-6 px-0">
              <div class="map_container">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2476.1802326960087!2d-1.5140072000000002!3d51.638224300000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876b52412d5b961%3A0x17987004a8375deb!2sKeene%20Acrs%2C%20Stanford%20in%20the%20Vale%2C%20Faringdon%2C%20UK!5e0!3m2!1sen!2sng!4v1737020867792!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  {{-- <iframe src="https://maps.app.goo.gl/4b6ZdyM8PjAf2LCE7" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe> --}}
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 px-0">
                @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
              <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div>
                  <input type="text" placeholder="Name" />
                </div>
                <div>
                  <input type="email" placeholder="Email" />
                </div>
                <div>
                  <input type="text" placeholder="Phone" />
                </div>
                <div>
                  <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                  <button type="submit">
                    SEND
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <br><br><br>


</body>

</html>












