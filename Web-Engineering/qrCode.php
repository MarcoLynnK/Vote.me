<?php include ("include/qrlib.php"); 
/*
  * Skript für QR-Code Generierung (Blackbox)
  */
$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

ob_start ("callback");

/*
 * Ablegen des Links mit relevanter VotingID in$link
 */
$link= 'https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/Voting.php?ID_Voting='.$ID_Voting;

$debugLog = ob_get_contents();
ob_end_clean();
/*
 * erstellen des QR codes mit Link
 */
QRcode::png($link);

?>

