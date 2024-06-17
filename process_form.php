<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name =$_POST["name"];
    $email=$_POST["email"];

echo "Thank you, $name! Your email ($email) has been received.";
}else{
    echo "Error:Invalid request!";
}
?>