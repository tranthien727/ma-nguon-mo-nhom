<?php include 'partials/header.php'; ?>
    <?php
        if (!function_exists('currency_format')) {
            function currency_format($number, $suffix = '₫')
            {
                if (!empty($number)) {
                    return number_format($number, 0, ',', '.') . "{$suffix}";
                }
            }
        }
        $id=$_GET['id'];
        $sql="SELECT sanpham.Tensp, sanpham.Giatien, sanpham.Soluong, sanpham.Thesim, sanpham.Bonhotrong, 
        sanpham.Ram, sanpham.Anhbia, hangsanxuat.Tenhang, hedieuhanh.Tenhdh FROM sanpham CROSS JOIN hangsanxuat 
        CROSS JOIN hedieuhanh WHERE Masp='$id' and sanpham.Mahang=hangsanxuat.Mahang and sanpham.Mahdh=hedieuhanh.Mahdh";
        $result=mysqli_query($conn, $sql);
        $rows=mysqli_fetch_assoc($result);
    ?>
    <section class="info">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><img id="myImg" src="HinhanhSP/<?php echo $rows["Anhbia"]; ?>" alt="<?php echo $rows["Tensp"] ?>"></div>
            <div class="col-sm-6">
                <h1><?php echo $rows["Tensp"] ?></h1>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Hãng sản xuất:</td>
                            <td><?php echo $rows["Tenhang"] ?></td>
                        </tr>
                        <tr>
                            <td>Hệ điều hành:</td>
                            <td><?php echo $rows["Tenhdh"] ?></td>
                        </tr>
                        <tr>
                            <td>Số lượng:</td>
                            <td><?php echo $rows["Soluong"] ?></td>
                        </tr>
                        <tr>
                            <td>Thẻ sim:</td>
                            <td><?php echo $rows["Thesim"] ?></td>
                        </tr>
                        <tr>
                            <td>Bộ nhớ:</td>
                            <td><?php echo $rows["Bonhotrong"] ?> GB</td>
                        </tr>
                        <tr>
                            <td>Ram:</td>
                            <td><?php echo $rows["Ram"] ?> GB</td>
                        </tr>
                    </tbody>
                </table>
                <p class="gia"><?php echo currency_format($rows["Giatien"]) ?></p>

                <a href=''><button type='submit'class='btn btn-success'>Đặt hàng</button></a><br><br>

                <a href='javascript: history.go(-1)'>Quay về</a>
            </div>
        </div>
        </section>
        <!-- The Modal -->
        <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
        </div>
    </div>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }
    </script>
<?php include 'partials/footer.php'; ?>