<?php $title= "Connexion";
require "view_begin.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Email :<input type="text" name="email"></p>
        <p><input type="submit" value="Connexion"></p>
    </form>
    <p><a href="?controller=Connexion&action=register">Register</a></p>
</body>
</html>

<?php require "view_end.php"; ?>