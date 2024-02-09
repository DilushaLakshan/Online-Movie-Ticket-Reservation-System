<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Member Details</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'backendHeader.php'; ?>
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 p-3 backend-main-content-background">
                <div class="row">
                    <div class="col-12">
                        <center><span class="fs-3 backend-text">STAFF MEMBER</span></center>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <?php
                    $memberID = $_GET["memberID"];

                    $staffResultSet = Database::search("SELECT * FROM `staff` WHERE `id`='" . $memberID . "'");
                    $staffNumRows = $staffResultSet->num_rows;
                    if ($staffNumRows == 1) {
                        $staffData = $staffResultSet->fetch_assoc();
                    ?>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Name : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $staffData["first_name"] . " " . $staffData["last_name"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">NIC : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $staffData["nic_number"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Email : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $staffData["email"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Address : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $staffData["address"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Contact : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $staffData["contact"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="backend-text">Joined Date : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <span class="backend-text"><?php echo $staffData["joined_date"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2 mb-3 mt-2">
                            <button class="btn btn-outline-primary w-100" onclick="window.location='updateStaffMember.php?memberID=<?php echo $staffData['id']; ?>'">UPDATE</button>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>