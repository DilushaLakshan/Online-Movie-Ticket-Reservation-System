<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="row">
            <!-- navbar design -->
            <div class="col-12">
                <div class="row">
                    <div class="col-6 p-2 d-flex align-items-center">
                        <img src="resources/images/Aura Logo_02.jpg" alt="" style="height: 60px;" />
                        <span style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size: 30px;color: #EAE1E5;background: #FFFF24;background: radial-gradient(ellipse farthest-corner at center center, #FFFF24 0%, #FF7519 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">AURA Cinema</span>
                    </div>
                    <div class="col-6 p-2 d-flex justify-content-end align-items-center">
                        <button class="btn btn-outline-primary" style="border-radius: 5px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><img src="resources/images/source_images/toggleIcon.png" style="height: 20px; width: 20px;"></button>
                    </div>
                </div>
            </div>
            <!-- navbar design -->
        </div>
    </div>
    <!-- offcanvas main -->
    <div class="container-fluid">
        <div class="row">
            <!-- offcanvas -->
            <div class="col-12 p-4">
                <div class="offcanvas offcanvas-start ms-3 mt-3 mb-3 text-light" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="border-radius: 15px;background-color: #000F45">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU HERE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="dropdown mt-3">
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <div class="col-12 mt-2">
                            <a href="adminHome.php" class="btn btn-outline-warning text-decoration-none w-100 text-light fs-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">HOME</a>
                        </div>
                        <div class="col-12 mt-2">
                            <a href="addFilm.php" class="btn btn-outline-warning text-decoration-none w-100 text-light fs-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">ADD NEW MOVIE</a>
                        </div>
                        <div class="col-12 mt-2">
                            <a href="allMoviesAdmin.php" class="btn btn-outline-warning text-decoration-none w-100 text-light fs-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">VIEW ALL MOVIES</a>
                        </div>
                        <div class="col-12 mt-2">
                            <a href="addStaffMember.php" class="btn btn-outline-warning text-decoration-none w-100 text-light fs-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">ADD NEW USER</a>
                        </div>
                        <div class="col-12 mt-2">
                            <a href="allStaffMembers.php" class="btn btn-outline-warning text-decoration-none w-100 text-light fs-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">VIEW ALL USERS</a>
                        </div>
                        <div class="col-12 mt-2">
                            <a href="staffLogin.php" class="btn btn-outline-warning text-decoration-none w-100 text-light fs-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">LOGOUT</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas -->
        </div>
    </div>
    <!-- offcanvas main -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>