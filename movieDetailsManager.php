<?php require 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'managingHeader.php'; ?>
            <div class="col-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                <?php
                $movieID = $_GET["movieID"];
                $movieResultSet = Database::search("SELECT * FROM `movie` WHERE `id`='" . $movieID . "'");
                $movieNumRows = $movieResultSet->num_rows;
                if ($movieNumRows > 0) {
                    $movieData = $movieResultSet->fetch_assoc();
                ?>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 p-3">
                            <h4 class="backend-text">MOVIE TRAILOR</h4>
                            <video src="resources/trailors/<?php echo $movieData['trailor']; ?>" class="movieTrailor" autoplay muted></video>
                            <hr>
                            <h4 class="backend-text">STORY ABOUT THE MOVIE</h4>
                            <span class="backend-text"><?php echo $movieData["description"]; ?></span>
                            <hr>
                            <span class="backend-text fs-3">Category</span>
                            <?php
                            $categoryResultSet = Database::search("SELECT * FROM `category` WHERE `id`='" . $movieData["category_id"] . "'");
                            $categoryNumRows = $categoryResultSet->num_rows;
                            if ($categoryNumRows > 0) {
                                $categoryData = $categoryResultSet->fetch_assoc();
                            ?>
                                <span class="backend-text"><?php echo $categoryData["name"]; ?></span>
                            <?php
                            }
                            ?>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 p-3">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h4 class="backend-text">TEAM</h4>
                                </div>
                                <div class="col-6">
                                    <span class="backend-text">Directed By</span><br>
                                    <span class="backend-text">Produced By</span><br>
                                    <span class="backend-text">Written By</span><br>
                                    <span class="backend-text">Music By</span><br>
                                </div>

                                <?php
                                $movieTeamResultSet = Database::search("SELECT * FROM `movie_team` WHERE `movie_id`='" . $movieID . "'");
                                $teamNumRows = $movieTeamResultSet->num_rows;
                                if ($teamNumRows > 0) {
                                    $teamData = $movieTeamResultSet->fetch_assoc();
                                ?>
                                    <div class="col-6">
                                        <span class="backend-text"><?php echo $teamData["director"]; ?></span><br>
                                        <span class="backend-text"><?php echo $teamData["producer"]; ?></span><br>
                                        <span class="backend-text"><?php echo $teamData["writer"]; ?></span><br>
                                        <span class="backend-text"><?php echo $teamData["musician"]; ?></span><br>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-6">
                                        <span class="backend-text">NO</span><br>
                                        <span class="backend-text">NO</span><br>
                                        <span class="backend-text">NO</span><br>
                                        <span class="backend-text">NO</span><br>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="col-12 mt-5">
                                    <h3 class="backend-text">Show Times and Dates</h3>
                                </div>
                                <div class="col-12 mt-2">
                                    <?php
                                    $dateTimeResultSet = Database::search("SELECT * FROM `show_time` WHERE `movie_id`='" . $movieID . "'");
                                    $dateTimeNumRows = $dateTimeResultSet->num_rows;
                                    if ($dateTimeNumRows > 0) {
                                        for ($x = 0; $x < $dateTimeNumRows; $x++) {
                                            $dateTimeData = $dateTimeResultSet->fetch_assoc();
                                    ?>
                                            <div class="row mt-2">
                                                <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                    <span style="color: #EAE1E5;"><?php echo $dateTimeData["date"]; ?></span>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                    <span style="color: #EAE1E5;"><?php echo $dateTimeData["start_time"]; ?> - <?php echo $dateTimeData["end_time"]; ?></span><br>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                <span style="color: #EAE1E5;"><i>No Dates</i></span>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                <span style="color: #EAE1E5;"><i>No Times</i></span><br>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>