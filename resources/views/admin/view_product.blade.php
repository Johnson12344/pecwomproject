<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        .div_deg{
            display: center;
            justify-content: center;
            align-items: center;
            margin-top: auto;
        }
        .table_deg{
            border: 2px solid greenyellow;
        }
        th{
            background-color: skyblue;
            color: white;
            font-size: auto;
            font-weight: bold;
            padding: auto;
        }
        td{
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }
        input[type='search']{
            width: auto;
            height: auto;
            margin-left: auto;
        }
    </style>
  </head>
  <body>

    @include('admin.header')

   @include('admin.siderbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1 style="color: white;">View Product</h1>

            <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-secondary" value="search">
            </form>

           <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                @foreach ($product as $products )


                <tr>
                    <td>{{$products->title}}</td>
                    <td>{!!Str::limit($products->description,50)!!}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>
                        <img height="100" width="70" src="products/{{$products->image}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product',$products->slug)}}">Edit</a>
                    </td>

                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>


           </div>

           <div class="div_deg">
            {{$product->onEachSide(1)->links()}}
           </div>


          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->

    <script>
        function confirmation(ev)
        {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');

            console.log(urlToRedirect);

            swal({
                title:"Are You Sure to Delete This?",
                text: "This delete will be permanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })

            .then((willCancel)=>{

                if(willCancel)
            {
                window.location.href=urlToRedirect;
            }

            })
        }
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
 crossorigin="anonymous" referrerpolicy="no-referrer"></script>







    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
    integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </body>
</html>
