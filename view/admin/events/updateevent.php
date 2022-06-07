<?php
require('../../../controller/admin/events/controller_updateevent.php');

?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Modifier l'évènement <?php echo $eventInfos['title'] ; ?></title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <script src="../../../scripts/admin/script_addevent.js"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    </head>

    <body>

        <!-- Add an Event form -->
        <form method="post">
    
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" name="title" placeholder="titre" required="required" value="<?php echo $eventInfos['title'] ;?>">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" placeholder="type" value="<?php echo $eventInfos['type'] ;?>">
            </div>

            <div class="mb-3">
                <label for="facebook_link" class="form-label">Lien Facebook</label>
                <input type="url" class="form-control" name="facebook_link" placeholder="Lien Facebook" value="<?php echo $eventInfos['facebook_link'] ;?>">
            </div>

            <div class="mb-3">
                <label for="thematic" class="form-label">Thème</label>
                <input type="text" class="form-control" name="thematic" placeholder="Thème" value="<?php echo $eventInfos['thematic'] ;?>">
            </div>

            <div class="mb-3">
                <label for="beginning" class="form-label">Début</label>
                <input type="datetime-local" class="form-control" name="beginning" placeholder="Début" required="required" value="<?php echo $beginningDate->format('Y-m-d') ; echo"T" ; echo $beginningDate->format('H:i')?>">
            </div>

            <div class="mb-3">
                <label for="ending" class="form-label">Fin</label>
                <input type="datetime-local" class="form-control" name="ending" placeholder="Fin" value="<?php echo $endingDate->format('Y-m-d') ; echo"T" ; echo $endingDate->format('H:i')?>">
            </div>

            <div class="mb-3">
                <label for="ticketing" class="form-label">Lien Billeterie</label>
                <input type="url" class="form-control" name="ticketing" placeholder="Billeterie" value="<?php echo $eventInfos['ticketing'] ;?>">
            </div>

            <div class="mb-3">
                <label for="emplacement_name" class="form-label">Nom du lieu de l'évènement</label>
                <input type="text" class="form-control" name="emplacement_name" placeholder="Lieu de l'évènement" value="<?php echo $eventInfos['emplacement_name'] ;?>">
            </div>

            <div class="mb-3">
                <label for="emplacement_facebook_link" class="form-label">Lien Facebook du lieu de l'évènement</label>
                <input type="url" class="form-control" name="emplacement_facebook_link" placeholder="Facebook du lieu de l'évènement" value="<?php echo $eventInfos['emplacement_facebook_link'] ;?>">
            </div>

            <div class="mb-3">
                <label for="emplacement_website" class="form-label">Site Web du lieu de l'évènement</label>
                <input type="url" class="form-control" name="emplacement_website" placeholder="Facebook du lieu de l'évènement" value="<?php echo $eventInfos['emplacement_website'] ;?>">
            </div>

            
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="address" placeholder="Adresse" value="<?php echo $eventInfos['address'] ;?>">
            </div>

            <div class="mb-3">
                <label for="address_link" class="form-label">Lien google map vers l'adresse</label>
                <input type="text" class="form-control" name="address_link" placeholder="Adresse" value="<?php echo $eventInfos['address_link'] ;?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description"><?php echo $eventInfos['description'] ;?></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Tarif</label>
                <input type="number" class="form-control" name="price" placeholder="Tarif" value="<?php echo $eventInfos['price'] ;?>">
            </div>

            <div class="mb-3">
                <label for="speaker_1" class="form-label">Intervenant 1</label>
                <select id="speaker_1" name="speaker_1" class="form-select">
                    <?php 
                        if(isset($speakerName[0])) { echo 
                            "<option>".$speakerName[0]."</option>
                            <option></option>"; 
                        } else { echo "<option></option>" ;}
            
                        foreach($speakers as $speaker) { 
                            echo "<option>".$speaker['name']."</option>";
                        } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="speaker_2" class="form-label">Intervenant 2</label>
                <select id="speaker_2" name="speaker_2" class="form-select">
                    <?php 
                        if(isset($speakerName[1])) { echo 
                            "<option>".$speakerName[1]."</option>
                            <option></option>"; 
                        } else { echo "<option></option>" ;}
            
                        foreach($speakers as $speaker) { 
                            echo "<option>".$speaker['name']."</option>";
                        } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="speaker_3" class="form-label">Intervenant 3</label>
                <select id="speaker_3" name="speaker_3" class="form-select">
                    <?php 
                        if(isset($speakerName[2])) { echo 
                            "<option>".$speakerName[2]."</option>
                            <option></option>"; 
                        } else { echo "<option></option>" ;}
            
                        foreach($speakers as $speaker) { 
                            echo "<option>".$speaker['name']."</option>";
                        } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="speaker_4" class="form-label">Intervenant 4</label>
                <select id="speaker_4" name="speaker_4" class="form-select">
                    <?php 
                        if(isset($speakerName[3])) { echo 
                            "<option>".$speakerName[3]."</option>
                            <option></option>"; 
                        } else { echo "<option></option>" ;}
            
                        foreach($speakers as $speaker) { 
                            echo "<option>".$speaker['name']."</option>";
                        } 
                    ?>
                </select>
            </div>

            <button type="submit" name="register" value="Ajouter" class="btn btn-primary">Ajouter</button>
        </form>


    
    </body>

</html>
