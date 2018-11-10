<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php
try {
    $club_name = $_POST['club_name'];
    $ground = $_POST['ground'];
    $club_id = $_POST['club_id'];

    $ok = true;

    if (empty($club_name)) {
        echo "Please enter Club name";
        $ok = false;
    }
    if (empty($ground)) {
        echo "Please enter name of the ground";
        $ok = false;
    }

    if ($ok) {
        //$db = new PDO('mysql:host=localhost;dbname=lab', 'root1', '1234');
        $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200396470', 'gc200396470', 'gU7vAlAkOm');
        if (empty($club_id)) {
            $sql = "INSERT INTO clubs (club_name, ground) VALUES (:club_name, :ground)";
        } else {
            $sql = "UPDATE clubs SET club_name =:club_name, ground =:ground WHERE club_id=:club_id";
        }

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':club_name', $club_name, PDO::PARAM_STR, 50);
        $cmd->bindParam(':ground', $ground, PDO::PARAM_STR, 50);

        if (!empty($club_id)) {
            $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
        }

        $cmd->execute();

        $db = null;


        header('location:clubs.php');
    }
}
catch (Exception $e){
    mail('niharmpatel@gmail.com', 'lab  Saving error', $e);
    header('location:404.php');
}
?>
</body>
</html>