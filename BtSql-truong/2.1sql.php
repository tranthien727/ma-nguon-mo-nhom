
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
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
$squery= 'SELECT * FROM `hang_sua`';

//thuc thi truy van nhe
$result = mysqli_query($conn, $squery);
if(mysqli_num_rows($result)<>0)
{
    echo "<p align ='center'> <font size ='10' color = 'lightblue'> Thông tin hãng sữa </font> </p>";
    echo "<table align = 'center' width = '100%' border = '1' cellpadding= '2' stype='border-collapse:collapse' ";
    echo "
    <tr>
    <th>Ma hang sua</th>
    <th>ten hang sua</th>
    <th>dia chi</th>
    <th>dien thoai</th>
    <th>email</th>
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