<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


<script type="text/javascript" src="js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>

<script>
    // Die Funktion f�gt einen Click-Event der Klasse menu-icon hinzu
    // dieser wird dann immer abgespult, wenn auf einen bereich mit der klasse geklickt wird
    // anschlie�end kann man �ber $('........') die klasse bzw. die id ansprechen und bestimmte
    // Sachen machen, z.B. .css oder .removeClass, .addClass, .width, .innerHTML....
    $(function($) {
        $('.menu-icon').click(function() {
            // toggleClass macht das gleiche wie "addClass" und "removeClass", nur automatisch
            // wenn dropdown-content als weitere klasse "expand" hat, wird sie entfernt
            // wenn nicht, wird sie hinzugef�gt
            $('.menu-dropdown-content').toggleClass('showDropdown')
        })
    })
</script>


<!-- NAVIGATION -->


<div id="navbar">
    <img src="img/logo2.svg" id="logo">

    <div class="menu">
        <input type="image" class="menu-icon" src="img/sw_menu.png">
        <div class="menu-dropdown-content">
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/Voting_Index.php ">VOTING LIST</a>
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/VotingCreate_form.php">CREATE VOTING</a>
            <a href="#">LOG OUT</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/Voting_Index.php">VOTING LIST</a>
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/VotingCreate_form.php">CREATE VOTING</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>