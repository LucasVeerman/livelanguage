<?php
//session_start();
$mysqli = new mysqli("localhost", "root", "", "livelanguage", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$checkLanguage = "SELECT * FROM users WHERE id = $id";
$result2 = $mysqli->query($checkLanguage);
$row2 = $result2->fetch_assoc();
$language = $row2["languages"];
$_SESSION["language"] = $language;
//echo $row["languages"];

//if ($result2->num_rows > 0) {
//    // output data of each row
//    while($row = $result2->fetch_assoc()) {
//        echo "id: " . $row["languages"] . $row["firstName"] .  "<br>";
//    }
//}
//else {
//    echo "0 results";
//}


$counter = $_SESSION['counter'];
$language_name = $_SESSION['language'];
?>
<html>
<head>
    <link rel="stylesheet" href="./css/styleFlipcard.css" />
    <meta charset="UTF-8">
</head>
<body>

<!-- Form with buttons to return to home/begin -->
<form method="post" action="">
    <!--    <input type="submit" value="Terug naar het begin van de lijst" name="return_to_begin">-->
    <img src="./img/buttonBack.png" name="return_to_main" id="button" style="cursor: pointer" onclick="javascript:location.href='index.php?action=game&id=<?php echo $_SESSION['id'] ?>'">
</form>
</body>
</html>

<?php
//require_once './includes/config.php';


//    $query = "SELECT Dutch FROM words WHERE categorie='$language_name' LIMIT $counter, 1";
$query = "SELECT * FROM words WHERE approval LIKE 'approved' LIMIT $counter, 1";
$_SESSION['result'] = mysqli_query($mysqli, $query);



//
if(isset($_POST['return_to_begin'])){
    $_SESSION['counter'] = 0;
    header('location: views/language.php');
}
if(isset($_POST['return_to_main'])){
    $_SESSION['counter'] = 0;
    header( 'location: ./index2.php');
}
//

while ($row = mysqli_fetch_array($_SESSION['result'])) {
    if ($_SESSION['language'] == "Dutch")
    {
        $_SESSION['word'] = $row['English'];
        $_SESSION['correct'] = $row['Dutch'];
//        $word = $row['English'];
//        $correct = $row['Dutch'];
        $_SESSION['language'] = "Dutch";
    }
    else if ($_SESSION['language'] == "English")
    {
        $_SESSION['word'] = $row['Dutch'];
        $_SESSION['correct'] = $row['English'];
//        $word = $row['Dutch'];
//        $correct = $row['English'];
        $_SESSION['language'] = "English";
    }
    else if ($_SESSION['language'] == "Spanish")
    {
        $_SESSION['word'] = $row['Dutch'];
        $_SESSION['correct'] = $row['Spanish'];
//        $word = $row['Dutch'];
//        $correct = $row['Spanish'];
        $_SESSION['language'] = "Spanish";
    }

    //Catch the user input
    echo "<p>" . $_SESSION['word'] . "</p>";
    echo '<form method="post" action="">';
    echo '<input type="text" id="textField" name="answer" placeholder="Answer" autocomplete="off" autofocus ><input type="submit" id="submitBtn" name="submit">';
    echo '</form>';
    if (isset($_POST['submit'])) {
        $answer = $_POST['answer'];

         if ($answer == $_SESSION['correct']) {

//            echo 'The answer is right!<br>';
            $_SESSION['counter'] = $_SESSION['counter'] + 1;
            header("Refresh:0");
        }
        if ($answer == $_SESSION['correct'] && ($counter + 1) % 10 == 0) {
            echo " <script> var audio = document.createElement('audio');
               document.body.appendChild(audio);
               audio.src = './sounds/Sound1.mp3';
               audio.addEventListener('canplaythrough', function() {
                 audio.play();
                 alert('10 correct answers!');
                 audio.pause();
                 window.location.href = 'index.php?action=learn';
               }, false);
             </script>";


        }
        else if($answer != $_SESSION['correct']){
            echo 'Try again!<br>';
        }
    }
    echo "<p>Number of correct answers: " . $_SESSION['counter'] . "</p>";
}
