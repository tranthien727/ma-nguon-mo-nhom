<?php session_start(); 
 
if (isset($_SESSION['Hinhanh'])){
    unset($_SESSION['Hinhanh']); // xóa session login
}
if (isset($_SESSION['Hoten'])){
    unset($_SESSION['Hoten']); // xóa session login
}
if (isset($_SESSION['MaNguoidung'])){
    unset($_SESSION['MaNguoidung']); // xóa session login
}
if (isset($_SESSION['Email'])){
    unset($_SESSION['Email']); // xóa session login
}
header("Location: ../home.php");
?>