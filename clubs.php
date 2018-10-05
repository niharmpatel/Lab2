<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>


<?php
$db = new PDO('mysql:host=localhost;dbname=lab','root','1234');

$sql = "SELECT * FROM clubs";
$cmd = $db->prepare($sql);
$cmd->execute();
$clubs = $cmd->fetchAll();


echo '<table class="table table-striped table-hover"><thead> <th> Club Name</th> <th> Grounds</th> <th>Updating</th></thead>';
foreach ($clubs as $c){
    echo"<tr>
    <td>{$c['club_name']}</td> 
    <td> {$c['ground']}</td>
    
    </tr>";
}

echo '</table>';
$db= null;
?>
</body>
</html>