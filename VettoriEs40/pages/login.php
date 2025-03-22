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
        if(isset($_SESSION["user"])){header("Location: ../index.php");}
    ?>

    <div class="row">
    <?php 
    if(isset($_SESSION["operation"])){
      if($_SESSION["operation"] == true){
        echo 
        "<div class='col-12 alert alert-success mt-3 px-5' role='alert'>
          Accesso effettuato con successo
        </div>";
      }else{
        echo
        "<div class='col-12 alert alert-warning mt-3 px-5' role='alert'>
          Qualcosa è andato storto
        </div>";
      }
      unset($_SESSION["operation"]);
    }
  ?>
        <div class="col-10 mx-auto mt-5 border rounded p-4">
        <form method="POST" action="../actions/login.php">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>