<?php
require_once ("Main/ChanceManager.php");
require_once ("Main/Classes.php");

$ID_Chance = (int)htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");
$ChanceManager = new ChanceManager();
$chance = $ChanceManager->findById($ID_Chance);

?>

<!DOCTYPE html>
<html>
<?php include("include/header.php"); ?>

<body>

<h1>Eintrag # <?php echo ($chance->ID_Chance) ?></h1>

    <form action='ChanceUpdate_do.php' method='post'>
        <input type='hidden' name='ID_Chance' value='<?php echo ($chance->ID_Chance) ?>' />
        Beschreibung der Auswahlmöglichkeit:<br>
        <input type='text' name='description_Chance' value='<?php echo ($chance->description_Chance) ?>' /> <br>
        <input type='submit' value='aktualisieren' />
    </form>


</body>
</html>