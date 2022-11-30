<?php include 'partials/header.php'; ?>
<?php 
    $Madon=$_GET['Madon'];
    $query="SELECT chitietdonhang.Mactdh,chitietdonhang.Soluong, chitietdonhang.Giatien, chitietdonhang.Thanhtien, sanpham.Tensp 
    FROM chitietdonhang CROSS JOIN sanpham WHERE chitietdonhang.Madon=$Madon and chitietdonhang.Masp=sanpham.Masp";
    $result=mysqli_query($conn,$query);
?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                <section class="donhang-detail" style="height:700px">
                    <div class="container">
                        <h1>CHI TIẾT ĐƠN HÀNG</h1>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mã CT</th>
                                    <th>Tên SP</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  while ($rows = mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <td><?php echo $rows['Mactdh'] ?></td>
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
                </div>
            </div>
        </div>
    </section>
<?php include 'partials/footer.php'; ?>