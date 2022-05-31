<?php
require('../../controller/admin/controller_addspeaker.php');

?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <title>Ajouter un intervant</title>
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
                    <input type="text" class="form-control" placeholder="Prénom" name="firstname">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Nom" name="lastname">
                </div>
            </div>

            <!-- Job and company -->
            <div class="row">
                <div class="col">
                <input type="text" class="form-control" placeholder="Métier" name="job">
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Entreprise" name="company">
                </div>
            </div>

            <!-- Website and instagram -->
            <div class="row">
                <div class="col">
                <input type="text" class="form-control" placeholder="Site Web" name="website">
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Instagram" name="instagram">
                </div>
            </div>

            <!-- linkedin and facebook -->
            <div class="row">
                <div class="col">
                <input type="text" class="form-control" placeholder="LinkedIn" name="linkedin">
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Facebook" name="facebook">
                </div>
            </div>

            <!-- phone and email -->
            <div class="row">
                <div class="col">
                <input type="text" class="form-control" placeholder="Mobile" name="contact_phone">
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="Email" name="contact_email">
                </div>
            </div>

            <input type="submit" value="enregistrer" name="register">


        </form>
    
    </body>

</html>
