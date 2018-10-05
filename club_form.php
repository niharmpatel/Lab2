<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<from method="post" action="save-club.php">
<h1> Clubs</h1>
<fieldset>
    <label for="club_name" class="club_name">
        Club Name: </label>
    <input name="club_name" id="club_name" required ="<?php echo $club_name;?>" />
</fieldset>

<fieldset>$ground
    <label for="ground"  class="ground">
     Ground: </label>
    <input name="ground" id="ground" required  ="<?php echo $ground;?>" />
</fieldset>
    <button class="col-md-offset-1 btn btn-primary"> Save</button>
    <input type="hidden" name="club_id" id="club_id" value="<?php echo $club_id; ?>" />
    </form>
</from>
</body>
</html>
<?php
$clubName = null;
$ground = null;
if (!empty($_GET['club_id'])) {
    $club_id=$_GET['Club_id'];
    $db = new PDO('mysql:host=localhost;dbname=lab', 'root', '1234');
    $sql = "SELECT * FROM lab WHERE club_id= :club_id ";
    $cmd = $db->prepare($sql);
    $cmd->bindParam('club_id', $club_id, PDO::PARAM_INT);
    $cmd->execute();
    $c = $cmd->fetch();

    $clubName = $c['club-name'];
    $ground = $c['ground'];
    $db = null;
}
?>