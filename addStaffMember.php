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
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'backendHeader.php'; ?>
            <!-- input fields -->
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 mt-5 mb-4 backend-main-content-background">
                <div class="row">
                    <div class="col-12">
                        <center><span class="fs-3 backend-text">ADD NEW STAFF MEMBER</span></center>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">First Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="fName">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Last Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="lName">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">NIC Number : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="nic">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Email : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Address : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="address">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Password : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="password" class="w-100 backend-input-fields" id="password1">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Re-enter Password : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="password" class="w-100 backend-input-fields" id="password2">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Contact : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="contact">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">User Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="uName">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Gender : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="radio" name="gender" value="male" class="asm" id="male"> <span class="backend-input-fields">Male</span>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="gender" value="female" class="asm" id="female"> <span class="backend-input-fields">Female</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">User Type : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <select name="uType" id="userType" class="w-100 backend-input-fields">
                                    <option value="select" selected>Select User Type</option>
                                    <option value="manager">Manager</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 offset-3 offset-md-4 offset-lg-5 mb-3 mt-2">
                        <button class="btn btn-outline-primary w-100" onclick="sendUserDetails();">ADD USER</button>
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