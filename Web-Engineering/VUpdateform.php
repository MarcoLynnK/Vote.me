<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
<?php require_once("include/NavbarUser.php"); ?>

<a>Voting Nr. <?php echo ($voting->ID_Voting) ?></a>

<form action='VotingUpdate_do.php' method='post'>
    <input class="inputForm" type='hidden' name='ID_Voting' value='<?php echo ($voting->ID_Voting) ?>' />
    <a class="text">Thema des Votings:</a></br>
    <input class="inputForm" type='text' name='name_Voting' value='<?php echo ($voting->name_Voting) ?>' placeholder="Topic" /><br>
    <a class="text">Frage:</a></br>
    <input class="inputForm" type='text' name='question_Voting' value='<?php echo ($voting->question_Voting) ?>' placeholder="Question" /><br>
    <a href='Voting_Index.php'><div class='submit'>UPDATE</div></a>"
</form>

</body>
</html>