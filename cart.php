<?php 
include ('config/constraint.php'); 
session_start();
    if(isset($_GET['Masp'])){
        $Masp=$_GET['Masp'];
    }
    $action=(isset($_GET['action']))?$_GET['action']:'';
    $quantity=(isset($_GET['quantity']))?$_GET['quantity']:1;
    if($quantity<=0){
        $quantity=1;
    }   
    $sql="SELECT * FROM sanpham WHERE Masp = $Masp";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)!=0){
        $product = mysqli_fetch_assoc($result);
    }
    $item = [
        'Masp'=>$product['Masp'],
        'Tensp'=>$product['Tensp'],
        'Anhbia'=>$product['Anhbia'],
        'Giatien'=>$product['Giatien'],
        'quantity'=>$quantity
    ];
        if(isset($_SESSION['cart'][$Masp])){
            $_SESSION['cart'][$Masp]['quantity'] +=1;
        }
        else{
            $_SESSION['cart'][$Masp]=$item;
        }
    if($action=='update'){
        $_SESSION['cart'][$Masp]['quantity'] = $quantity;
    }
    if($action=='delete'){
        unset($_SESSION['cart'][$Masp]);
    }
    header("location: cart-view.php");


?>