<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="title">
         <p class="h5">
            <a href="https://x.com/jt_oluwa">Femi Johnson</a>
        </p>
          <p>Developer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
              <li>
                <a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a>
            </li>



              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_product')}}">Add Product</a></li>
                  <li><a href="{{url('view_product')}}">View Product</a></li>

                </ul>
              </li>
              <li>
                <a href="{{url('view_orders')}}"> <i class="icon-grid"></i>Orders</a>
            </li>

              <li>
                <a href="{{ route('admin.broadcast.form') }}"> <i class="icon-mail"></i>Broadcast</a>
              </li>

      </ul>
    </nav>
