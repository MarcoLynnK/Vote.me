<?php include ("include/qrlib.php"); 

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

ob_start ("callback");

$link= 'https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/Voting.php?ID_Voting='.$ID_Voting;

$debugLog = ob_get_contents();
ob_end_clean();

QRcode::png($link);

?>