
    <?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    function swap(&$k, &$key) {
                        $tam=$k;
                        $k=$key;
                        $key=$tam;
                    }
                    function sapxep(&$arr,$tang)
                    {
                        foreach ($arr as $key => &$value) {
                            foreach ($arr as $k => &$v) {
                                if($v<$value && $tang==true)
                                {
                                    swap($v,$value);
                                }
                                if($v>$value && $tang==false){
                                    swap($value,$v);
                                }
                            }
                        }
                        return $arr;
                    }

                    if(isset($_POST['submit']))
                    {
                        $n=$_POST['n'];
                        $arr=explode(",",$n);
                        $mangtang = sapxep($arr,false);
                        $manggiam=sapxep($arr,true);
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
                                    <td></td>
                                    <td><input style="background-color:lightblue;" type="submit" name="submit" value="Sắp xếp tăng/giảm"></td>
                                </tr>
                                <tr>
                                    <td style="color:red">Sau khi sắp xếp:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tăng dần:</td>
                                    <td><input type="text" size="40" value="<?php if(isset($mangtang)) print implode(', ',$mangtang) ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Giảm dần:</td>
                                    <td><input style="background-color:lightblue; color:red" type="text" size="40" value="<?php if(isset($manggiam)) print implode(', ',$manggiam) ?>" readonly></td>
                                </tr>
                                <tr bgcolor="lightgreen">
                                    <td colspan="2" align="center">(Các phần từ trong mảng sẽ cách nhau bằng dấu *,*)</td>
                                </tr>
                            </table>
                        </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>
