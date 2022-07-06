<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="./fontawesome-free-6.0.0-web/css/all.css">

@extends('master')

@section('content')
<div class="card-body">
    <table border=1 cellspacing=0 cellpadding=8  width="1000px" class="table table-bordered">
            <tr>
                <th style="width:50px; text-align:center">STT</th>
                <th style="width:350px; text-align:center">Hình ảnh</th>
                <th style="width:350px; text-align:center">Tên sản phẩm</th>
                <th style="width:100px; text-align:center">Giá</th>
                <th style="width:100px; text-align:center">Giới thiệu</th>
                <th style="width:130px; text-align:center">Nội dung</th>
                <th style="width:100px; text-align:center">Sửa</th>
                <th style="width:100px; text-align:center">Xóa</th>
            </tr>


        @forelse($products as $product)
                <tr>
                    <td align="center" width="10%">{{ $loop->iteration }}</td>
                    <td align="center">
                        @php 
                            $image = $product->image == NULL ? 'no-avatar.png' : $product->image;
                            $image_url = asset('images/' . $image)
                        @endphp
                            <img src="{{ $image_url }}" style="width:200px; height:150px">  
                    </td>
                    <td align="center" width="10%">{{ $product->name }}</td>
                    <td align="center" width="10%">{{ $product->price }}</td>
                    <td align="center" width="20%">{{ $product->introduce }}</td>
                    <td align="center" width="10%">{{ $product->content }}</td>
                    <td align="center"><a href="{{route('admin.product.edit', ['id' => $product->id] )}}"><i class="fa-regular fa-pen-to-square" style="font-size:25px"></i></a></td>
                    <td align="center"><a href="{{route('admin.product.delete', ['id' => $product->id] )}}"><i class="fa-solid fa-trash" style="font-size:25px"></i></a></td>
                </tr>

                @empty
                    <tr>
                        <td align="center" colspan=8>No data</td>
                    </tr>
            @endforelse
    </table>
</div>
@endsection