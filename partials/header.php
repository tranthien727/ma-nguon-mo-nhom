<?php include ('config/constraint.php'); ?>
<?php session_start(); ?>
<?php $cart=(isset($_SESSION['cart']))? $_SESSION['cart']:[]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* header */
        .img{
            height: 50px;
        }
        .navbar {
        background-color: #333;
        }
        .container{
            max-width: 80%;
        }
        .navbar a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        .navbar a:hover {
        background-color: #ddd;
        color: black;
        }

        /* Add a color to the active/current link */
        .navbar a.navbar-branch {
        background-color: #04AA6D;
        color: white;
        }

        *{
            margin: 0 0;
            padding: 0 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        /* close header */
        /* home dt*/
        .body{
            margin-top: 10px;
            background:#f2f2f2;
        }
        .body .container{
            background: white;
        }
        .left{
            width: 800px;
            height:400px;
            margin-bottom:10px;
        }
        .right{
            width: 300px;
            height:300px;
        }
        .mySlides {
            display:none;             
            width:100%;
            height:200px;
            margin-bottom:10px;
            border-radius:10px;
        }
        .ban1{
            height:100px;
            margin-bottom:10px;
        }
        .item1{
            background-color:#8CAF11;        
        }
        .items{
            text-align: center;
            width: 150px;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 15px;
            padding-right: 15px;
            background-color:#8CAF11;
            
        }
        .item{
            display: block;
            background-color:white;
            border-radius:10px;
            padding-top:10px;
        }
        .sp{
            color:black;
            font-weight: bold;
        }
        .thumb{
            display: block;
            width: 270px;
            height: 300px;
            overflow: hidden;
            border: 1px solid #e5e5e5;
            transition-duration: 0.3s;
            border-radius:20px;
            
        }
        .thumb:hover {
            transform: scale(1.2);
        }
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top:10px;
        }
        .b{
            width: 40px;
            height: 40px;
            font-size: 20px;
            margin-bottom:10px;
        }
        .b:hover {
            background-color: #8CAF11;
            color: white;
        }
        .container1 {
            position: relative;
        }
        .overlay {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.5); /* Black see-through */
            color: #f1f1f1;
            width: 100%;
            transition: .5s ease;
            opacity:0;
            color: white;
            font-size: 20px;
            padding: 20px;
            text-align: center;
        }
        .container1:hover .overlay {
            opacity: 1;
        } 
        /* close home dt*/ 
        /* info */
        .info{
            font-family: Arial, Helvetica, sans-serif; 
            box-sizing: border-box;
        }
        #myImg{
            width: 400px;
            height: 500px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        #myImg:hover {opacity: 0.7;}

            /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }

            /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            }

            /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
            }

            /* Add Animation */
        .modal-content, #caption {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
            }

            @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
            }

            @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
            }

            /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
            }
        .row{
            margin-top:50px;
            background:#f2f2f2;
            margin-bottom:50px;
        }
        .gia{
            color:#d0021c;
            font-size: 30px;
            font-weight: bold;
        }
        /* close info */
        /* footer */
        .footer{
            background:rgb(29, 27, 26);
            color:white;
            height:100px;
        }
        /* footer */
        /* dangky login*/
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
        .dangky{
            font-family: Arial, Helvetica, sans-serif;
            padding: 100px;
        }

        .login{
            font-family: Arial, Helvetica, sans-serif;
            padding: 100px;
        }

        h1, td{
            color: DodgerBlue;
            font-weight: bold;
        }

        .login input[type=text], input[type=password] {
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            width:100%;
            resize: vertical;
            padding:15px;
            border-radius:15px;
            border:0;
            box-shadow:4px 4px 10px rgba(0,0,0,0.2);
        }
        .login input[type=text]:focus, input[type=password]:focus {
            outline: none;
        }


        .dangky input[type=text], input[type=password] {
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            width:100%;
            resize: vertical;
            padding:15px;
            border-radius:15px;
            border:0;
            box-shadow:4px 4px 10px rgba(0,0,0,0.2);
        }
        .dangky input[type=text]:focus, input[type=password]:focus {
            outline: none;
        }
        .signupbtn {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        button:hover {
            opacity:1;
        }
        .signupbtn {
            width: 30%;
            border-radius:15px;
            border:0;
            box-shadow:4px 4px 10px rgba(0,0,0,0.2);
        }
        .dk{
            text-decoration: none;
            color:#f2f2f2;
        }
        /* dangky login*/
        /* search */
        .search-container{
            float:right;
            width: 300px;
        }
        .search-icon button{
            float:right;
            width: 50px;
            height: 50px;
        }
        /* close search */
    </style>
</head>
<body>
<section class="header">
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
        <a href="<?php echo URL; ?>">ICT Shop</a>
        <div class="d-flex justify-content-center">
            <a  href="cart-view.php">Giỏ hàng <i class="fa fa-cart-plus">[<?php echo count($cart); ?>]</i></a>
        </div>
        <div class="d-flex">
            <?php 
                if (isset($_SESSION['Hinhanh']) && $_SESSION['Hinhanh']){
                    echo '<ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="navbar-brand" href="#" role="button" data-bs-toggle="dropdown"><img class="rounded-pill" style="width:30px;" src="HinhanhSP/'.$_SESSION["Hinhanh"].'"></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>';
                }
                else{
                    echo '<a href="login.php">Đăng nhập</a>
                            <a href="dangky.php">Đăng ký</a>';
                }
            ?>
        </div>
        </div> 
    </nav>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-branch" href="<?php echo URL; ?>"><i class="fa fa-home"></i> Trang Chủ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa fa-user-o"></i> Thông tin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa fa-book"></i> Bài tập</a>
            </li>
            <li class="nav-item">
            <?php 
                    if (isset($_SESSION['MaNguoidung']) && $_SESSION['MaNguoidung']){
                        $MaNguoidung=$_SESSION['MaNguoidung'];
                        echo "<a class='nav-link' href='order.php?MaNguoidung=$MaNguoidung'><i class='fa fa-shopping-cart'></i> Đơn hàng</a>";
                    }
                    else{
                        echo "<a class='nav-link' href=''><i class='fa fa-shopping-cart'></i> Đơn hàng</a>";
                    }
                ?>               
            </li>
            <li class="nav-item">
                <a class="nav-link" href="phanhoi.php"><i class="fa fa-envelope"></i> Phản hồi</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-mobile"></i> Điện thoại</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Apple</a></li>
                    <li><a class="dropdown-item" href="#">SamSung</a></li>
                    <li><a class="dropdown-item" href="#">Xiaomi</a></li>
                </ul>
            </li>
        </ul>
        <form method="post" class="d-flex">
            <input class="form-control me-2" type="text" name="txtsearch" placeholder="Search">
            <button class="btn btn-primary" type="submit" name="search">Search</button>
        </form>
        </div>  </div>
    </nav>
</section>
