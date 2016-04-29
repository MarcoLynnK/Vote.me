<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>
</head>
<body>

<h1> Neues Vorlesung anlegen:</h1>

<form action="LectureCreate_do.php" method="post">
    Vorlesung:<br>
    <input type="text" name="name_Lecture" id="name_Lecture" placeholder="Vorlesung"><br><br>
    Studiengang:<br>
    <input type="text" name="degreecourse" id="degreecourse" placeholder="Studiengang"><br><br>
    <input type='submit' value="anlegen">
</form>

</body>