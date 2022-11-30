<?php ob_start();
include 'partials/header.php'; ?>
<?php
    if(isset($_GET['Masp'])){
        $Masp=$_GET['Masp'];
    }
    $sql="SELECT * FROM sanpham Where Masp=$Masp";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_array($result);
    
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $giatien=$_POST['giatien'];
        $soluong=$_POST['soluong'];
        $thesim=$_POST['thesim'];
        $bonho=$_POST['bonho'];
        $ram=$_POST['ram'];
        $anh=$_POST['anh'];
        $hang=$_POST['hang'];
        $hdh=$_POST['hdh'];

        $query = "DELETE FROM `sanpham` WHERE Masp=$Masp";
        $result2=mysqli_query($conn,$query);
        if ($result2)
            header("Location: sanpham.php");
        else
            echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='sanpham-add.php'>Thử lại</a>";
    
    }
?>
<section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                <section class="user-update">
                    <div class="container">
                    <form action="" method="post">
                        <h1>Xóa sản phẩm</h1>
                        <table align="center">
                            <tr>
                                <td>Tên sản phẩm:</td>
                                <td><input type="text" name="name" value="<?php echo $rows['Tensp'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Giá tiền:</td>
                                <td><input type="text" name="giatien" value="<?php echo $rows['Giatien'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Số lượng:</td>
                                <td><input type="text" name="soluong" value="<?php echo $rows['Soluong'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Thẻ sim:</td>
                                <td><input type="text" name="thesim" value="<?php echo $rows['Thesim'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong:</td>
                                <td><input type="text" name="bonho" value="<?php echo $rows['Bonhotrong'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Ram:</td>
                                <td><input type="text" name="ram" value="<?php echo $rows['Ram'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Ảnh bìa:</td>
                                <td><input type="text" name="anh" value="<?php echo $rows['Anhbia'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tên hãng:</td>
                                <td>
                                    <select name="hang">
                                        <?php
                                        $sql2 = "SELECT * FROM hangsanxuat";
                                        $res = mysqli_query($conn, $sql2);
                                        if ($res == true) {
                                            if (mysqli_num_rows($res) != 0) {
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $id = $row['Mahang'];
                                                    $ten = $row['Tenhang'];
                                                    echo "<option value='$id'>".$ten."</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tên HĐH:</td>
                                <td>
                                    <select name="hdh">
                                        <?php
                                        $sql3 = "SELECT * FROM hedieuhanh";
                                        $res2 = mysqli_query($conn, $sql3);
                                        if ($res2 == true) {
                                            if (mysqli_num_rows($res2) != 0) {
                                                while ($row1 = mysqli_fetch_array($res2)) {
                                                    $id = $row1['Mahdh'];
                                                    $ten = $row1['Tenhdh'];
                                                    echo "<option value='$id'>".$ten."</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit" class="signupbtn" name="submit"> Xóa</button></td>
                            </tr>
                            
                        </table>
                    </form>
                    </div>
                </section>
                </div>
            </div>
        </div>
</section>
<?php include 'partials/footer.php';
ob_end_flush(); ?>