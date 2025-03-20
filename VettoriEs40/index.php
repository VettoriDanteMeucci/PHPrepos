<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Hand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php 
        include_once "./classes/DB.php";
        session_start();
        $db = new DB();
    ?>

  <div class="row" style="max-width: 100vw">
  <?php 
    if(isset($_SESSION["operation"])){
      if($_SESSION["operation"] == true){
        echo 
        "<div class='col-12 alert alert-success mt-3 px-5' role='alert'>
          Utente aggiunto con successo
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
  <form
  class="col-11 col-md-8 col-lg-5 mx-auto mt-5 border rounded p-3" 
  method="POST"
  action="./actions/createUser.php"
  >
  <label class="fs-3">Inserisci un nuovo utente</label>
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="surname" class="form-label">Cognome</label>
    <input class="form-control" id="surname" name="surname">
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input class="form-control" id="username" name="username">
  </div>  <div class="mb-3">
    <label for="type">Tipo Utente</label>
    <select name="type" class="form-control" id="type">
        <?php 
            $ty = $db->getTypes();
            foreach ($ty as $type){
              ?>
                <option <?php echo "value='$type[id]'";?>><?php echo $type["nome"];?></option>
              <?php 
            }
        ?>
    </select>
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-danger">Reset</button>
</form>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>