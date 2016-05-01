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
    <a id="text">Neue Möglichkeit anlegen:</a></br></br>

    Möglichkeit:<br>
    <input type="text" name="description_Chance" id="description_Chance" placeholder="Beschreibung"><br><br>
    <input type='submit' value="anlegen">
</form>
</div>

</body>