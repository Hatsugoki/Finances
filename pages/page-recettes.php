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
        <div class="row" id="row1">
            <!-- Tableau 3 -->
            <div class="col-12 col-md-6 mb-4">
                    <?php include '../inc/tableau3.php'; ?>
            </div>

            <!-- Tableau 4 -->
            <div class="col-12 col-md-6 mb-4">
                    <?php include '../inc/tableau4.php'; ?>
            </div>
        </div>


        <div class="row" id="row2">
            <!-- Tableau 5 -->
            <div class="col-12 col-md-6 mb-4">
                    <?php include '../inc/tableau5.php'; ?>
            </div>

            <!-- Tableau 6 -->
            <div class="col-12 col-md-6 mb-4">
                    <?php include '../inc/tableau6.php'; ?>
            </div>
        </div>
    </div>

    <?php include '../inc/footer.php'; ?>
</body>
</html>