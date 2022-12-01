

<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
function our_swap(&$a,&$b){
    $temp=$a;
    $a=$b;
    $b=$temp;
}
function sxGiam ($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] < $arr[$j]) our_swap($arr[$i],$arr[$j]);
    return $arr;
}
function sxTang ($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] > $arr[$j]) our_swap($arr[$i],$arr[$j]);
    return $arr;
}
if (isset($_POST['submit'])){
    $text=$_POST['text'];
    $original=explode(",",$text);
    $result_decre = implode(",",sxGiam($original));
    $result_incre = implode(",",sxTang($original));
}
?>

    <form action="" method="post">
        <table align="center" bgcolor="#7fffd4">
            <th colspan="3" style="text-transform: uppercase" bgcolor="aqua">
                SAP XEP MANG
            </th>
            <tr>
                <td>Nhap Mang</td>
                <td> <input type="text" name="text" value="<?php echo $text ?? '';?> " > </td>
                <td style="color: red">
                    <h4>(*)</h4>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Sap xep tang hoac giam">
                </td>
                <td></td>
            </tr>
            <tr>
                <td style="color: red"> <b>Sau khi sap xep</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tang Dan</td>
                <td>
                    <input type="text" value="<?php echo  $result_incre ?? '';?>" size="35">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Giam Dan</td>
                <td>
                    <input type="text" value="<?php echo  $result_decre ?? '';?>" size="35">
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <b style="color: red">(*)</b> cac so cach nhau bang dau "<b>,</b>"
                </td>
            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    