<?php 
    include_once "../classes/User.php";
    include_once "../classes/DB.php";
    session_start();
    $db = new DB();
    if(isset($_POST["password"]) && isset($_POST["username"])
    && strlen($_POST["password"]) != 0 && strlen($_POST["username"])){
            $form = new User($_POST["id"], $_POST["name"], $_POST["surname"],
            $_POST["username"], $_POST["type"], $_POST["password"]);
            $ans = $db->modifyUser($form);
            if($ans == false || $ans == null){
                $_SESSION["operation"] = false;
                header("location: ../pages/modify.php");
            }else{
                $_SESSION["operation"] = true;
                $_SESSION["user"] = $ans;
                header("location: ../index.php");
            }

        }
?>