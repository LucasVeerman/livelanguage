<?php

/*** begin our session ***/
//session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['accessCode']))
{
    $message = 'Please enter a valid username and password';
}

else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $accessCode = filter_var($_POST['accessCode'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $accessCode = sha1( $accessCode );

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

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT * FROM users
                    WHERE accessCode = :accessCode");

        /*** bind the parameters ***/
        $stmt->bindParam(':accessCode', $accessCode, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($id == false)
        {
            echo "Login failed";
        }
        /*** if we do have a result, all is well ***/
        else
        {
            /*** set the session user_id variable ***/
            $_SESSION['id'] = $id;
            echo "<meta http-equiv='refresh' content='0;URL=./index.php?action=game&id=" . $_SESSION['id'] . "'/>";
            /*** tell the user we are logged in ***/
            $_SESSION['counter'] = 0;
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}





