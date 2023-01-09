<title>Taway.dev - Upload</title>
<?php
if(empty($_SERVER['CONTENT_TYPE']))
{ 
  $_SERVER['CONTENT_TYPE'] = "application/x-www-form-urlencoded"; 
}
?>
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
echo "VAR DUMP:<br>";
var_dump( $_POST );
echo "<br>".$_SERVER['REQUEST_METHOD']."<br>";
$addstr = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    if(str_contains(htmlspecialchars($key), 'p')) {
        $addstr = $addstr.'<p>'.$value."</p>\n";
    }
    if(str_contains(htmlspecialchars($key), 'ch')) {
        $addstr = $addstr.'<h4>'.$value."</h4>\n";
    }
}
$string = '<body>
<div class="container">
    <div class="blogName">
        <h2>'.$_POST['title'].'</h2>
        <span>
            <h3>'.date('F j, Y').'</h3>
            <h3 class="tag">'.$_POST['tag'].'</h3>
        </span>
    </div>';
$string = $string.$addstr;
$string = $string.'
<a href="index.php">
<h3>
    « BACK
</h3>
</a>
</div>
</body>';
// taway.dev/upload.php?title=hello?tag=world
echo $string;
$file = fopen("blog/unprocessed/".date('j-n-Y-s').".php", "w") or die("something something file idk");
fwrite($file, $string)  or die("something something file cant write");
fclose($file) or die("something something file death");
echo 'Your upload is waiting for review. Current link: <a style="color: var(--BGAccent);" target="_blank" href="blog.php?page=../unprocessed/'.date('j-n-Y-s').'.php">Link </a>';
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