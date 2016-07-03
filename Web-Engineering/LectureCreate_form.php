<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>

<?php include("include/NavbarUser.php");

 ?>
<form action="LectureCreate_do.php" method="post">
    <input class="inputForm" type="text" name="name_Lecture" placeholder="Lecture"><br><br>
    <input class="inputForm" type="text" name="degreecourse" placeholder="Degreecourse"><br><br>
    <input class="submit" type='submit' value="CREATE LECTURE">
</form>

</body>