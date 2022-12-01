
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <div class="main-content">
    <div class="wrapper">
        <h1>BÀI TẬP PHP & FORM</h1>
       
        <?php
if(isset($_POST['submit']))
{
    $sothunhat = 0.0;
    $sothuhai = 0.0;
    $sothunhat = $_POST['sothunhat'];
    $sothuhai = $_POST['sothuhai'];
    $pheptinh = $_POST['pheptinh'];
    
}


?>
    <form action="Bai6-7-view.php" method="POST" name="formnhaplieu" style="border: 1px solid #84817a;width: 60%;">
        <table align="center" style="width: 94%;" bgcolor= "lightblue" >
            <tr>
                <td colspan="2" class="bluen"  style="text-align: center;">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td class="brownb">Chọn phép tính: </td>
                <td class="brown">
                    <input type="radio" name="pheptinh" value="Cộng"> Cộng 
                    <input type="radio" name="pheptinh" value="Trừ"> Trừ 
                    <input type="radio" name="pheptinh" value="Nhân"> Nhân 
                    <input type="radio" name="pheptinh" value="Chia"> Chia
                    <input type="radio" name="pheptinh" value="Lấy dư"> Lấy dư
                </td>
            </tr>
            <tr>
                <td class="blue">Số thứ nhất: </td>
                <td>
                    <input type="text" name="sothunhat" value="<?php if(isset($sothunhat)) {echo $sothunhat;} ?>">
                </td>
            </tr>
            <tr>
                <td class="blue">Số thứ hai: </td>
                <td>
                    <input type="text" name="sothuhai" value="<?php if(isset($sothuhai)) {echo $sothuhai;} ?>">
                </td>
            </tr>
            <tr>
                <td colspan=2  style="text-align: center;">
                    <input type="submit" style="background-color: #aaa69d; font-size: 20px;" value="Tính" name="submit">
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
