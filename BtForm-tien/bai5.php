
    
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php


    if (isset($_POST['submit'])) {
        $bd = $_POST['B'];
        $kt = $_POST['K'];
        $tt = $_POST['TT'];
        if ($bd >= $kt)
            $tt = "Giờ kết thúc phải > giờ bắt đầu";
        elseif ($bd > 24 || $kt > 24)
            $tt = "Nhập sai giờ";
        elseif ($bd < 10 || $kt < 10)
            $tt = ((17 < $kt) ? ((17 - 10) * 20000 + ($kt - 17) * 45000) : ($kt - 10) * 20000) > 0 ? (17 < $kt) ? ((17 - 10) * 20000 + ($kt - 17) * 45000) : ($kt - 10) * 20000 : "Giờ nghỉ";
        else $tt = (17 < $kt) ? ((17 - $bd) * 20000 + ($kt - 17) * 45000) : ($kt - $bd) * 20000;
    }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: lightpink">
            <tr style="background-color:orange; text-align:center">
                <td colspan="3">
                    <h1>Tính tiền Karaoke</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Giờ bắt đầu:
                </td>
                <td>
                    <input type="number" step="any" name="B" value="<?php if (isset($bd)) echo $bd;
                                                        else echo ""; ?>">
                </td>
                <td>
                    (h)
                </td>
            </tr>
            <tr>
                <td>
                    Giờ kết thúc:
                </td>
                <td>
                    <input type="number" step="any" name="K" value="<?php if (isset($kt)) echo $kt;
                                                        else echo ""; ?>">
                </td>
                <td>
                    (h)
                </td>

            </tr>

            <tr>
                <td>
                    Tiền thanh toán:
                </td>
                <td>
                    <input type="text" name="TT" value="<?php if (isset($tt)) echo $tt ?>" readonly>
                </td>
                <td>
                    (VND)
                </td>

            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Tính tiền" name="submit">
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