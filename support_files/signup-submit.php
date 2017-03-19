<?php
include("top.html");
require_once('common.php');

if(is_post_request()){
    $name = "";
    $
    if(isset($_POST['name'])){
        $name = sanitize_input($_GET['name']);
    }
}

<?php include("bottom.html"); ?>