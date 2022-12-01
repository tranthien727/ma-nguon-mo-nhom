
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    if(isset($_POST["submit"]))
                    {
                        $n=$_POST["n"];
                        $s=$_POST["s"];
                        $arr=explode(",",$n);
                        $count=count($arr);
                        for($i=0;$i<$count;$i++){
                            if($arr[$i]==$s){
                                $i++;
                                $kq="Tìm Thây ".$s." tại vị trí ".$i." của mảng" ;
                            }
                            else $kq="Không tìm thấy ".$s." trong mảng";
                        }
                    }
                ?> 
                    <form action="" method="post">
                        <table align="center" style="border-collapse: collapse; border: 1px double">
                            <tr align="center" bgcolor="rgb(55, 120, 98)">
                                <td colspan="2"><h2 style="color:white">TÌM KIẾM</h2></td>
                            </tr>
                            <tr>
                                <td>Nhập mảng:</td>
                                <td><input type="text" name="n" size="40" value="<?php if(isset($_POST["n"])) echo $n; ?>" require></td>
                            </tr>
                            <tr>
                                <td>Nhập số cần tìm:</td>
                                <td><input type="text" name="s" size="10" value="<?php if(isset($s)) echo $s; ?>" require></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input style="background-color:lightblue;" type="submit" name="submit" value="Tìm kiếm"></td>
                            </tr>
                            <tr>
                                <td>Mảng:</td>
                                <td><input type="text" name="m" size="40" value="<?php if(isset($_POST["m"])) echo $n; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Kết quả tìm kiếm:</td>
                                <td><input style="background-color:lightblue; color:red" type="text" name="kq" size="40" value="<?php if(isset($_POST["kq"])) echo $kq; ?>" readonly></td>
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
