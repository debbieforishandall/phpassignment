<?php
include("top.html");
require_once('common.php');

if(is_get_request()){
    $name = "";
    if(isset($_GET['name'])){
        $name = sanitize_input($_GET['name']);
    }
}

$people = [];

//open file
$myfile = fopen("singles.txt", "r") or die("Unable to open file!");
?>

<h2>Matches For <?=$name?> </h2>
<?php
//Find actual user
while(!feof($myfile)){
    $person = explode(",", fgets($myfile));
    if(trim($person['0']) === trim($name)){
      $user = $person;
    }
}
fclose($myfile);
//open file
$myfile = fopen("singles.txt", "r") or die("Unable to open file!");
$count = 0;
//Read file one by one
while(!feof($myfile)) {
 $people = explode(",", fgets($myfile));
 if( (trim($people['0']) !== trim($name)) && is_match($user, $people)){
 $count++;
?>
<div class="match">
    <p><img src="user.jpg" alt="default user image"/>
    	<?=$people['0']?> </p>
    <ul>
    <li><strong>gender:</strong> <?=$people['1']?></li>
    <li><strong>age:</strong> <?=$people['2']?></li>
    <li><strong>type:</strong> <?=$people['3']?></li>
    <li><strong>OS:</strong> <?=$people['4']?></li>
    </ul>
</div>
<?php }}
fclose($myfile);
if($count === 0){ ?>
    <p>No match is found</p>
<?php }
?>

<?php include("bottom.html"); ?>
