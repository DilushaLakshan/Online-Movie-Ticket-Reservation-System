<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Staff Members</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'backendHeader.php'; ?>
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 p-3 mt-4 mb-4 backend-main-content-background">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2 class="backend-text">All Staff Members</h2>
                        </center>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Name</h4>
                            </div>
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Email</h4>
                            </div>
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Contact</h4>
                            </div>
                            <div class="col-3">
                                <h4 class="adHomeHeadings mt-3">Type</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <?php
                        $staffResultSet = Database::search("SELECT * FROM `staff`");
                        $staffNumRows = $staffResultSet->num_rows;
                        if ($staffNumRows > 0) {
                            for ($x = 0; $x < $staffNumRows; $x++) {
                                $staffData = $staffResultSet->fetch_assoc();
                        ?>
                                <div class="row">
                                    <div class="col-3">
                                        <span class="all-user-table-content"><?php echo $staffData["first_name"] . " " . $staffData["last_name"]; ?></span>
                                    </div>
                                    <div class="col-3">
                                        <span class="all-user-table-content"><?php echo $staffData["email"]; ?></span>
                                    </div>
                                    <div class="col-3">
                                        <span class="all-user-table-content"><?php echo $staffData["contact"]; ?></span>
                                    </div>
                                    <div class="col-3">
                                        <span class="all-user-table-content"><?php echo $staffData["user_type"]; ?></span> <a href="#" class="text-decoration-none" onclick="window.location='allMemberDetails.php?memberID=<?php echo $staffData['id']; ?>'">view</a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>