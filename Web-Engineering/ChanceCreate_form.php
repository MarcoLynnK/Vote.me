<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>
</head>
<body>

<h1> Neue Möglichkeit anlegen:</h1>

<form action="ChanceCreate_do.php" method="post">
    Möglichkeit:<br>
    <input type="text" name="description_Chance" id="description_Chance" placeholder="Beschreibung"><br><br>
    <input type='submit' value="anlegen">
</form>

</body>