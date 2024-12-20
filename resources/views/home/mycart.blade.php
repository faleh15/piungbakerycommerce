<!DOCTYPE html>
<html>

<head>
    
    @include('home.css')
    <style class="text/css">
        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table
        {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th
        {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold; 
            background-color: black;
        }

        td 
        {
            border: 1px solid skyblue;
        }

        .cart_value
        {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

    .order_deg 
    {
        float: left; 
        width: 40%; 
        margin-right: 20px; 
        margin-top: 0; 
    }

    label 
    {
        display: inline-block;
        width: 150px; 
    }

    .div_gap 
    {
        margin-bottom: 10px; 
    }
    </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
  
  </div>
  <!-- end hero area -->
  <div class="div_deg">
    <div class="order_deg">
        <form action="{{url('confirm_order')}}" method="post">
            @csrf
            <div class="div_gap">
                <label>Reciver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="div_gap">
                <label>Reciver Address</label>
                <textarea name="address">{{Auth::user()->address}}   </textarea>
            </div>
            <div class="div_gap">
                <label>Reciver Phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>            
            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Order">
            </div>
        </form>
    </div>
    <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>
        <?php
        $value=0;
        ?>
        @foreach ($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
                <img width="170px" src="/products/{{$cart->product->image}}">
            </td>
            <td>
                <a class="btn btn-danger" href="{{ url('delete_cart', $cart->id) }}">Remove</a>
            </td>            
        </tr>
        <?php
        $value = $value + (float)str_replace(['Rp.', '.'], '', $cart->product->price);
        ?>
        @endforeach
    </table>
  </div>
  
  <div class="cart_value">
    <h3>Total Value of Cart is : Rp. {{ number_format($value, 2, ',', '.') }}</h3>
  </div>
  <!-- info section -->
@include('home.footer')
</body>

</html>