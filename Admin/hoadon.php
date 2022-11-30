<?php include 'partials/header.php'; ?>
<?php 
    $query="SELECT donhang.Madon, donhang.Ngaydat, donhang.Tinhtrang, nguoidung.Hoten 
    FROM donhang CROSS JOIN nguoidung WHERE donhang.MaNguoidung=nguoidung.MaNguoidung";
    $result=mysqli_query($conn,$query);
?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                <section class="order" style="height:700px">
                    <div class="container">
                        <h1>Hóa đơn</h1>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Họ tên</th>
                                    <th>Ngày đặt</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  while ($rows = mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <td><?php echo $rows['Madon'] ?></td>
                                    <td><?php echo $rows['Hoten'] ?></td>
                                    <td><?php echo $rows['Ngaydat'] ?></td>
                                    <td><a href="hoadon-detail.php?Madon=<?php echo $rows['Madon']?>" class="btn btn-info">Xem chi tiết</a></td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </section>
<?php include 'partials/footer.php'; ?>