function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function sanitize_input($string=""){
    $string = h($string);
    $string = trim($string);
    $string = stripslashes($string);
    return $string;
}