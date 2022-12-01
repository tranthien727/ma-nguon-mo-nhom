
<?php include '../Admin/partials/header.php'; ?>
<?php 
    $conn = mysqli_connect ("localhost", "root", "", "quanly_ban_sua") or
    die ("Khong the ket noi to database ".mysqli_connect_error () ) ;

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    } 
?>
<style>
    tr:nth-child(even) {
        background-color: #FEDFC2
    }
</style>
    <section>
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
                    $query = "SELECT * FROM khach_hang";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result)!=0){
                        echo "<p align='center'><font size='5' color='black'><b>THÔNG TIN KHÁCH HÀNG</b></font></p>";
                        echo "<table align='center' width='100%' border='1' cellpadding='2'>";
                        echo "<tr>
                                <th style='color:red'>Mã KH</th>
                                <th style='color:red'>Tên khách hàng</th>
                                <th style='color:red'>Giới tính</th>
                                <th style='color:red'>Địa chỉ</th>
                                <th style='color:red'>Số điện thoại</th>
                            </tr>";   
                        while($rows = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            for($i=0;$i<mysqli_num_fields($result)-1;$i++)
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