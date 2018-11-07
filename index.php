<?php

session_start();

include_once 'Functions/fonctions.php';

$_SESSION['idUser'] = 1;

?>

<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet comptabilité en PHP/MYSQL</title>
</head>
<body>

<?php
include_once('bankAccountForm.php');
?>

</body>
</html>