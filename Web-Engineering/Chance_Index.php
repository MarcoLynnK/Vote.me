<?php include ("Main/Session_Check.php");?>
<!DOCTYPE html>
<html>
<?php
require_once("Main/Classes.php");
require_once("Main/ChanceManager.php");
?>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Chance Index</title>
<body>

<?php require_once("include/Navbar.php");?>

<div class="container">
    <center><div class="tableText">Chances</div></br></center>
    <table  class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Description</th>
            <th>Settings</th>
        </thead>
        <tbody>
            <?php
                $chanceManager = new ChanceManager();

                // Rechte aus der Session holen
                $rights = $_SESSION["ID_Rights"];

                // User aus der Session holen
                $user = $_SESSION["user"];
            
                // If-Statement prüft, ob der User Admin (1) ist.
                if ($rights == 1) 
                {
                    $list = $chanceManager->findAll();
                } 
                
                //andernfalls ist der User Dozent und sieht nur seine Eigenen erstellten Möglichkeiten
                else 
                {
                    $list = $chanceManager->findAllbyIDUser($user->ID_User);
                }

                //Auslesen aller Chances je nach Recht (Admin oder User)
                if (is_array($list)) {

                    foreach ($list as $chance) {
                        echo "<tr>";
                        echo "<td>$chance->ID_Chance</td>";
                        echo "<td>$chance->description_Chance</td>";
                        echo "<td>
                                <a href='ChanceRead.php?ID_Chance=$chance->ID_Chance' class='btn btn-success btn-xs'><input type='image' class='editicons' src='img/view.svg'></a>&nbsp;
                                <a href='ChanceUpdate_form.php?ID_Chance=$chance->ID_Chance' class='btn btn-info btn-xs'><input type='image' class='editicons' src='img/edit.svg'></a>&nbsp;
                                <a href='ChanceDelete_do.php?ID_Chance=$chance->ID_Chance' class='btn btn-info btn-danger btn-xs'><input type='image' class='editicons' src='img/trash.svg'></a>
                            </td>";
                        echo "</tr>";
                    }

                } else {
                    echo "You have no content. Please create new content.";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
