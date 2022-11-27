
<?php
        
        if (!function_exists('currency_format')) {
            function currency_format($number, $suffix = '₫')
            {
                if (!empty($number)) {
                    return number_format($number, 0, ',', '.') . "{$suffix}";
                }
            }
        }
        $rowsPerPage=20;
        if ( ! isset($_GET['page']))
            $_GET['page'] = 1;
        $offset =($_GET['page']-1)*$rowsPerPage;
        ?>
        <table align="center" class="item1">
            <?php
            //
            $query="SELECT * FROM sanpham LIMIT $offset, $rowsPerPage;";
            $result = mysqli_query($conn,$query);
            if (!$result ) die ('<br> <b>Query failed</b>');
            $numRows= mysqli_num_rows($result);
            $maxPage = ceil($numRows / $rowsPerPage);
            if($numRows<>0)
            {
                $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
                if($temp<=$rowsPerPage) $num=0;
                else $num=$temp-$rowsPerPage;
                    if (mysqli_num_rows($result)!=0) {
                        echo "<tr>";
                        $dem=1;
                        while ($rows = mysqli_fetch_array($result)) {
                            $dem++; 
                            echo "<td class='items'>";
                            echo "<div class='item'>";
                            ?>
                            <div class="container1">
                            <a href="<?php echo URL; ?>sp-info.php?id=<?php echo $rows['Masp']; ?>"><img class="thumb" src="HinhanhSP/<?php echo $rows["Anhbia"]; ?>"></a>
                            <div class="overlay"><?php echo $rows['Tensp'] ?></div> </div>
                                <h2 class='sp' style='background-color:white'><?php echo  $rows['Tensp'] ?></h2>
                                <h3 style='background-color:white;color:#d0021c;font-weight: bold;'><?php echo currency_format($rows['Giatien']) ?></h3>
                                <a href=''><button type='submit'class='btn btn-success'>Đặt hàng</button></a><br><br>
                            </div>
                            </td> 
                            <?php              
                            if($dem==5)
                            {
                                echo "</tr>";
                                echo "<tr>";
                                $dem=1;
                            }
                        }
                        echo "</table>";
                    }
                    $numRows = mysqli_num_rows($result);
                    $maxPage = floor($numRows/$rowsPerPage) + 1;
                    echo "<div class='center'>";
                    if ($_GET['page'] > 1){
                        echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><button class='b'><</button></a> "; //gắn thêm nút Back
                    }
                    for ($i=1 ; $i<=$maxPage ; $i++)
                    {
                        if ($i == $_GET['page'])
                        {
                            echo '<button class="b" >'.$i.'</button> ';
                        }
                        else {
                            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> <button class='b'>" . $i . "</button></a> ";
                        }
                    }
                    if ($_GET['page'] < $maxPage) {
                        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "><button class='b'>></button></a>";  //gắn thêm nút Next
                    }
                    echo"</div>";
                }
            ?>

    