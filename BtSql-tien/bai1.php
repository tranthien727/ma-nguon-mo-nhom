
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
$servername ="localhost";
$username = "root";
$dbname = "quanly_ban_sua";
$conn = mysqli_connect($servername, $username,"", $dbname);
mysqli_set_charset($conn, 'utf8');
if(!$conn){
    die("connection failed:" . mysqli_connect_error());

}
?>
<?php 
    $squery= 'SELECT * FROM `hang_sua`';
    $result = mysqli_query($conn, $squery);
    if(mysqli_num_rows($result)<>0)
    {
        echo "<p align ='center'> <font size ='10' color = 'blue'> Thông tin hãng sữa </font> </p>";
        echo "<table align = 'center' width = '100%' border = '1' cellpadding= '2' stype='border-collapse:collapse' ";
        echo "
        <tr>
        <th>Mã HS</th>
        <th>Tên hãng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
        </tr>
        ";
            while ($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                for($i=0;$i<mysqli_num_fields($result);$i++)
                    echo "<td>".$row[$i]."</td>";
            }
            echo "</tr>";
           
    }
    echo "</table>";

?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    