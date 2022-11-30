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
    $query="SELECT `sanpham`.*, Sum(chitietdonhang.Soluong) AS 'number_sanpham' FROM `sanpham` 
    INNER JOIN `chitietdonhang` ON sanpham.Masp=chitietdonhang.Masp GROUP BY chitietdonhang.Masp";
    $result=mysqli_query($conn,$query);
    $data=[];
    while($rows=mysqli_fetch_array($result)){
        $data[]=$rows;
    }

?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include 'navigation.php'; ?>
                <div class="col-sm-9" style="height:700px">
                    <html>
                    <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Tensp', 'number_sanpham'],
                            <?php 
                                foreach($data as $key){
                                    echo "['" . $key['Tensp']."' , " . $key['number_sanpham'] . "],";
                                }
                            ?>
                            ]);

                            var options = {
                            title: 'Tổng các sản phẩm đã bán',
                            is3D: true,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                        </script>
                    </head>
                    <body>
                        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                    </body>
                    </html>
                    <div class="row">
                        <div class="col-3">
                            <div class="numbers" style="background:red;">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                <h3 class="font-weight-bolder">
                                    <?php     $query1="SELECT * FROM chitietdonhang";
                                            $result1=mysqli_query($conn,$query1);
                                            $Tongtien=0;
                                            while($rows1=mysqli_fetch_array($result1)){
                                                $Tongtien+=$rows1['Thanhtien'];
                                            }
                                        echo currency_format($Tongtien); 
                                    ?>
                                </h3> 
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="numbers" style="background:violet;">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Order</p>
                                <h3 class="font-weight-bolder">
                                    <?php     $query2="SELECT COUNT(Madon) AS 'number_order' FROM donhang";
                                            $result2=mysqli_query($conn,$query2);
                                            $rows2=mysqli_fetch_array($result2);                                         
                                        echo $rows2['number_order']; 
                                    ?>
                                </h3> 
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="numbers" style="background:green;">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">User</p>
                                <h3 class="font-weight-bolder">
                                    <?php     $query3="SELECT *  FROM nguoidung";
                                            $result3=mysqli_query($conn,$query3);
                                            $user=0;
                                            while($rows3=mysqli_fetch_array($result3)){
                                                if($rows3['IDQuyen']!=2){
                                                    $user++;
                                                }
                                            }
                                        echo $user; 
                                    ?>
                                </h3> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include 'partials/footer.php'; ?>