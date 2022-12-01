
<?php include '../Admin/partials/header.php'; ?>
<?php 
    $conn = mysqli_connect ("localhost", "root", "", "quanly_ban_sua") or
    die ("Khong the ket noi to database ".mysqli_connect_error () ) ;

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    } 
?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    $query = "SELECT * FROM hang_sua";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result)!=0){
                        echo "<p align='center'><font size='5' color='blue'>THÔNG TIN HÃNG SỮA</font></p>";
                        echo "<table align='center' width='100%' border='1' cellpadding='2'>";
                        echo "<tr>
                                <th>Mã HS</th>
                                <th>Tên hãng sữa</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                            </tr>";   
                        while($rows = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            for($i=0;$i<mysqli_num_fields($result);$i++)
                                echo "<td>".$rows[$i]."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    