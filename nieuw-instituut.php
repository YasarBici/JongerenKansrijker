<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instituut Toevoegen</title>
    </head>
    <body>

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){

            require_once '../database.php';

            $db = new database();
            
            $sql = "INSERT INTO instituut VALUES (:id, :naam, :telefoonnummer)";

            $placeholders = [
                'id'=>NULL,
                'naam'=>$_POST['instituut'],
                'telefoonnummer'=>$_POST['telefoonnummer']
            ];
            $db->insert($sql, $placeholders, 'overzicht-instituut');
        }
        ?>

        <form action="nieuw-instituut.php" method="post">
            <label for="instituut">Instituut</label><br>
            <input type="text" name="instituut" required><br>
            <label for="telefoonnummer">Telefoonnummer</label><br>
            <input type="text" name="telefoonnummer"><br>
            <input type="submit" value="Instituut Toevoegen">
        </form>

    </body>
</html>