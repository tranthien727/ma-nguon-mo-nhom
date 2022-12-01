
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php

$dongia = 20000;
    if (isset($_POST['submit'])) {
        $chuho = $_POST['chuho'];
        $csCu = $_POST['cscu'];
        $csMoi = $_POST['csmoi'];      
        if( $csMoi >  $csCu ) {
            $thanhtoan = ($csMoi - $csCu) * $dongia;
        } else
        $thanhtoan = "nhập lại";
    }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: lightpink">
            <tr style="background-color:orange; text-align:center">
                <td colspan="3">
                    <h1>Thanh toán tiền điện</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Chủ hộ
                </td>
                <td>
                    <input type="text"  name="chuho" value="<?php if (isset($chuho)) echo $chuho;
                                                        else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số cũ:
                </td>
                <td>
                    <input type="text"   name="cscu" value="<?php if (isset($csCu)) echo $csCu;
                                                        else echo ""; ?>">
                </td>

                <td>(KW)</td>

            </tr>

           

            <tr>
                <td>
                    Chỉ số mới:
                </td>
                <td>
                    <input type="text"   name="csmoi" value="<?php if (isset($csMoi)) echo $csMoi;
                                                        else echo ""; ?>">
                </td>
                <td>(KW)</td>

            </tr>

            <tr>
                <td>
                    Đơn giá:
                </td>
                <td>
                    <input type="text" readonly  name="dongia" value="<?php if (isset($dongia)) echo $dongia;
                                                        else echo ""; ?>">
                </td>
                <td>(VNĐ)</td>

            </tr>

            <tr>
                <td>
                   Số tiền thanh toán:
                </td>
                <td>
                    <input type="text" readonly name="thanhtoan" value="<?php if (isset($thanhtoan)) echo $thanhtoan ?>" readonly>
                </td>
                <td>(VNĐ)</td>

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

