

<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
    $price = 20000;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $o = $_POST['old'];
        $n = $_POST['new'];
        $cost = ($n - $o) * $price;
    }   
    ?>

    <form action="" method="post">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="3" bgcolor="orange" style="text-align:center">
                    Thanh Toán Tiền Điện
                </td>
            </tr>
            <tr>
                <td>
                    Tên chủ hộ
                </td>
                <td>
                    <input type="text" name="name" value="<?php if (isset($name)) echo $name; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số cũ
                </td>
                <td>
                    <input type="text" name="old" value="<?php if (isset($o)) echo $o; ?>" required>
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số mới
                </td>
                <td>
                    <input type="text" name="new" value="<?php if (isset($n)) echo $n; ?>"required>
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>
                    Đơn giá
                </td>
                <td>
                    <input type="text" name="price" value="<?php echo $price??'' ?>" readonly>
                </td>
                <td>
                    (VNĐ)
                </td>
            </tr>
            <tr>
                <td>
                    Số tiền thanh toán
                </td>
                <td>
                    <input type="text" name="cost" style="background-color: lightpink; width: 150px" value="<?php if (isset($cost)) echo $cost;
                                                                                                            else echo ""; ?>" readonly>
                </td>
                <td>
                    (VNĐ)
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Tính">
                    <input type="submit" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    