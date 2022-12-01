
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
        table {
            width: 60%;
            background-color: beige;
        }
        table tr td{
            padding: 0;
        }

        th {
            color: violet;
            background-color: bisque;
            font-size: 25px;
        }

        b {
            font-style: italic;
        }

        .bb {
            color: red;
        }

        img {
            width: 100%;
        }

        font {
            color: red;
        }

        .tdd {
            text-align: center;
            font-weight: bolder;
        }

        .bb2 {
            color: brown;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: burlywood;
        }
    
    </style>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    $conn = mysqli_connect ("localhost", "root", "", "quanly_ban_sua") or
                    die ("Khong the ket noi to database ".mysqli_connect_error () ) ;
                    
                    if (!$conn) {
                        die("<script>alert('Connection Failed.')</script>");
                    }
                    //tien te
                    if (!function_exists('currency_format')) {
                        function currency_format($number, $suffix = 'VNĐ')
                        {
                            if (!empty($number)) {
                                return number_format($number, 0, ',', '.') . "{$suffix}";
                            }
                        }
                    }
                    echo "<form action='' method='POST'>";
                    echo "<table align='center' border='1'>";
                    echo "<tr><th colspan='2'>TÌM KIẾM THÔNG TIN SỮA</th></tr>";
                    ?>
                    <tr>
                        <th colspan="2">
                            <b class="bb2">Tên sữa: </b><input type="search" name="search" value="<?php if (isset($search)) echo $search; ?>">
                            <input type="submit" name="submit" value="Tìm kiếm">
                        </th>
                    </tr>
                    <?php
                    //tim kiem
                    if (isset($_POST['submit'])) {
                        //
                        $search = $_POST['search'];

                        $query="SELECT `sua`.`Hinh`,`sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `sua`.`TP_Dinh_Duong`, `sua`.`Loi_ich`
                        FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua`= `loai_sua`.`Ma_loai_sua` and Ten_sua LIKE '%$search%'";
                        $result = mysqli_query($conn, $query);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            echo "<tr><td colspan='2' class='tdd'>Có " . $count . " sản phẩm được tìm thấy!</td></tr>";
                            while ($rows = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                    echo "<th colspan='2'>".$rows['Ten_sua']." - ".$rows['Ten_hang_sua']."</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>";
                                ?>
                                <img src="Hinh_sua/<?php echo $rows['Hinh']; ?>" />
                                <?php
                                echo "</td>";
                                echo "<td><b>Thành phần dinh dưỡng: </b><br>".$rows['TP_Dinh_Duong'];
                                echo "<br><b>Lợi ích: </b><br>".$rows['Loi_ich'];
                                echo "<br><b>Trọng lượng: </b>"."<font>".$rows['Trong_luong']."</font>"." gr - "."<b>Đơn giá: </b>"."<font>".currency_format($rows['Don_gia'])."</font></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2' class='tdd'>Không tìm thấy sản phẩm này!</td></tr>";
                        }
                    }
                    echo "</table>";
                    echo "</form>";
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>                
         