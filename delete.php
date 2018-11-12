<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
</head>
<body>
<?php
try {
    $club_id = $_GET['club_id'];

    if (empty($club_id)) {
        header('location:clubs.php');
    }

    //$db = new PDO('mysql:host=localhost;dbname=lab','root','1234');
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200396470', 'gc200396470', 'gU7vAlAkOm');

    $sql = "DELETE FROM clubs WHERE club_id=:club_id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
    $cmd->execute();
    $db = null;

    header('location:clubs.php');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Club-From delete error', $e);
    header('location:error.php');
}
?>
</body>
</html>