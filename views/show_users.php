<body>
<style>
    .modaal-venster
    {
        position: fixed;
        z-index: 100;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        text-align: center;
    }

    .modaal-inhoud
    {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        border-radius: 10px;
    }

    .sluit-knop
    {
        color: red;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .sluit-knop:hover,
    .sluit-knop:focus
    {
        color: black;
        text-decoration: none;
        cursor: pointer;
        font-size: 35px;
    }
    #submit
    {
        float: none;
    }
    #addUserLink
    {
        cursor: pointer;
    }
    #addUserLink:hover
    {
        text-decoration: underline;
    }

</style>
<div class="menu">
    <h2>LIVE LANGUAGE &amp; CONCEPT</h2>
    <div class="logo">
        <a href="index.php?action=home"><img src="./img/logoflat.svg" id="logo" alt="logo"></a>
    </div>
    <div class="lijn">

    </div>
</div>
<div class="sidebar">
    <a href="?action=showUsers"><img src="./img/usersicon.svg" id="usersIcon" alt="users"></a>
    <hr>
    <a href="index.php?action=logout"><img src="./img/logouticon.svg" id="logout" alt="logout"></a>
    <hr>
</div>
<div class="content">

<?php

if(!isset($_SESSION["id"]))
{
    echo "Je moet ingelogd zijn om toegang tot deze pagina te krijgen";
}
else
{
    echo "<p id='addUserLink'><strong>Gebruikers toevoegen</strong></p>";
    echo '<h1>Alle gebruikers</h1>';
    //echo "voornaam" . "achternaam" . "email<br>";
    echo "<table class = 'tableUsers'>";
    echo "<tr>";
    echo "<td><strong>Voornaam</strong></td>";
    echo "<td><strong>Achternaam</strong></td>";
    echo "<td><strong>Email</strong></td>";
    echo "<td><strong>Bedrijf</strong></td>";
    echo "<td><strong>Taal</strong></td>";
    echo "<td><strong>Goedkeuring</strong></td>";
    foreach ($userList as $userData) {
        echo "<tr>";
        echo "<td>" . $userData['firstName'] . "</td>";
        echo "<td>" . $userData['lastName'] . "</td>";
        echo "<td>" . $userData['email'] . "</td>";
        echo "<td>" . $userData['company'] . "</td>";
        echo "<td>" . $userData['languages'] . "</td>";
        echo "<td>" . $userData['status'] . "</td>";
        echo "<td><a href='?action=edit&id=" . $userData['id'] . "'>Pas aan</a> </td>";
        echo "<td><a href='?action=delete_user&id=" . $userData['id'] . "'>Verwijder gebruiker</a> </td>";
        echo "<td><a href='?action=show_wordList&id=" . $userData['id'] . "'>Bekijk woordenlijst</a> </td>";

        echo "</tr>";

    }
    echo "</table>";
}
?>
    <div id="addUser">
    <h2>Gebruiker toevoegen</h2>
        <form action="./models/add_users_submit.php" method="post">

            <label for="firstName">Voornaam</label>
            <input type="text" id="firstName" name="firstName" value="" />

            <label for="lastName">Achternaam</label>
            <input type="text" id="lastName" name="lastName" value="" />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="" />


            <label for="company">Bedrijf</label>
            <input type="text" id="company" name="company" value="" />

            <label for="accessCode">Toegangscode</label>
            <input type="text" id="accessCode" name="accessCode" value="" />

            <label for="languages">Taal</label><br>
            <select id="languages" name="languages">
                    <option value="English">Engels</option>
                    <option value="Spanish">Spaans</option>
                    <option value="Dutch">Nederlands</option>

                </select><br>
            <label for="status">Goedkeuren</label><br>
            <select id="status" name="status">
                    <option value="activated">Geactiveerd</option>
                    <option value="disactivated">Niet geactiveerd</option>

                </select><br>

            <input type="submit" id="submit" name="submit_update" value="Submit">
            <input type="hidden" name="category[]" value="Introductie">
        </form>
</div>

</div>
</body>
