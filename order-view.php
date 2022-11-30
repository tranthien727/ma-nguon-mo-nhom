<?php include 'partials/header.php';
    $Madon=$_GET['Madon'];
    $query="SELECT chitietdonhang.Soluong, chitietdonhang.Giatien, chitietdonhang.Thanhtien, sanpham.Tensp 
    FROM chitietdonhang CROSS JOIN sanpham WHERE chitietdonhang.Madon=$Madon and chitietdonhang.Masp=sanpham.Masp";
    $result=mysqli_query($conn,$query);
?>
<section class="order-view">
    <div class="container">
        <h1>CHI TIẾT ĐƠN HÀNG</h1>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Tên SP</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php  while ($rows = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $rows['Tensp'] ?></td>
                    <td><?php echo $rows['Soluong'] ?></td>
                    <td><?php echo $rows['Giatien'] ?></td>
                    <td><?php echo $rows['Thanhtien'] ?></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        <a href='javascript: history.go(-1)'>Trở lại</a>
    </div>
</section>
<?php include 'partials/footer.php'; ?>