<?php

?>

<?php
require('../../../controller/admin/speakers/controller_deletespeakers.php');


?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Supprimer </title>
    <!-- <link rel="stylesheet" href="style.css">
    <script src="script.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <p>Êtes vous sûr de vouloir supprimer l'intervenant ?</p>
        <form method="post">
            <input type="submit" name="confirm_delete" value="Confirmer la suppression">
        </form>
    
    </body>

</html>
