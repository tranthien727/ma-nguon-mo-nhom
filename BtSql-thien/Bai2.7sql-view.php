
<?php include '../Admin/partials/header.php'; ?>
<?php 
    $conn = mysqli_connect ("localhost", "root", "", "quanly_ban_sua") or
    die ("Khong the ket noi to database ".mysqli_connect_error () ) ;

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    } 
?>
    <section>
    <style>
        table{
            width: 85%;
        }
        th{
            color: brown;
            background-color: bisque;
            font-size: 25px;
        }
        b{
            font-style: italic;
        }
        .bb{
            text-align: right;
        }
        table tr td{
            padding: 1%;
        }

    </style>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    //tien te
                    if (!function_exists('currency_format')) {
                        function currency_format($number, $suffix = 'VNĐ')
                        {
                            if (!empty($number)) {
                                return number_format($number, 0, ',', '.') . "{$suffix}";
                            }
                        }
                    }
                    //
                    $id=$_GET['id'];
                    $query="SELECT `sua`.`Hinh`,`sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `sua`.`TP_Dinh_Duong`, `sua`.`Loi_ich`
                    FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua`= `loai_sua`.`Ma_loai_sua`";
                    $result = mysqli_query($conn,$query);
                    $rows=mysqli_fetch_assoc($result);
                    echo "<table align='center' border='1'>";
                        echo "<tr>";
                            echo "<th colspan='2'>".$rows['Ten_sua']." - ".$rows['Ten_hang_sua']."</th>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>";
                            ?>
                            <img src="Hinh_sua/<?php echo $rows['Hinh']; ?>">
                            <?php
                            echo "</td>";
                            echo "<td><b>Thành phần dinh dưỡng: </b><br>".$rows['TP_Dinh_Duong'];
                            echo "<br><b>Lợi ích: </b><br>".$rows['Loi_ich'];
                            echo "<br><b>Trọng lượng: </b>"."<font>".$rows['Trong_luong']."</font>"." gr - "."<b>Đơn giá: </b>"."<font>".currency_format($rows['Don_gia'])."</font></td>";
                        echo "</tr>";
                        echo "<tr><td align='right'><a href='javascript:window.history.go(-1)'>Quay về</a></td></tr>";
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    
  