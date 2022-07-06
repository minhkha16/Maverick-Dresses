<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.0.0-web/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;800&display=swap');
        .warper{
            width: 500px;
            height: 550px;
            background: red;
            text-align: center;
            margin: auto;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 50px;
        }

        div.warper{
            border-radius: 10px;
        }

        .box{
            font-size: 30px;
            font-family: Poppins;
            position: absolute;
            top: 6%;
            padding-left: 2%;
            font-weight: bold;
        }

        .icon{
            position: absolute;
            left: 36%;
            top: 43%;
            font-size: 140px;
        }

        a{
            font-family: Poppins;
            width: 90%;
            height: 45px;
            position: absolute;
            top: 85%;
            left: 5.5%;
            border-radius: 10px;
            background-color: black;
            text-decoration: none;  
            font-size: 35px;
            padding-bottom: 7px;
        }

    </style>
</head>
<body>
    <div class="warper">
        <div class="box">
            <p>Xác nhận thanh toán thành công</p>
                <span></span>{{ \Cart::total() }} VNĐ
        </div>
        <div class="icon">
            <i class="fa-regular fa-circle-check"></i>
        </div>
        <div class="ok">
            <a href="{{ route('shopingcart') }}">Done</a>
        </div>
    </div>

</body>
</html>