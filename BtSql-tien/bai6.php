
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";
$conn = new mysqli($hostname, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
if ($conn->connect_error) {
    echo "Loi ket noi db " . $conn->connect_error;
}
 ?>
    <style>
        table tr td{
            padding: 1%;
            align-self: center;
            
        }

        th{
            color: crimson;
            background-color: blanchedalmond;
            font-size: larger;
        }
    </style>
    <table align="center" border="1">
        <tr>
            <th colspan="5">THÔNG TIN CÁC SẢN PHẨM</th>
        </tr>
        <?php
        $sql = "SELECT * FROM sua ";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $dem=1;
            echo "<tr>";
            while ($row = mysqli_fetch_array($res)) {
                $dem++;
                $ten_sua = $row['Ten_sua'];
                $ma_hang_sua = $row['Ma_hang_sua'];
                $ma_loai_sua = $row['Ma_loai_sua'];
                $trong_luong = $row['Trong_luong'];
                $don_gia = $row['Don_gia'];
                $hinh = $row['Hinh'];
                $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $ten_hang_sua = $row2['Ten_hang_sua'];
                $sql3 = "SELECT Ten_loai FROM loai_sua WHERE Ma_loai_sua='$ma_loai_sua' ";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $ten_loai = $row3['Ten_loai'];
                
                echo "<td><b>".$ten_sua."</b>";
                echo "<br>".$trong_luong." gr - ";
                echo " ".$don_gia."<br>";
                ?>
                            <img src="Hinh_sua/suabot.jpg?php echo $hinh; ?>">
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
    </table>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    