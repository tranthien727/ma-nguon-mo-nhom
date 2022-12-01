
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 
if(isset($_POST['submit'])) {
        $mang = $_POST['mang'];
        $socantim = $_POST['sotim'];
        $mangso = explode(",",$mang);
        $kqmangso = implode(",",$mangso);
        for($i = 0 ; $i < count($mangso); $i++) {
            if($mangso[$i] == $socantim) {
                $kqtimkiem = "Tìm thấy $socantim tại vị trí thứ $i trong mảng";
                break;
            }
            else $kqtimkiem = "không thấy số cần tìm";
        }
} 
?>
    <form action="" method="post">
    <table align="center" style="background-color:pink ;">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: red;">Tìm kiếm</h1>
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
                    Nhập sô cần tìm:
                </td>
                <td>
                    <input type="text" name="sotim" size="30" value="<?php if(isset($socantim)) echo $socantim; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td></td>
                <td colspan="3">
                    <input type="submit" name="submit" value="Thực hiện">
                    <input type="submit" name="clear" value="clear">
                </td>
            </tr>

            
            <tr>
                <td>
                    Mảng:
                </td>
                <td>
                <input type="text" name="mangkq" size="30" value="<?php if(isset($kqmangso)) echo $kqmangso; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Kết quả tìm kiếm:
                </td>
                <td>
                <input type="text" name="kqtimkiem" size="30" value="<?php if(isset($kqtimkiem)) echo $kqtimkiem; else echo "" ?>">
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