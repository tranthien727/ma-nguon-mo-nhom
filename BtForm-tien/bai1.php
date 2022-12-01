

<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php


if (isset($_POST['submit'])) {
    $cd = $_POST['cd'];
    $cr = $_POST['cr'];
    
    if(is_numeric($cd) || is_numeric($cd) and $cd > $cr ) {
        $kq = $cd * $cr;
    } else
    $kq = "nhập lại";
}
?>
<form action="" method="post">
    <table align="center" style="background-color: lightpink">
        <tr style="background-color:orange; text-align:center">
            <td colspan="3">
                <h1>Diện thích hình chữ nhật</h1>
            </td>
        </tr>
        <tr>
            <td>
                Chiều dài:
            </td>
            <td>
                <input type="text"  name="cd" value="<?php if (isset($cd)) echo $cd;
                                                    else echo ""; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Chiều rộng:
            </td>
            <td>
                <input type="text"  name="cr" value="<?php if (isset($cr)) echo $cr;
                                                    else echo ""; ?>">
            </td>

        </tr>

        <tr>
            <td>
               Kết quả:
            </td>
            <td>
                <input type="text" name="kq" value="<?php if (isset($kq)) echo $kq ?>" readonly>
            </td>

        </tr>

        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="Tính" name="submit">
                <input type="submit" value="clear" name="reset">
            </td>

        </tr>
    </table>
</form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    