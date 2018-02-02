<?php



/*** begin our session ***/
//session_start();

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );
//debug
//var_dump($form_token);
/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>
<?php
if(isset($_SESSION["id"])){
    $user = $_SESSION["id"];
    echo "<br>al ingelogd";
}


else {
    echo "
<div class='container'>
    <div class='row'>
        <h2>Klant worden</h2>
        <form action='./models/register_submit.php' method='post'>
            <table>
                <tr>
                    <td>Voornaam</td>
                    <td><input type='text' id='firstname' name='firstName' value='' maxlength='20' /></td>
                </tr>
                <tr>
                    <td>Achternaam</td>
                    <td><input type='text' id='lastname' name='lastName' value='' maxlength='20' /></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type='email' id='email' name='email' value='' /></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type='password' id='password' name='password' value='' maxlength='20' /></td>
                </tr>
                <tr>
                    <td>Toegangs code</td>
                    <td><input type='accessCode' id='accessCode' name='accessCode' value='' maxlength='20' /></td>
                </tr>

                <tr>
                    <td><input type='hidden' name='form_token'
                           value=  $form_token  />
                    <input type='submit' value='Registreer' /></td>
                </tr>
            </table>
        </form>
    </div>
</div>";
}
