
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php

        
        if(isset($_POST['submit']))
        {
            $T=$_POST['T'];
            $L=$_POST['L'];
            $H=$_POST['H'];
            $DC=$_POST['DC'];
            $DT=$_POST['DT'];
            $KQT=$_POST['KQT'];
            
            if(isset($T) and isset($L) and isset($H) and $T>0 and $L>0 and $H>0 )
            {
                $DT = $T+$L+$H;
                 if($DT >= $DC )
                 $KQT = "DAU";
                    else
                    $KQT = "TACH";
            }
            else
            {
                $T = "nhap lai";
                $L = "nhap lai ";
                $H = "nhap lai ";

            }
        }
    ?>
    <form action="" method= "post">
        <table align ="center" style="background-color: lightpink">
            <tr style="background-color:deeppink; text-align:center"><td colspan ="3"><h1>Kết quả thi đại học</h1></td></tr>
            <tr>
                <td>
                    Toán:
                </td>
                <td>
                    <input type="text" name="T" value="<?php if(isset($T)) echo $T; else echo ""; ?>" >
                </td>
            </tr>
            <tr>
                <td>
                    Lý:
                </td>
                <td>
                    <input type="text" name="L" value="<?php if(isset($L)) echo $L; else echo ""; ?>">
                </td>
                
            </tr>
            <tr>
                <td>
                    Hóa:
                </td>
                <td>
                    <input type="text" name="H" value="<?php if(isset($H)) echo $H; else echo ""; ?>">
                </td>
                
            </tr>
            <tr>
                <td>
                    Điểm chuẩn:
                </td>
                <td>
                    <input type="text" name="DC" value="20">
                </td>
                
            </tr>
            <tr>
                <td>
                    Tổng điểm :
                </td>
                <td>
                    <input type="text" name="DT" value="<?php if(isset($DT)) echo $DT?>" readonly>
                </td>
                
            </tr>
            <tr>
                <td>
                    Kết quả thi:
                </td>
                <td>
                    <input type="text" name="KQT" value="<?php if(isset($KQT)) echo $KQT?>" readonly>
                </td>
                
            </tr>
            

            
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="xem ket qua" name="submit">
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