<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clubs</title>
</head>
<body>
<a href="club_form.php">Add new value</a>
<?php
try {
    //$db = new PDO('mysql:host=localhost;dbname=lab', 'root', '1234');
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200396470', 'gc200396470', 'gU7vAlAkOm');
    $sql = "SELECT * FROM clubs";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $clubs = $cmd->fetchAll();
    echo '<table><thead> <th> Club Name</th> <th> Grounds</th> <th>Edit</th></thead>';
    foreach ($clubs as $c) {
        echo "<tr><td>{$c['club_name']}</td>
<td>{$c['ground']}</td>
<td><a href=\"club_form.php?club_id={$c['club_id']}\">Update</a> |
<a href=\"delete.php?club_id={$c['club_id']}\"
class = \"confirmation\">
Delete</a></td>
 </tr>";
    }

    echo '</table>';
    $db = null;
    require ('footer.php');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com', 'Lab2 Table error', $e);

    header('location:error.php');
}

?>

