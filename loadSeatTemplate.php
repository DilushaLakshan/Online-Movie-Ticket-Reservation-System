<?php
require 'connection.php';

if (isset($_GET["showTimeID"]) & !empty($_GET["showTimeID"])) {
    $showTimeResultSet = Database::search("SELECT * FROM `show_time` WHERE `start_time`='" . explode(" - ",$_GET['showTimeID'])[0] . "' AND `end_time`='" . explode(" - ",$_GET['showTimeID'],)[1] . "'");
    $showTimeData = $showTimeResultSet->fetch_assoc();
    $ticketResultSet = Database::search("SELECT * FROM `ticket` WHERE `show_time_id`='".$showTimeData['id']."'");
    $ticketNumRows = $ticketResultSet->num_rows;
    $seatNumberArray = array();
    if ($ticketNumRows > 0) {
        for ($a = 0; $a < $ticketNumRows; $a++) {
            $ticketData = $ticketResultSet->fetch_assoc();
            $seatNumberResultSet = Database::search("SELECT  * FROM `seat` WHERE `id`='" . $ticketData['seat_id'] . "'");
            $seatNumberData = $seatNumberResultSet->fetch_assoc();
            array_push($seatNumberArray, $seatNumberData["number"]);
        }
    }
    $counter = 0;
    for ($a = 0; $a < 10; $a++) {
?>
        <div class="col-12 mt-2">
            <div class="row">
                <?php
                for ($b = 0; $b < 10; $b++) {
                    $isSeatChecked = false;
                    if (in_array($counter, $seatNumberArray)) {
                        $isSeatChecked = true;
                    } else {
                        $isSeatChecked = false;
                    }
                ?>
                    <div class="square <?php if ($isSeatChecked) {
                                            echo "seat-booked";
                                        } ?>" id="seat<?php echo $counter + 1; ?>"></div>
                <?php
                    $counter++;
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="col-12 mt-4">
        <div style="width: 100%; height: 20px; background-color: lavender;"><span>
                <center>SCREEN</center>
            </span></div>
    </div>
<?php
} else {
    echo "Something went wrong";
}
?>