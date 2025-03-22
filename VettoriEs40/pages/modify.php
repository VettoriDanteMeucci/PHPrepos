<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php 
        include_once "../classes/DB.php";
        session_start();
        $db = new DB();
        if(!isset($_SESSION["user"])){header("Location: ../index.php");}
    ?>

    <div class="row">
    <?php 
    if(isset($_SESSION["user"])){
      $tmp = $_SESSION["user"]["username"];
      echo "<h1 class='fs-1'>Ciao $tmp</h1>";
    }
  ?>
    <?php 
    if(isset($_SESSION["operation"])){
      if($_SESSION["operation"] == true){
        echo 
        "<div class='col-12 alert alert-success mt-3 px-5' role='alert'>
          Operazione eseguita con successo
        </div>";
      }else{
        echo
        "<div class='col-12 alert alert-warning mt-3 px-5' role='alert'>
          Qualcosa è andato storto
        </div>";
      }
      unset($_SESSION["operation"]);
    }
    $user = $_SESSION["user"]
  ?>
        <div class="col-10 mx-auto mt-5 border rounded p-4">
        <form method="POST" action="../actions/modifyUser.php">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username"
             <?php echo "value='$user[username]'"; ?>>
          </div>
          <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name"
             <?php echo "value='$user[nome]'"; ?>>
          </div>
          <div class="mb-3">
          <label for="surname" class="form-label">Cognome</label>
            <input type="text" name="surname" class="form-control" id="name"
             <?php echo "value='$user[cognome]'"; ?>>
          </div>
          <select name="type" class="mb-3 form-control">
            <?php
              foreach($db->getTypes() as $type){
                if($user["id_tipo"] == $type['id']){
                  echo "<option selected value='$type[id]'>$type[nome]</option>";
                }else{
                  echo "<option value='$type[id]'>$type[nome]</option>";
                }
              }
            ?>
          </select>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password"
            <?php echo "value='$user[password]'"; ?>>
          </div>
          <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
          <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>