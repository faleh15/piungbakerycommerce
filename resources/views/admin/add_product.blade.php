<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1
        {
            color: white;
        }

        label
        {
            display: inline-block;
            width: 200px;
            font-size: 18px!important;
            color: white!important;
        }

        input[type='text']
        {
            width: 350px;
            height: 50px;
        }

        textarea
        {
            width: 450px;
            height: 80px;
        }

        .input_deg
        {
            padding: 15px;
        }
    </style>
  </head>
  <body>
   
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h5">Mark Stephen</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                  <li><a href="admin/dashboard"> <i class="icon-home"></i>Home </a></li>
                  <li>
                    <a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a>
                  </li>
                  <li class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <li><a href="{{url('add_product')}}">Add Product</a></li>
                      <li><a href="{{url('view_product')}}">View Product</a></li>
                    </ul>
                  </li>
                  
          </ul>
        </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1>Add Product</h1>
            <div class="div_deg">
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_deg">
                        <label for="">Product Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="input_deg">
                        <label for="">Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="input_deg">
                        <label for="">Price</label>
                        <input type="text" name="price">
                    </div>
                    <div class="input_deg">
                        <label for="">Quantity</label>
                        <input type="number" name="qty">
                    </div>
                    <div class="input_deg">
                        <label for="">Product Category</label>
                        <select name="category" required>
                            <option value="">Select</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_deg">
                        <label for="">Product Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="Add Product">
                    </div>
                </form>
            </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>