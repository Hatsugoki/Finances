<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css_added/added_css.css">
    <title></title>
</head>
<body>
    <?php include '../inc/header-page.php'; ?>

    <div class="container my-4">
    <div class="row">
        <!-- Tableau 1 -->
        <div class="col-12 col-md-6 mb-4">
            <div class="accordion" id="accordionTab1">
                <?php include '../inc/tableau1.php'; ?>
            </div>
        </div>

        <!-- Tableau 2 -->
        <div class="col-12 col-md-6 mb-4">
            <div class="accordion" id="accordionTab2">
                <?php include '../inc/tableau2.php'; ?>
            </div>
        </div>
    </div>
</div>




    <?php include '../inc/footer.php'; ?>
</body>
</html>