<title>Taway.dev - Upload</title>
<!-- Things: -->
<style>
    #title {
        color: var(--Text);
        text-shadow: 2px 2px var(--BGAccent);
        text-align: left;
        opacity: 100%;
        font-weight: bold;
    }

    #tag {
        color: var(--BGDark)!important;
        width: fit-content;
        padding-left: 6px;
        padding-right: 6px;
        background-color: var(--BGLight);
        border-radius: 15px 0px 15px 0px;
        font-size: 15px;
        font-weight: bold;
    }

    #chapter {
        color: var(--Text);
        text-align: left;
        margin: 0px;
        margin-left: 7px;
        display: block;
        margin-block-start: 1.33em;
        margin-block-end: 1.33em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

    input, textarea {
        background-color: transparent;
        border: transparent;
    }
    textarea {
        max-width: 100%;
        min-width: 100%;
        height: auto;
        resize: none;
    }
    .controls *{
        border-radius: 8px 0px 8px 0px;
        border-color: var(--BGLight);
        /* background-color: var(--BGDark); */
        background-color: var(--BGLight);
        color: white;
    }
    .controls button:hover{
        background-color: var(--BGAccent);
        /* color: var(--Text); */
        cursor: pointer;
    }
    .add {

    }
    .upload {

    }
</style>
<script>
function AutoGrow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}
var i = 0;
function AddParagraph(element) {
    // element.remove();
    document.getElementById("controls").remove();
    // add content:
    var text =
    '<input type="text" id="chapter" name="ch'+i+'" placeholder="Chapter name">' +
    '<p>'+
    '<textarea oninput="AutoGrow(this)" type="text" id="p" name="p'+i+'" placeholder="Type here.."></textarea>'+
    '</p>'+
    '<span id="controls" class="controls">'+
    '<button class="add" onclick="AddParagraph(this)" type="button">+</button>'+
    '<button class="upload" type="submit">Upload</button>'+
    '</span>'+
    '</div>';
    var div = document.createElement('p');
    div.innerHTML = text;
    var doc = document.getElementById("content").appendChild(div);
    i++;
}
</script>
<?php
echo "<link rel='stylesheet' href='src/style.css'>";
echo "<link rel='stylesheet' href='src/index.css'>";
include 'template/header.php';
// Thank fucking god for this website: https://www.mraffaele.com/labs/php-date-format-generator/
// January 9, 2023:
// date('F j, Y');
// 9-1-2023:
// date('j-n-Y');
?>
<?php
// this code is not DRY ... i hate it
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
foreach ($_POST as $key => $value) {
    // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    echo "{$key} = {$value}<br>";
    if(str_contains($key, 'title')) {
        echo "title";
        $title = $value;
    }
    if(str_contains($key, 'tag')) {
        echo "tag";
        $tag = $value;
    }
}
$string = '<body>
<div class="container">
    <div class="blogName">
        <h2>'.$title.'</h2>
        <span>
            <h3>'.date('F j, Y').'</h3>
            <h3 class="tag">'.$tag.'</h3>
        </span>
    </div>';
foreach ($_POST as $key => $value) {
    // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    echo "{$key} = {$value}<br>";
    if(str_contains($key, 'p')) {
        echo "p<br>";
        $string = $string.'<p>'.$value."</p>\n";
    }
    if(str_contains($key, 'ch')) {
        echo "ch<br>";
        $string = $string.'<h4>'.$value."</h4>\n";
    }
}
$string = $string.'
<a href="index.php">
<h3>
    « BACK
</h3>
</a>
</div>
</body>';
echo $string;
$file = fopen("blog/unprocessed/".date('j-n-Y').".php", "w");
fwrite($file, $string);
echo "File written?!";
}

?>
<!-- Website itself: -->
<body>
    <div class="container">
        <!-- <form id="mainForm" method="post" action="src/php/processUpload.php?"> -->
        <form id="mainForm" method="post">
            <div class="blogName">
                <input class="subtitle" type="text" id="title" name="title" placeholder="Title"></input>
                <span>
                    <h3><?php echo date('F j, Y'); ?></h3>
                    <input style="height: 30px; width: fit-content;" class="tag" type="text" id="tag" name="tag" placeholder="Tag"></input>
                </span>
            </div>
            <div id="content">
                <p>
                    <textarea oninput="AutoGrow(this)" type="text" id="p" name="p" placeholder="Type here.."></textarea>
                </p>
                <span id="controls" class="controls">
                    <button class="add" onclick="AddParagraph(this)" type="button">+</button>
                    <button class="upload" type="submit">Upload</button>
                </span>
            </div>
        </form>    
    </div>
</body>
<?php
include 'template/footer.php';
?>