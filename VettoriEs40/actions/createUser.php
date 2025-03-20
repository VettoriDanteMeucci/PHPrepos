<?php 
    include_once "../classes/DB.php";
    include_once "../classes/User.php";
    function checkFrom() {
        if ((isset($_POST["name"]) && isset($_POST["surname"])
        && isset($_POST["username"] ) && isset($_POST["type"] )
        && isset($_POST["password"] )) &&
        (
            $_POST["name"] != "" && 
            $_POST["surname"] != "" && 
            $_POST["username"] != "" && 
            $_POST["type"] != "" && 
            $_POST["password"] != ""
        )) {
            return true;
        }else{
            return false;
        }
    }
    session_start();
    if(checkFrom()){
        $db = new DB();
        $user = new User(
            null,
            $_POST["name"],
            $_POST["surname"],
            $_POST["username"],
            $_POST["type"],
            $_POST["password"]
        );
        $db->insertUser($user);
        $_SESSION["operation"] = true;
        header("Location: ../index.php");
    }else{
        $_SESSION["operation"] = false;
        header("Location: ../index.php");
    }
?>