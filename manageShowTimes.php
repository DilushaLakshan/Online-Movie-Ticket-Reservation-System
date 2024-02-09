<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Show Times and Dates</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: #000F45">
        <div class="row">
            <?php include 'backendHeader.php'; ?>
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 mt-4 mb-4" style="background: rgba(0, 0, 0, 0.40);border-radius: 5px;">
                <div class="row">
                    <div class="col-12 mt-3">
                        <center><span class="sa fs-3">Manage Show Times and Dates</span></center>
                    </div>
                    <?php
                    $movieID = $_GET["movieID"];
                    $movieResultSet = Database::search("SELECT * FROM `movie` WHERE `id`='" . $movieID . "'");
                    $movieNumRows = $movieResultSet->num_rows;
                    if ($movieNumRows > 0) {
                        $movieData = $movieResultSet->fetch_assoc();
                    ?>
                        <div class="col-12">
                            <span class="sa fs-5">MOVIE Name : <?php echo $movieData["title"]; ?></span>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="row">
                                <div class="col-6 col-md-2 col-lg-2">
                                    <span class="sa fs-5">MOVIE ID</span>
                                </div>
                                <div class="col-6 col-md-10 col-lg-10">
                                    <h5 class="sa fs-5" id="mID"><?php echo $movieID; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Show Date : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="date" id="s-date" class="w-100 sb">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Show Time(Start Time) : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="time" id="start-time" class="w-100 sb">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Show Time(End Time) : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="time" id="end-time" class="w-100 sb">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 col-lg-2 offset-md-5 offset-lg-5">
                            <button class="btn btn-outline-primary w-100" onclick="addTimeSheduleRecord();">ADD</button>
                        </div>
                        <div class="col-12 mb-4">
                            <hr class="sa">
                        </div>
                        <div class="col-12 mb-4">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 mb-2">
                                    <center><span class="sac">Show Dates</span></center>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <center><span class="sac">Show Times</span></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row" id="time-shedule-loading-area"></div>
                        </div>
                        <div class="col-12 col-md-2 col-lg-2 offset-md-5 offset-lg-5 mb-3">
                            <button class="btn btn-outline-primary w-100" onclick="saveTimeShedule('<?php echo $movieID; ?>');">SAVE</button>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>
</body>

</html>