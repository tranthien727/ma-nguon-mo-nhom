
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <style>
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 50%;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
       th{
        color:red
    }

    tr:nth-child(even) {
        background-color: #FEDFC2
    }
    </style>
<?php
$servername ="localhost";
$username = "root";
$dbname = "quanly_ban_sua";
$conn = mysqli_connect($servername, $username, "", $dbname) or die ('Không thể kết nối tới database'. mysqli_connect_error());
mysqli_set_charset($conn, 'utf8');
//phan trang
$rowsPerPage=5;
if ( ! isset($_GET['page']))
    $_GET['page'] = 1;
$offset =($_GET['page']-1)*$rowsPerPage;
//$query="Select * from sua LIMIT $offset, $rowsPerPage";
$query="SELECT `sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `loai_sua`.`Ten_loai` 
FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua`= `loai_sua`.`Ma_loai_sua` LIMIT $offset, $rowsPerPage;";
$result = mysqli_query($conn,$query);
if (!$result ) die ('<br> <b>Query failed</b>');
$numRows= mysqli_num_rows($result);
$maxPage = ceil($numRows / $rowsPerPage);
if($numRows<>0)
{
    echo "<p align ='center'> <font size ='10' color = 'black'> THÔNG TIN SỮA </font> </p>";
    echo "<table align = 'center' width = '100%' border = '1' cellpadding= '2' stype='border-collapse:collapse' ";
    echo "
         <table>
            <tr>
                <th class='center'>STT</th>
                <th>Tên Sữa</th>
                <th>Hãng Sữa</th>
                <th>Loại Sữa</th>
                <th>Trọng Lượng</th>
                <th>Đơn giá</th>	
		    </tr>";
    $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
    if($temp<=$rowsPerPage) $num=0;
    else $num=$temp-$rowsPerPage;
    while($rows=mysqli_fetch_array($result))
    {
        $num++;
        echo "<tr>";
            echo "<td>".$num."</td>";
            echo "<td>{$rows['Ten_sua']}</td>";
            echo "<td>{$rows['Ten_hang_sua']}</td>";
            echo "<td>{$rows['Ten_loai']}</td>";
            echo "<td>{$rows['Trong_luong']} gram</td>";
            echo "<td>{$rows['Don_gia'] } VNĐ</td>";
        echo "</tr>";
    }
    echo"</table> </div>";
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo "<div class='center'>";
    if ($_GET['page'] > 1){
        echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</a> "; //gắn thêm nút Back
    }
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b class="center">Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else {
            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
        }
    }
    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";  //gắn thêm nút Next
    }
    echo"</div>";
//    echo 'Tong so trang la: '.$maxPage;
}
mysqli_close($conn);
?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    