<!-- include style.css (if this page is in blog folder) -->
<?php
// Include header:
include('template/header.php');
if (isset($_GET['page'])) {
    include('blog/page/' . $_GET['page']);
}
echo "<link rel='stylesheet' href='src/style.css'>";
echo "<link rel='stylesheet' href='src/index.css'>";
// Include footer:
include('template/footer.php');
?>