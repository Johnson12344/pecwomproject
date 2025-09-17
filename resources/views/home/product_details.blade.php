<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .pd-wrap{max-width:1000px;margin:0 auto}
    .pd-card{background:#0a192f;border:1px solid rgba(135,206,235,.35);border-radius:12px;overflow:hidden}
    .pd-image{background:#0e2444;display:flex;align-items:center;justify-content:center}
    .pd-image img{width:100%;max-width:420px;object-fit:contain}
    .pd-body{padding:18px}
    .pd-title{color:#fff;font-weight:700;font-size:1.25rem;margin-bottom:6px}
    .pd-price{color:#87ceeb;font-weight:700;margin-bottom:10px}
    .pd-meta{color:#cfe8f7;margin-bottom:10px}
    .pd-desc{color:#e6f4ff;line-height:1.6}
    .pd-actions{display:flex;gap:10px;margin-top:14px}
    .pd-actions .btn{padding:8px 12px}
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->



  <!-- product details start -->



  <section class="shop_section layout_padding animate-fade-in">
    <div class="container pd-wrap">
      <div class="pd-card row g-0">
        <div class="col-12 col-md-6 pd-image p-3 p-md-4">
          <img src="{{ asset('products/'.$data->image) }}" alt="{{ $data->title }}">
        </div>
        <div class="col-12 col-md-6">
          <div class="pd-body">
            <div class="pd-title">{{ $data->title }}</div>
            <div class="pd-price">£{{ $data->price }}</div>
            <div class="pd-meta">Category: {{ $data->category }}</div>
            <div class="pd-meta">In stock: {{ $data->quantity }}</div>
            <div class="pd-desc">{{ $data->description }}</div>
            <form action="{{ url('add_cart', $data->id) }}" method="GET" class="pd-actions">
              <input type="number" name="qty" min="1" value="1" class="form-control" style="max-width:100px">
              <button type="submit" class="btn btn-primary">Add to Cart</button>
              <a class="btn btn-outline-light" href="{{ url('shop') }}">Back to Shop</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>








  <!-- product details end -->











  <!-- info section -->

 @include('home.footer')
</body>

</html>

