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
    <div class="container">
    <div>
    <?php 
        include_once "./DB.php";
        $db = new DB();
    ?>
    <form action="" method="POST">
        <label for="name">Nome artista</label>
        <input type="text" name="name">
        <label for="surname">Cognome artista</label>
        <input type="text" name="surname">
        <button>cerca</button>
    </form>

    <?php 
        if(isset($_POST["name"]) && isset($_POST["surname"])){
            $opere = $db->fetchArtistWorks($_POST["name"], $_POST["surname"]);
            if($opere != false){
                
                ?>
        <table>
            <tr>
                <th colspan="2"><?php echo $_POST["name"] . " " . $_POST["surname"];?></th>
            </tr>
            <tr>
                <th><?php echo "Nome opera";?></th>
                <th><?php echo "Tipo opera";?></th>
            </tr>
            <?php
            for($i=0; $i<count($opere); $i++){
                ?>
        <tr>
            <td><?php echo $opere[$i]["nome_opera"]?></td>
            <td><?php echo $opere[$i]["tipo_opera"]?></td>
        </tr>
        <?php    }
        echo "</table>";
        }else{
            echo "No artist found";
        }
        }
    ?>
    </div>

    <div>
        <?php 
            $artists = $db->fetchArtists();
        ?>
        Aggiungi un opera
        <a href="./addOpera.php">vai</a>
    </div>
    <div>
        <table>
            <tr>
                <th>Artisti</th>
            </tr>
            <tr>
                <th>Artista</th>    
                <th>Pitture</th>    
                <th>Sculture</th>    
            </tr>
            <?php 
                for($i =0 ; $i<count($artists); $i++){
            ?>
            <tr>
                <td><?php echo $artists[$i]["nome_artista"] . " " . $artists[$i]["cognome_artista"];?></td>
                <td><?php echo $db->getNumOpereByArtistID(true, $artists[$i]["id_artista"])["tot"];?></td>
                <td><?php echo $db->getNumOpereByArtistID(false, $artists[$i]["id_artista"])["tot"];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    </div>
</body>
</html>