<?php include ("Main/Session_Check.php");?>
<!DOCTYPE html>
<html>
<head>

        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


        <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>

</head>

<title>User Delete</title>

<body>
<?php
require_once("include/Navbar.php");
?>
<h1 class="topic">Wollen sie den User wirklich löschen?</h1>
<br><br>
<a href="UserDelete_do.php"><button class="submit" name="Yes">Yes</button></a><br><br>
<a href="User_Index.php"><button class="submit" name="no">No</button></a>

</body>