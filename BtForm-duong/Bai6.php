
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
$n1st=$n2nd="";
?>

<form method="post" name="phep_toan" action="Bai6-view.php">
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
            <input type="radio" name="phep_tinh"  value="Cong"
                   <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Cong')) {echo 'checked="checked"';}?>>Cong
            <input type="radio" name="phep_tinh" value="Tru"
                   <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Tru')) {echo 'checked="checked"';}?>> Tru
            <input type="radio" name="phep_tinh" value="Nhan"
                   <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Nhan')) {echo 'checked="checked"';}?> checked> Nhan
            <input type="radio" name="phep_tinh" value="Chia"
                    <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Chia')) {echo 'checked="checked"';}?>> chia
        </td>
    </tr>
    <tr>
        <td class="third-four-left">So thu nhat: </td>
        <td>
            <input type="text" name="n1st" value="<?php if(isset($_POST["n1st"])) echo $n1st; else $n1st=""; ?>">
        </td>
    </tr>
    <tr>
        <td class="third-four-left">So thu hai: </td>
        <td>
            <input type="text" name="n2nd" value="<?php if(isset($_POST["n2nd"])) echo $n2nd; else $n2nd=""; ?>">
        </td>
    </tr>
    <tr>
        <td></td>
        <td> <input type="submit" name="submit" value="Tinh"> </td>
    </tr>
</tr>
</table>
</form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    