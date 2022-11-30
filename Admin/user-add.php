<?php include 'partials/header.php'; ?>
<?php
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (isset($_POST['submit'])){


                    
    //Lấy dữ liệu từ file dangky.php
    $username   = ($_POST['txtHoten']);
    $email      = ($_POST['txtEmail']);
    $password   = ($_POST['txtPassword']);
    $sdt        = ($_POST['txtSDT']);
    $diachi     = ($_POST['txtDiachi']);
    $anh        = basename($_FILES["Anh"]["name"]);
    $quyen      = ($_POST['Quyen']);
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$email || !$sdt || !$diachi || !$anh)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
        // Mã khóa mật khẩu
        $password = md5($password);
          
    //Kiểm tra email có đúng định dạng hay không
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email))
    {
        echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email đã có người dùng chưa
    $sql = "SELECT * FROM nguoidung  WHERE Email='$email'";
    $res = mysqli_query($conn, $sql);
    if ($res->num_rows > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
        // Dữ liệu gửi lên server không bằng phương thức post
        echo "Phải Post dữ liệu";
        die;
    }

    // Kiểm tra có dữ liệu Anh trong $_FILES không
    // Nếu không có thì dừng
    if (!isset($_FILES["Anh"]))
    {
        // echo "Dữ liệu không đúng cấu trúc";
        die;
    }

    // Kiểm tra dữ liệu có bị lỗi không
    if ($_FILES["Anh"]['error'] != 0)
    {
        // echo "Dữ liệu upload bị lỗi";
        die;
    }

    // Đã có dữ liệu upload, thực hiện xử lý file upload

    //Thư mục bạn sẽ lưu file upload
    $target_dir    = "../Hinhanhsp/";
    //Vị trí file lưu tạm trong server (file sẽ lưu trong Hinhanhsp, với tên giống tên ban đầu)
    $target_file   = $target_dir . basename($_FILES["Anh"]["name"]);

    $allowUpload   = true;

    //Lấy phần mở rộng của file (jpg, png, ...)
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Cỡ lớn nhất được upload (bytes)
    $maxfilesize   = 800000;

    ////Những loại file được phép upload
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


    if(isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
        $check = getimagesize($_FILES["Anh"]["tmp_name"]);
        if($check !== false)
        {
            // echo "Đây là file ảnh - " . $check["mime"] . ".";
            $allowUpload = true;
        }
        else
        {
            // echo "Không phải file ảnh.";
            $allowUpload = false;
        }
    }

    // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
    // Bạn có thể phát triển code để lưu thành một tên file khác
    if (file_exists($target_file))
    {
        // echo "Tên file đã tồn tại trên server, không được ghi đè";
        $allowUpload = false;
    }
    // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
    if ($_FILES["Anh"]["size"] > $maxfilesize)
    {
        // echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
        $allowUpload = false;
    }


    // Kiểm tra kiểu file
    if (!in_array($imageFileType,$allowtypes ))
    {
        // echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
        $allowUpload = false;
    }


    if ($allowUpload)
    {
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["Anh"]["tmp_name"], $target_file))
        {
            // echo "File ". basename( $_FILES["Anh"]["name"]).
            // " Đã upload thành công.";

            // echo "File lưu tại " . $target_file;

        }
        else
        {
            // echo "Có lỗi xảy ra khi upload file.";
        }
    }
    else
    {
        // echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
    }
          
    //Lưu thông tin thành viên vào bảng
    $query="
        INSERT INTO nguoidung (
            Hoten,
            Email,
            Dienthoai,
            Matkhau,
            Hinhanh,
            Diachi,
            IDQuyen
        )
        VALUE (
            '{$username}',
            '{$email}',
            '{$sdt}',
            '{$password}',
            '{$anh}',
            '{$diachi}',
            '{$quyen}'
        )
    ";
    $result=mysqli_query($conn,$query);
                          
    //Thông báo quá trình lưu
    if ($result)
        header("Location: user.php");
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href=''>Thử lại</a>";
    }
 ?>
<section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9">
                <section class="user-update">
                    <div class="container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h1>Thêm người dùng</h1>
                        <table align="center">
                            <tr>
                                <td>Tên người dùng:</td>
                                <td><input type="text" name="txtHoten"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="txtEmail"></td>
                            </tr>
                            <tr>
                                <td>SĐT:</td>
                                <td><input type="text" name="txtSDT"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu:</td>
                                <td><input type="password" name="txtPassword"></td>
                            </tr>
                            <tr>
                                <td>Hình ảnh:</td>
                                <td>
                                    <input type="file" name="Anh"  />
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td><input type="text" name="txtDiachi"></td>
                            </tr>
                            <tr>
                                <td>Quyền:</td>
                                <td>
                                <select name="Quyen">
                                        <?php
                                        $sql2 = "SELECT * FROM phanquyen";
                                        $res = mysqli_query($conn, $sql2);
                                        if ($res == true) {
                                            if (mysqli_num_rows($res) != 0) {
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $id = $row['IDQuyen'];
                                                    $ten = $row['TenQuyen'];
                                                    echo "<option value='$id'>".$ten."</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit" class="signupbtn" name="submit"> Đăng ký</button></td>
                            </tr>
                        </table>
                    </form>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </section>
<?php include 'partials/footer.php'; ?>