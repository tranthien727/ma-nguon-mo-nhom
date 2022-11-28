<?php ob_start();
 include 'partials/header.php';
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['submit'])) 
{
    //Kết nối tới database
    //session_start();
    define('URL','http://localhost/ictshop/');

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qldienthoai";

    //cookies
    //$cookie_admin='siteAuth';
    //$cookie_user='siteAuth';
    //$cookie_time=(3600 * 24); // 1 ngay

    $conn = new mysqli($hostname, $username, $password, $dbname);
    #mysqli_set_charset($conn,'UTF8');
    if ($conn->connect_error) {
        echo "Loi ket noi db " . $conn->connect_error;
    }
     
    //Lấy dữ liệu nhập vào
    $email = ($_POST['txtEmail']);
    $password = ($_POST['txtPassword']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$email || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // mã hóa pasword
    $password = md5($password);
     
   //Kiểm tra tên đăng nhập có tồn tại không
   $query = "SELECT * FROM nguoidung WHERE Email='$email'";
   $result=mysqli_query($conn,$query);
   if (mysqli_num_rows($result) == 0) {
       echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
       exit;
   }

   //Lấy mật khẩu trong database ra
   $row = mysqli_fetch_array($result);
   $Email = $row['Email'];
   $Hinhanh = $row['Hinhanh'];
   $Hoten = $row['Hoten'];
   $MaNguoidung = $row['MaNguoidung'];
   $Quyen=$row['IDQuyen'];
    
   //So sánh 2 mật khẩu có trùng khớp hay không
   if ($password != $row['Matkhau']) {
       echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
       exit;
   }
    
   //Lưu session
   $_SESSION['Hinhanh'] = $Hinhanh;
   $_SESSION['Hoten'] = $Hoten;
   $_SESSION['MaNguoidung'] = $MaNguoidung;
   $_SESSION['Email'] = $Email;
   if($Quyen==2){
        header("Location: Admin/sanpham.php");
        die();
   }
   else{
        header("Location: home.php");
        die();
   }
}
?>

<section class="login">
    <div class="container">
    <form action='' method='POST'>
        <table cellpadding='0' cellspacing='0' border='0' align="center">
            <tr>
                <td colspan="2"><h1>Đăng nhập</h1></td>
            </tr>
            <tr>
                <td>
                    Tên đăng nhập :
                </td>
                <td>
                    <input type='text' name='txtEmail' size="60"/>
                </td>
            </tr>
            <tr>
                <td>
                    Mật khẩu :
                </td>
                <td>
                    <input type='password' name='txtPassword' />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="signupbtn" name="submit"> Đăng nhập</button>
                    <button type="text" class="signupbtn"><a class="dk" href='dangky.php' title='Đăng ký'>Đăng ký</a></button>
                </td>
            </tr>
        </table>
    </form>
    </div>
</section>        
<?php include 'partials/footer.php';
ob_end_flush();  ?>