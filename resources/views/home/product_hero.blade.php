<!-- resources/views/home/product_hero.blade.php -->
<section class="product-hero animate-fade-in">
  <div id="productHeroCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4500">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container-fluid px-0">
          <div class="row no-gutters">
            <div class="col-12 col-md-6">
              <div class="slide-image">
                <img src="{{ asset('images/1.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('images/1.png') }}';" alt="Product 1">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="slide-image">
                <img src="{{ asset('images/2.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('images/2.png') }}';" alt="Product 2">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container-fluid px-0">
          <div class="row no-gutters">
            <div class="col-12 col-md-6">
              <div class="slide-image">
                <img src="{{ asset('images/3.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('images/3.png') }}';" alt="Product 3">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="slide-image">
                <img src="{{ asset('images/4.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('images/4.png') }}';" alt="Product 4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#productHeroCarousel" role="button" data-slide="prev">
      <span class="fa fa-angle-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#productHeroCarousel" role="button" data-slide="next">
      <span class="fa fa-angle-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
