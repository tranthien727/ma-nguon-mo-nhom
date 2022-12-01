
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "quanly_ban_sua";
$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
mysqli_set_charset($conn, 'utf8');
$num_per_page = 05;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $num_per_page;
$sql = "select * from khach_hang limit $start_from,$num_per_page";
$result = mysqli_query($conn, $sql);
?>
    <style>
    th {
        color: red;
    }

    tr:nth-child(even) {
        background-color: #FEDFC2
    }
    </style>
    <?php
    if (mysqli_num_rows($result) != 0) {
    ?>
    <p align="center">
        <font size='7' style="font-style: bold;">Thong tin khach hang</font>
    </p>
    <table align='center' width='100%' border='1' cellpadding='2' style="border-collapse: null;">
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
        </tr>
        <?php
            while ($rows = mysqli_fetch_array($result)) {
                echo "<tr>";
                for ($i = 0; $i < mysqli_num_fields($result); $i++) {
                    if ($i == 2) {
                        if ($rows[2] == 0)
                            echo "<td><img src='nam.jpg' alt='' style='width: 50px; height:50px'></td>";
                        else
                            echo "<td><img src='nu.jpg' alt='' style='width: 50px; height:50px'></td>";
                    } else
                        echo "<td>" . $rows[$i] . "</td>";
                }
                echo "</tr>";
            }
            ?>
    </table>
    <?php
    }
    $sql = "select * from khach_hang";
    $result = mysqli_query($conn, $sql);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $num_per_page);
    echo "<div style='text-align: center;'>";
    if ($page > 1) {
        echo "<a href='thong_tin_sua_4.php?page=" . ($page - 1) . "''>Previous</a>";
    }
    echo "\t";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='thong_tin_sua_4.php?page=" . $i . "'>" . $i . "</a>";
        echo "\t";
    }
    echo "\t";
    if ($i > $page + 1) {
        echo "<a href='thong_tin_sua_4.php?page=" . ($page + 1) . "''>Next</a>";
    }
    echo "<div>";
    ?>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    