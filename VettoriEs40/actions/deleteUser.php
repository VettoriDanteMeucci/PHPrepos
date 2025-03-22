<?php 
    include_once "../classes/DB.php";
    session_start();
    if(isset($_POST["userID"]) && strlen($_POST["userID"]) > 0){
        $db = new DB();
        $ans = $db->deleteUser($_POST["userID"]);
        $_SESSION["operation"] = true;
        header("location: ./logout.php");
    }else{
        $_SESSION["operation"] = false;
        header("location: ../index.php");
    }
?>