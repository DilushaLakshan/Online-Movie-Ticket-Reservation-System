<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD NEW FILM</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid backend-main-background">
        <div class="row">
            <?php include 'backendHeader.php'; ?>
            <!-- content -->
            <div class="col-12 col-md-12 col-lg-10 offset-lg-1 p-3 backend-main-content-background">
                <div class="row">
                    <div class="col-12">
                        <center><span class="fs-3 backend-text">ADD NEW MOVIE</span></center>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Movie Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Movie Category : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <select name="" id="category" class="w-100 backend-input-fields backend-text">
                                    <option>Select Category</option>
                                    <?php
                                    $categoryResultSet = Database::search("SELECT * FROM `category`");
                                    $categoryNumRows = $categoryResultSet->num_rows;
                                    for ($x = 0; $x < $categoryNumRows; $x++) {
                                        $categoryData = $categoryResultSet->fetch_assoc();
                                        $categoryName = $categoryData["name"];
                                    ?>
                                        <option value="<?php echo $categoryName; ?>"><?php echo $categoryName; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Production Company : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="productionCompany">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Producer Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="producerName">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Director Name : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="directorName">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Written By : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="writer">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Music By : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <input type="text" class="w-100 backend-input-fields" id="musician">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Description : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <textarea id="description" rows="4" class="w-100 backend-input-fields"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Sample Image : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <input class="form-control backend-input-fields" type="file" id="formFile" accept=".png, .jpg, .jpeg" onclick="imagePreview();" style="width: 100%;">
                                    </div>
                                    <div class="col-12">
                                        <center><img alt="" id="mImageThumbnail" style="width: 300px; height: 400px; object-fit: cover;" class="img-fluid rounded-2" src="resources/images/source_images/default_image.svg"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <span class="backend-text">Movie Trailor : </span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <input class="form-control backend-input-fields" type="file" id="videoFile" accept=".mp4" onclick="trailorPreview();">
                                    </div>
                                    <div class="col-12">
                                        <center><video src="resources/trailors/trailor1.mp4" id="mTrailor" style="width: 400px; height: 300px;"></video></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 offset-3 offset-md-4 offset-lg-5 mb-3 mt-2">
                        <button class="btn btn-outline-primary w-100" onclick="sendMovieDetails();">ADD MOVIE</button>
                    </div>
                </div>
            </div>
            <!-- content -->
            <?php include 'backendFooter.php'; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>