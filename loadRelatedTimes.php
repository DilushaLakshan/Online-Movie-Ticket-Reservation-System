<?php
require 'connection.php';
if (isset($_GET["showTimeID"]) & !empty($_GET["showTimeID"])) {
    $showTimeID = $_GET["showTimeID"];
?>
    <option value=""><i>Select Times</i></option>
    <?php
    $timeresultSet = Database::search("SELECT * FROM `show_time` WHERE `id`='" . $showTimeID . "'");
    $timeNumRows = $timeresultSet->num_rows;
    if ($timeNumRows > 0) {
        for ($y = 0; $y < $timeNumRows; $y++) {
            $timeData = $timeresultSet->fetch_assoc();
    ?>
            <option value="<?php echo $timeData["start_time"] . " - " . $timeData["end_time"]; ?>"><i><?php echo $timeData["start_time"] . " - " . $timeData["end_time"]; ?></i></option>
        <?php
        }
    } else {
        ?>
        <option value=""><i>No Times</i></option>
<?php
    }
} else {
    echo "Something went wrong";
}
?>