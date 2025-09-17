<section class="info_section  layout_padding2-top animate-fade-in">
    <div class="social_container">
      <div class="social_box">
        <a href="https://www.facebook.com/people/Pecwom-Organic-Hair-And-Skin-care-products/61556439273328/">
          <i class="fa fa-facebook zoooom-image" aria-hidden="true"></i>
        </a>
        <a href="https://www.tiktok.com/@peckhamorganics">
            <i class="fab fa-tiktok zoooom-image" aria-hidden="true"></i>
        </a>
        <a href="https://www.instagram.com/pecwommakeover/">
          <i class="fa fa-instagram zoooom-image" aria-hidden="true"></i>
        </a>
        <a href="https://www.youtube.com/@Pecwomorganics">
          <i class="fa fa-youtube zoooom-image" aria-hidden="true"></i>
        </a>
      </div>
    </div>

    <div class="policy">
    <nav>
        <ul>
            <li><a href="{{url('terms')}}">Terms & Conditions</a></li>
            <li><a href="{{url('privacy')}}">Privacy Policy</a></li>
            <li><a href="{{url('return')}}">Return Policy</a></li>
        </ul>
    </nav>
    </div>



    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
                The various products on this website are formulated by me Abi Tella,
                I am a Microbiologist, Biotechnologist, qualified Dual trained nurse with specialty
                in adult nursing and psychiatry. I am also a qualified cosmetic formulator specializing
                 in creating organic hair and skincare products. With a strong commitment to sustainability and natural ingredients,
                 I craft formulations that are both effective and gentle on the skin and hair. In addition to my expertise in cosmetics,
                 I hold a diploma in food manufacturing and also produce healthy, organic spices for cooking.
                 My passion for organic and health-conscious products extends across both personal care and culinary applications,
                 ensuring that each product I create is of the highest quality. Our formulation are backed by research
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
                At PECWOM, we're here for you! If you have any questions or need assistance, our customer support team is ready to help.
                Contact Us: Reach us at Pecwomorganics@gmail.com or use our live chat.
                Order Issues: Check your order status or get in touch for updates.
                Returns & Exchanges: Visit our Returns Policy page for easy returns and exchanges.
                We’re dedicated to ensuring your satisfaction!
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="https://maps.app.goo.gl/4b6ZdyM8PjAf2LCE7">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Keene Acres, Stanford In The Vale, Oxford, SN7 8GE </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+447833813331</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>pecwomorganics@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">

        <p> <a href="https://x.com/jt_oluwa">PECWOM</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
