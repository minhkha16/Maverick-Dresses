<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ Hàng</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;800&display=swap');
        .warper{
            background: rgb(234, 235, 232);
            width: 100%
            text-align: center;
            margin: auto;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 50px;
        }
    </style>

</head>
<body>
<div class="warper">
    <table border="1" cellspacing="" width="100%">
        <tr>
            <th align="center">Name Product</th>
            <th align="center">Price</th>
            <th align="center">Image</th>
            <th align="center">Delete</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td align="center">{{$product->name}}</td>
            <td align="center">{{$product->price}}</td>
            <td>
                @php 
                    $avatar = $product->image == NULL ? 'no-avatar.png' : $product->image;
                    $image_url = asset('images/' . $avatar)
                @endphp
                <img src="{{ $image_url }}" width="150px">  
            </td>
            <td align="center"><a href="{{route('addToCart' , ['id'=>$product->id])}}">Mua</a></td>
        </tr>
        @endforeach
        {{-- <tr><td colspan="4" align="center"><a href="{{ route('buildCart') }}">Trang thanh toán</a></td></tr> --}}
    </table>
</div>  

</body>
</html>