<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid front-main-background-centered">
        <div class="row">
            <!-- content -->
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 p-3 front-main-content-background mt-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <center><span class="fs-3 front-text">New User - Sign Up</span></center>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="front-text">First Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 front-input-fields" id="f-name">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="front-text">Last Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 front-input-fields" id="l-name">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="front-text">Email : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="email" class="w-100 front-input-fields" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="front-text">Address : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 front-input-fields" id="address">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="front-text">Contact : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 front-input-fields" id="contact">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="front-text">User Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 front-input-fields" id="u-name">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="front-text">Password : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="password" class="w-100 front-input-fields" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3 mb-3 mt-2">
                        <button class="btn btn-outline-primary w-100" onclick="window.location='emailVerification.php'">NEXT</button>
                    </div>
                </div>
            </div>
            <!-- content -->
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>