<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Movies - Admin View</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'backendHeader.php'; ?>
            <!-- main cards section -->
            <div class="col-12">
                <div class="row justify-content-center">
                    <?php
                    $categoryResultSet = Database::search("SELECT * FROM `category`");
                    $categoryNumRows = $categoryResultSet->num_rows;
                    if ($categoryNumRows > 0) {
                        for ($x = 0; $x < $categoryNumRows; $x++) {
                            $categoryData = $categoryResultSet->fetch_assoc();
                    ?>
                            <div class="col-12 ms-3 me-3 backend-all-movies-header-background">
                                <h3 class="backend-all-movies-header"><?php echo $categoryData["name"]; ?></h3>
                            </div>
                            <?php
                            $movieResultSet = Database::search("SELECT * FROM `movie` WHERE `category_id`='" . $categoryData["id"] . "'");
                            $movieNumRows = $movieResultSet->num_rows;
                            if ($movieNumRows > 0) {
                                for ($y = 0; $y < $movieNumRows; $y++) {
                                    $movieData = $movieResultSet->fetch_assoc();
                            ?>
                                    <!-- small cards -->
                                    <div class="col-12 col-md-4 col-lg-3 p-3">
                                        <div class="card border-0 allMov">
                                            <div class="box">
                                                <img src="resources/images/<?php echo $movieData["image"]; ?>">
                                                <div class="box-content">
                                                    <div class="overlay-img">
                                                        <img src="resources/images/<?php echo $movieData["image"]; ?>">
                                                    </div>
                                                    <div class="inner-content">
                                                        <button class="btn btn-outline-warning" style="font-size: smaller;">VIEW</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="backend-movie-name"><?php echo $movieData["title"]; ?></h4>
                                                <button class="btn btn-outline-warning w-100" style="font-size: smaller;" onclick="window.location='movieDetailsAdmin.php?movieID=<?php echo $movieData['id']; ?>';">VIEW DETAILS</button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <!-- small cards -->
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <!-- main cards section -->
        </div>
    </div>


    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>