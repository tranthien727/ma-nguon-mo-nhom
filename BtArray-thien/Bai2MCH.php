<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    if(isset($_POST["submit"]) and isset($_POST["s"])){
                        $s=$_POST["s"];
                        $arr=explode(",",$s);
                        //$kq=array_product($arr);
                        $kq=1;
                        foreach($arr as $value){
                            $kq=$kq*$value;
                        }
                    }
                ?>
                <form method="post" action="">
                    <table align="center">
                        <tr>
                            <td colspan="2"><h1>TÍNH TÍCH</h1></td>
                        </tr>
                        <tr>
                            <td>Dãy số:</td>
                            <td><input type="text" name="s" value="<?php if(isset($s)) echo $s ?>"></td>
                        </tr>
                        <tr>
                            <td>Kết quả:</td>
                            <td><input type="text" name="kq" value="<?php if(isset($kq)) echo $kq ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Tích dãy số"></td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>


