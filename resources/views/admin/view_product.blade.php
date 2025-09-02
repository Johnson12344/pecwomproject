<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        .table-responsive {
       width: 100%;
       overflow-x: auto;
   }

   table {
       width: 100%;
       border: 2px solid skyblue;
       border-collapse: collapse;
       text-align: center;
       margin: 20px auto;
   }

   th {
       background-color: skyblue;
       padding: 12px;
       font-size: 1rem;
       font-weight: bold;
       text-align: center;
       color: white;
   }

   td {
       color: white;
       padding: 10px;
       text-align: center;
       border: 1px solid skyblue;
   }

   .table_center {
       display: flex;
       justify-content: center;
       align-items: center;
       margin-top: 20px;
   }

   /* Responsive adjustments */
   @media (max-width: 768px) {
       th, td {
           padding: 8px;
           font-size: 0.9rem;
       }
   }

   /* Table → Cards on Mobile */
   @media (max-width: 600px) {
       table, thead, tbody, th, td, tr {
           display: block;
           width: 100%;
       }

       thead tr {
           display: none; /* hide table headers */
       }

       table tr:first-child{
           display: none;
       }

       tr {
           margin-bottom: 15px;
           border: 2px solid skyblue;
           border-radius: 10px;
           padding: 10px;
           background: #0a192f; /* dark background */
       }

       td {
           border: none;
           text-align: left;
           padding: 8px;
           position: relative;
       }

       /* Show <th> labels beside each data cell */
       td::before {
           content: attr(data-label);
           font-weight: bold;
           text-transform: capitalize;
           color: skyblue;
           display: inline-block;
           width: 130px; /* space for label */
       }
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
                    <td data-label="Product Name">{{$products->title}}</td>
                    <td data-label="Description">{!!Str::limit($products->description,50)!!}</td>
                    <td data-label="Category">{{$products->category}}</td>
                    <td data-label="Price">{{$products->price}}</td>
                    <td data-label="Quantity">{{$products->quantity}}</td>
                    <td data-label="Image">
                        <img height="100" width="70" src="products/{{$products->image}}" alt="">
                    </td>
                    <td data-label="Edit">
                        <a class="btn btn-success" href="{{url('update_product',$products->slug)}}">Edit</a>
                    </td>
                    <td data-label="Delete">
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>


           </div>

           <div class="div_deg">
            {{-- {{$product->links()}} --}}
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
