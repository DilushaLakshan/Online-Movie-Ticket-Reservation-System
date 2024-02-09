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
                                <span class="front-text">Enter the Code : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 front-input-fields" id="code">
                            </div>
                        </div>
                    </div>
                    <div class="col-10 offset-1 mb-3">
                        <div class="row">
                            <center>
                                <p class="front-text fs-6">(Enter the code that has been sent to the email you entered at the last step.)</p>
                            </center>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3 mb-3 mt-2">
                        <button class="btn btn-outline-primary w-100" onclick="">NEXT</button>
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