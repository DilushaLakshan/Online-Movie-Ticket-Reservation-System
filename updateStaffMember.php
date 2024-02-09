<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD NEW STAFF MEMBER</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: #000F45">
        <div class="row">
            <?php include 'backendHeader.php'; ?>
            <!-- input fields -->
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1" style="background: rgba(0, 0, 0, 0.40);border-radius: 5px;">
                <div class="row">
                    <?php
                    $memberID = $_GET["memberID"];
                    ?>
                    <div class="col-12">
                        <span class="sa fs-3">UPDATE STAFF MEMBER : <p id="mID"><?php echo $memberID; ?></p></span>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <?php
                    $staffResultSet = Database::search("SELECT * FROM `staff` WHERE `id`='" . $memberID . "'");
                    $staffNumRows = $staffResultSet->num_rows;
                    if ($staffNumRows > 0) {
                        $staffData = $staffResultSet->fetch_assoc();
                    ?>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">First Name : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="text" class="w-100 asm" id="fName" value="<?php echo $staffData['first_name']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Last Name : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="text" class="w-100 asm" id="lName" value="<?php echo $staffData['last_name']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">NIC Number : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="text" class="w-100 asm" id="nic" value="<?php echo $staffData['nic_number']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Email : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="email" class="w-100 asm" id="e-mail" value="<?php echo $staffData['email']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Address : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="text" class="w-100 asm" id="address" value="<?php echo $staffData['address']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Password : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="password" class="w-100 asm" id="password1">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Re-enter Password : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="password" class="w-100 asm" id="password2">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Contact : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="text" class="w-100 asm" id="contact" value="<?php echo $staffData['contact']; ?>">
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    ?>
                    <div class="col-6 col-md-4 col-lg-2 offset-3 offset-md-4 offset-lg-5 mb-3 mt-2">
                        <button class="btn btn-outline-primary w-100" onclick="updateStaffMember();">UPDATE</button>
                    </div>
                </div>
            </div>
            <!-- input fields -->
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>