
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 
if(isset($_POST['submit'])) {
        $n = $_POST['son'];
        $demchan = 0;
        $dem100 = 0;
        $tongam = 0;
        $vitri0 = 0;
        $arr = array();
        $arrcp = array();
        if(is_numeric($n) and $n > 0 ) {
            for($i = 0 ; $i < $n ; $i++) {
                $arr[$i] = rand(-100,150);
                if($arr[$i] %2 == 0) {
                    $demchan += 1;
                }
                if($arr[$i] < 100) {
                    $dem100 += 1;
                }
                if($arr[$i] < 0) {
                    $tongam += $arr[$i];
                }
                for($index = 0 ; $index < count($arr); $index++) {
                    if($arr[$i] == 0) {
                        $vitri0 = $index;
                    }
                }           
            }
            $kq = "Mang cac so nguyen: " .implode('|', $arr);
            $kq .= "\nMang cac phan tu chan: $demchan";
            $kq .= "\nMang cac phan tu be hon 100: $dem100";
            $kq .= "\nTong am trong mang: $tongam";
            $kq .= (!empty($vitri0)) ? "\nVi tri phan tu bang 0: $vitri0" : "\nVi tri phan tu bang 0: Khong co";
            for ($i = 0; $i < $n - 1; $i++)
            for ($j = $i + 1; $j < $n; $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $tam = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $tam;
                }
            }
            $kq .= "\nMang duoc sap xep tang dan " . implode("| ", $arr);
        } else $kq = "Nhap lai";
}

?>
    <form action="" method="post">
    <table align="center" style="background-color:pink ;">
            <tr>
                <td colspan="2">
                    <h1 style="color: red;">Phát sinh mảng và tính toán</h1>
                </td>
            </tr>

            <tr>
                <td>
                    Nhập n:
                </td>
                <td>
                    <input type="text" name="son" size="30" value="<?php if(isset($n)) echo $n; else echo "" ?>">
                </td>
            </tr>

            
            <tr>
                <td>
                    Kết quả:
                </td>
                <td>
                    <textarea rows="4" cols="50" readonly name="ketqua"><?php if(isset($kq)) echo $kq; else echo "" ?>
                    </textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Thực hiện">
                    <input type="submit" name="clear" value="clear">
                </td>
            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    