<?php include 'partials/header.php'; ?>
<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = '₫')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    $Masp=$_GET['Masp'];
    $sql="SELECT sanpham.Tensp, sanpham.Giatien, sanpham.Soluong, sanpham.Thesim, sanpham.Bonhotrong, 
    sanpham.Ram, sanpham.Anhbia, hangsanxuat.Tenhang, hedieuhanh.Tenhdh FROM sanpham CROSS JOIN hangsanxuat 
    CROSS JOIN hedieuhanh WHERE Masp='$Masp' and sanpham.Mahang=hangsanxuat.Mahang and sanpham.Mahdh=hedieuhanh.Mahdh";
    $result=mysqli_query($conn, $sql);
    $rows=mysqli_fetch_assoc($result);
?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                <section class="info" style="height:700px;">
                    <div class="container">
                        <div class="row" style="margin-top:100px">
                            <div class="col-sm-5"><img id="myImg" src="../HinhanhSP/<?php echo $rows["Anhbia"]; ?>" width='450px'></div>
                            <div class="col-sm-6">
                                <h1><?php echo $rows["Tensp"] ?></h1>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Hãng sản xuất:</td>
                                            <td><?php echo $rows["Tenhang"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hệ điều hành:</td>
                                            <td><?php echo $rows["Tenhdh"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng:</td>
                                            <td><?php echo $rows["Soluong"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Thẻ sim:</td>
                                            <td><?php echo $rows["Thesim"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bộ nhớ:</td>
                                            <td><?php echo $rows["Bonhotrong"] ?> GB</td>
                                        </tr>
                                        <tr>
                                            <td>Ram:</td>
                                            <td><?php echo $rows["Ram"] ?> GB</td>
                                        </tr>
                                        <tr>
                                            <td>Giá:</td>
                                            <td><?php echo currency_format($rows["Giatien"]) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href='javascript: history.go(-1)'>Quay về</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
<?php include 'partials/footer.php'; ?>