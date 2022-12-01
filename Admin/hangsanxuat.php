<?php include 'partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                    <?php
                        $sql="SELECT * FROM hangsanxuat ";
                        $result=mysqli_query($conn, $sql);
                        if (!$result ) die ('<br> <b>Query failed</b>');
                        $numRows= mysqli_num_rows($result);
                        if($numRows<>0){
                            echo "<h1 style='color:black'>Quản lý hãng sản xuất</h1>";
                            echo "<form method='post'>
                                <a href='hangsanxuat-add.php' class='btn btn-success'>Thêm</a>
                                <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th class='center'>Mã Hãng</th>
                                        <th>Tên hãng</th>
                                        <th></th>
                                    </tr>
                                </thead>";
                            while($rows=mysqli_fetch_array($result)){
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>{$rows['Mahang']}</td>";
                                    echo "<td>{$rows['Tenhang']}</td>";
                                    echo "<td>
                                        <a href='hangsanxuat-update.php?Mahang=$rows[Mahang]' class='btn btn-warning'>Sửa</a>
                                        <a href='hangsanxuat-delete.php?Mahang=$rows[Mahang]' class='btn btn-danger'>Xóa</a>
                                        </td>";
                                echo "</tr>";
                                echo "</tbody>";
                            }
                            echo"</table>";
                            echo"</form>";
                               
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include 'partials/footer.php'; ?>