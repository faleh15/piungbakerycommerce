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

    .table_deg
    {
        border: 2px solid greenyellow
    }

    th
    {
        background-color: skyblue;
        color: white;
        font-size: 19px;
        font-weight: bold;
        padding: 15px;
    }

    td
    {
        border: 1px solid skyblue;
        text-align: center;
        color: white;
    }
    input[type='search']
    {
      width: 500px;
      height: 60px;
      margin-left: 50px;
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
                    <li class="active"><a href="{{url('view_product')}}">View Product</a></li>
                  </ul>
                </li>
                
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{ url('product_search') }}" method="get">
              @csrf
              <input type="search" name="search">
              <input type="submit" class="btn btn-secondary" value="Search">
          </form>
          
          <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Product Tittle</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($product as $products)
                <tr>
                    <td>{{$products->title}}</td>
                    <td>{!!Str::limit( $products->description, 20) !!}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>
                        <img height="120" width="120" src="products/{{$products->image}}" alt="">
                    </td>

                    <td>
                      <a class="btn btn-success" href="{{ url('update_product', $products->id) }}">Edit</a>
                    </td>

                    <td>
                      <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product', $products->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                
                
            </table>
        </div>
      </div>
     
         <div class="div_deg">
            {{$product->onEachSide(1)->links()}}
         </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
      function confirmation(ev)
      {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);
          swal({
              title:"Are you sure to delete this?",
              text: "this delete will be permanent",
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
