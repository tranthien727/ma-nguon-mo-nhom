

<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php

function taoMang($soN, &$arr)
{
    for ($i = 0; $i < $soN; $i++) {
        $x = rand(0, 20);
        $arr[$i] = $x;
    }
};

function max_array($arr) {
    $max = $arr[0];
    foreach($arr as $value) {
        if ($value > $max) $max = $value;
    }
    return $max;
}

function min_array($arr) {
    $min = $arr[0];
    foreach($arr as $value) {
        if ($value < $min) $min = $value;
    }
    return $min;
}

function sum_array($arr) {
    $sum = 0;
    foreach($arr as $value) {
        $sum += $value;
    }
    return $sum;
}
?>
    <?php
    $text = "";
    $arr = array();
    if (isset($_POST['submit'])) {
        $soN = $_POST['soN'];

        $mang = taoMang($soN, $arr);
        $mang = implode(" ", $arr);
        $max = max_array($arr);
        $min = min_array($arr);
        $sum = array_sum($arr);
    }
    if (isset($_POST['reset'])) {
        $_POST = array();
    }
    ?> 
/*
        
    }
    if (isset($_POST['reset'])) {
        $_POST = array();
    }
    ?>
*/
    <form method="post" action="">
        <table align="center" bgcolor="#7fffd4">
            <tr>
                <td colspan="3" align="center">
                    <h1>Phát sinh mảng và tính toán</h1>
                </td>
            </tr>
            <tr>
                <td>Nhập số phần tử</td>
                <td><input type="text" name="soN" size="30" value="<?php echo  $soN ?? ''; ?>" required></td>
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
                <td>Mảng</td>
                <td><input type="text" name="mang" value="<?php echo $mang ?? ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng: </td>
                <td><input type="text" name="max" value="<?php echo $max ?? ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng: </td>
                <td><input type="text" name="min" value="<?php echo $min ?? ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>Tổng mảng</td>
                <td><input type="text" name="sum" value="<?php echo $sum ?? ''; ?>" readonly></td>
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