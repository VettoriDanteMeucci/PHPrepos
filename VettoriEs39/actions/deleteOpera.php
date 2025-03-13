<?php 
    include_once "../dbHandler/DB.php";
    $db = new DB();
    $id = $_POST["delete"];
    $db->deleteOperaByID($id);
    header("Location: ../index.php");
?>