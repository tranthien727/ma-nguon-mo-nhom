<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 
                    if(isset($_POST["reset"]))
                    {
                        $_POST["ten"]="";
                        $_POST["old"]="";
                        $_POST["new"]="";
                        $_POST["tien"]="";
                    }
                ?>
            <form method="post" action="tiendien.php">
                    <table align="center" bgcolor="#faebd7">
                        <tr>
                            <td align="center" bgcolor="orange" colspan="2"><h2>THANH TOÁN TIỀN ĐIỆN</h2></td>
                        </tr>
                        <tr>
                            <td>Tên chủ hộ:</td>
                            <td><input type="text" name="ten" value="<?php if(isset($_POST["ten"])) echo $_POST["ten"]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Chỉ số cũ:</td>
                            <td><input type="text" name="old" value="<?php if (isset($_POST["old"])) echo $_POST["old"]; else echo "";?>">(Kw)</td>
                        </tr>
                        <tr>
                            <td>Chỉ số mới:</td>
                            <td><input type="text" name="new" value="<?php if (isset($_POST["new"])) echo $_POST["new"]; else echo "";?>" >(Kw)</td>
                        </tr>
                        <tr>
                            <td>Đơn giá:</td>
                            <td><input type="text" name="dg" value="2000" >(VNĐ)</td>
                        </tr>
                        <tr>
                            <td>Số tiền thanh toán:</td>
                            <td><input style="background-color: lightpink" type="text" name="tien" value="<?php if (isset($_POST["tien"])) echo ($_POST["new"]-$_POST["old"])*$_POST["dg"]; else echo "";?>" >(VNĐ)</td>
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