<?php require 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="resources/images/Aura Logo_02.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: #000F45">
        <div class="row">
            <?php include 'frontNavbar.php'; ?>
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
                            <h4 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: #EAE1E5;">MOVIE TRAILOR</h4>
                            <video src="resources/trailors/<?php echo $movieData['trailor']; ?>" class="movieTrailor" autoplay muted></video>
                            <hr>
                            <h4 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: #EAE1E5;">STORY ABOUT THE MOVIE</h4>
                            <span style="font-family: Arial, Helvetica, sans-serif;color: #EAE1E5;"><?php echo $movieData["description"]; ?></span>
                            <hr>
                            <span style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;font-size: 20px;color: #EAE1E5;">Category</span>
                            <?php
                            $categoryResultSet = Database::search("SELECT * FROM `category` WHERE `id`='" . $movieData["category_id"] . "'");
                            $categoryNumRows = $categoryResultSet->num_rows;
                            if ($categoryNumRows > 0) {
                                $categoryData = $categoryResultSet->fetch_assoc();
                            ?>
                                <span style="font-family: Verdana, Geneva, Tahoma, sans-serif;color: #EAE1E5;"><?php echo $categoryData["name"]; ?></span>
                            <?php
                            }
                            ?>
                            <hr>
                            <center><button class="btn btn-outline-warning w-50" onclick="window.location='bookings.php?movieID=<?php echo $movieID; ?>'">BOOK NOW</button></center>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 p-3">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h4 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: #EAE1E5;">TEAM</h4>
                                </div>
                                <div class="col-6">
                                    <span class="mdf" style="color: #EAE1E5;">Directed By</span><br>
                                    <span class="mdf" style="color: #EAE1E5;">Produced By</span><br>
                                    <span class="mdf" style="color: #EAE1E5;">Written By</span><br>
                                    <span class="mdf" style="color: #EAE1E5;">Music By</span><br>
                                </div>

                                <?php
                                $movieTeamResultSet = Database::search("SELECT * FROM `movie_team` WHERE `movie_id`='" . $movieID . "'");
                                $teamNumRows = $movieTeamResultSet->num_rows;
                                if ($teamNumRows > 0) {
                                    $teamData = $movieTeamResultSet->fetch_assoc();
                                ?>
                                    <div class="col-6">
                                        <span class="mdf" style="color: #EAE1E5;"><?php echo $teamData["director"]; ?></span><br>
                                        <span class="mdf" style="color: #EAE1E5;"><?php echo $teamData["producer"]; ?></span><br>
                                        <span class="mdf" style="color: #EAE1E5;"><?php echo $teamData["writer"]; ?></span><br>
                                        <span class="mdf" style="color: #EAE1E5;"><?php echo $teamData["musician"]; ?></span><br>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-6">
                                        <span class="mdf" style="color: #EAE1E5;">NO</span><br>
                                        <span class="mdf" style="color: #EAE1E5;">NO</span><br>
                                        <span class="mdf" style="color: #EAE1E5;">NO</span><br>
                                        <span class="mdf" style="color: #EAE1E5;">NO</span><br>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="col-12 mt-5">
                                    <h3 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: #EAE1E5;">Show Times and Dates</h3>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <?php
                                        $dateTimeResultSet = Database::search("SELECT * FROM `show_time` WHERE `movie_id`='" . $movieID . "'");
                                        $dateTimeNumRows = $dateTimeResultSet->num_rows;
                                        if ($dateTimeNumRows > 0) {
                                            for ($y = 0; $y < $dateTimeNumRows; $y++) {
                                                $dateTimeData = $dateTimeResultSet->fetch_assoc();
                                        ?>
                                                <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                    <span style="color: #EAE1E5;"><?php echo $dateTimeData["date"]; ?></span>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                    <span style="color: #EAE1E5;"><?php echo $dateTimeData["start_time"]; ?> - <?php echo $dateTimeData["end_time"]; ?></span><br>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                <span style="color: #EAE1E5;"><i>No Dates</i></span>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                <span style="color: #EAE1E5;"><i>No Times</i></span><br>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php include 'footer.php'; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>