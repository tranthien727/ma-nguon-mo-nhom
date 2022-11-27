<?php include 'partials/header.php'; ?>
<section class="body">
    <div class="container">
        <table align="center" class="qc">
            <tr><td><img class="left" src="HinhanhSP/banner.png"></td>
            <td><img class="right" src="HinhanhSP/qc3.gif"></td></tr>
        </table>
        <div align="center">
            <img class="mySlides" src="HinhanhSP/spnb1.png">
            <img class="mySlides" src="HinhanhSP/spnb2.png">
            <img class="mySlides" src="HinhanhSP/spnb3.png">
        </div>
        <div align="center">
            <img class="ban1" src="HinhanhSP/ban1.jpg">
        </div>
        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 4000); // Change image every 4 seconds
            }
        </script>
        <table align="center" class="item1">
        <?php
            if (!function_exists('currency_format')) {
                function currency_format($number, $suffix = '₫')
                {
                    if (!empty($number)) {
                        return number_format($number, 0, ',', '.') . "{$suffix}";
                    }
                }
            }
            
            if(isset($_POST["search"])){
                $s=$_POST["txtsearch"];
                // if($s==""){
                //     echo "khong tìm thấy";
                // }
                // else{
                    $query1 = "SELECT * FROM sanpham WHERE Tensp LIKE '%$s%'";
                    $result1=mysqli_query($conn,$query1);
                    $count1= mysqli_num_rows($result1);
                    if($count1>0){
                        if (mysqli_num_rows($result1)!=0){
                            echo "<tr>";
                        $dem=1;
                        while ($rows = mysqli_fetch_array($result1)) {
                            $dem++; 
                            echo "<td class='items'>";
                            echo "<div class='item'>";
                            ?>
                            <div class="container1">
                            <a href="<?php echo URL; ?>sp-info.php?id=<?php echo $rows['Masp']; ?>"><img class="thumb" src="HinhanhSP/<?php echo $rows["Anhbia"]; ?>"></a>
                            <div class="overlay"><?php echo $rows['Tensp'] ?></div> </div>
                                <h2 class='sp' style='background-color:white'><?php echo  $rows['Tensp'] ?></h2>
                                <h3 style='background-color:white;color:#d0021c;font-weight: bold;'><?php echo currency_format($rows['Giatien']) ?></h3>
                                <?php 
                                    if (isset($_SESSION['Hinhanh']) && $_SESSION['Hinhanh']){
                                        echo "<a href='cart.php?Masp=$rows[Masp]'><button type='submit' name='dathang' class='btn btn-success'>Đặt hàng</button></a><br><br>";
                                    }
                                    else{
                                        echo "<a href='login.php'><button type='submit'class='btn btn-success'>Đặt hàng</button></a><br><br>";
                                    } 
                                ?>
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
                    }
                }
            // }
            else{
                require 'dt.php';
            }
        ?>
        
    </div>
</section>
<?php include 'partials/footer.php'; ?>
 