
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 
if(isset($_POST['submit'])) {
        $n = $_POST['son'];
        $sum = 0;
        $mangso = explode(",",$n);
        for($i = 0; $i < count($mangso);$i++) {
            $sum = $sum + $mangso[$i];
        }
        $kq = "tong day so: $sum";

       
} 
?>
    <form action="" method="post">
    <table align="center" style="background-color:pink ;">
            <tr>
                <td colspan="2">
                    <h1 style="color: red;">Phát sinh mảng và tính toán</h1>
                </td>
            </tr>

            <tr>
                <td>
                    Nhập n:
                </td>
                <td>
                    <input type="text" name="son" size="30" value="<?php if(isset($n)) echo $n; else echo "" ?>">
                </td>
            </tr>

            
            <tr>
                <td>
                    Kết quả:
                </td>
                <td>
                    <textarea rows="4" cols="50" readonly name="ketqua"><?php if(isset($kq)) echo $kq; else echo "" ?>
                    </textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Thực hiện">
                    <input type="submit" name="clear" value="clear">
                </td>
            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    