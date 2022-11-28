
<?php include 'partials/header.php'; ?>
    <section class="dangky">
    <div class="container">   
        <form action="xuly.php" method="POST" enctype="multipart/form-data">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td colspan="2"><h1>Đăng ký thành viên</h1></td>
                </tr>
                <tr>
                    <td>
                        Họ tên : 
                    </td>
                    <td>
                        <input type="text" name="txtUsername" size="60" placeholder="Nhập Họ tên"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email :
                    </td>
                    <td>
                        <input type="text" name="txtEmail"  placeholder="Nhập Email"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu :
                    </td>
                    <td>
                        <input type="password" name="txtPassword"  placeholder="Nhập Mật khẩu"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        SĐT :
                    </td>
                    <td>
                        <input type="text" name="txtSDT"  placeholder="Nhập SĐT"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Địa chỉ :
                    </td>
                    <td>
                        <input type="text" name="txtDiachi"  placeholder="Nhập Địa chỉ"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Hình ảnh :
                    </td>
                    <td>
                        <input type="file" name="Anh"  />
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <button type="submit" class="signupbtn" name="submit"> Đăng ký</button>
                        <button type="reset" class="signupbtn">Nhập lại</button>
                    </td>
                </tr>
            </table>
        </form>
        </div>     
    </section>
<?php include 'partials/footer.php'; ?>