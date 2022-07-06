<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.0.0-web/css/all.css">
</head>
<body>
        <form method="get" action="" class="form-inline" role="form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search" class="search" id="search">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-brands fa-searchengin"></i>
                </button>
            </div>
        </form>    
        <a href="#"><i class="fa-solid fa-cart-shopping" style="font-size:30px"></i></a>
            <table border="1" cellspacing="0" cellpadding="8" style="font-size:30px">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Mua</th>
                    </tr>
                </thead>
    
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            {{-- <td>{{$product->image}}</td> --}}
                            <td>
                                @php 
                                    $image = $product->image == NULL ? 'no-avatar.png' : $product->image;
                                    $image_url = asset('images/' . $image)
                                @endphp
                                    <img src="{{ $image_url }}" width="50%" height="150px">  
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="4">Không có dữ liệu</td>
                        </tr>
                    @endforelse
                </tbody>
    
                <tfoot>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Mua</th>
                    </tr>
                </tfoot>
            </table>
            <hr>
            <div>
                {{-- {{$products->appends(request()->all())->links()}} --}}
            </div>
</body>
</html>