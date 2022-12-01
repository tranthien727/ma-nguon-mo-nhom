
    
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
        

        if (isset($_POST['submit'])) {
            $s1 = $_POST['s1'];
            $s2 = $_POST['s2'];
            $pheptinh = $_POST['pheptinh'];
        
        if ($pheptinh == "cộng") {
            $kq = $s1+$s2;
        }
        if ($pheptinh == "trừ") {
            $kq = $s1-$s2;
        }
        if ($pheptinh == "nhân") {
            $kq = $s1*$s2;
        }
        if ($pheptinh == "chia") {
            $kq = $s1/$s2;
        }
    }

    ?>
    <form action="" method="post">
        <table align="center">
            
            <tr>
                <td colspan="3">
                    <h1 style="color: blue;">Phép tính trên hai số</h1>
                </td>
            </tr>

            <tr style="color: red;">
                <td>
                    Chọn phép tính:
                </td>
                <td>
                    <?php echo $pheptinh; ?>
                </td>
            </tr>
            <tr style="color: blue;">
                <td>
                    số thứ 1:
                </td>
                <td>
                    <input type="text"  name="s1" value="<?php if (isset($s1)) echo $s1;
                                                        else echo ""; ?>">
                </td>
            </tr>
            <tr style="color: blue;">
                <td>
                    số thứ 2:
                </td>
                <td>
                    <input type="text"  name="s2" value="<?php if (isset($s2)) echo $s2;
                                                        else echo ""; ?>">
                </td>

            </tr>

            <tr style="color: blue;">
                <td>
                    kết quả:
                </td>
                <td>
                    <input type="text"  name="kq" readonly value="<?php if (isset($kq)) echo $kq;
                                                        else echo ""; ?>">
                </td>

            </tr>


            <tr>
                <td align="center" colspan="2">
                <a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
                </td>

            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    