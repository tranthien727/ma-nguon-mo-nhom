<?php include '../Admin/partials/header.php'; ?>
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php include '../Admin/navigation.php'; ?>
                <div class="col-sm-9">
                <div>Bạn đã nhập thông tin thành công, dưới đây là những thông tin bạn đã nhập:</div>
                <div>Họ tên: <?php echo filter_input(INPUT_POST, "ten", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
                <div>Adress: <?php echo filter_input(INPUT_POST, "dc", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
                <div>Phone: <?php echo filter_input(INPUT_POST, "sdt", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
                <div>Gender: <?php echo filter_input(INPUT_POST, "gt", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
                <div>Country: <?php echo filter_input(INPUT_POST, "country", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
                <div>Note: <?php echo filter_input(INPUT_POST, "nd", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
                </div>
            </div>
        </div>
    </section>
<?php include '../Admin/partials/footer.php'; ?>