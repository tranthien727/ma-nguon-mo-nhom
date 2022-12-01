
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
    if (isset($_POST['submit'])) {
        $txt = $_POST['arr'];
        $arr = explode(",", $txt);
        $find = $_POST['find'];
        $timKiem = array_search($find, $arr) ? "Tìm thấy " . $find . " tại vị trí thứ " . array_search($find, $arr) + 1 . " trong mảng" : "Không tìm thấy";
        $arr = implode(" ", $arr);
    }
    if (isset($_POST['reset'])) {
        $_POST = array();
    }
    ?>
    <form method="post" action="">
        <table align="center" bgcolor="darkgray">
            <tr>
                <td colspan="3" align="center" bgcolor="cadetblue">
                    <h1>Tìm kiếm</h1>
                </td>
            </tr>
            <tr>
                <td>Nhập mảng</td>
                <td><input type="text" name="arr" size="30" value="<?php echo  $txt ?? ''; ?>" required></td>
                <td style="color: darkgray">*</td>
            </tr>
            <tr>
                <td>Nhập số cần tìm</td>
                <td><input type="text" name="find" size="30" value="<?php echo  $find ?? ''; ?>" required></td>
                <td style="color: #ff0a07">*</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Tính toán">
                    <input type="submit" name="reset" value="Reset">
                </td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input type="text" value="<?php echo $arr ?? ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td > <input type="text" style="background-color: aquamarine" value="<?php echo $timKiem ?? ''; ?>" readonly></td>
                <td></td>
            </tr>
            <tr>
                <td bgcolor="cadetblue" colspan="3" align="center"> (*) Cac so duoc nhap cach nhau bang dau "," </td>
            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    