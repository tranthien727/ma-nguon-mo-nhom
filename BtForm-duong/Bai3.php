

<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
    if (isset($_POST['submit'])) {
        $m = $_POST['math'];
        $p = $_POST['physical'];
        $c = $_POST['chemistry'];
        $point = $_POST['point'];
        $tp = $m + $p + $c;
        if($tp >= $point)
            $kq = "Đậu";
        else
            $kq = "rớt";
        
    }   
    ?>

    <form action="" method="post">
        <table align="center" bgcolor="pink">
            <tr>
                <td colspan="2" bgcolor="#ff1493" style="text-align:center">
                    Kết Quả Thi Đại Học
                </td>
            </tr>
            <tr>
                <td>
                    Toán
                </td>
                <td>
                    <input type="text" name="math" value="<?php if (isset($m)) echo $m; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    Lý
                </td>
                <td>
                    <input type="text" name="physical" value="<?php if (isset($p)) echo $p; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    Hóa
                </td>
                <td>
                    <input type="text" name="chemistry" value="<?php if (isset($c)) echo $c; ?>"required>
                </td>
            </tr>
            <tr>
                <td>
                    Điểm chuẩn
                </td>
                <td>
                    <input type="text" name="point" value="<?php if (isset($point)) echo $point; ?>" style="color: red;" required>
                </td>
            </tr>
            <tr>
                <td>
                    Tổng điểm
                </td>
                <td>
                    <input type="text" name="totalpoint" style="background-color: lightyellow; width: 150px" value="<?php if (isset($tp)) echo $tp;
                                                                                                            else echo ""; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    Kết quả thi
                </td>
                <td>
                    <input type="text" name="resuilt" style="background-color: lightyellow; width: 150px" value="<?php if (isset($kq)) echo $kq;
                                                                                                            else echo ""; ?>" readonly>
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