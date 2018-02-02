<a href="index.php?action=home">Ga terug</a>
<h2>Woorden toevoegen</h2>
<form action="./models/add_words_submit.php" method="post">
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
            <td><label for="accessCode">Category</label></td>
            <td><select name="category">
                    <?php foreach ($categoryList as $categoryData) {
                        echo "<option value='" . $categoryData['name'] . "'>" . $categoryData['name'] . "</option>";
                    }
                    ?>
                </select></td>

        </tr>
        <tr>
            <td><input type="submit" id="submit"name="submit_update" value="Submit"></td>
        </tr>
    </table>
</form>
</div>