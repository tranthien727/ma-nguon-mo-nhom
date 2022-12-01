<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    define("PI",3.14);
                    if(isset($_POST["submit"]))
                    {
                        $r=$_POST["bk"];
                        if(isset($r) and is_numeric($r) and $r>0)
                        {
                            $s= PI * $r * $r;
                            $p= PI * 2 * $r;
                        }
                        else $r="ban kinh phai la so hoac khong duoc de trong";
                    }
                    if(isset($_POST["reset"]))
                    {
                        $s="";
                        $p="";
                        $r="";
                    }
                    ?>
                    <form method="post" action="chuvidientichHT.php">
                        <table align="center" bgcolor="#faebd7">
                            <tr>
                                <td bgcolor="orange" colspan="2"><h2>DIỆN TÍCH và CHU VI HÌNH TRÒN</h2></td>
                            </tr>
                            <tr>
                                <td>Bán kính:</td>
                                <td><input type="text" name="bk" value="<?php if(isset($r)) echo $r; ?>"></td>
                            </tr>
                            <tr>
                                <td>Diện tích:</td>
                                <td><input style="background-color: lightpink" type="text" name="dt" readonly value="<?php if (isset($s)) echo $s; else echo "";?>"></td>
                            </tr>
                            <tr>
                                <td>Chu vi:</td>
                                <td><input style="background-color: lightpink" type="text" name="cv" readonly value="<?php if (isset($p)) echo $p; else echo "";?>" ></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input type="submit" name="submit" value="Tính">
                                    <input type="submit" name="reset" value="Clear">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>