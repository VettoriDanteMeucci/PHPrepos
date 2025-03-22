<?php 
    include_once "../classes/DB.php";
    $db = new DB();
    session_start();    
    if(isset($_POST["password"]) && isset($_POST["username"])
    && strlen($_POST["password"]) != 0 && strlen($_POST["username"])){
        $user = $db->login($_POST["username"], $_POST["password"]);
        if($user == null){
            $_SESSION["operation"] = false;
            header("Location: ../pages/login.php");
        }else{
            $_SESSION["user"] = $user;
            $_SESSION["operation"] = true;
            header("Location: ../pages/login.php");
        }
    }else{
        $_SESSION["operation"] = false;
        header("Location: ../index.php");
    }
?>