<?php
include("top.html");
include("common.php");

function splitLine(){

}

if(is_get_request()){
    $name = "";
    if(isset($_GET['name'])){
        $name = sanitize_input($_GET['name']);
    }
}

$people = [];

//open file
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
?>

<h2>Matches For <?=$name?> </h2>
//Read file one by one
<?php
while(!feof($myfile)) {
 $people = explode(",", fgets($myfile));
?>
<div class="match">
<img src="#"/>
<p> <=$people['0']> </p>

</div>
<?php } fclose($myfile); ?>

<?php include("bottom.html"); ?>