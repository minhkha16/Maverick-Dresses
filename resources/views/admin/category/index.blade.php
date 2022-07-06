<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="./fontawesome-free-6.0.0-web/css/all.css">
@extends('master')


@section('content')

    <div class="card-body"  >
        <table cellpadding=50% border="20px" class="table table-bordered" width="1000px">
                <tr>
                    <th style="width:100px; text-align:center">STT</th>
                    <th style="width:350px; text-align:center">Name</th>
                    <th style="width:200px; text-align:center">Parent</th>
                    <th style="width:350px; text-align:center">Ngày tạo</th>
                    <th style="width:200px; text-align:center">Sửa</th>
                    <th style="width:200px; text-align:center">Xóa</th>
                </tr>
                @forelse($categorys as $category) 
                <tr>
                    <td align="center">{{$loop->iteration}}</td>
                    <td align="center">{{$category->name}}</td>
                    <td align="center">{{$category->parent}}</td>
                    <td align="center">{{ date('d/m/Y : H:i:s', strtotime($category->created_at)) }}</td>
                    <td align="center"><a href="{{route('admin.category.edit', ['id' => $category->id] )}}"><i class="fa-regular fa-pen-to-square" style="font-size:25px"></i></a></td>
                    <td align="center"><a href="{{route('admin.category.delete', ['id' => $category->id] )}}"><i class="fa-solid fa-trash" style="font-size:25px"></i></a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" align="center">No data</td>
                </tr>
                @endforelse
        </table>
    </div>



@endsection

