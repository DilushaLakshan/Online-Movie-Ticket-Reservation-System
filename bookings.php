<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Bookings</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: #000F45">
        <div class="row">
            <!-- content -->
            <div class="col-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2 mt-2 mb-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <span class="text-styles">Select the Date and Time:</span>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <select id="date" class="w-100" onchange="loadRelatedTimes();">
                                                <?php
                                                $movieID = $_GET["movieID"];
                                                $dateResultSet = Database::search("SELECT * FROM `show_time` WHERE `movie_id`='" . $movieID . "'");
                                                $dateNumRows = $dateResultSet->num_rows;
                                                if ($dateNumRows > 0) {
                                                    for ($x = 0; $x < $dateNumRows; $x++) {
                                                        $dateData = $dateResultSet->fetch_assoc();
                                                ?>
                                                        <option value="<?php echo $dateData["id"]; ?>"><i><?php echo $dateData["date"]; ?></i></option>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <option value=""><i>No Dates</i></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <select id="time" class="w-100" onchange="loadSeatTemplate();">
                                            <option value=""><i>Select Times</i></option>
                                                <?php
                                                $showTimeID = $_GET["movieID"];
                                                $timeresultSet = Database::search("SELECT * FROM `show_time` WHERE `id`='" . $showTimeID . "'");
                                                $timeNumRows = $timeresultSet->num_rows;
                                                if ($timeNumRows > 0) {
                                                    for ($y = 0; $y < $timeNumRows; $y++) {
                                                        $timeData = $timeresultSet->fetch_assoc();
                                                ?>
                                                        <option value="<?php echo $timeData["start_time"] . " - " . $timeData["end_time"]; ?>"><i><?php echo $timeData["start_time"] . " - " . $timeData["end_time"]; ?></i></option>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <option value=""><i>No Times</i></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div style="width: 25px; height: 25px; background-color: #860f3c;" class="small-text-styles"><span>Available</span></div>
                                <div style="width: 25px; height: 25px; background-color: #ffb3d9;" class="small-text-styles"><span>Pending</span></div>
                                <div style="width: 25px; height: 25px; background-color: #ff9900;" class="small-text-styles"><span>Booked</span></div>
                            </div>
                        </div>
                        <!-- seat showing area -->
                        <div class="col-12 mt-4">
                            <div class="row" id="seating-area">
                                <?php
                                $counter = 0;
                                for ($a = 0; $a < 10; $a++) {
                                ?>
                                    <div class="col-12 mt-2">
                                        <div class="row">
                                            <?php
                                            for ($b = 0; $b < 10; $b++) {
                                            ?>
                                                <div class="square" id="seat<?php echo $counter + 1; ?>"></div>
                                            <?php
                                            $counter++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="col-12 mt-4">
                                    <div style="width: 100%; height: 20px; background-color: lavender;"><span>
                                            <center>SCREEN</center>
                                        </span></div>
                                </div>
                            </div>
                        </div>
                        <!-- seat showing area -->
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="small-text-styles">No. of Seats -</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small-text-styles">05</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="small-text-styles">Amount(Rs.) -</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small-text-styles">3000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <center><button class="btn btn-outline-warning w-50">NEXT</button></center>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <script src="jsProcesses.js"></script>
</body>

</html>