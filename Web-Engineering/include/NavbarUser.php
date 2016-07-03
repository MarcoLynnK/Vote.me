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


<!-- NAVIGATION User-->


<div id="navbar">
    <img src="img/logo2.svg" id="logo">

    <div class="menu">
        <input type="image" class="menu-icon" src="img/sw_menu.png">
        <div class="menu-dropdown-content">
            <a href="Voting_Index.php">VOTING LIST</a>
            <a href="Lecture_index.php">LECTURE LIST</a>
            <a href="Chance_Index.php">CHANCE LIST</a>
            <a href="LogOut_do.php">LOG OUT</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="Voting_Index.php">VOTING LIST</a>
            <a href="Lecture_index.php">LECTURE LIST</a>
            <a href="Chance_Index.php">CHANCE LIST</a>
        </div>
    </div>

    <a href="LogOut_do.php">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>