<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Table</title>

    <!-- Tambahkan link CSS utama jika diperlukan -->
    @include('home.css')

    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            text-align: center;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color:rgb(0, 0, 0);
            font-weight: bold;
            color:white
        }

        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')

        <div class="div_center">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order )
                    <tr>
                        <td>{{$order->Product->title}}</td>
                        <td>{{$order->Product->price}}</td>
                        <td>{{$order->status}}</td>
                        <td><img height="200" width="300" src="products/{{$order->Product->image}}" alt="Product Image"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Section -->
    @include('home.footer')
</body>
</html>
