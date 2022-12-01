
<?php include '../Admin/partials/header.php'; ?>
<?php 
    $conn = mysqli_connect ("localhost", "root", "", "quanly_ban_sua") or
    die ("Khong the ket noi to database ".mysqli_connect_error () ) ;

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    } 
?>
    <section>
    <style>
        
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 90%;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        th{
            color: brown;
            background-color: bisque;
            font-size: 25px;
        }
        b{
            font-style: italic;
        }
    </style>
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
                    if (!function_exists('currency_format')) {
                        function currency_format($number, $suffix = 'VNĐ')
                        {
                            if (!empty($number)) {
                                return number_format($number, 0, ',', '.') . "{$suffix}";
                            }
                        }
                    }
                    $rowsPerPage=2;
                    if ( ! isset($_GET['page']))
                        $_GET['page'] = 1;
                    $offset =($_GET['page']-1)*$rowsPerPage;
                    $query="SELECT `sua`.`Hinh`,`sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `sua`.`TP_Dinh_Duong`, `sua`.`Loi_ich`
                    FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua`= `loai_sua`.`Ma_loai_sua`LIMIT $offset, $rowsPerPage;";
                    $result = mysqli_query($conn,$query);
                    if (!$result ) die ('<br> <b>Query failed</b>');
                        $numRows= mysqli_num_rows($result);
                        $maxPage = ceil($numRows / $rowsPerPage);
                    if($numRows<>0)
                    {
                        $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
                        if($temp<=$rowsPerPage) $num=0;
                        else $num=$temp-$rowsPerPage;
                        if (mysqli_num_rows($result)!=0){
                            echo "<table align='center' width='100%' border='1' cellpadding='2'>";
                            echo "<tr style='background:pink;'><th colspan='2'><p class='center'><font size='5' color='orange'><b>THÔNG TIN CÁC SẢN PHẨM</b></font></p></th></tr>";
                            while($rows = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                    echo "<th colspan='2'>".$rows['Ten_sua']." - ".$rows['Ten_hang_sua']."</th>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>";
                                    ?>
                                    <img width="50%" src="Hinh_sua/<?php echo $rows['Hinh']; ?>">
                                    <?php   
                                    echo "</td>";
                                    echo "<td><b>Thành phần dinh dưỡng: </b><br>".$rows['TP_Dinh_Duong'];
                                    echo "<br><b>Lợi ích: </b><br>".$rows['Loi_ich'];
                                    echo "<br><b>Trọng lượng: </b>"."<font>".$rows['Trong_luong']."</font>"." gr - "."<b>Đơn giá: </b>"."<font>".currency_format($rows['Don_gia'])."</font></td>";
                                echo "</tr>";    
                            }
                            echo "</table>";
                        }
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
                                echo '<b class="center">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
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
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    