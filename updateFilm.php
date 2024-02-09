<?php require 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container-fluid" style="background-color: #000F45">
        <div class="row">
            <?php
            include 'backendHeader.php';
            $movieID = $_GET["movieID"];
            $movieResultSet = Database::search("SELECT * FROM `movie` WHERE `id`='" . $movieID . "'");
            $movieNumRows = $movieResultSet->num_rows;
            if ($movieNumRows > 0) {
                $movieData = $movieResultSet->fetch_assoc();
            ?>
                <!-- input areas -->
                <div class="col-12 col-md-12 col-lg-10 offset-lg-1" style="background: rgba(0, 0, 0, 0.40);border-radius: 5px;">
                    <div class="row">
                        <div class="col-12">
                            <span class="sa fs-3">UPDATE MOVIE : <?php echo $movieData["title"]; ?></span>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <span class="sa fs-5">MOVIE ID</span>
                                </div>
                                <div class="col-10">
                                    <span class="sa fs-5" id="movieID"><?php echo $movieData["id"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Movie Name : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="text" id="name" class="w-100 sb" value="<?php echo $movieData['title']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Movie Category : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <select name="" id="category" class="w-100 sb" style="color: #EAE1E5;">
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
                                    <span class="sac">Production Company : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <input type="text" id="company" class="w-100 sb">
                                </div>
                            </div>
                        </div>
                        <?php
                        $teamResultSet = Database::search("SELECT * FROM `movie_team` WHERE `movie_id`='" . $movieID . "'");
                        $teamNumRows = $teamResultSet->num_rows;
                        if ($teamNumRows > 0) {
                            $teamData = $teamResultSet->fetch_assoc();
                        ?>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Producer Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" id="producer" class="w-100 sb" value="<?php echo $teamData['producer']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Director Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" id="director" class="w-100 sb" value="<?php echo $teamData['director']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Written By : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" id="writer" class="w-100 sb" value="<?php echo $teamData['writer']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Music By : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" id="musician" class="w-100 sb" value="<?php echo $teamData['musician']; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Producer Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" class="w-100 sb">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Director Name : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" class="w-100 sb">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Written By : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" class="w-100 sb">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-2">
                                        <span class="sac">Music By : </span>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-8">
                                        <input type="text" class="w-100 sb">
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <span class="sac">Description : </span>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <textarea id="description" rows="4" class="w-100 sb"><?php echo $movieData['description']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <center><button class="btn btn-outline-warning w-50" onclick="updateMovieDetails();">UPDATE MOVIE</button></center>
                        </div>
                    </div>
                </div>
                <!-- input areas -->
            <?php
            }
            include 'backendFooter.php';
            ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="jsProcesses.js"></script>
</body>

</html>