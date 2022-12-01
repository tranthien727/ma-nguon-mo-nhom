
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <div class="main-content">
    <div class="wrapper">
        <h1>BÀI TẬP 6 PHP & FORM</h1>
       
        <?php
if(isset($_POST['submit']))
{
    $sothunhat = 0.0;
    $sothuhai = 0.0;
    $sothunhat = $_POST['sothunhat'];
    $sothuhai = $_POST['sothuhai'];
    $pheptinh = $_POST['pheptinh'];
    $ketqua = 0.0;
    $back = "javascript:history.go(-1)";
    if(is_numeric($sothunhat) and is_numeric($sothuhai))
    {
        switch($pheptinh)
    {
        case "Cộng":
            {
                $ketqua = $sothunhat + $sothuhai;
                break;
            }
        case "Trừ":
            {
                $ketqua = $sothunhat - $sothuhai;
                break;
            }
        case "Nhân":
            {
                $ketqua = $sothunhat * $sothuhai;
                break;
            }
        case "Lấy dư":
            {

                if($sothuhai == 0)
                {
                    echo '<script>alert("Không chia cho 0!")</script>';
                    echo header("refresh: 2; url = pheptinh.php");
                    break;
                }
                else{
                $ketqua = $sothunhat % $sothuhai;
                break;}
            }
        case "Chia":
            {
                if($sothuhai == 0)
                {
                    echo '<script>alert("Không chia cho 0!")</script>';
                    echo header("refresh: 2; url = pheptinh.php");
                    break;
                }
                else{
                $ketqua = $sothunhat / $sothuhai;
                break;}
            }
    }
    }
    else{
        echo '<script>alert("Chỉ nhập số!")</script>';
        echo header("refresh: 2; url = pheptinh.php");
    }
    
}


?>
    <form action="" method="POST" name="formnhaplieu" style="border: 1px solid #84817a;width: 60%;">
        <table align="center" style="width: 90%;" bgcolor = "lightblue">
            <tr>
                <td colspan="2" class="bluen"  style="text-align: center;">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td class="brownb">Chọn phép tính: </td>
                <td class="brown">
                <?php if(isset($pheptinh)) {echo $pheptinh;} ?>
                </td>
            </tr>
            <tr>
                <td class="blue">Số 1: </td>
                <td>
                    <input type="text" name="sothunhat" value="<?php if(isset($sothunhat)) {echo $sothunhat;} ?>">
                </td>
            </tr>
            <tr>
                <td class="blue">Số 2: </td>
                <td>
                    <input type="text" name="sothuhai" value="<?php if(isset($sothuhai)) {echo $sothuhai;} ?>">
                </td>
            </tr>
            <tr>
            <td class="blue">Kết quả: </td>
                <td>
                    <input type="text" name="ketqua" value="<?php if(isset($ketqua)) {echo $ketqua;} ?>">
                </td>
            </tr>
            <tr>
                <td colspan=2  style="text-align: center;">
                <a class="back" href="javascript:window.history.back(-1);">Quay lại trang trước</a>
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    
