<?php ob_start();
include 'partials/header.php'; ?>
<?php 
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

        if (!$name || !$giatien || !$soluong || !$thesim || !$bonho || !$ram || !$anh)
        {
            echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }

        $query="
        INSERT INTO sanpham (
            Tensp,
            Giatien,
            Soluong,
            Thesim,
            Bonhotrong,
            Ram,
            Anhbia,
            Mahang,
            Mahdh
        )
        VALUE (
            '{$name}',
            '{$giatien}',
            '{$soluong}',
            '{$thesim}',
            '{$bonho}',
            '{$ram}',
            '{$anh}',
            '{$hang}',
            '{$hdh}'
        )
    ";
    $result=mysqli_query($conn,$query);
    if ($result)
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
                        <h1>Thêm sản phẩm</h1>
                        <table align="center">
                            <tr>
                                <td>Tên sản phẩm:</td>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td>Giá tiền:</td>
                                <td><input type="text" name="giatien"></td>
                            </tr>
                            <tr>
                                <td>Số lượng:</td>
                                <td><input type="text" name="soluong"></td>
                            </tr>
                            <tr>
                                <td>Thẻ sim:</td>
                                <td><input type="text" name="thesim"></td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong:</td>
                                <td><input type="text" name="bonho"></td>
                            </tr>
                            <tr>
                                <td>Ram:</td>
                                <td><input type="text" name="ram"></td>
                            </tr>
                            <tr>
                                <td>Ảnh bìa:</td>
                                <td><input type="text" name="anh"></td>
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
                                                while ($rows = mysqli_fetch_array($res2)) {
                                                    $id = $rows['Mahdh'];
                                                    $ten = $rows['Tenhdh'];
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
                                <td><button type="submit" class="signupbtn" name="submit"> Thêm</button></td>
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