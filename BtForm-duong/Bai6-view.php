

<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
$pheptinh=$so1=$so2=$ketqua="";
if(isset($_POST["submit"])&& isset($_POST["phep_tinh"]))
{
    $so1=$_POST["n1st"];
    $so2=$_POST["n2nd"];
    switch ($_POST["phep_tinh"]) {
        case "Cong": {$pheptinh="Cong";$ketqua=$so1+$so2;break;}
        case "Tru": {$pheptinh="Tru";$ketqua=$so1-$so2;break;}
        case "Nhan": {$pheptinh="Nhan";$ketqua=$so1*$so2;break;}
        case "Chia": {$pheptinh="Chia";$ketqua=$so1/$so2;break;}
        default: echo "Sai phep toan. Can nhap lai";
    };
}
?>


<table align="center">
    <tr>
        <td colspan="2">
            <h1 class="title">
                Phep tinh tren hai so
            </h1>
        </td>
    <tr>
        <td class="second-left">Chon phep tinh: </td>
        <td class="second-right">
            <input type="radio" name="PhepTinh" checked> <?php echo $pheptinh?>
        </td>
    </tr>
    <tr>
        <td class="third-four-left">So 1: </td>
        <td>
            <input type="text" name="so1" value="<?php echo $so1 ?>">
        </td>
    </tr>
    <tr>
        <td class="third-four-left">So 2: </td>
        <td>
            <input type="text" name="so2" value="<?php echo $so2 ?>">
        </td>
    </tr>
    <tr>
        <td class="third-four-left">Ket qua: </td>
        <td> <input type="text" name="ketqua" value="<?php echo $ketqua ?>"> </td>
    </tr>
    <tr>
        <td></td>
        <td><a href="javascript:window.history.back(-1);">Quay lại trang truoc</a></td>
    </tr>
</table>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    