<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dash Board</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'managingHeader.php'; ?>
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 p-3 mt-4 mb-4 backend-main-content-background">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2 style="font-family: Georgia, 'Times New Roman', Times, serif; color: #EAE1E5;">WELCOME TO AURA CINEMA</h2>
                        </center>
                    </div>
                    <!-- Table headings -->
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Name</h4>
                            </div>
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Date</h4>
                            </div>
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Tickets - Booked</h4>
                            </div>
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Status</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Table headings -->

                    <div class="col-12">
                        <hr style="color: #EAE1E5;">
                    </div>

                    <!-- table content -->
                    <div class="col-12 mt-2">
                        <div class="row">
                            <?php
                            //get time table data descending order
                            $timesResultSet = Database::search("SELECT * FROM `show_time` ORDER BY `date` DESC");
                            $timeNumRows = $timesResultSet->num_rows;
                            if ($timeNumRows > 0) {
                                for ($x = 0; $x < $timeNumRows; $x++) {
                                    $timeData = $timesResultSet->fetch_assoc();
                                    //select movie according to the date
                                    $movieResultSet = Database::search("SELECT * FROM `movie` WHERE `id`='" . $timeData['movie_id'] . "'");
                                    $movieNumRows = $movieResultSet->num_rows;
                                    if ($movieNumRows > 0) {
                                        $movieData = $movieResultSet->fetch_assoc();
                            ?>
                                        <div class="col-3">
                                            <a href="movieDetailsAdmin.php?movieID=<?php echo $movieData['id']; ?>" class="text-decoration-none admin-home-table-content tableContent-mName"><?php echo $movieData["title"]; ?></a>
                                        </div>
                                        <div class="col-3">
                                            <span class="admin-home-table-content"><?php echo $timeData["date"]; ?></span>
                                        </div>
                                        <div class="col-3">
                                            <?php
                                            $seatResultSet = Database::search("SELECT * FROM `ticket` WHERE `show_time_id`='" . $timeData['id'] . "'");
                                            $seatNumRows = $seatResultSet->num_rows;
                                            if ($seatNumRows > 0) {
                                            ?>
                                                <span class="admin-home-table-content"><?php echo $seatNumRows; ?></span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="admin-home-table-content">0</span>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                        <?php
                                        //get the current date
                                        $dateTime = new DateTime();
                                        $timeZone = new DateTimeZone('Asia/colombo');
                                        $dateTime->setTimezone($timeZone);
                                        $newDateTimeString = $dateTime->format('Y-m-d');

                                        if ($timeData["date"] >= $newDateTimeString) {
                                        ?>
                                            <div class="col-3">
                                                <span class="admin-home-table-content">Pending</span>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-3">
                                                <span class="admin-home-table-content">Finished</span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                <?php
                                    }
                                }
                            } else {
                                ?>
                                <div class="col-12">
                                    <center><span class="admin-home-table-content"><i>No movies available to show</i></span></center>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- table content -->
                </div>
            </div>
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>