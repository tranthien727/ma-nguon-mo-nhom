
<?php include '../Admin/partials/header.php'; ?>
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
    table {
        width: 70%;
    }

    th {
        color: aqua;
        background-color: bisque;
        font-size: 35px;
    }

    b {
        font-style: italic;
    }

    .bb {
        color: burlywood;
    }

    img {
        width: 70%;
        height: 70%;
    }

    font {
        color: deeppink;
    }

    h2 {
        color: brown;
        font-weight: bolder;
        text-align: center;
        font-size: 38px;
    }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <h2>THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h2>
    <?php
    
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'VNĐ')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    
    $rowsPerPage = 2;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $sql="SELECT * FROM sua LIMIT $offset, $rowsPerPage";
    $res=mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $maxPage = ceil($count / $rowsPerPage);

    echo "<table align='center' border='1'>";
    while($row=mysqli_fetch_assoc($res)){
    $ten_sua=$row['Ten_sua'];
    $ma_hang_sua = $row['Ma_hang_sua'];
    $trong_luong = $row['Trong_luong'];
    $don_gia = $row['Don_gia'];
    $hinh = $row['Hinh'];
    $tp_dd=$row['TP_Dinh_Duong'];
    $loi_ich=$row['Loi_ich'];
    $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $ten_hang_sua = $row2['Ten_hang_sua'];
        echo "<tr>";
            echo "<th colspan='2'>".$ten_sua." - ".$ten_hang_sua."</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        ?>
    <img width="50%" src="Hinh_sua/<?php echo $hinh; ?>">
    <?php
        echo "</td>";
        echo "<td><b>Thành phần dinh dưỡng: </b><br>".$tp_dd;
        echo "<br><b>Lợi ích: </b><br>".$loi_ich;
        echo "<br><b>Trọng lượng: </b>"."<font>".$trong_luong."</font>"." gr - "."<b>Đơn giá: </b>"."<font>".currency_format($don_gia)."</font></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <div style="text-align: center;">
        <?php
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    if ($_GET['page'] > 1){
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".(1)."> << </a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> < </a> "; //gắn thêm nút Back
    }
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b>'.$i.'</b> '; 
        }
        else echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i."> ".$i."</a> ";
    }
    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($_GET['page'] + 1) . "> > </a>";  //gắn thêm nút Next
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($maxPage) . "> >> </a>";
    }
    ?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    