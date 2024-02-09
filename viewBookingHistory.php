<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking Histoty</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: #000F45;">
        <div class="row">
            <?php include 'managingHeader.php'; ?>
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 mt-4 mb-4" style="background: rgba(0, 0, 0, 0.40);border-radius: 5px;">
                <div class="row">
                    <div class="col-12 mt-3">
                        <center><span class="sa fs-3">BOOKING HISTORY</span></center>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-4">
                                <center><span class="sac">Name</span></center>
                            </div>
                            <div class="col-4">
                                <center><span class="sac">Date</span></center>
                            </div>
                            <div class="col-4">
                                <center><span class="sac">Number of Tickets</span></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <hr style="color: #EAE1E5;">
                    </div>
                    <?php
                    //get movie data from the movie table
                    $movieResultSet = Database::search("SELECT * FROM `movie`");
                    $movieNumRows = $movieResultSet->num_rows;
                    if ($movieNumRows > 0) {
                        for ($x = 0; $x < $movieNumRows; $x++) {
                            $movieData = $movieResultSet->fetch_assoc();

                            //get dates from the show_time table according to the movie_id
                            $dateResultSet = Database::search("SELECT * FROM `show_time` WHERE `movie_id`='" . $movieData["id"] . "'");
                            $dateNumRows = $dateResultSet->num_rows;
                            if ($dateNumRows > 0) {
                                for ($y = 0; $y < $dateNumRows; $y++) {
                                    $dateData = $dateResultSet->fetch_assoc();

                                    //complete the code needed to calculate the number of seats for each movie
                    ?>
                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <span style="color: #EAE1E5;"><?php echo $movieData["title"]; ?></span>
                                            </div>
                                            <div class="col-4">
                                                <span style="color: #EAE1E5;"><?php echo $dateData["date"]; ?></span>
                                            </div>
                                            <div class="col-4">
                                                <?php
                                                $ticketResultSet = Database::search("SELECT * FROM `ticket` WHERE `show_time_id`='" . $dateData['id'] . "'");
                                                $ticketNumRows = $ticketResultSet->num_rows;
                                                if ($ticketNumRows > 0) {
                                                ?>
                                                    <span style="color: #EAE1E5;"><?php echo $ticketNumRows; ?></span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span style="color: #EAE1E5;"><i>No Tickets</i></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <span style="color: #EAE1E5;"><?php echo $movieData["title"]; ?></span>
                                        </div>
                                        <div class="col-4">
                                            <span style="color: #EAE1E5;"><i>No Dates</i></span>
                                        </div>
                                        <div class="col-4">
                                            <span style="color: #EAE1E5;"><i>No Tickets</i></span>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>
</body>

</html>