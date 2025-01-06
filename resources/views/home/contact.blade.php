<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')

    <section class="contact_section layout_padding">
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
                  <iframe src="https://www.google.com/maps/place/Ijebu+Ode,+Ogun+State/@6.8236533,3.8826509,13z/data=!3m1!4b1!4m6!3m5!1s0x103968a66d1a278b:0xbc9c567eae180351!8m2!3d6.8299846!4d3.9164585!16zL20vMDMwbF9z?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 px-0">
              <form action="#">
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
                  <button>
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












