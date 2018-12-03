<?php
try{
$club_name = null;
$ground = null;
$club_id = null;
if (!empty($_GET['club_id'])) {
    $club_id = $_GET['club_id'];
    //$db = new PDO('mysql:host=localhost;dbname=lab', 'root', '1234');
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200396470', 'gc20039647011', 'gU7vAlAkOm');
    $sql = "SELECT * FROM clubs WHERE club_id= :club_id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
    $cmd->execute();
    $c = $cmd->fetch();
    $club_name = $c['club_name'];
    $ground = $c['ground'];
    $db = null;
}

}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Club-From update error', $e);
    header('location:error.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<form method="post" action="save-club.php">
<h1> Clubs</h1>
<fieldset>
    <label for="club_name" class="club_name">
        Club Name: </label>
    <input name="club_name" id="club_name" required value="<?php echo $club_name;?>"/>
</fieldset>

<fieldset>
    <label for="ground"  class="ground">
     Ground: </label>
    <input name="ground" id="ground" required value="<?php echo $ground;?>" />
</fieldset>
    <button>Save</button>
    <input type="hidden" name="club_id" id="club_id" value="<?php echo $club_id; ?>"/>
</form>

<?php
require ('footer.php');
?>