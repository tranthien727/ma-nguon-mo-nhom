<?php include 'partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                    <?php
                        //phan trang
                        $rowsPerPage=5;
                        if ( ! isset($_GET['page']))
                            $_GET['page'] = 1;
                        $offset =($_GET['page']-1)*$rowsPerPage;
                        $sql="SELECT sanpham.Masp, sanpham.Tensp, sanpham.Giatien, sanpham.Soluong, sanpham.Thesim, sanpham.Bonhotrong, 
                            sanpham.Ram, sanpham.Anhbia, hangsanxuat.Tenhang, hedieuhanh.Tenhdh FROM sanpham CROSS JOIN hangsanxuat 
                            CROSS JOIN hedieuhanh WHERE sanpham.Mahang=hangsanxuat.Mahang and sanpham.Mahdh=hedieuhanh.Mahdh LIMIT $offset, $rowsPerPage;";
                        $result=mysqli_query($conn, $sql);
                        if (!$result ) die ('<br> <b>Query failed</b>');
                        $numRows= mysqli_num_rows($result);
                        $maxPage = ceil($numRows / $rowsPerPage);
                        if($numRows<>0){
                            echo "<h1 style='color:black'>Quản lý sản phẩm</h1>";
                            echo "<form method='post'>
                                <a href='sanpham-add.php' class='btn btn-success'>Thêm</a>
                                <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th class='center'>Mã SP</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Ảnh bìa</th>
                                        <th>Hãng</th>	
                                        <th>Hệ điều hành</th>
                                        <th></th>
                                    </tr>
                                </thead>";
                            $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
                            if($temp<=$rowsPerPage) $num=0;
                            else $num=$temp-$rowsPerPage;
                            while($rows=mysqli_fetch_array($result)){
                                $num++;
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>{$rows['Masp']}</td>";
                                    echo "<td>{$rows['Tensp']}</td>";
                                    echo "<td>{$rows['Giatien']}</td>";
                                    echo "<td>{$rows['Soluong']}</td>";
                                    echo "<td><img src='../HinhanhSP/$rows[Anhbia]' alt='' width='100px'></td>";
                                    echo "<td>{$rows['Tenhang']}</td>";
                                    echo "<td>{$rows['Tenhdh']}</td>";
                                    echo "<td><a href='sanpham-detail.php?Masp=$rows[Masp]' class='btn btn-info'>Xem</a>
                                        <a href='sanpham-update.php?Masp=$rows[Masp]' class='btn btn-warning'>Sửa</a>
                                        <a href='sanpham-delete.php?Masp=$rows[Masp]' class='btn btn-danger'>Xóa</a>
                                        </td>";
                                echo "</tr>";
                                echo "</tbody>";
                            }
                            echo"</table>";
                            echo"</form>";
                            $re = mysqli_query($conn, 'SELECT * FROM sanpham');
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
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include 'partials/footer.php'; ?>