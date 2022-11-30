<?php ob_start();
include 'partials/header.php'; ?>
<?php
    if(isset($_GET['MaNguoidung'])){
        $MaNguoidung=$_GET['MaNguoidung'];
    }
    $sql="SELECT * FROM nguoidung Where MaNguoidung=$MaNguoidung";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_array($result);
    
    if(isset($_POST['submit'])){
        $username   = ($_POST['txtHoten']);
        $email      = ($_POST['txtEmail']);
        $password   = ($_POST['txtPassword']);
        $sdt        = ($_POST['txtSDT']);
        $diachi     = ($_POST['txtDiachi']);
        $anh        = basename($_FILES["Anh"]["name"]);
        $quyen      = ($_POST['Quyen']);

        $query = "DELETE FROM `nguoidung` WHERE MaNguoidung=$MaNguoidung";
        $result2=mysqli_query($conn,$query);
        if ($result2)
            header("Location:nguoidung.php");
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
                        <h1>Xóa người dùng</h1>
                        <table align="center">
                            <tr>
                                <td>Tên người dùng:</td>
                                <td><input type="text" name="txtHoten" value="<?php echo $rows['Hoten'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="txtEmail" value="<?php echo $rows['Email'] ?>"></td>
                            </tr>
                            <tr>
                                <td>SĐT:</td>
                                <td><input type="text" name="txtSDT" value="<?php echo $rows['Dienthoai'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu:</td>
                                <td><input type="password" name="txtPassword" value="<?php echo $rows['Matkhau'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Hình ảnh:</td>
                                <td>
                                    <input type="test" name="Anh"  value="<?php echo $rows['Hinhanh'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td><input type="text" name="txtDiachi" value="<?php echo $rows['Diachi'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Quyền:</td>
                                <td>
                                <input type="text" name="Quyen" value="<?php echo $rows['IDQuyen'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit" class="signupbtn" name="submit"> xóa</button></td>
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