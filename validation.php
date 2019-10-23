<?php
function validate($content,$datatype,$lenmin,$lenmax){
    $content = sanitise($content);
    $regex = "";
    switch ($datatype) {
        case "numeric":
            $regex = "^[0-9]+$";
            break;
        case "alphanumeric":
            $regex = "^[a-zA-Z0-9]+$";
            break;
        case "alpha":
            $regex = "^[a-zA-Z]+$";
            break;
        case "price":
            $regex = "\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})";
            break;
    }
    if (preg_match($regex,$content) && (strlen($content) >= $lenmin) && (strlen($content) <=$lenmax)){
        return true;
    } else{
        return false;
    }
}
function sanitise($content) {
    $data = trim($content);
    $data = stripslashes($content);
    $data = htmlspecialchars($content);
    return $data;
}
?>