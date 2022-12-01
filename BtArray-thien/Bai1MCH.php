<?php include '../Admin/partials/header.php'; ?>
    <?php
    $str = '';
    $soChan = 0;
    $soNho100 = 0;
    $tongAm = 0;
    $viTri0 = 'khong co';
    if (isset($_POST['submit'])) {
        $n = $_POST['soN'];
        if ($n >= 0) {
            for ($i = 0; $i < $n; $i++) {
                $a[$i] = rand(-200, 200);
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

        $str .= "Số phần tử trong mảng " . implode(', ', $a) . "\nCó $soChan số chẵn" . 
        "\nCó $soNho100 số nhỏ hơn 100" . "\nTổng số âm $tongAm" . 
        "\nVị trí 0 trong mảng $viTri0";
        
        for ($i = 0; $i < $n - 1; $i++)
            for ($j = $i + 1; $j < $n; $j++) {
                if ($a[$i] > $a[$j]) {
                    $tam = $a[$i];
                    $a[$i] = $a[$j];
                    $a[$j] = $tam;
                }
            }
        $str .= "\nMảng được sắp xếp tăng dần " . implode(", ", $a);
    }
    ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <form method="post" action="">
                    <table align="center" bgcolor="lightblue">
                        <tr>
                            <td colspan="3" align="center">
                                <h1>Bài 1</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>Nhập n:</td>
                            <td><input type="number" min=1 name="soN" size="50" value="<?php echo $n ?? ''; ?>" required></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Thực hiện">
                                <input type="submit" name="reset" value="Reset">
                            </td>
                        </tr>
                        <tr>
                            <td>Kết quả:</td>
                            <td><textarea style="height: 150px;width: 300px" name="ketqua"
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