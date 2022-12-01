
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    if (isset($_POST["submit"])) {
                        $so1 = filter_input(INPUT_POST, 'a', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $so2 = filter_input(INPUT_POST, 'b', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        switch ($_POST["phep_tinh"]) {
                            case "Cong": {
                                    $pheptinh = "Công";
                                    $ketqua = $so1 + $so2;
                                    break;
                                }
                            case "Tru": {
                                    $pheptinh = "Trừ";
                                    $ketqua = $so1 - $so2;
                                    break;
                                }
                            case "Nhan": {
                                    $pheptinh = "Nhân";
                                    $ketqua = $so1 * $so2;
                                    break;
                                }
                            case "Chia": {
                                    $pheptinh = "Chia";
                                    if ($so2 == 0)
                                        $ketqua = 'Không thể chia cho 0, hãy nhập lại';
                                    else 
                                        $ketqua = $so1 / $so2;
                                    break;
                                }
                            default:
                                echo "Sai phep toan. Can nhap lai";
                        };
                    }
                    ?>

                    <table align="center">
                        <tr>
                            <td colspan="2">
                                <h1 class="title">
                                    Phép tính trên hai số
                                </h1>
                            </td>
                        <tr>
                            <td>Phép tính đã chọn: </td>
                            <td>
                                <input type="radio" name="PhepTinh" checked> <?php echo $pheptinh ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Số 1: </td>
                            <td>
                                <input type="text" name="so1" value="<?php echo $so1 ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Số 2: </td>
                            <td>
                                <input type="text" name="so2" value="<?php echo $so2 ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Ket qua: </td>
                            <td> <input type="text" name="ketqua" value="<?php echo $ketqua ?>"> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="javascript:window.history.back(-1);">Trờ về trang trước</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>