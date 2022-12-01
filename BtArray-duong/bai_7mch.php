

<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php 
    $mang_can = ["Qúy", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm"];
    $mang_chi = ["Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất"];
    if(isset($_POST['submit']))
    {   
        $nam = $_POST['nam'];
        $nam = $nam - 3;
        $can = $nam % 10;
        $chi = $nam % 12;
        $nam_al = $mang_can[$can];
        $nam_al = $nam_al." ".$mang_chi[$chi];
        $nam = $nam + 3;
        // $hinh = $mang_hinh[$chi];
        // $hinh_anh = "<img src='12con_giap/$hinh'>";
    }
    ?>
    <form method="post" action="">
        <table align="center" bgcolor="#7fffd4">
            <tr>
                <td colspan="3" align="center">
                    <h1>Nhap va hien thi ket qua</h1>
                </td>
            </tr>
            <tr>
                <td>Nam duong lich</td>
                <td><input type="number" min=1 name="nam" size="50" value="<?php echo $nam ?? ''; ?>" required></td>
                <td>Nam am lich</td>
                <td><input type="text" value="<?php echo $nam_al ?? ''; ?>" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Thuc hien">
                    <input type="submit" name="reset" value="Reset">
                </td>
            </tr>
            <tr>
                <td>Ket Qua</td>
                <td><img src="" alt="123">
                </td>
                <td></td>
            </tr>

        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    