<?php
if(isset($_SESSION["id"])){
    $user = $_SESSION["id"];
    echo "<br>al ingelogd";
}
else{
    echo "<div class='login2'>";
    echo "<img src='./img/logo.png' id='logoGroot' alt='Logo'>";
    echo "<form action='?action=adminLogin_submit' method='post'>";
    echo "<br>";
    echo "<b>Email:</b>";
    echo "<input type='email' name='email' autofocus>";
    echo "<b>Wachtwoord</b>";
    echo "<input type='password' name='password'>";
    echo "<input type='submit' id='submit' value='Log in'>";
    echo "</form>";

    echo "</div>";
}
?>
