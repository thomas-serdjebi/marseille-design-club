<?php
require('../../../controller/admin/speakers/controller_updatespeaker.php');


?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Modifier les infos de <?php echo $speaker['name'] ; ?> </title>
    <!-- <link rel="stylesheet" href="style.css">
    <script src="script.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <!-- Add a Speaker form -->
        <form method="post">
    
            <!-- Firstname and lastname -->
            <div class="row">

                <div class="col">
                <label for="lastname">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" name="name" value ="<?php echo $speaker['lastname'] ; ?>">
                </div>
            </div>

            <!-- Job and company -->
            <div class="row">
                <div class="col">
                    <label for="job">Métier</label>
                    <input type="text" class="form-control" placeholder="Métier" name="job" value ="<?php echo $speaker['job'] ; ?>">
                </div>
                <div class="col">
                    <label for="company">Entreprise</label>
                    <input type="text" class="form-control" placeholder="Entreprise" name="company" value ="<?php echo $speaker['company'] ; ?>">
                </div>
            </div>

            <!-- Website and instagram -->
            <div class="row">
                <div class="col">
                    <label for="website">Site Web</label>
                    <input type="url" class="form-control" placeholder="Site Web" name="website" value ="<?php echo $speaker['website'] ; ?>">
                </div>
                <div class="col">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" placeholder="Instagram" name="instagram" value ="<?php echo $speaker['instagram'] ; ?>">
                </div>
            </div>

            <!-- linkedin and facebook -->
            <div class="row">
                <div class="col">
                    <label for="linkedin">LinkedIn</label>
                    <input type="url" class="form-control" placeholder="LinkedIn" name="linkedin" value ="<?php echo $speaker['linkedin'] ; ?>">
                </div>
                <div class="col">
                    <label for="firstname">Facebook</label>
                    <input type="url" class="form-control" placeholder="Facebook" name="facebook" value ="<?php echo $speaker['facebook'] ; ?>">
                </div>
            </div>

            <!-- phone and email -->
            <div class="row">
                <div class="col">
                    <label for="contact_phone">Téléphone</label>
                    <input type="text" class="form-control" placeholder="Mobile" name="contact_phone" value ="<?php echo $speaker['contact_phone'] ; ?>">
                </div>
                <div class="col">
                    <label for="contact_email">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="contact_email" value ="<?php echo $speaker['contact_email'] ; ?>">
                </div>
            </div>

            <input type="submit" value="enregistrer" name="register">


        </form>

        <a href="deletespeaker.php?id=<?php echo $speaker['id'] ; ?>"><button>Supprimer</button></a>
    
    </body>

</html>
