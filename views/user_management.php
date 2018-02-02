<style>
    #userTable{
        width: 80%;
        border-collapse: collapse;
        text-align: left;
    }
    #userTablel th, td{
        border: none;
    }
    #submit
    {
        float: none;
    }
</style>
<?php
if(!isset($_SESSION["id"]))
{
    echo "<meta http-equiv='refresh' content='0;URL=login.php?action=adminLogin'>";
//    echo "niet ingelogd";
}
else{
    echo "<a href='index.php?action=showUsers'>Ga terug</a>";
    echo "<form action='./models/update.php' method='post'>";


    echo "<table id='userTable'>";
    echo "<tr>";
    echo "<td><input type='hidden' class='textField' name='id' value='" . $userList['id'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Voornaam</td>";
    echo "<td><input type='text' class='textField' name='firstName' value='" . $userList['firstName'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Achternaam</td>";
    echo "<td><input type='text' class='textField' name='lastName' value='" . $userList['lastName'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Bedrijf</td>";
    echo "<td><input type='text' class='textField' name='company' value='" . $userList['company'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input type='hidden' class='textField' name='email' value='" . $userList['email'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Toegangscode</td>";
    echo "<td><input type='text' class='textField' name='accessCode' value='' placeholder='Nieuwe toegangscode'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Taal</td>";
    echo "<td><select name='languages'>";
    echo "<option value='English'>Engels</option>";
    echo "<option value='Spanish'>Spaans</option>";
    echo "<option value='Dutch'>Nederlands</option>";
    echo "</select></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Categorieën</td>";
    foreach ($categoryList as $categoryData) {
        echo "<td><input type='checkbox' name='category[]' value='" . $categoryData['name'] . "'/>" . $categoryData['name'] . "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>Status</td>";
    echo "<td><select name='status' id='status'>";
    echo "<option value='" . $userList['status'] . "'>Momenteel: " . $userList['status'] . "</option>";
    echo "<option value='activated'>Geactiveerd</option>";
    echo "<option value='disactivated'>Niet geactiveerd</option>";
    echo "</td>";
    echo "</tr>";


    echo "</table>";
    echo "<br>";
    echo "<input type='submit' id='submit' name='submit_update' value='Submit'>";

    echo "</form>";
}

