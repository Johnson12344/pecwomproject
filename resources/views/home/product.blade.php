<section class="shop_section layout_padding animate-fade-in">
    <style>
      .shop-toolbar{display:flex;gap:10px;flex-wrap:wrap;align-items:center;justify-content:space-between;margin-bottom:18px}
      .shop-toolbar .form-control,.shop-toolbar .form-select{min-width:220px}
      .product-card{background:#0a192f;border:1px solid rgba(135,206,235,.35);border-radius:12px;overflow:hidden;transition:transform .15s ease, box-shadow .15s ease;height:100%}
      .product-card:hover{transform:translateY(-2px);box-shadow:0 6px 18px rgba(0,0,0,.25)}
      .product-img{aspect-ratio:1/1;width:100%;object-fit:cover;background:#0e2444}
      .product-body{padding:12px 14px}
      .product-title{color:#fff;font-weight:600;margin:0 0 6px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
      .product-price{color:#87ceeb;font-weight:700}
      .product-actions{display:flex;gap:8px;padding:10px 14px;justify-content:space-between}
      .product-actions .btn{padding:6px 10px;font-size:.9rem;flex:1}
      @media (max-width:576px){
        .product-actions{gap:10px}
      }
      @media (max-width:576px){.shop-toolbar{justify-content:center}}
    </style>

    <div class="container">
      <div class="heading_container heading_center">
        <h2>Latest Products</h2>
      </div>

      <form method="GET" class="shop-toolbar">
        <div class="input-group" style="max-width:420px">
          <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
        </div>

        <div class="d-flex gap-2 flex-wrap">
          <select name="category" class="form-select">
            <option value="all">All categories</option>
            @isset($categories)
              @foreach($categories as $c)
                <option value="{{ $c->category_name }}" {{ request('category')===$c->category_name ? 'selected' : '' }}>
                  {{ $c->category_name }}
                </option>
              @endforeach
            @endisset
          </select>

          <select name="sort" class="form-select">
            <option value="latest" {{ request('sort')==='latest' ? 'selected' : '' }}>Newest</option>
            <option value="price_asc" {{ request('sort')==='price_asc' ? 'selected' : '' }}>Price: Low → High</option>
            <option value="price_desc" {{ request('sort')==='price_desc' ? 'selected' : '' }}>Price: High → Low</option>
          </select>

          <button type="submit" class="btn btn-outline-light">Apply</button>
          <a href="{{ url('shop') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
      </form>

      <div class="row g-3 g-md-4">
        @forelse ($product as $products)
        <div class="col-6 col-md-4 col-lg-3">
          <div class="product-card">
            <img class="product-img" src="{{ asset('products/'.$products->image) }}" alt="{{ $products->title }}">
            <div class="product-body">
              <h6 class="product-title">{{ $products->title }}</h6>
              <div class="product-price">£{{ $products->price }}</div>
            </div>
            <div class="product-actions">
              <a class="btn btn-danger w-50" href="{{ url('product_details',$products->id) }}">Details</a>
              <a class="btn btn-primary w-50" href="{{ url('add_cart',$products->id) }}">Add to Cart</a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12">
          <div class="alert alert-secondary mb-0">No products found. Try changing your filters.</div>
        </div>
        @endforelse
      </div>


    </div>
  </section>
