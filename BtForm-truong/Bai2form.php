
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
define('PI',3.14);
if (isset($_POST['submit'])){
    $r=$_POST['radius'];;
    if (isset($r) and is_numeric($r) and $r>0){
        $s=round(PI*$r*$r,1);
        $p=round(2*PI*$r,1);
    }else{
        $r="ban kinh phai la so hoac khong duoc de trong";
    }
}
if (isset($_POST['reset'])){
    $s="";
    $p="";
    $r="";
}
?>
<form action="" method="post">
    <table align ="center" bgcolor ="#faebd7">
        <tr>
            <td colspan="2" bgcolor ="orange"><h1>Diện tích và chu vi hình tròn</h1></td>
        </tr>
        <tr>
            <td>Bán Kính</td>
            <td> <input type="text" name="radius" value="<?php if (isset($r)) echo $r;?>"></td>
        </tr>
        <tr>
            <td>Diện tích</td>
            <td> <input type="text" name="area" style="background-color: lightpink; width: 161px" readonly
                        value="<?php if (isset($s)) echo $s; else echo "";?>">
            </td>
        </tr>
        <tr>
            <td>Chu vi</td>
            <td> <input type="text" name="chuvi" style="background-color: lightpink; width: 161px" readonly
                        value="<?php if (isset($p)) echo $p;echo "";?>" >
            </td>
        </tr>
        <tr>
            <td colspan="2" align ="center">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    