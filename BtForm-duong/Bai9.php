
<?php include '../Admin/partials/header.php'; ?>
<style>
            .navbar {
        overflow: hidden;
        background-color: #333;
       
        bottom: 0;
        width: 100%;
        }

        .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        .navbar a:hover {
        background: #f1f1f1;
        color: black;
        }

        .navbar a.active {
        background-color: #A9A9A9;
        color: white;
        }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <div class="navbar">
        <a href="trangchu.php" class="active">Trang Chu</a>
        <a href="gioithieu.php">Gioi Thieu</a>
        <a href="tintuc.php">Tin Tuc</a>
        <a href="lienhe.php">Lien He</a>
        <a href="diendan.php">Dien Dan</a>
    </div>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>    