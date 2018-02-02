<a href="index2.php">Ga terug</a>
<h2>Add words</h2>
<form action="./models/make_wordlist_submit.php" method="post">
    <table>
        <tr>
            <td><label for="Dutch">Nederlands</label></td>
            <td><input type="text" id="Dutch" name="Dutch" value="" /></td>
        </tr>
        <tr>
            <td><label for="English">English</label></td>
            <td><input type="text" id="English" name="English" value="" /></td>
        </tr>
        <tr>
            <td><label for="Spanish">Spanish</label></td>
            <td><input type="text" id="Spanish" name="Spanish" value="" /></td>
        </tr>
        <tr>
            <td><input type="submit" id="submit" name="submit_update" value="Submit"></td>
        </tr>
    </table>
</form>
<?php
echo "<h3>Alle woorden</h3>";
echo "<table>";
foreach ($wordList2 as $wordData2) {

    echo "<tr>";
    echo "<td>" . $wordData2['Dutch'] . "</td>";
    echo "<td>" . $wordData2['English'] . "</td>";
    echo "<td>" . $wordData2['Spanish'] . "</td>";
    echo "<td><a href='?action=delete_word2&id=" . $wordData2['id'] . "'>Verwijder woord</a></td>";

    echo "</tr>";

}
echo "</table>";
?>