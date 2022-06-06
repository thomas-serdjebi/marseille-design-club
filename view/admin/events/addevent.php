<?php
require('../../../controller/admin/events/controller_addevent.php');

?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Ajouter un évènement</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="../../../scripts/admin/script_addevent.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    </head>

    <body>

        <!-- Add an Event form -->
        <form method="post">
    
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" name="title" placeholder="titre" required="required">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" placeholder="type">
            </div>

            <div class="mb-3">
                <label for="facebook_link" class="form-label">Lien Facebook</label>
                <input type="url" class="form-control" name="facebook_link" placeholder="Lien Facebook">
            </div>

            <div class="mb-3">
                <label for="thematic" class="form-label">Thème</label>
                <input type="text" class="form-control" name="thematic" placeholder="Thème">
            </div>

            <div class="mb-3">
                <label for="beginning" class="form-label">Début</label>
                <input type="datetime-local" class="form-control" name="beginning" placeholder="Début" required="required">
            </div>

            <div class="mb-3">
                <label for="ending" class="form-label">Fin</label>
                <input type="datetime-local" class="form-control" name="ending" placeholder="Fin">
            </div>

            <div class="mb-3">
                <label for="ticketing" class="form-label">Lien Billeterie</label>
                <input type="url" class="form-control" name="ticketing" placeholder="Billeterie">
            </div>

            <div class="mb-3">
                <label for="emplacement_name" class="form-label">Nom du lieu de l'évènement</label>
                <input type="text" class="form-control" name="emplacement_name" placeholder="Lieu de l'évènement">
            </div>

            <div class="mb-3">
                <label for="emplacement_facebook_link" class="form-label">Lien Facebook du lieu de l'évènement</label>
                <input type="url" class="form-control" name="emplacement_facebook_link" placeholder="Facebook du lieu de l'évènement">
            </div>

            <div class="mb-3">
                <label for="emplacement_website" class="form-label">Site Web du lieu de l'évènement</label>
                <input type="url" class="form-control" name="emplacement_website" placeholder="Facebook du lieu de l'évènement">
            </div>

            
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="address" placeholder="Adresse">
            </div>

            <div class="mb-3">
                <label for="address_link" class="form-label">Lien google map vers l'adresse</label>
                <input type="text" class="form-control" name="address_link" placeholder="Adresse">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Tarif</label>
                <input type="number" class="form-control" name="price" placeholder="Tarif">
            </div>

            <div class="mb-3">
                <label for="speaker_1" class="form-label">Intervenant 1</label>
                <select id="speaker_1" name="speaker_1" class="form-select">
                    <option></option>
                    <?php foreach($speakers as $speaker) { 
                        echo "<option>".$speaker['name']."</option>";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="speaker_2" class="form-label">Intervenant 2</label>
                <select id="speaker_2" name="speaker_2" class="form-select">
                    <option></option>
                    <?php foreach($speakers as $speaker) { 
                        echo "<option>".$speaker['name']."</option>";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="speaker_3" class="form-label">Intervenant 3</label>
                <select id="speaker_3" name="speaker_3" class="form-select">
                    <option></option>
                    <?php foreach($speakers as $speaker) { 
                        echo "<option>".$speaker['name']."</option>";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="speaker_4" class="form-label">Intervenant 4</label>
                <select id="speaker_4" name="speaker_4" class="form-select">
                    <option></option>
                    <?php foreach($speakers as $speaker) { 
                        echo "<option>".$speaker['name']."</option>";
                    } ?>
                </select>
            </div>

            <button type="submit" name="register" value="Ajouter" class="btn btn-primary">Ajouter</button>
        </form>


    
    </body>

</html>
