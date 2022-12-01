
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    function max_array($arr){
                        $max=$arr[0];
                        foreach($arr as $value){
                            if($value>$max) $max=$value;
                        }
                        return $max;
                    }
                    function min_array($arr){
                        $min=$arr[0];
                        foreach($arr as $value){
                            if($value<$min) $min=$value;
                        }
                        return $min;
                    }
                    function tong_array($arr){
                        $tong=0;
                        foreach($arr as $value){
                            $tong=$tong+$value;
                        }
                        return $tong;
                    }
                ?>
                <?php
                    if(isset($_POST["submit"])){
                        $n=$_POST["n"];
                        if(is_numeric($n)){
                            $arr=array();
                            for($i=0;$i<$n;$i++){
                                $arr[$i]=rand(0,20);
                            }
                            $kq=implode(" ",$arr);
                        }
                        else $n="Phải là số";
                        $maxa=max_array($arr);
                        $mina=min_array($arr);
                        $tonga=tong_array($arr);
                    }
                ?>    
                    <form action="" method="post">
                        <table align="center" style="border-collapse: collapse; border: 1px double">
                            <tr bgcolor="violet">
                                <td colspan="2"><h2 style="color:white">PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2></td>
                            </tr>
                            <tr>
                                <td>Nhập số lượng phần tử</td>
                                <td><input type="text" name="n" value="<?php if(isset($_POST["n"])) echo $n; ?>" required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input style="background-color: lightyellow;" type="submit" name="submit" value="Phát sinh mảng và tính toán"></td>
                            </tr>
                            <tr>
                                <td>Mảng</td>
                                <td><textarea style="background-color: pink;" name="" cols="30" rows="5" readonly><?php if(isset($kq)) echo $kq; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Max</td>
                                <td><input style="background-color: pink;" type="text" name="GTLN" value="<?php if(isset($maxa)) echo $maxa; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Min</td>
                                <td><input style="background-color: pink;" type="text" name="GTNN" value="<?php if(isset($mina)) echo $mina; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Tổng mảng</td>
                                <td><input style="background-color: pink;" type="text" name="Tong" value="<?php if(isset($tonga)) echo $tonga; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">(<b style="color:red">Ghi chú:</b> các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>
