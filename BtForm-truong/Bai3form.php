
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php

        
        if(isset($_POST['submit']))
        {
            $dg=$_POST['dg'];
            $csc=$_POST['csc'];
            $csm=$_POST['csm'];
            $tt=$_POST['tt'];

            if(isset($csc) and isset($csm) and $csc>0 and $csm >0 and $csm > $csc and is_numeric($csc) and is_numeric($csm))
            {
                
                 $tt=($csm - $csc)*$dg;
            }
            else
            {
                $csm="phải nhập số dương và lớn hơn chỉ số cũ";
                $csc="phải nhập số dương và nhỏ hơn chỉ số mới";


            }
        }
    ?>
    <form action="" method= "post">
        <table align ="center" style="background-color: lightpink">
            <tr style="background-color:orange; text-align:center"><td colspan ="3"><h1>Thanh Toán Tiền Điện</h1></td></tr>
            <tr>
                <td>
                    Tên chủ hộ:
                </td>
                <td>
                    <input type="text" name="ch" value="Fanta">
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số cũ:
                </td>
                <td>
                    <input type="text" name="csc" value="<?php if(isset($csc)) echo $csc; else echo ""; ?>">
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số mới:
                </td>
                <td>
                    <input type="text" name="csm" value="<?php if(isset($csm)) echo $csm; else echo ""; ?>">
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>
                    Đơn giá:
                </td>
                <td>
                    <input type="text" name="dg" value="2000">
                </td>
                <td>
                    (VND)
                </td>
            </tr>
            <tr>
                <td>
                    Số tiền thanh toán:
                </td>
                <td>
                    <input style="background-color:lightpink" type="text" name="tt" value="<?php if(isset($tt)) echo $tt; ?>" readonly>
                </td>
                <td>
                    (VND)
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="tính" name="submit">
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