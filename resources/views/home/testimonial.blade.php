<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->

    <section class="client_section layout_padding">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>
              Testimonial
            </h2>
          </div>
        </div>
        <div class="container px-0">
          <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="box">
                  <div class="client_info">
                    <div class="client_name">

                      <h6>
                        Amazing Experience!
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    "I was blown away by the fast delivery and excellent customer service.
                        The website is easy to navigate, and the products are top-notch. Highly recommend!"
                  </p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="box">
                  <div class="client_info">
                    <div class="client_name">

                      <h6>
                        Exceptional Quality!
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    "I’ve purchased multiple items from this website,
                    and every time, the quality has exceeded my expectations. Plus, the free shipping is a fantastic bonus!"
                  </p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="box">
                  <div class="client_info">
                    <div class="client_name">

                      <h6>
                        Highly Reliable!
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    "This website is my go-to for all my needs.
                    The ordering process is seamless, and the team ensures everything is delivered on time.
                    A truly trustworthy platform!"
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel_btn-box">
              <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </section>

  <!-- info section -->

 @include('home.footer')
</body>

</html>
