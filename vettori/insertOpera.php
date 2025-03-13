<?php 
    include_once "./DB.php";
    $db = new DB();
    if(isset($_POST["nameOpera"]) && isset($_POST["typeOpera"]) && isset($_POST["artistID"])){
        $db->insertOpera($_POST["nameOpera"], $_POST["typeOpera"], $_POST["artistID"]);
        header("Location: ./index.php");
    }else{
        header("Location: ./addOpera.php");
    }
?>