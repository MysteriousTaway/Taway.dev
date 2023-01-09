<!DOCTYPE html>
<!-- include style.css -->
<link rel="stylesheet" href="src/style.css">
<!-- include index.css -->
<link rel="stylesheet" href="src/index.css">
<title>Taway.dev - Home</title>
<?php
include('template/header.php');
?>
<body>
    <?php
    // Searches for years
    $years = scandir("blog/page/");
    // Removes those dots from years array
    unset($years[0]); unset($years[1]);
    $years = array_reverse($years);
    foreach($years as $year) {
        // Get blogs:
        $blogs = scandir("blog/page/{$year}");
        // remove dot directories:
        unset($blogs[0]); unset($blogs[1]);
        // reverse array to get them from oldest to newest:
        $blogs = array_reverse($blogs);
        // Iterate over each one:
        foreach($blogs as $blog) {
            // get the content:
            preg_match('/<div class="container"((.|\n)*)<\/p>/mU', file_get_contents("blog/page/{$year}/{$blog}"), $matches);
            // Extract the title:
            $title_pattern = '/<h2>([^<]+)<\/h2>/';
            preg_match($title_pattern, $matches[1], $title_matches);
            $title = $title_matches[1];

            // Extract the date and tag:
            $meta_pattern = '/<h3>([^<]+)<\/h3>\s*<h3 class="tag">([^<]+)<\/h3>/';
            preg_match($meta_pattern, $matches[1], $meta_matches);
            $date = $meta_matches[1];
            $tag = $meta_matches[2];

            // extract the content:
            $content_pattern = '/((.|\n)*)<p>/';
            $content = preg_replace($content_pattern, "", $matches[1]);
            // Print to website:
            echo "<div class='container'>";
            echo "<div class='blogName'>";
            echo "<h2>{$title}</h2>";
            echo "<span>";
            echo "<h3>{$date}</h3>";
            echo "<h3 class='tag'>{$tag}</h3>";
            echo "</span>";
            echo "</div>";
            echo "<p>";
            echo "{$content}";
            echo "</p>";
            echo "<a href='blog.php?page={$year}/{$blog}'>";
            echo "<h3>READ MORE »</h3>";
            echo "</a>";
            echo "</div>";
        }
    }
    ?>
</body>
<?php
include('template/footer.php');
?>
</html>