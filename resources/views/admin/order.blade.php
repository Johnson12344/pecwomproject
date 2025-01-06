<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        table{
            border: 2px solid skyblue;
            text-align: center;
            display: center;
            justify-content: center;
            align-items: center;
            margin-top: auto;
        }
        th{
            background-color: skyblue;
            padding: auto;
            font-size: auto;
            font-weight: bold;
            text-align: center;
            color: white;
        }
        td{
            color: white;
            padding: auto;
            text-align: center;
            border: 1px solid skyblue;

        }
        .table_center{
            display: center;
            justify-content: center;
            align-items: center;
            margin-top: auto;
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

            <h3 style="color: white;">All Orders</h3>
            <br>
            <br>

          <div class="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>

                @foreach ($data as $data )


                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td>
                        <img width="auto" src="products/{{$data->product->image}}" alt="">
                    </td>

                    <td>{{$data->payment_status}}</td>

                    <td>
                        @if ($data->status == 'in progress')

                        <span style="color: red">{{$data->status}}</span>

                        @elseif ($data->status == 'On the way')
                        <span style="color: skyblue;">{{$data->status}}</span>

                        @else
                        <span style="color: yellow;">{{$data->status}}</span>

                        @endif
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{url('on_the_way', $data->id)}}">On the way</a>

                        <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Delivered</a>
                    </td>

                </tr>

                @endforeach
            </table>
          </div>

          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
