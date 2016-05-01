<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php
    require_once ('include/header.php')
    ?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>

<div id="Container">

<form action="ChanceCreate_do.php" method="post">
    <a class="NewPos">Neue Möglichkeit anlegen:</a></br></br></br>

    <input type="text" name="description_Chance" id="description_Chance" class="inputForm" placeholder="Beschreibung"><br><br>
    <input class="submit" type='submit' value="anlegen">
</form>
</div>

</body>