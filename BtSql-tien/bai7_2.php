    
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
    table {
        width: 85%;
    }

    th {
        color: brown;
        background-color: bisque;
        font-size: 25px;
    }

    b {
        font-style: italic;
    }

    .tp {
        text-align: right;
    }

    table tr td {
        padding: 1%;
    }
    </style>
</head>

<body>

    <div class="main-content">
        <div class="wrapper">

            <?php
    
    $id=$_GET['id'];
    $sql="SELECT * FROM sua WHERE Ma_sua='$id' ";
    $res=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
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
    echo "<table align='center' border='1'>";
        echo "<tr>";
            echo "<th colspan='2'>".$ten_sua." - ".$ten_hang_sua."</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        ?>
            <img src="Hinh_sua/suabot.jpg">
            <?php
        echo "</td>";
        echo "<td><b>Thành phần dinh dưỡng: </b><br>".$tp_dd;
        echo "<br><b>Lợi ích: </b><br>".$loi_ich;
        echo "<br><div class='tp'><b>Trọng lượng: </b>".$trong_luong." gr - "."<b>Đơn giá: </b>".$don_gia."</div></td>";
        echo "</tr>";
        echo "<tr><td align='right'><a href='javascript:window.history.go(-1)'>Quay về</a></td></tr>";
    echo "</table>";
    ?>
        </div>
    </div>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    