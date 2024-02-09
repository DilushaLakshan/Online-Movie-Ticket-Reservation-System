<?php require 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="resources/images/Aura Logo_02.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: #000F45">
        <div class="row">
            <?php include 'frontNavbar.php'; ?>
            <!-- main corasel -->
            <div class="col-12 mt-2">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="resources/images/c2.jpg" class="d-block w-100" style="height: 500px; border-radius: 10px;">
                        </div>
                        <div class="carousel-item">
                            <img src="resources/images/c1.jpg" class="d-block w-100" style="height: 500px; border-radius: 10px;">
                        </div>
                        <div class="carousel-item">
                            <img src="resources/images/c3.jpg" class="d-block w-100" style="height: 500px; border-radius: 10px;">
                        </div>
                        <div class="carousel-item">
                            <img src="resources/images/c4.png" class="d-block w-100" style="height: 500px; border-radius: 10px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- main corasel -->

            <!-- cards main area -->
            <div class="col-12 mt-3">
                <div class="row justify-content-center align-items-center">
                    <?php
                    $movieResultSet = Database::search("SELECT * FROM `movie` ORDER BY `release_date` DESC LIMIT 8");
                    $movieNumRows = $movieResultSet->num_rows;
                    if ($movieNumRows > 0) {
                        for ($x = 0; $x < $movieNumRows; $x++) {
                            $movieData = $movieResultSet->fetch_assoc();
                    ?>
                            <!-- small cards -->
                            <div class="col-12 col-md-4 col-lg-3 p-3">
                                <div class="box">
                                    <img src="resources/images/<?php echo $movieData['image']; ?>">
                                    <div class="box-content">
                                        <div class="overlay-img">
                                            <img src="resources/images/<?php echo $movieData['image']; ?>">
                                        </div>
                                        <div class="inner-content">
                                            <h3 class="title"><?php echo $movieData["title"]; ?></h3>
                                            <button class="btn btn-outline-warning" style="font-size: smaller;" onclick="window.location='movieDetails.php?movieID=<?php echo $movieData['id']; ?>';">VIEW</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- small cards -->
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="col-12 mt-3 ps-3">
                <a href="allMovies.php" class="text-decoration-none">
                    <h5 style="color: rgb(255, 196, 1);">See more...</h5>
                </a>
            </div>
            <!-- cards main area -->
            <?php include 'footer.php'; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>