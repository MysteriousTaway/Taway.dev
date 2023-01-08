<!DOCTYPE html>
<!-- Import icon -->
<link rel="icon" type="image/x-icon" href="https://avatars.githubusercontent.com/u/44374628?v=4">

<!-- include style.css -->
<link rel="stylesheet" href="src/style.css">
<!-- Include projects.css -->
<link rel="stylesheet" href="src/projects.css">

<!-- Include font: -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');
</style>
<html lang="en">
<?php
include('template/header.php');
?>
<div class="note center">
    NOTE: Click on the project name to view the source code.
</div>
<body>

<?php
$json = json_decode(file_get_contents('src/json/projects.json'), true);
$i = 0;
foreach($json['projects'] as $project) {
    if($i == 0) {
        echo "<div class='row'>";
    }
    echo "<span class='project'>";
    echo "<h1><b><a target='_blank' href='{$project['Link']}'>{$project['Name']}</a></b></h1>";
    echo "<h4>{$project['Language']}</h4>";
    echo "<p>{$project['Description']}</p>";
    echo "</span>";
    $i++;
    if($i == 4) {
        echo "</div>";
        $i = 0;
    }
}
?>

</body>
<?php
include('template/footer.php');
?>
</html>