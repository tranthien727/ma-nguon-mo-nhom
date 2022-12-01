
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
                    $str = ' ';
                    $demchan = 0;   
                    $dem100 = 0;
                    $tongAm = 0;
                    $viTri0 = 0;     
                    if(isset($_POST['submit']))
                    {
                        $N=$_POST['N'];
                        //a
                        
                        if(isset($N) and $N>0 )
                        {
                            for($i=0;$i<$N;$i++)
                            {
                                $a[$i]=rand(-200, 200);
                                if($a[$i] % 2 == 0)
                                $demchan +=1;
                                if($a[$i]<100)
                                $dem100 +=1;
                                if ($a[$i] < 0)
                                $tongAm += $a[$i];
                                if ($a[$i] == 0)
                                $viTri0 = $i + 1;
                            }
                                
                        }
                        $str = implode((','), $a ). "\n Demchan = $demchan ". "\n dem100 =  $dem100". "\n tongam= $tongAm ". "\n vitri0 = $viTri0";
                        for ($i = 0; $i < $N - 1; $i++)
                        for ($j = $i + 1; $j < $N; $j++) {
                            if ($a[$i] > $a[$j]) {
                                $tam = $a[$i];
                                $a[$i] = $a[$j];
                                $a[$j] = $tam;
                            }
                        }
                    $str .= "\nMang duoc sap xep tang dan " . implode(", ", $a);
                    }
                ?>
                <form action="" method= "post">
                    <table align ="center" style="background-color: lightpink">
                        <tr style="background-color:orange; text-align:center"><td colspan ="2"><h1>Bai 1</h1></td></tr>
                        <tr>
                            <td>
                                Nhap N:
                            </td>
                            <td>
                                <input type="text" name="N" value="<?php if(isset($N)) echo $N; else echo ""; ?>" >
                            </td>
                        </tr>
                    
                        
                        
                        
                        <tr>
                            <td>
                                Kết quả :
                            </td>
                            <td>
                            <textarea style="height: 300px;width: 400px" name="ketqua"
                                    readonly><?php echo $str ?? '' ?></textarea>
                            </td>
                            
                        </tr>
                        

                        
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" value="xem ket qua" name="submit">
                                <input type="submit" value="clear" name="reset">
                            </td>
                            
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    