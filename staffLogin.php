<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="min-vh-100 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 mx-auto">
                            <div class="shadow-lg" style="border-radius: 10px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-none d-md-block d-lg-block">
                                        <img src="resources/images/staffloginimage.jpg" style="width: 300px;height: 350px;border-radius: 20px 0px 0px 20px;"/>
                                    </div>
                                    <div class="p-4" id="formPanel">
                                        <div class="text-center mb-5">
                                            <h1 class="h3 text-uppercase" style="color: #142C7D;">Login - Staff</h1>
                                        </div>
                                        <form>
                                            <div class="custom-form-group">
                                                <label class="text-uppercase" style="color: #142C7D;"><b>Username</b></label>
                                                <input type="text" id="user-name" class="pb-1" />
                                            </div>
                                            <div class="custom-form-group mt-3">
                                                <label class="text-uppercase" style="color: #142C7D;"><b>Password</b></label>
                                                <input type="password" id="password" class="pb-1" /><span class="pb-1">
                                            </div>
                                            <div class="mt-5">
                                                <button class="w-100 p-2 d-block" style="border-radius: 5px;background: rgb(15,59,186);background: radial-gradient(circle, rgba(15,59,186,1) 0%, rgba(14,7,98,1) 100%);font-family: Verdana, Geneva, Tahoma, sans-serif;color: #ffd700;" onclick="sendStaffLogin();"><b>LOGIN</b></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>