<?php include 'partials/header.php';
    $MaNguoidung=$_GET['MaNguoidung'];
    $query="SELECT donhang.Madon, donhang.Ngaydat, donhang.Tinhtrang, nguoidung.Hoten FROM donhang CROSS JOIN nguoidung 
    WHERE donhang.MaNguoidung=$MaNguoidung and donhang.MaNguoidung=nguoidung.MaNguoidung";
    $result=mysqli_query($conn,$query);
?>
<section class="order">
    <div class="container">
        <h1>ĐƠN HÀNG</h1>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Ngày đặt</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php  while ($rows = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $rows['Hoten'] ?></td>
                    <td><?php echo $rows['Ngaydat'] ?></td>
                    <td><?php echo $rows['Tinhtrang'] ?></td>
                    <td><a href="order-view.php?Madon=<?php echo $rows['Madon'] ?>">Chi tiết</a></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</section>
<?php include 'partials/footer.php'; ?>