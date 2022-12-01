
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
    tr:nth-child(2n) {
        color: brown;
    }

    tr:nth-child(2n+1) {
        background-color: #FEDFC2;
        color: gray;
    }

    th {
        color: #FEDFC2;
    }

    h2 {
        text-align: center;
        color: crimson;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bolder;
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
    $sn = 1;
    ?>

    <h2>THÔNG TIN SỮA</h2>
    <table align="center" border="1" style="border-collapse:collapse">
        <tr>
            <th>STT</th>
            <th>Tên sữa</th>
            <th>Hãng sữa</th>
            <th>Loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>
        <?php
        
        $rowsPerPage = 5;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }

        $offset = ($_GET['page'] - 1) * $rowsPerPage;

        $sql = "SELECT * FROM sua LIMIT $offset, $rowsPerPage";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        $maxPage = ceil($count / $rowsPerPage);
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
                $ten_sua = $row['Ten_sua'];
                $ma_hang_sua = $row['Ma_hang_sua'];
                $ma_loai_sua = $row['Ma_loai_sua'];
                $trong_luong = $row['Trong_luong'];
                $don_gia = $row['Don_gia'];
                $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $ten_hang_sua = $row2['Ten_hang_sua'];
                $sql3 = "SELECT Ten_loai FROM loai_sua WHERE Ma_loai_sua='$ma_loai_sua' ";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $ten_loai = $row3['Ten_loai'];
                echo "<tr>";
                echo "<td>" . $sn++ . "</td>";
                echo "<td>" . $ten_sua . "</td>";
                echo "<td>" . $ten_hang_sua . "</td>";
                echo "<td>" . $ten_loai . "</td>";
                echo "<td>" . $trong_luong . " gram</td>";
                echo "<td class ='dg'>" . currency_format($don_gia) . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <div style="text-align: center;">
        <?php
        $re = mysqli_query($conn, 'select * from sua');
        $numRows = mysqli_num_rows($re);
        $maxPage = floor($numRows / $rowsPerPage) + 1;
        if ($_GET['page'] > 1) {
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . (1) . "> << </a> ";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "> < </a> "; 
        }
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $_GET['page']) {
                echo '<b>' . $i . '</b> '; 
            } else echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
        }
        if ($_GET['page'] < $maxPage) {
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "> > </a>";  
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($maxPage) . "> >> </a>";
        }
        ?>
    </div>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    