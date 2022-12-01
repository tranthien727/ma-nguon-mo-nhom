
<?php include '../Admin/partials/header.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
    ini_set('display_errors',0);
    $width = $_POST['width'] ;
    $height = $_POST['height'];
    $perimeter = ($width+$height)*2;
    $acreage = $width*$height;
?>
    <form action="" method="post">
        <table>
            <tr class="center">
                <td colspan="2">
                <h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1> 
                </td>
            </tr>
            <tr>
                <td>
                    Chều rộng
                </td>
                <td>
                    <input type="text" name="width" value="<?php echo $width?>">
                </td>
            </tr>
            <tr>
                <td>
                    Chều cao
                </td>
                <td>
                    <input type="text" name="height" value="<?php echo $height ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                    Diện tích
                </td>
                <td>
                    <input type="text" name="acreage" value="<?php echo $acreage ?>">
                </td>
            </tr>
            <tr class="center">
                <td colspan="2">
                    <button type="submit">TÍNH</button>
                </td>
            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    