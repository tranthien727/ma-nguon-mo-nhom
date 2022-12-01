<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <form action="Bai6form-kq.php" method="POST">
                    <table align="center">
                        <tr>
                            <td colspan="2">
                                <h1 class="title">
                                    Phép tính trên hai số
                                </h1>
                            </td>
                        <tr>
                            <td>Chọn phép tính: </td>
                            <td>
                                <input type="radio" name="phep_tinh" value="Cong" required>Cộng
                                <input type="radio" name="phep_tinh" value="Tru"> Trừ
                                <input type="radio" name="phep_tinh" value="Nhan"> Nhân
                                <input type="radio" name="phep_tinh" value="Chia"> Chia
                            </td>
                        </tr>
                        <tr>
                            <td>Số thứ nhất: </td>
                            <td>
                                <input type="number" name="a" value="<?php echo $a ?? '' ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Số thứ hai: </td>
                            <td>
                                <input type="number" name="b" value="<?php echo $b ?? '' ?>">
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