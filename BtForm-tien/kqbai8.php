
<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <p>Bạn đã đăng nhập thành công, dưới đây là thông tin bạn đã nhập</p>
    <?php
    if (isset($_POST['submit'])) {
        $hoten = $_POST['fullname'];
        $diachi = $_POST['address'];
        $dienthoai = $_POST['phone'];
        if(isset($_POST["gender"])) { 
            $gioitinh = $_POST["gender"]; 
        }
        $quocgia = $_POST['country'];
        if(isset($_POST["study"])) {
            $monhoc = $_POST["study"];
        }
        
        $note = $_POST['note'];

    }
    echo "họ tên:".$hoten; echo "</br>";
    echo "địa chỉ:".$diachi; echo "</br>";
    echo "điện thoại:".$dienthoai; echo "</br>";
    echo "giới tính:".$gioitinh; echo "</br>";
    echo "quốc gia:".$quocgia; echo "</br>";
    echo "môn học:".$monhoc; echo "</br>";
    echo "ghi chú:".$note; echo "</br>";
    ?>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    