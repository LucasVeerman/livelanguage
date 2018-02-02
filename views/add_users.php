<a href="index.php?action=home">Ga terug</a>
<h2>Gebruikers toevoegen</h2>
    <form action="./models/add_users_submit.php" method="post">
        <table>
            <tr>
                <td><label for="firstName">Voornaam</label></td>
                <td><input type="text" id="firstName" name="firstName" value="" /></td>
            </tr>
            <tr>
                <td><label for="lastName">Achternaam</label></td>
                <td><input type="text" id="lastName" name="lastName" value="" /></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" value="" /></td>
            </tr>
            <tr>
                <td><label for="company">Bedrijf</label></td>
                <td><input type="text" id="company" name="company" value="" /></td>
            </tr>
            <tr>
                <td><label for="accessCode">Toegangscode</label></td>
                <td><input type="text" id="accessCode" name="accessCode" value="" /></td>
            </tr>
            <tr>
                <td>Taal</td>
                <td><select name="languages">
                        <option value="English">Engels</option>
                        <option value="Spanish">Spaans</option>
                        <option value="Dutch">Nederlands</option>

                    </select></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><select name="status">
                        <option value="activated">Geactiveerd</option>
                        <option value="disactivated">Niet geactiveerd</option>

                    </select></td>
            </tr>

            <tr>
                <td><input type="submit" id="submit" name="submit_update" value="Submit"></td>
            </tr>
        </table>
        <input type="hidden" name="category[]" value="Introductie">
    </form>
</div>