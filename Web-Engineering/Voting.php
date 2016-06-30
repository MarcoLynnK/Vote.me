<?php
require_once ("Main/VotingManager.php");
require_once ("Main/VotingChanceManager.php");
require_once ("Main/Classes.php");

$ID_Voting= htmlspecialchars($_GET ["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting=$votingManager-> findById($ID_Voting);

$votingchanceManager= new VotingChanceManager();
$chance=$votingchanceManager->findAllChancesByVoting($voting);
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("include/HeadUser.php"); ?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<title>User Update</title>
<body>


<div id="navbar">

    <img src="img/logo2.svg" id="logo">

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="#">VOTING LIST</a>
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/VotingCreate_form_admin.php">CREATE VOTING</a>
            <a href="#">USER LIST</a>
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/UserCreate_form.php">CREATE USER</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>

<h2>Voting # <?php echo ($voting->name_Voting) ?> </h2>
<p>Frage: <?php echo ($voting->question_Voting)?></p>

<?php
echo '<form class="input-container" action="Result_do.php" method="post">';
        foreach ($chance as $eintrag)
        {
            $i=1;
            if (!empty ($eintrag))
            {
                $i = $i + 1;
                echo "<p>Möglichkeit $i:</p>";
                echo "<input type='checkbox' name='antwort' value='" . $eintrag->description_Chance . "'/></br>";
            }
        }
        echo '<input type="hidden" value="' . $ID_Voting . '" name="votingid">';
        echo '<input type="hidden" value="' . $ID_Chance . '" name="frageid">';
echo "</form>"?>

</body>
</html>
