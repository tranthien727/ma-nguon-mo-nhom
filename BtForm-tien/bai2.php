
    
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php


    if (isset($_POST['submit'])) {
        $bk = $_POST['bk'];
        define('PI',3.14);
        
        if(is_numeric($bk) || $bk > 0 ) {
            $cv = $bk  * 2 * PI;
            $dt = $bk * $bk * PI;
        } else
        $kq = "nhập lại";
    }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: lightpink">
            <tr style="background-color:orange; text-align:center">
                <td colspan="3">
                    <h1>Diện tích và chu vi hình tròn</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Bán kính:
                </td>
                <td>
                    <input type="text"  name="bk" value="<?php if (isset($bk)) echo $bk;
                                                        else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Chu vi:
                </td>
                <td>
                    <input type="text" readonly  name="cv" value="<?php if (isset($cv)) echo $cv;
                                                        else echo ""; ?>">
                </td>

            </tr>

            <tr>
                <td>
                   Diện tích:
                </td>
                <td>
                    <input type="text" name="dt" value="<?php if (isset($dt)) echo $dt ?>" readonly>
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