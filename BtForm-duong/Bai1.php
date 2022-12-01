    
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
        ini_set('display_errors', 0);
        if (isset($_POST['submit'])) {
            $width = $_POST['width'];
            $height = $_POST['height'];
            $perimeter = ($width + $height) * 2;
            $acreage = $width * $height;
        }
        if (isset($_POST['reset'])) {
            $width = "";
            $height = "";
            $perimeter = "";
            $acreage = "";
        }
        ?>

        <form action="" method="post">
            <table align="center" bgcolor="#faebd7">
                <tr>
                    <td colspan="2" bgcolor="orange" style="text-align:center">
                        HÌNH CHỮ NHẬT
                    </td>
                </tr>
                <tr>
                    <td>
                        Chiều rộng
                    </td>
                    <td>
                        <input type="text" name="width" value="<?php if (isset($width)) echo $width; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Chiều dài
                    </td>
                    <td>
                        <input type="text" name="height" value="<?php if (isset($height)) echo $height; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Chu vi
                    </td>
                    <td>
                        <input type="text" name="perimeter" style="background-color: lightpink; width: 150px" value="<?php if (isset($perimeter)) echo $perimeter;
                                                                    else echo ""; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        Diện tích
                    </td>
                    <td>
                        <input type="text" name="acreage"  style="background-color: lightpink; width: 150px" value="<?php if (isset($acreage)) echo $acreage;
                                                                    else echo ""; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Tính">
                        <input type="submit" name="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    