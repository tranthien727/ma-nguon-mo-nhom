

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
        $text = $_POST['dayso'];
        $arr = explode(",", $text);
        $kq = 0;
        $kq = array_sum($arr);
        
    }
    if (isset($_POST['reset'])) {
        $_POST = array();
    }
    ?>
    <form method="post" action="">
        <table align="center" bgcolor="#7fffd4">
            <tr>
                <td colspan="3" align="center">
                    <h1 style="background-color: green;"> Nhap va tinh tren day so</h1>
                </td>
            </tr>
            <tr>
                <td>Nhap day so</td>
                <td><input type="text" name="dayso" size="50" value="<?php echo  $text; ?>" required></td>
                <td style="color: #ff0a07">*</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Tong day so">
                    <input type="submit" name="reset" value="Reset">
                </td>
            </tr>
            <tr>
                <td>Tong day so</td>
                <td><input type="text" name="ketqua" value="<?php echo $kq ?? ''; ?>" readonly></td>
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