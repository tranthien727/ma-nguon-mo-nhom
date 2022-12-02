<?php include 'partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9" style="height:700px">
                    <?php
                        $sql="SELECT * FROM hedieuhanh ";
                        $result=mysqli_query($conn, $sql);
                        if (!$result ) die ('<br> <b>Query failed</b>');
                        $numRows= mysqli_num_rows($result);
                        if($numRows<>0){
                            echo "<h1 style='color:black'>Quản lý hệ điều hành</h1>";
                            echo "<form method='post'>
                                <a href='hedieuhanh-add.php' class='btn btn-success'>Thêm</a>
                                <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th class='center'>Mã hệ điều hành</th>
                                        <th>Tên hệ điều hành</th>
                                        <th></th>
                                    </tr>
                                </thead>";
                            while($rows=mysqli_fetch_array($result)){
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>{$rows['Mahdh']}</td>";
                                    echo "<td>{$rows['Tenhdh']}</td>";
                                    echo "<td>
                                        <a href='hedieuhanh-update.php?Mahdh=$rows[Mahdh]' class='btn btn-warning'>Sửa</a>
                                        <a href='hedieuhanh-delete.php?Mahdh=$rows[Mahdh]' class='btn btn-danger'>Xóa</a>
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