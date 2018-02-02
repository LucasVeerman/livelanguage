<?php
/*** begin our session ***/
session_start();


/*** check the form token is valid ***/

/*** check the username is the correct length ***/
if (strlen( $_POST['category']) > 20 || strlen($_POST['category']) < 3)
{
    $message = 'Ongeldige lengte voor categorie.';
}


else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $name = filter_var($_POST['category'], FILTER_SANITIZE_STRING);


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
        $stmt = $dbh->prepare("INSERT INTO categories (id, name ) VALUES (NULL, :name )");

        /*** bind the parameters ***/
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
       echo "<meta http-equiv='refresh' content='0;URL=../index.php?action=home'/>";
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Categorie bestaat al';
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