<?php
$description_Chance= htmlspecialchars($_POST ['description_Chance'], ENT_QUOTES, "UTF-8");
$ID_Voting= htmlspecialchars($_POST ['ID_Voting'], ENT_QUOTES, "UTF-8");
$ID_Chance= htmlspecialchars($_POST ['ID_Chance'], ENT_QUOTES, "UTF-8");
$ID_Session= htmlspecialchars($_POST['ID_Session'], ENT_QUOTES, "UTF-8");

$resultManager= new ResultManager();
$result= $resultManager->create($ID_Voting, $ID_Chance, )

