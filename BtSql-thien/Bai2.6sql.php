
<?php include '../Admin/partials/header.php'; ?>
<?php 
    $conn = mysqli_connect ("localhost", "root", "", "quanly_ban_sua") or
    die ("Khong the ket noi to database ".mysqli_connect_error () ) ;

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    } 
?>
<style>
        img{
            width: 40%;
        }
        td{
            text-align: center;
            width: 150px;
            padding-top: 0;
            margin-top: 0;
        }
        th{
            color: brown;
            background-color: burlywood;
            font-size: 20px;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    if (!function_exists('currency_format')) {
                        function currency_format($number, $suffix = 'VNĐ')
                        {
                            if (!empty($number)) {
                                return number_format($number, 0, ',', '.') . "{$suffix}";
                            }
                        }
                    }
                    ?>
                    <table align="center" border="1">
                        <tr>
                            <th colspan="5">THÔNG TIN CÁC SẢN PHẨM</th>
                        </tr>
                        <?php
                        //

                        $query="SELECT `sua`.`Hinh`,`sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `loai_sua`.`Ten_loai` 
                        FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua`= `loai_sua`.`Ma_loai_sua`";
                        $result = mysqli_query($conn,$query);
                        $count = mysqli_num_rows($result);
                        if ($result == true) {
                            echo "<tr>";
                            $dem=1;
                            while ($rows = mysqli_fetch_array($result)) {
                                $dem++;
                                //
                                echo "<td><b>".$rows['Ten_sua']."</b>";
                                echo "<br>".$rows['Trong_luong']." gr - ";
                                echo " ".currency_format($rows['Don_gia'])."<br>";
                                ?>
                                <img src="Hinh_sua/<?php echo $rows["Hinh"]; ?>" width="100px" height="100px">
                                <?php 
                                if($dem==6)
                                {
                                    echo "</tr>";
                                    echo "<tr>";
                                    $dem=1;
                                }
                            }
                            }
                        ?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    
    