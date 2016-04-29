<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>
</head>
<body>

<h1> Neues Voting anlegen:</h1>

<form action="VotingCreate_do.php" method="post">
    Votingthema:<br>
    <input type="text" name="name_Voting" id="name_Voting" placeholder="Votingthema"><br><br>
    Frage:<br>
    <input type="text" name="question_Voting" id="question_Voting" placeholder="Frage"><br><br>
    <input type='submit' value="anlegen">
</form>

</body>