<?php

require('includes/config.php');
require('includes/bootstrap.php');

include 'views/head.php';

//session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();

session_start();
$action = isset($_GET['action'])?$_GET['action']:"home";

$submit_update = isset($_POST['submit_update'])? 1:0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$id = isset($_SESSION['id']) ? $_SESSION['id'] : $id;

$action = $submit_update?'save':$action;


$user_model = new User();
$userData = $user_model->getOne($id);

$category_model = new Category();
$categoryData = $category_model->getAll();

$word_model = new Word();
$wordData = $word_model->getAll();

$word_model2 = new Word2();
$wordData2 = $word_model2->getAll();

$word_model3 = new Word3();
$wordData3 = $word_model3->getAll();

if(!isset($_SESSION["id"]))
{
//    echo "<meta http-equiv='refresh' content='0;URL=login.php?action=userLogin'>";
    echo "niet ingelogd";
    echo $_SESSION['id'];
}
else{
    if(!empty($_GET["action"])) {


        switch($_GET["action"]) {
            case "home":

                $user_model = new User();
                $userList = $user_model->getAll();

                $category_model = new Category();
                $categoryList = $category_model->getAll();

                $word_model = new Word();
                $wordList = $word_model->getAll();

                $word_model3 = new Word3();
                $wordList3 = $word_model3->getAll();
                include "views/home.php";
                break;
            case "addUsers":
                include "views/add_users.php";
                break;
            case "showUsers":
                $user_model = new User();
                $userList = $user_model->getAll();
                include "views/show_users.php";

                break;
            //edit
            case "edit":
                $id = $_GET['id'];
                $user_model = new User();
                $userList = $user_model->getOne($id);

                $category_model = new Category();
                $categoryList = $category_model->getAll();
                include "views/user_management.php";
                break;
            case "edit_word":
                $id = $_GET['id'];
                $word_model = new Word();
                $wordList = $word_model->getOne($id);

                $category_model = new Category();
                $categoryList = $category_model->getAll();
                include "views/edit_word.php";
                break;
            case "edit_word3":
                $id = $_GET['id'];
                $word_model3 = new Word3();
                $wordList3 = $word_model3->getOne($id);

                include "views/edit_word3.php";
                break;
            //delete
            case "delete_user":
                $id = $_GET['id'];
                include 'models/delete_user.php';
                break;
            case "delete_category":
                $id = $_GET['id'];
                include 'models/delete_category.php';
                break;
            case "delete_word":
                $id = $_GET['id'];
                include 'models/delete_word.php';
                break;
            case "delete_word2":
                $id = $_GET['id'];
                include 'models/delete_word2.php';
                break;
            case "delete_word3":
                $id = $_GET['id'];
                include 'models/delete_word3.php';
                break;
            //add
            case "addWords":
                $category_model = new Category();
                $categoryList = $category_model->getAll();
                include "views/add_words.php";
                break;
            case "addCategories":
                include "views/add_categories.php";
                break;
            //logout
            case "logout":
                include "models/logout.php";
                break;
            //game
            case "game":
                $id = $_GET['id'];
                $user_model = new User();

                $userList = $user_model->getOne($id);
                include "views/game.php";
                break;
            case "makeList":
                $word_model2 = new Word2();
                $wordList2 = $word_model2->getAll();

                include "views/make_wordlist.php";
                break;
            case "learn":
                $id = $_SESSION['id'];
                $user_model = new User();

                $userList = $user_model->getOne($id);
                include "views/language.php";
                break;
            case "learn2":
                $id = $_SESSION['id'];
                $user_model = new User();

                $userList = $user_model->getOne($id);
                include "views/learn2.php";
                break;
            case "contact":
                include "views/contact.php";
                break;
            case "settings":
                include "views/settings.php";
                break;
        }


    }


}
