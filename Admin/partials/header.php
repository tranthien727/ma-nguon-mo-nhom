<?php include ('../config/constraint.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL; ?>Admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>   
</head>
<body>
    <section class="header">
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <a href="<?php echo URL; ?>">ICT Shop</a>
            <div class="d-flex">
                <?php 
                    echo '<ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="navbar-brand" href="#" role="button" data-bs-toggle="dropdown"><img class="rounded-pill" style="width:30px;" src="../HinhanhSP/'.$_SESSION["Hinhanh"].'"></a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>';
                ?>
            </div>
        </div>
    </nav>
    </section>
