<?php ob_start();
    include 'partials/header.php'; 
    $cart=(isset($_SESSION['cart']))? $_SESSION['cart'] : [];
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = '₫')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    if (isset($_SESSION['MaNguoidung']) && $_SESSION['MaNguoidung']){
        $MaNguoidung=$_SESSION['MaNguoidung'];
    }
    if(isset($_POST['submit'])){
        $format = "Y-m-d H:i:s";
        $Ngaydat = date($format, time());
        $Tinhtrang = "Thành công";
        $query= "INSERT INTO `donhang`(`Ngaydat`, `Tinhtrang`, `MaNguoidung`) VALUES ('$Ngaydat','$Tinhtrang','$MaNguoidung')";
        $result=mysqli_query($conn,$query);
        $Madon=mysqli_insert_id($conn);
        if($result){
            foreach($cart as $value){
                $Thanhtien=($value['Giatien']*$value['quantity']);
                mysqli_query($conn,"INSERT INTO `chitietdonhang`( `Madon`, `Masp`, `Soluong`, `Giatien`, `Thanhtien`) VALUES ('$Madon','$value[Masp]','$value[quantity]','$value[Giatien]','$Thanhtien')");
            }
            unset($_SESSION['cart']);
            header("Location: home.php");
        }
    }
?>
<section class="cart">
    <div class="container">
        <h1>GIỎ HÀNG</h1>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên SP</th>
                    <th>Ảnh bìa</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $Tongtien=0; ?>
                <?php foreach($cart as $key => $value): 
                    $Tongtien+=($value['Giatien']*$value['quantity']);
                ?>
                <tr>
                    <td><?php echo $key++ ?></td>
                    <td><?php echo  $value['Tensp'] ?></td>
                    <td><img src="HinhanhSP/<?php echo $value['Anhbia'] ?>" alt="" width="100px"></td>
                    <td><?php echo currency_format($value['Giatien']) ?></td>
                    <td>
                        <form action="cart.php">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="Masp" value="<?php echo $value['Masp'] ?>">
                            <input type="text" name="quantity" value="<?php echo $value['quantity'] ?>">
                            <button type="submit">Cập nhật</button>
                        </form>
                    </td>
                    <td><?php echo currency_format($value['Giatien']*$value['quantity']) ?></td>
                    <td><a href="cart.php?Masp=<?php echo $value['Masp'] ?>&action=delete" class="btn btn-danger">Xóa</a></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td>Tổng tiền</td>
                    <td colspan="5" class="text-center"><?php echo currency_format($Tongtien) ?></td>
                    <td>
                        <form action="" method="post"><button name="submit" class="btn btn-info">Mua</button></form></td>
                </tr>
            </tbody>
        </table>
    </div>    
</section>
<?php include 'partials/footer.php';
ob_end_flush(); ?>