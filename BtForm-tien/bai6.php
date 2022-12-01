
    
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <?php
    ?>
    <form action="kqbai6.php" method="post">
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
                    <input type="radio" id="cong" name="pheptinh" checked value="cộng">
                    <label for="cong">cộng</label>
                    <input type="radio" id="tru" name="pheptinh" value="trừ">
                    <label for="tru">trừ</label>
                    <input type="radio" id="nhan" name="pheptinh" value="nhân">
                    <label for="nhan">nhân</label>
                    <input type="radio" id="chia" name="pheptinh" value="chia">
                    <label for="chia">chia</label>
                </td>
            </tr>
            <tr style="color: blue;">
                <td>
                    số thứ 1:
                </td>
                <td>
                    <input type="text"  name="s1" value="">
                </td>
            </tr>
            <tr style="color: blue;">
                <td>
                    số thứ 2:
                </td>
                <td>
                    <input type="text"  name="s2" value="">
                </td>

            </tr>


            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Tính" name="submit">
                </td>

            </tr>
        </table>
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    