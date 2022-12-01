
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
        width: 95%;
        background-color: aquamarine;
    }

    table tr td {
        padding: 0;
    }

    th {
        color: black;
        background-color: lightpink;
        font-size: 30px;
    }

    b {
        font-style: italic;
    }

    .bb {
        color: red;
    }

    img {
        width: 90%;
    }

    font {
        color: deeppink;
    }

    .tdd {
        text-align: center;
        font-weight: bolder;
    }

    .bb2 {
        color: blueviolet;
        font-size: 25px;
    }

    input[type="submit"] {
        background-color: pink;
    }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
        }
        
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
            <b class="bb2">Tên sữa: </b><input type="search" name="search"
                value="<?php if (isset($search)) echo $search; ?>">
            <input type="submit" name="submit" value="Tìm kiếm">
        </th>
    </tr>
    <?php
        
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $sql = "SELECT * FROM sua WHERE Ten_sua LIKE '%$search%' ";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                echo "<tr><td colspan='2' class='tdd'>Có " . $count . " sản phẩm được tìm thấy!</td></tr>";
                while ($row = mysqli_fetch_assoc($res)) {
                    $ten_sua = $row['Ten_sua'];
                    $ma_hang_sua = $row['Ma_hang_sua'];
                    $trong_luong = $row['Trong_luong'];
                    $don_gia = $row['Don_gia'];
                    $hinh = $row['Hinh'];
                    $tp_dd = $row['TP_Dinh_Duong'];
                    $loi_ich = $row['Loi_ich'];
                    $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $ten_hang_sua = $row2['Ten_hang_sua'];
                    echo "<tr>";
                    echo "<th colspan='2'>" . $ten_sua . " - " . $ten_hang_sua . "</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
    ?>
    <img src="Hinh_sua/<?php echo $hinh; ?>" />
    <?php
            echo "</td>";
            echo "<td><b>Thành phần dinh dưỡng: </b><br>" . $tp_dd;
            echo "<br><b>Lợi ích: </b><br>" . $loi_ich;
            echo "<br><b>Trọng lượng: </b>" . "<font>" . $trong_luong . "</font>" . " gr - " . "<b>Đơn giá: </b>" . "<font>" . currency_format($don_gia) . "</font></td>";
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