<!DOCTYPE html>
<!-- include style.css -->
<link rel="stylesheet" href="src/style.css">
<!-- include index.css -->
<link rel="stylesheet" href="src/index.css">
<?php
include('template/header.php');
echo "<div class='center'>";
echo "<h1>OOPSIE WOOPSIE!!</h1>";
if(isset($_GET['error'])) {
    switch($_GET['error']) {
        // Custom errors:
        case "project404":
                echo "<p>Project does not have a repository</p>";
                echo "[Error: {$_GET['error']}]";
            break;
        // Pre-defined errors:
        case "400":
                echo "<p>Bad Request.</p>";
                echo "[Error: {$_GET['error']}]";
                break;
        case "401":
                echo "<p>Unauthorized.</p>";
                echo "[Error: {$_GET['error']}]";
                break;
        case "402":
                echo "<p>Payment Required.</p>";
                echo "[Error: {$_GET['error']}]";
                break;
        case "403":
                echo "<p>Forbidden.</p>";
                echo "[Error: {$_GET['error']}]";
                break;
        case "404":
                echo "<p>The requested resource has not been found on this server.</p>";
                echo "[Error: {$_GET['error']}]";
                break;
        case "405":
                echo "<p>Method not allowed.</p>";
                echo "[Error: {$_GET['error']}]";
                break;
        case "429":
                echo "<p>Too many requests.</p>";
                echo "[Error: {$_GET['error']}]";
                break;
        default:
            echo "<p>OOPSIE WOOPSIE!! Uwu We make a fucky wucky!! A wittle fucko boingo! The code monkeys at our headquarters are working VEWY HAWD to fix this!\n</p>";
            echo "[Error: {$_GET['error']}]";
            echo "</div>";
            break;
    }
} else {
    echo "<p>OOPSIE WOOPSIE!! Uwu We make a fucky wucky!! A wittle fucko boingo! The code monkeys at our headquarters are working VEWY HAWD to fix this!\n</p>";
    echo "[Error: {$_GET['error']}]";
    echo "</div>";
}
include('template/footer.php');
?>