
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <style>
    th{
        color:red
    }

    tr:nth-child(even) {
        background-color: #FEDFC2
    }
</style>
<?php
//  ket noi csdl thu tuc
$servername ="localhost";
$username = "root";
$dbname = "quanly_ban_sua";
$conn = mysqli_connect($servername, $username,"", $dbname);
mysqli_set_charset($conn, 'utf8');
// check connecttion
if(!$conn){
    die("connection failed:" . mysqli_connect_error());

}
else echo "ket noi thanh cong";
// chuan bi truy van nhe
$squery= 'SELECT * FROM `khach_hang`';

//thuc thi truy van nhe
$result = mysqli_query($conn, $squery);
if(mysqli_num_rows($result)<>0)
{
    echo "<p align ='center'> <font size ='10' color = 'black'> Thông tin khách hàng </font> </p>";
    echo "<table align = 'center' width = '100%' border = '1' cellpadding= '2' stype='border-collapse:collapse' ";
    echo "
    <tr>
    <th>Mã khách hàng</th>
    <th>Tên khách hàng</th>
    <th>Giới tính</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    </tr>
    ";
    
    while ($rows = mysqli_fetch_array($result)) {
        echo "<tr>";
        for ($i = 0; $i < mysqli_num_fields($result)-1; $i++) {
            if ($i == 2) {
                if ($rows[2] == 0)
                    echo "<td align ='center'><img src='nam.jpg' alt='' style='width: 50px; height:50px'></td>";
                else
                    echo "<td align ='center'><img src='nu.jpg' alt='' style='width: 50px; height:50px'></td>";
            } else
                echo "<td>" . $rows[$i] . "</td>";
        }
        echo "</tr>";
    }
    
       
}
echo "</table>";


?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    