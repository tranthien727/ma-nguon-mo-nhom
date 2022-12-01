
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 
function sxtang ($mang) {
    for($i = 0; $i < count($mang)-1; $i++) {
        for($j = $i + 1; $j < count($mang);$j++) {
            if($mang[$i] > $mang[$j]) 
            {
                $temp=$mang[$i];
                $mang[$i]=$mang[$j];
                $mang[$j]=$temp;
            }
        }
    }
    return $mang;
}

function sxgiam ($mang) {
    for($i = 0; $i < count($mang)-1; $i++) {
        for($j = $i + 1; $j < count($mang);$j++) {
            if($mang[$i] < $mang[$j]) 
            {
                $temp=$mang[$i];
                $mang[$i]=$mang[$j];
                $mang[$j]=$temp;
            }
        }
    }
    return $mang;
}

if(isset($_POST['submit'])) {
        $mang = $_POST['mang'];
        $mangso = explode(",",$mang);
        $mangtd = sxtang($mangso);
        $kqmangtd = implode(",",$mangtd);
        $manggd = sxgiam($mangso);
        $kqmanggd = implode(",",$manggd);
}
?>
    <form action="" method="post">
    <table align="center" style="background-color:pink ;">
            <tr>
                <td colspan="2" align="center">
                    <h1 style="color: red;">Sắp xếp</h1>
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
                <td></td>
                <td colspan="3">
                    <input type="submit" name="submit" value="Sắp xếp tăng/giảm dần">
                    <input type="submit" name="clear" value="clear">
                </td>
            </tr>

            
            <tr>
                <td>
                    Tăng dần:
                </td>
                <td>
                <input type="text" name="tangdan" size="30" value="<?php if(isset($kqmangtd)) echo $kqmangtd; else echo "" ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Giảm dần:
                </td>
                <td>
                <input type="text" name="giamdan" size="30" value="<?php if(isset($kqmanggd)) echo $kqmanggd; else echo "" ?>">
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