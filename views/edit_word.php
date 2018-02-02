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
    echo "<a href='index.php?action=home'>Ga terug</a>";
    echo "<form action='./models/update_word.php' method='post'>";


    echo "<table id='userTable'>";
    echo "<tr>";
    echo "<td><input type='hidden' class='textField' name='id' value='" . $wordList['id'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Nederlands</td>";
    echo "<td><input type='text' class='textField' name='Dutch' value='" . $wordList['Dutch'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Engels</td>";
    echo "<td><input type='text' class='textField' name='English' value='" . $wordList['English'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Spaans</td>";
    echo "<td><input type='text' class='textField' name='Spanish' value='" . $wordList['Spanish'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><label for='category'>Category</label></td>";
    echo "<td><select name='category'>";
    foreach ($categoryList as $categoryData) {
        echo "<option value='" . $categoryData['name'] . "'>" . $categoryData['name'] . "</option>";
    };
    echo "</select></td>";
    echo "</tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type='submit' id='submit' name='submit_update' value='Submit'>";

    echo "</form>";
}

