
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    if(isset($_POST['submit']))
                    {       
                        $rong = $_POST['rong'];
                        $dai = $_POST['dai'];
                        if(is_numeric($dai) && is_numeric($rong))
                        {
                            $rong=$rong+0;
                            $dai=$dai+0;
                            $dientich = $rong * $dai;
                        }
                        else{
                            $dai="Vui long nhap so";
                            $rong="Vui long nhap so";
                        }
                    }
                    if(isset($_POST['reset']))
                    {
                        $rong=$dai=$chuvi=$dientich="";
                    }
                ?>
                    <form action="" method="post" style="font-size:25px; width: 100%;" >
                        <table align="center" bgcolor="orange" style="width: 30%;">
                                <tr>
                                    <td  colspan=2 bgcolor="pink" align="center">TÍNH TOÁN TRÊN HÌNH CHỮ NHẬT</td>
                                </tr>
                                <tr>
                                    <td>Chiều dài: </td>
                                    <td>
                                        <input type="text" name="dai" value="<?php if(isset($dai)) {echo $dai;} ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chiều rộng: </td>
                                    <td>
                                        <input type="text" name="rong" value="<?php if(isset($rong)) {echo $rong;} ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Diện tích: </td>
                                    <td>
                                        <input type="text" name="dientich" style="background-color: #82ccdd;" readonly value="<?php if(isset($dientich)){ echo $dientich;} ?>">
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">
                                        <input type="submit" name="submit"  value="Tính">
                                        <input type="submit" name="reset"  value="Reset">
                                    </td>
                                </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    