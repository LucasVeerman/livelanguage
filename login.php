<?php

require('includes/config.php');
require('includes/bootstrap.php');

// Lees de actie uit de URL
//$action = isset($_GET['action']) ? $_GET['action'] : '';
//$id = isset($_GET['id']) ? $_GET['id'] : 0;
include 'views/head.php';
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$id = isset($_SESSION['id']) ? $_SESSION['id'] : $id;

$user_model = new User();

$userData = $user_model->getOne($id);


if(!empty($_GET["action"])) {

    switch($_GET["action"]) {
        case "userLogin":
//            echo "<a href='?action=register'>Registreer</a>";
//            echo "<a href='?action=login'>login</a>";
            include 'views/userLogin.php';
            break;
        case "adminLogin":
            include 'views/adminLogin.php';
            break;
        case "register":
            include 'views/register.php';
            break;
        case "register_submit":
            include 'models/register_submit.php';
            break;
        case "adminLogin_submit":
            include 'models/login_submit.php';
            break;
        case "userLogin_submit";
            include 'models/userLogin_submit.php';
            break;


    }
}

