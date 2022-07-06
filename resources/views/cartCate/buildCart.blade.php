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
    <table border=1 cellspacing=0 cellpadding=8 width="100%" style="font-size:30px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @forelse($cart as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $item->name }}</td>
                <td align="center">{{ number_format($item->price,0,"",".") }} VNĐ</td>
                <td align="center">{{ $item->qty }}</td>
                <td align="center">{{  number_format(($item->price * $item->qty),0,"",".") }} VNĐ</td>
                <td align="center"><a href="{{ route('deleteCart',['id' => $item->rowId]) }}"><i class="fa-solid fa-trash" style="font-size:35px"></i></a></td>
            </tr>

            @empty
                <tr>
                    <td colspan="6" style="text-align:center"><b>No data</b></td>
                </tr>
            @endforelse
        </tbody>

        <tfoot>
            <tr>
                <td colspan="6">Tổng thanh toán: 
                    <span style="margin-right:1000px"></span>{{ \Cart::total() }} VNĐ
                </td>
            </tr>

            <tr>
                <td colspan="6" align="center" width="50%" height="50px">
                    <a href="{{ route('confirm') }}">Tính tiền</a>
                </td>
            </tr>
        </tfoot>

    </table>
</body>
</html>