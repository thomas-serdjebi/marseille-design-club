<?php
require('../../../controller/admin/gallery/controller_uploadimage.php');


?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Gallerie</title>
    <!-- <link rel="stylesheet" href="style.css">
    <script src="script.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <h1>Ajouter une image à la gallerie</h1>

        <form method="post" action="#" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="image" class="form-label">Image *</label>
                <input type="file" name="picture[]" required="required" multiple="multiple">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Titre *</label>
                <input type="text" name="title" required="required">
            </div>
            <div class="mb-3">
                <label for="caption" class="form-label">Légende *</label>
                <input type="text" name="caption" placeholer="légende">
            </div>
            <div class="mb-3">
                <label for="display" class="form-label">Afficher dans la gallerie</label>
                <select name="display">
                    <option>Oui</option>
                    <option>Non</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="event" class="form-label">A quel évènement cette photo a-t'elle été prise ?</label>
                <select name="event">
                    <option></option>
                    <?php foreach ($events as $event) { echo "<option>".$event['title']."</option>" ;} ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="speaker" class="form-label">Cette photo est-elle celle d'un intervenant ?</label>
                <select name="speaker">
                    <option></option>
                    <?php foreach($speakers as $speaker) { echo "<option>".$speaker['name']."</option>";}?>
                    
                </select>
            </div>

            <input type="submit" name="upload" value="Ajouter à la gallerie">

        </form>
    </body>

</html>
