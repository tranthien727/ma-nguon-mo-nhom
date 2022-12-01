
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php

$diemchuan = 20;
    if (isset($_POST['submit'])) {
        $diemLy = $_POST['ly'];
        $diemToan = $_POST['toan'];
        $diemHoa = $_POST['hoa'];      
        if( $diemLy > 0 and $diemLy < 10 || $diemToan > 0 and $diemToan < 10 || $diemHoa > 0 and $diemHoa < 10 ) {
            $tongDiem = $diemToan + $diemHoa + $diemLy;
        
        if($tongDiem > $diemchuan)
        $kqthi = "đậu";
        else $kqthi = "rớt";
        }
        else $kqthi = "nhập lại";
        
    }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: lightpink">
            <tr style="background-color:orange; text-align:center">
                <td colspan="3">
                    <h1>Kết quả điểm thi đại học</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Toán:
                </td>
                <td>
                    <input type="text"  name="toan" value="<?php if (isset($diemToan)) echo $diemToan;
                                                        else echo ""; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Lý:
                </td>
                <td>
                    <input type="text"   name="ly" value="<?php if (isset($diemLy)) echo $diemLy;
                                                        else echo ""; ?>">
                </td>


            </tr>

           

            <tr>
                <td>
                    Hóa:
                </td>
                <td>
                    <input type="text"   name="hoa" value="<?php if (isset($diemHoa)) echo $diemHoa;
                                                        else echo ""; ?>">
                </td>


            </tr>

            <tr>
                <td>
                    Điểm chuẩn:
                </td>
                <td>
                    <input type="text" readonly  name="diemchuan" value="<?php if (isset($diemchuan)) echo $diemchuan;
                                                        else echo ""; ?>">
                </td>


            </tr>

            <tr>
                <td>
                   Tổng điểm:
                </td>
                <td>
                    <input type="text" readonly name="tongdiem" value="<?php if (isset($tongDiem)) echo $tongDiem ?>" readonly>
                </td>
                

            </tr>


            <tr>
                <td>
                   Kết quả thi:
                </td>
                <td>
                    <input type="text" readonly name="kqthi" value="<?php if (isset($kqthi)) echo $kqthi ?>" readonly>
                </td>
                

            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Xem kết quả" name="submit">
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

