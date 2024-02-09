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
            <?php include 'backendHeader.php'; ?>
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 backend-main-content-background">
                <?php
                //get movie details from the movie table of the according to the movieID of the particular movie
                $movieID = $_GET["movieID"];
                $movieResultSet = Database::search("SELECT * FROM `movie` WHERE `id`='" . $movieID . "'");
                $movieNumRows = $movieResultSet->num_rows;
                if ($movieNumRows > 0) {
                    $movieData = $movieResultSet->fetch_assoc();
                ?>
                    <div class="row">
                        <!-- heading -->
                        <div class="col-12 mt-2">
                            <center><span class="backend-text fs-3">MOVIE DETAILS - ADMIN</span></center>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <!-- heading -->

                        <!-- content -->
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Movie Name : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $movieData["title"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Movie Description : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $movieData["description"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Show Times : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text">Mission Impossible</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Show Dates : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text">Mission Impossible</span>
                                </div>
                            </div>
                        </div>
                        <?php
                        //get movie team details
                        $teamResultSet = Database::search("SELECT * FROM `movie_team` WHERE `movie_id`='" . $movieID . "'");
                        $teamNumRows = $teamResultSet->num_rows;
                        if ($teamNumRows > 0) {
                            $teamData = $teamResultSet->fetch_assoc();
                        ?>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Producer Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text"><?php echo $teamData["producer"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Director Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text"><?php echo $teamData["director"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Writer Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text"><?php echo $teamData["writer"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Musician : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text"><?php echo $teamData["musician"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Producer Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text">Mission Impossible</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Director Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text">Mission Impossible</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Writer Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text">Mission Impossible</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="backend-text">Musician : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <span class="backend-text">Mission Impossible</span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Movie Thumbnail : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text">Mission Impossible</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Movie Trailor : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <video src="resources/trailors/<?php echo $movieData['trailor']; ?>" class="w-50 movieTrailor" autoplay muted></video>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-3">
                            <center><button class="btn btn-outline-warning w-100" onclick="window.location='updateFIlm.php?movieID=<?php echo $movieID; ?>';">UPDATE MOVIE DETAILS</button></center>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-3">
                            <center><button class="btn btn-outline-warning w-100" onclick="window.location='manageShowTimes.php?movieID=<?php echo $movieID; ?>'">MANAGE SHOWTIMES</button></center>
                        </div>
                        <!-- content -->
                    </div>
                <?php
                }
                ?>

            </div>
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>