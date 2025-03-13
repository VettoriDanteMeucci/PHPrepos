<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php 
        include_once "./dbHandler/DB.php";
        $db = new DB();
    ?>

<div class="row">
    <!-- search -->
    <div class="col-5 mx-auto" method="post">
        <select class="form-control w-50 mx-auto" name="artist" id="search">
            <?php 
                $artists = $db->fetchArtists();
                foreach($artists as $artist){
                    ?>
                        <option <?php echo "value='". $artist['id_artista'] ."'";?>>
                            <?php 
                                echo $artist['nome_artista'] . " " . $artist['cognome_artista'];
                            ?>
                        </option>
                    <?php
                }
            ?>
            </select>
            </div>
        <!-- Results -->
        <div class="col-6 mx-auto">
            <table class="table text-center" id="filter">
                <tr>
                    <th colspan="2">
                        Opere
                    </th>
                </tr>
                <?php 
                foreach($artists as $artist){
                    $opere = $db->fetchOpereArtist($artist["id_artista"]);
                    foreach($opere as $opera){
                        ?>
                            <tr <?php echo "data-artist='$opera[id_artista]'"; ?>>
                                <td><?php echo $opera["nome_opera"]; ?></td>
                                <td><?php echo $opera["tipo_opera"]; ?></td>
                            </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>

        <div class="col-11 border rounded mx-auto p-3">
            <form action="./actions/deleteOpera.php" method="POST">
                <label for="">Opera da eliminare</label>
                <select required class="form-control" name="delete">
                    <?php 
                        $related = $db->fetchAllOpereWithArtist();
                        foreach($related as $rel){
                            echo "<option value='"
                             . $rel['id_opera'] .
                            "'>$rel[nome_opera] ($rel[nome_artista] $rel[cognome_artista])</option>";
                        }
                    ?>
                </select>
                <button class="btn btn-danger mt-3">
                    Elimina
                </button>
            </form>
        </div>
    </div>

    <script src="./script/searchArtist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>