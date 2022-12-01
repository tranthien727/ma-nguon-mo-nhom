
    
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
    $text = "";
    $arr = array();
    if (isset($_POST['submit'])) {
        $soN = $_POST['son'];
        function taoMang($soN, &$arr) {
            for ($i = 0; $i < $soN; $i++) {
                $x = rand(0, 20);
                $arr[$i] = $x;
            }
        };

        function max_arr($arr) {
            $max = $arr[0];
            foreach($arr as $value) {
                if ($value > $max) $max = $value;
            }
            return $max;
        };
        
        function min_arr($arr) {
            $min = $arr[0];
            foreach($arr as $value) {
                if ($value < $min) $min = $value;
            }
            return $min;
        };
        
        function sum_arr($arr) {
            $sum = 0;
            foreach($arr as $value) {
                $sum += $value;
            }
            return $sum;
        };
        
        $mang = taoMang($soN, $arr);
        $mang = implode(" ", $arr);
        $max = max_arr($arr);
        $min = min_arr($arr);
        $sum = sum_arr($arr);

        
    }
    if (isset($_POST['reset'])) {
        $_POST = array();
    }
    ?>
    <form method="post" action="">
    <table align="center" style="background-color: lightpink">
            <tr style="background-color:orange; text-align:center">
                <td colspan="3" align="center">
                    <h1>Phát sinh mảng và tính toán</h1>
                </td>
            </tr>
            <tr>
                <td>Nhập số phần tử</td>
                <td><input type="text" name="son" size="30" value="<?php if(isset($soN)) echo $soN; else echo ""; ?>" required></td>
                <td style="color: #ff0a07">*</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Phát sinh mảng và tính toán">
                    <input type="submit" name="reset" value="Reset">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td><input type="text" name="mang" value="<?php if(isset($mang)) echo $mang; else ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng: </td>
                <td><input type="text" name="max" value="<?php if(isset($max)) echo $max; else ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>TTNN (MIN) trong mảng: </td>
                <td><input type="text" name="min" value="<?php if(isset($min)) echo $min; else ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>Tổng mảng</td>
                <td><input type="text" name="sum" value="<?php if(isset($sum)) echo $sum; else ''; ?>" readonly></td>
                <td></td>
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