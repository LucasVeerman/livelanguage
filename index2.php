<?php
session_start();
$_SESSION['counter'] = 0;
require "includes/config.php";

?>
<html>
<head>
    <style>
        html, body{
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: #EF7D1B;
            font-family: 'Quicksand', sans-serif;
            font-size: 150%;

        }

        p{
            color: white;
            text-align: center;
        }
        table{
            width: 100%;
            height: 100%;
        }

        table tr{
            height: 50%;
        }


        #makeList{
            background-color: #EF7D1B;
            width: 50%;
            padding-top: 9%;
            cursor: pointer;
        }

        #makeList img{
            max-width: 70%;
            display: block;
            margin: 0 auto;
        }

        #learnList2{
            background-color: #C65F06;
            width: 50%;
            cursor: pointer;
        }

        #learnList2 img{
            max-width: 80%;
            display: block;
            margin: 5% auto;

        }

        #learnList2 p{
            padding-top: 9%;
            cursor: pointer;
        }


        #learnList{
            background-color: #FF841A;
            width: 100%;
            cursor: pointer;

        }

        #learnList img{
            max-width: 40%;
            display: block;
            margin: 8% auto;
        }
    </style>
</head>
<body>
<table cellspacing="0">
    <tr>
        <td id="makeList" onclick="javascript:location.href='index.php?action=makeList'">
<!--            <img src="./img/contact.png">-->
            <p>Make your own wordlist</p>
        </td>

        <td id="learnList2" onclick="javascript:location.href='index.php?action=learn2'">
            <img src="./img/education.png">
            <p>Learn your own wordlist</p>
        </td>

    </tr>
    <tr>
        <td colspan="2" id="learnList" onclick="javascript:location.href='index.php?action=learn'">
            <img src="./img/education.png">
            <p>Learn words</p>
        </td>
    </tr>
</table>
</body>
</html>
