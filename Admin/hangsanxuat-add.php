<?php ob_start();
include 'partials/header.php'; ?>
<?php 
    if(isset($_POST['submit'])){
        $name=$_POST['name'];

        if (!$name)
        {
            echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }

        $query="
        INSERT INTO hangsanxuat (
            Tenhang
        )
        VALUE (
            '{$name}'
        )
    ";
    $result=mysqli_query($conn,$query);
    if ($result)
        header("Location: hangsanxuat.php");
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='hangsanxuat-add.php'>Thử lại</a>";
    }
?>
<section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                <section class="user-update" style="height:700px">
                    <div class="container">
                    <form action="" method="post">
                        <h1>Thêm hãng sản xuất</h1>
                        <table align="center">
                            <tr>
                                <td>Tên hãng:</td>
                                <td><input type="text" name="name"></td>
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