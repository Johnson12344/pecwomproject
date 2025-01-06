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

        h1{
            color: white;
        }

        label{
            display: inline-block;
            width: 200px;
            font-size: 18px!important;
            color: white!important;
        }
        input[type='text']{
            width: 150px;
            height: 50px;
        }
        textarea{
            width: 200px;
            height: 60px;
        }
        .input_deg{
            padding: 15px;
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


            <h1>Add Product</h1>
            <div class="div_deg">
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_deg">
                        <label for="">Product Name</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="input_deg">
                        <label for="">Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="input_deg">
                        <label for="">Price</label>
                        <input type="text" name="price" required>
                    </div>
                    <div class="input_deg">
                        <label for="">Quantity</label>
                        <input type="number" name="qty" required>
                    </div>
                    <div class="input_deg">
                        <label for="">Product Category</label>
                        <select name="category" id="" required>

                            <option value="">Select Option</option>

                            @foreach ($category as $category )
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input_deg">
                        <label for="">Product Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="input_deg">

                        <input class="btn btn-success" type="submit" value="Add Product" required>
                    </div>
                </form>
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
