<?php
/*** begin our session ***/
session_start();


/*** check the form token is valid ***/

/*** check the username is the correct length ***/
if (strlen( $_POST['Dutch']) > 20 || strlen($_POST['Dutch']) < 2)
{
    $message = 'Geen geldige lengte voor het Nederlandse woord.';
}
elseif (strlen( $_POST['English']) > 20 || strlen($_POST['English']) < 2)
{
    $message = 'Geen geldige lengte voor het Engelse woord.';
}
elseif (strlen( $_POST['Spanish']) > 20 || strlen($_POST['Spanish']) < 2)
{
    $message = 'Geen geldige lengte voor het Spaanse Woord.';
}

else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $Dutch = filter_var($_POST['Dutch'], FILTER_SANITIZE_STRING);
    $English = filter_var($_POST['English'], FILTER_SANITIZE_STRING);
    $Spanish = filter_var($_POST['Spanish'], FILTER_SANITIZE_STRING);
    $user_id = $_SESSION['id'];


    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = '';

    /*** database name ***/
    $mysql_dbname = 'livelanguage';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the inszzert ***/
        $stmt = $dbh->prepare("INSERT INTO words2 (id, Dutch, English, Spanish, user_id ) VALUES (NULL, :Dutch, :English, :Spanish, :user_id )");

        /*** bind the parameters ***/
        $stmt->bindParam(':Dutch', $Dutch, PDO::PARAM_STR);
        $stmt->bindParam(':English', $English, PDO::PARAM_STR);
        $stmt->bindParam(':Spanish', $Spanish, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);



        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
        echo "<meta http-equiv='refresh' content='0;URL=../index.php?action=makeList'/>";
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later';
        }
    }
}
?>

<html>
<head>
    <title>Login</title>
</head>
<body>
</body>
</html>

