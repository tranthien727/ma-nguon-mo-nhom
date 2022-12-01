
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
    $str = '';
    $soChan = 0;
    $soNho100 = 0;
    $tongAm = 0;
    $viTri0 = 'khong co';
    if (isset($_POST['submit'])) {
        $n = $_POST['so'];
        if ($n >= 0) {
            for ($i = 0; $i < $n; $i++) {
                $a[$i] = rand(-100, 100);
                if ($a[$i] % 2 == 0)
                    $soChan += 1;
                if ($a[$i] < 100)
                    $soNho100 += 1;
                if ($a[$i] < 0)
                    $tongAm += $a[$i];
                if ($a[$i] == 0)
                    $viTri0 = $i + 1;
            }
        }

        $str .= "Phan tu trong mang " . implode(', ', $a) . "\nCo $soChan so chan" . 
        "\nCo $soNho100 so nho hon 100" . "\nTong so am $tongAm" . 
        "\nVi tri 0 trong mang $viTri0";
        
        for ($i = 0; $i < $n - 1; $i++)
            for ($j = $i + 1; $j < $n; $j++) {
                if ($a[$i] > $a[$j]) {
                    $tam = $a[$i];
                    $a[$i] = $a[$j];
                    $a[$j] = $tam;
                }
            }
        $str .= "\nMang duoc sap xep tang dan " . implode(", ", $a);
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
                <td>Nhap so</td>
                <td><input type="number" min=1 name="so" size="50" value="<?php echo $n ?? ''; ?>" required></td>

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
                <td><textarea style="height: 200px;width: 400px" name="ketqua"
                        readonly><?php echo $str ?? '' ?></textarea>
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