<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Response</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'managingHeader.php'; ?>
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 mt-4 mb-4 backend-main-content-background">
                <div class="row">
                    <div class="col-12 mt-3">
                        <center>
                            <h3 class="fs-3 backend-text">AVAILABLE INQUIRIES</h3>
                        </center>
                    </div>
                    <?php
                    $inquiryRS = Database::search("SELECT * FROM `inquiry`");
                    $inquiryNumRows = $inquiryRS->num_rows;
                    if ($inquiryNumRows > 0) {
                        for ($x = 0; $x < $inquiryNumRows; $x++) {
                            $inquiryData = $inquiryRS->fetch_assoc();
                    ?>
                            <div class="col-12 col-md-6 col-lg-4 mt-3">
                                <span class="backend-text" id="to-email-<?php echo $x; ?>"><?php echo $inquiryData["email"]; ?></span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8 mt-3">
                                <span class="backend-text"><?php echo $inquiryData["message"]; ?></span><br><br>
                                <center><button href="#" class="btn text-decoration-none" style="color: #EAE1E5;" data-bs-toggle="collapse" data-bs-target="#<?php echo $x; ?>">Reply</button></center>
                                <div class="collapse" id="<?php echo $x; ?>">
                                    <span class="backend-text">To : <?php echo $inquiryData['email']; ?></span>
                                    <textarea class="mt-2 sb" style="width: 100%;" id="inquiry-reply-<?php echo $x; ?>" cols="30" rows="10"></textarea>
                                    <center><button class="btn btn-outline-primary w-50" onclick="inquiryReply(<?php echo $x; ?>);">SEND</button></center>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-12 col-md-6 col-lg-4 mt-3">
                            <span class="backend-text">dilushalakshan@gmail.com</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 mt-3">
                            <span class="backend-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique dolorem deserunt voluptatibus, animi maxime, tempora facilis veritatis possimus.</span><br><br>
                            <center><a href="#" class="btn text-decoration-none" style="color: #EAE1E5;" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Reply</a></center>
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