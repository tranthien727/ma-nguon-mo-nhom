<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    if(isset($_POST["submit"])){
                        $t=$_POST["toan"];
                        $l=$_POST["ly"];
                        $h=$_POST["hoa"];
                        $dc=$_POST["dc"];
                        $td=$t+$l+$h;
                        if($td>$dc and $t>0 and $l>0 and $h>0){
                            $kq="Đậu";
                        }
                        else $kq="Rớt";
                    }
                ?>
                <form method="post" action="kqthi.php">
                    <table align="center" bgcolor="lightpink" style="width: 350px">
                        <tr>
                            <td align="center" bgcolor="pink" colspan="2"><H2>KẾT QUẢ THI ĐẠI HỌC</H2></td>
                        </tr>
                        <tr>
                            <td>Toán:</td>
                            <td><input type="text" name="toan" value="<?php if(isset($t)) echo $t; else echo ""; ?>"></td>
                        </tr>
                        <tr>
                            <td>Lý:</td>
                            <td><input type="text" name="ly" value="<?php if(isset($l)) echo $l; else echo ""; ?>"></td>
                        </tr>
                        <tr>
                            <td>Hóa:</td>
                            <td><input type="text" name="hoa" value="<?php if(isset($h)) echo $h; else echo ""; ?>"></td>
                        </tr>
                        <tr>
                            <td>Điểm chuẩn:</td>
                            <td><input style="color:red" type="text" name="dc" value="<?php if(isset($dc)) echo $dc; else echo ""; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tổng điểm:</td>
                            <td><input type="text" name="td" value="<?php if(isset($td)) echo $td ?>"></td>
                        </tr>
                        <tr>
                            <td>Kết quả thi:</td>
                            <td><input type="text" name="kq" value="<?php if(isset($kq)) echo $kq ?>"></td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" name="submit" value="Xem kết quả">
                                <input type="submit" name="clear" value="clear">
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>