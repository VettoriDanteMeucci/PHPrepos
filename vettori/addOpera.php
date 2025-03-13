<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Verifica Museo</title>
</head>
<body>
    <?php 
        include_once "./DB.php";
        $db = new DB();
        $artists = $db->fetchArtists();
    ?>
    <form action="./insertOpera.php" method="post">
        <label for="">Nome opera</label>
        <input required type="text" name="nameOpera">
        <label for="">Tipo opera</label>
        <select required name="typeOpera">
            <option value="Pittura">Pittura</option>
            <option value="Scultura">Scultura</option>
        </select>
        <select required name="artistID">
            <?php 
                for($i = 0; $i < count($artists); $i++){
            ?>
                <option <?php echo 'value="' . $artists[$i]["id_artista"] . '"'?>>
                    <?php echo $artists[$i]["nome_artista"] . " " . $artists[$i]["cognome_artista"]?>
                </option>
            <?php
                }
            ?>
        </select>
        <button type="submit">crea</button>
    </form>
</body>
</html>