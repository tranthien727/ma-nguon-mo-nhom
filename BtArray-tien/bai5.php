
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 

function thay_the($mang, $cu, $moi) {
    for($i = 0 ; $i < count($mang); $i++) {
        if($mang[$i] == $cu) {
            $mang[$i] = $moi;
        }
}
    return $mang;
}
if(isset($_POST['submit'])) {
        $mang = $_POST['mang'];
        $socanthaythe = $_POST['socantt'];
        $sothaythe = $_POST['sott'];
        $mangso = explode(",",$mang);
        $kqmangso = implode(",",$mangso);
        $mangmoi = thay_the($mangso, $socanthaythe,$sothaythe);
        $kqmangtt = implode(",",$mangmoi);
} 
?>
    <form action="" method="post">
    <table align="center" style="background-color:pink ;">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: red;">Thay thế</h1>
                </td>
            </tr>

            <tr>
                <td>
                    Nhập mảng:
                </td>
                <td>
                    <input type="text" name="mang" size="30" value="<?php if(isset($mang)) echo $mang; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Nhập giá trị cần thay thế:
                </td>
                <td>
                    <input type="text" name="socantt" size="30" value="<?php if(isset($socanthaythe)) echo $socanthaythe; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Giá trị thay thế:
                </td>
                <td>
                    <input type="text" name="sott" size="30" value="<?php if(isset($sothaythe)) echo $sothaythe; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="3">
                    <input type="submit" name="submit" value="Thay thế">
                    <input type="submit" name="clear" value="clear">
                </td>
            </tr>

            
            <tr>
                <td>
                    Mảng cũ:
                </td>
                <td>
                <input type="text" name="mangkq" size="30" value="<?php if(isset($kqmangso)) echo $kqmangso; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Mảng sau khi thay thế:
                </td>
                <td>
                <input type="text" name="kqthaythe" size="30" value="<?php if(isset($kqmangtt)) echo $kqmangtt; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td colspan="3" align="center"> (*) Cac so duoc nhap cach nhau bang dau "," </td>
            </tr>

        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    