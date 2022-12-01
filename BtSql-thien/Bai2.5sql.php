
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
                    $conn = mysqli_connect ("localhost", "root", "", "quanly_ban_sua") or
                    die ("Khong the ket noi to database ".mysqli_connect_error () ) ;

                    if (!$conn) {
                        die("<script>alert('Connection Failed.')</script>");
                    }
                    $query="SELECT `sua`.`Hinh`,`sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `loai_sua`.`Ten_loai` 
                    FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua`= `loai_sua`.`Ma_loai_sua`";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_num_rows($result)!=0){
                        echo "<table align='center' border='1' cellpadding='2'>";
                        echo "<tr style='background:pink;'><th colspan='2'><p class='center'><font size='5' color='orange'><b>THÔNG TIN CÁC SẢN PHẨM</b></font></p></th></tr>";
                        while($rows = mysqli_fetch_array($result)) {
                            echo "<tr>";
                                echo "<td align='center'><img src='Hinh_sua/$rows[Hinh]' alt='' style='width: 70px; height:100px'></td>"; 
                                echo "<td>".
                                    "<b>". $rows['Ten_sua']."</b>"."<br>"."<br>".
                                    "Nhà sản xuất: ".$rows['Ten_hang_sua']."<br>".
                                    $rows['Ten_loai']." - ".$rows['Trong_luong']." gr - ".$rows['Don_gia']." VNĐ".                  
                                "</td>";                
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
