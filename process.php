<?php 
session_start();
require_once("new-connection.php");
date_default_timezone_set('Asia/Manila');

if(isset($_POST["submit"])){
    if(empty($_POST["quote"])){
        $_SESSION["errors"][] = "Quote cannot be blank";
    }

    if(empty($_POST["name"])){
        $_SESSION["errors"][] = "Name cannot be blank";
    }


    if(isset($_SESSION["errors"]) AND count($_SESSION["errors"]) > 0){
        header("Location: index.php");
    }

    $name = escape_this_string($_POST["name"]);
    $quote = escape_this_string($_POST["quote"]);
   

    $query = "INSERT INTO qoutes(name,quote,created_at) VALUES ('$name','$quote',NOW())";
    echo $query;
    $run_query = run_mysql_query($query);
    if($run_query){
        $_SESSION["success_message"] = "New quote has been added";
        header("Location: index.php");
    }
}


?>