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
        table-layout: fixed;
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
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .table_center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .product-img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
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
            white-space: normal;
        }

        /* Show <th> labels beside each data cell */
        td::before {
            content: attr(data-label);
            font-weight: bold;
            text-transform: capitalize;
            color: skyblue;
            display: inline-block;
            width: 120px; /* space for label */
        }
        .product-img {
            width: 60px;
            height: 60px;
        }
    }
    /* Compact, wrapping actions in Change Status column */
.status-actions{display:flex;gap:6px;flex-wrap:wrap;justify-content:center}
.status-actions .btn{padding:4px 8px;font-size:12px;line-height:1}
td[data-label="Change Status"]{white-space:normal}
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
            <div class="table-responsive">
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

                @foreach ($data as $data)
                <tr>
                    <td data-label="Customer Name">{{$data->name}}</td>
                    <td data-label="Address">{{$data->rec_address}}</td>
                    <td data-label="Phone">{{$data->phone}}</td>
                    <td data-label="Product Title">{{$data->product->title}}</td>
                    <td data-label="Price">{{$data->product->price}}</td>
                    <td data-label="Image">
                        <img class="product-img" src="{{ asset('products/'.$data->product->image) }}" alt="">
                    </td>
                    <td data-label="Payment Status">{{$data->payment_status}}</td>
                    <td data-label="Status">
                        @if ($data->status == 'in progress')
                        <span style="color: red">{{$data->status}}</span>
                        @elseif ($data->status == 'On the way')
                        <span style="color: skyblue;">{{$data->status}}</span>
                        @else
                        <span style="color: yellow;">{{$data->status}}</span>
                        @endif
                    </td>
                    <td data-label="Change Status">
                        <div class="status-actions">
                            <a class="btn btn-info btn-sm" href="{{url('in_progress', $data->id)}}">In progress</a>
                            <a class="btn btn-primary btn-sm" href="{{url('on_the_way', $data->id)}}">On the way</a>
                            <a class="btn btn-success btn-sm" href="{{url('delivered', $data->id)}}">Delivered</a>
                        </div>
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
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
