<?php
include("top.html");
require_once('common.php');

$errors = [];
$type_array = array("ESTJ", "ISTJ", "ENTJ", "INTJ", "ESTP" , "ISTP", "ENTP", "INTP"
                        "ESFJ", "ISFJ", "ENFJ", "INFJ", "ESFP", "ISFP", "ENFP", "INFP");
if(is_post_request()){
    $name = "";
    $gender = "";
    $age = "";
    $personality_type = "";
    $favOS = "";
    $min_age = "";
    $max_age = "";
    if(isset($_POST['name'])){
        $name = sanitize_input($_POST['name']);
    }
    if(isset($_POST['gender'])){
        $gender = sanitize_input($_POST['gender']);
    }
    if(isset($_POST['age'])){
        $age = sanitize_input($_POST['age']);
    }
    if(isset($_POST['type'])){
        $personality_type = sanitize_input($_POST['type']);
    }
    if(isset($_POST['fav-os'])){
        $favOS = sanitize_input($_POST['fav-os']);
    }
    if(isset($_POST['min_age'])){
        $min_age = sanitize_input($_POST['min_age']);
    }
    if(isset($_POST['max_age'])){
        $max_age = sanitize_input($_POST['max_age']);
    }

    //Perform form validations

    //Check if any text field is left blank
    if(is_blank($name)){
        $errors[] = "Name cannot be left blank";
    }
    if(is_blank($age)){
        $errors[] = "Age cannot be blank";
    }
    if(is_blank($personality_type)){
        $errors[] = "Personality Type cannot be blank";
    }
    if(is_blank($min_age)){
        $errors[] = "Seeking min age cannot be blank";
    }
    if(is_blank($max_age)){
         $errors[] = "Seeking max age cannot be blank";
    }

    //convert personality type to upper case before inserting into file
    $personality_type = strtoupper($personality_type);

    //Verify that age is digits
    if(!is_digit($age)){
        $errors[] = "Age must be digit";
    }
    //Verify that name contain only alpahbetic characters with first letters of each word capitalized
    if(!is_alphabetic($name)){
        $errors[] = "Name must be alphabetic with first letter of each word capitalized"
    }
    if(!first_cap($name)){
        $errors[] = "First letter of each word in name must be capitalized";
    }
    //Verify that Personality type is one of sixteen personality types
    if(!is_type($personality_type, $type_array)){
        $errors[] = "Not a personality type";
    }
    //Verify that seeking min and max age are digits
    if(!is_digit($min_age)){
        $errors[] = "Seeking min age must be digit";
    }
    if(!is_digit($max_age)){
        $errors[] = "Seeking max age must be digit";
    }

    if(empty($errors)){
        $person = array($name, $gender, $age, $personality_type, $favOS, $min_age, $max_age);
        $current = implode(",", $person);
        //open file for writing
        $file = 'singles.txt"';
        file_put_contents($file, $current, FILE_APPEND);
    }
}

<?php include("bottom.html"); ?>