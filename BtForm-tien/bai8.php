
    
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <form action="kqbai8.php" method="post">
        <table align="center">
        <tr>
            <td colspan="2">
                <h1>Enter your information</h1>
            </td>
        </tr>
        <tr>
            <td>Fullname:</td>
            <td>
                <input type="text" name="fullname"  value="" size="25">
            </td>
        </tr>

        <tr>
            <td>Address</td>
            <td>
                <input type="text" name="address"  value="" size="25">
            </td>
        </tr>

        <tr>
            <td>Phone</td>
            <td>
                <input type="phone" name="phone"  value="" size="25">
            </td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>
            <input type="radio" name="gender" value="Nam"> Nam
            <input type="radio" name="gender" value="Nữ"> Nữ
            </td>
        </tr>

        <tr>
            <td>Country</td>
            <td>
            <select name="country">
            <option value="Việt Nam">Việt Nam</option>
            <option value="Thái Lan">Thái Lan</option>
            <option value="Mỹ">Mỹ</option>
            <option value="Hàn Quốc">Hàn Quốc</option>
</select> 
            </td>
        </tr>

        <tr>
            <td>Study</td>
            <td>
                <input type="checkbox" name="study" value="PHP & MYSQL"> PHP & MYSQL
                <input type="checkbox" name="study" value="ASP.NET"> ASP.NET
                <input type="checkbox" name="study" value="CCNA"> CCNA
                <input type="checkbox" name="study" value="Security+"> Security+
            </td>
        </tr>

        <tr>
            <td>Note</td>
            <td>
                <textarea name="note" id="" cols="30" rows="10">                    
                </textarea>
            </td>
        </tr>


        <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Gửi" id="" size="25">
                    <input type="submit" name="clear" value="Reset">

                </td>
            </tr>
        </table>
        
    </form>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    