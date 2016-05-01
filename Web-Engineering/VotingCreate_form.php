<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>

<h1> Neues Voting anlegen:</h1>

<form action="VotingCreate_do.php" method="post">
    Votingthema:<br>
    <input class="inputForm" type="text" name="name_Voting" id="name_Voting" placeholder="Votingthema"><br><br>
    Frage:<br>
    <input class="inputForm" type="text" name="question_Voting" id="question_Voting" placeholder="Frage"><br><br>
    <input class="submit" type='submit' value="anlegen">
</form>

</body>
</html>