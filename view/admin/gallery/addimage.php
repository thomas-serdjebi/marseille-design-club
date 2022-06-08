<?php
require('../../../controller/admin/gallery/controller_addimage.php');


?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Ajouter un intervant</title>
    <!-- <link rel="stylesheet" href="style.css">
    <script src="script.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <h1>Télécharger une image</h1>

        <form enctype="multipart/form-data" action="#" method="post">
            <input type="hidden" name="max_file_size" value="250000"/>
            <input type="file" name="fic" size=50/>
            <input type="text" name="caption" placeholder="Légende">
            <select name="img_use">
                <option>Bannière évènement</option>
                <option>Gallerie évèement</option>
            </select>
            <select name="id_event">
                <?php foreach($events as $event) {
                    echo "<option>".$event['title']."</option>";
                }?>
            </select>
            <input type="submit" value="Envoyer">

        </form>


    </body>

</html>
