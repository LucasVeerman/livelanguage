<?php
/*** begin our session ***/
session_start();


/*** check the form token is valid ***/

/*** check the username is the correct length ***/
if (strlen( $_POST['firstName']) > 20 || strlen($_POST['firstName']) < 4)
{
    $message = 'Incorrect Length for Username';
}

/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['firstName']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/

else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
    $password = "NULL";
    $accessCode = filter_var($_POST['accessCode'], FILTER_SANITIZE_STRING);
    $wordLists = json_encode($_POST['category'], FILTER_SANITIZE_STRING);
    $languages = filter_var($_POST['languages'], FILTER_SANITIZE_STRING);
    $rights = "user";
    $status = "activated";

    /*** now we can encrypt the password ***/
    $accessCode = sha1( $accessCode);

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
        $stmt = $dbh->prepare("UPDATE users SET firstName='$firstName', lastName='$lastName', company='$company', accessCode='$accessCode', wordLists='$wordLists', languages='$languages', status='$status' WHERE id='$id'");

        /*** bind the parameters ***/
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
        $stmt->bindParam(':company', $company, PDO::PARAM_STR);
        $stmt->bindParam(':accessCode', $accessCode, PDO::PARAM_STR, 40);
        $stmt->bindParam(':wordLists', $wordLists, PDO::PARAM_STR);
        $stmt->bindParam(':languages', $languages, PDO::PARAM_STR);
        $stmt->bindParam(':rights', $rights, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
        $message = 'Gebruiker aangepast.';
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
<p><?php echo $message; ?>
</body>
</html>

<!--$sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', accessCode='$accessCode', wordLists='$wordLists', status='$status' WHERE id='$id'";-->