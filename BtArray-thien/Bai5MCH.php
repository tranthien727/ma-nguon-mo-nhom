
    <?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    function thaythe($arr,$s,$t)
                    {
                        foreach ($arr as $key => &$value) {
                            if($s==$value) {
                                $value=$t;
                            }
                        }
                        return $arr;
                    }
                        if(isset($_POST["submit"]))
                        {
                            $n=$_POST["n"];
                            $s=$_POST["s"];
                            $t=$_POST["t"];
                            $arr=explode(",",$n);
                            $kq=thaythe($arr,$s,$t);
                            
                        }
                    ?> 
                        <form action="" method="post">
                            <table align="center" style="border-collapse: collapse; border: 1px double">
                                <tr align="center" bgcolor="rgb(55, 120, 98)">
                                    <td colspan="2"><h2 style="color:white">THAY THẾ</h2></td>
                                </tr>
                                <tr>
                                    <td>Nhập mảng:</td>
                                    <td><input type="text" name="n" size="40" value="<?php if(isset($_POST["n"])) echo $n; ?>" require></td>
                                </tr>
                                <tr>
                                    <td>Giá trị cần thay thế:</td>
                                    <td><input type="text" name="s" size="10" value="<?php if(isset($s)) echo $s; ?>" require></td>
                                </tr>
                                <tr>
                                    <td>Giá trị thay thế:</td>
                                    <td><input type="text" name="t" size="10" value="<?php if(isset($t)) echo $t; ?>" require></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input style="background-color:lightblue;" type="submit" name="submit" value="Thay thế"></td>
                                </tr>
                                <tr>
                                    <td>Mảng cũ:</td>
                                    <td><input type="text" size="40" value="<?php if(isset($_POST["n"])) print implode('  ',$arr); ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Mảng sau khi thay thế:</td>
                                    <td><input style="background-color:lightblue; color:red" type="text" name="kq" size="40" value="<?php if(isset($_POST["submit"])) print implode('  ',$kq); ?>" readonly></td>
                                </tr>
                                <tr bgcolor="lightgreen">
                                    <td colspan="2" align="center">(Các phần từ trong mảng sẽ cách nhau bằng dấu ",")</td>
                                </tr>
                            </table>
                        </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>
