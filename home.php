<?php include 'partials/header.php'; ?>
<section class="body">
    <div class="container">
        <table align="center" class="qc">
            <tr><td><img class="left" src="HinhanhSP/banner.png"></td>
            <td><img class="right" src="HinhanhSP/qc3.gif"></td></tr>
        </table>
        <div align="center">
            <img class="mySlides" src="HinhanhSP/spnb1.png">
            <img class="mySlides" src="HinhanhSP/spnb2.png">
            <img class="mySlides" src="HinhanhSP/spnb3.png">
        </div>
        <div align="center">
            <img class="ban1" src="HinhanhSP/ban1.jpg">
        </div>
        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 4000); // Change image every 4 seconds
            }
        </script>
        <table align="center" class="item1">
        <?php
                require 'dt.php';
        ?>
        
    </div>
</section>
<?php include 'partials/footer.php'; ?>
 