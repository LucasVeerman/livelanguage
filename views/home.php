<body>
<style>
    .modaal-venster
    {
        position: fixed;
        z-index: 100;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        text-align: center;
    }

    .modaal-inhoud
    {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        border-radius: 10px;
    }

    .sluit-knop
    {
        color: red;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .sluit-knop:hover,
    .sluit-knop:focus
    {
        color: black;
        text-decoration: none;
        cursor: pointer;
        font-size: 35px;
    }

    #submit
    {
        float: none;
    }
    #addCategoryLink
    {
        cursor: pointer;
    }
    #addCategoryLink:hover
    {
        text-decoration: underline;
    }
    #addWordLink
    {
        cursor: pointer;
    }
    #addWordLink:hover
    {
        text-decoration: underline;
    }
</style>
<?php
if(!isset($_SESSION["id"]))
{
    echo "<meta http-equiv='refresh' content='0;URL=login.php?action=adminLogin'>";
//    echo "niet ingelogd";
}
else
{
echo '<div class="menu">';
echo '<h2>LIVE LANGUAGE &amp; CONCEPT</h2>';
echo '<div class="logo">';
echo '<a href="index.php?action=home"><img src="./img/logoflat.svg" id="logo" alt="logo"></a>';
echo '</div>';
echo '<div class="lijn">';
echo '</div>';
echo '</div>';
echo '<div class="sidebar">';
echo '<a href="?action=showUsers"><img src="./img/usersicon.svg" id="usersIcon" alt="users"></a>';
echo '<hr>';
echo '<a href="index.php?action=logout"><img src="./img/logouticon.svg" id="logout" alt="logout"></a>';
echo '<hr>';
echo '</div>';
echo '<div class="pagina">';
echo '<div class="categorien">';
echo '<h3>Categorie&euml;n</h3>';
echo '<div class="vlaggen">';

echo "<table id='tableCategory'>";
echo "<tr>";
echo "<td><strong>Categorienaam</strong></td>";
echo "</tr>";
foreach ($categoryList as $categoryData) {
    echo "<tr>";
    echo "<td>" . $categoryData['name'] . "</td>";
//                echo "<td><a href='?action=edit&id=" . $wordData['id'] . "'>Pas aan</a> </td>";
    echo "<td><a href='?action=delete_category&id=" . $categoryData['id'] . "'>Verwijder categorie</a> </td>";

    echo "</tr>";

}
echo "</table>";

echo '</div>';
echo '</div>';

echo '<div class="woorden">';
    echo '<h3>Woorden</h3>';
    echo '<div class="mappen">';

        echo "<table id='tableWords'>";
        echo "<tr>";
        echo "<td><strong>Nederlands</strong></td>";
        echo "<td><strong>Engels</strong></td>";
        echo "<td><strong>Spaans</strong></td>";
        echo "<td><strong>Categorie</strong></td>";
        echo "</tr>";
        foreach ($wordList as $wordData) {

            echo "<tr>";
            echo "<td>" . $wordData['Dutch'] . "</td>";
            echo "<td>" . $wordData['English'] . "</td>";
            echo "<td>" . $wordData['Spanish'] . "</td>";
            echo "<td>" . $wordData['category'] . "</td>";
            echo "<td><a href='?action=edit_word&id=" . $wordData['id'] . "'>Pas aan</a> </td>";
            echo "<td><a href='?action=delete_word&id=" . $wordData['id'] . "'>Verwijder woord</a> </td>";

            echo "</tr>";

        }
        echo "</table>";



    echo '</div>';
echo '</div>';
echo '<div class="addCategory">';
echo '<p id="addCategoryLink"><strong>Categorie toevoegen</strong></p>';
echo '</div>';
echo '<div id="addcategory">';
echo '<h2>Categorie toevoegen</h2>';
echo '<form action="./models/add_categories_submit.php" method="post">';
echo '<input type="text" id="category" name="category" placeholder="Categorienaam" value="" />';
echo '<input type="submit" id="submit" name="submit_update" value="Submit">';
echo '</form>';
echo '</div>';
echo '<div class="addWord">';
echo '<p id="addWordLink"><strong>Woorden toevoegen</strong></p>';
echo '</div>';

    //Words user
    echo '<div class="woorden">';
        echo '<h3>Woorden van de gebruikers</h3>';
        echo '<div class="mappen">';

        echo "<table id='tableWords'>";
        echo "<tr>";
        echo "<td><strong>Nederlands</strong></td>";
        echo "<td><strong>Engels</strong></td>";
        echo "<td><strong>Spaans</strong></td>";
        echo "</tr>";
        foreach ($wordList3 as $wordData3) {

            echo "<tr>";
            echo "<td>" . $wordData3['Dutch'] . "</td>";
            echo "<td>" . $wordData3['English'] . "</td>";
            echo "<td>" . $wordData3['Spanish'] . "</td>";
            echo "<td><a href='?action=edit_word3&id=" . $wordData3['id'] . "'>Pas aan</a> </td>";
            echo "<td><a href='?action=delete_word3&id=" . $wordData3['id'] . "'>Verwijder woord</a> </td>";

            echo "</tr>";

        }
        echo "</table>";



        echo '</div>';
    echo '</div>';

echo '<div id="addWord">';
echo '<h2>Woorden toevoegen</h2>';
echo '<form action="./models/add_words_submit.php" method="post">';
echo '<label for="Dutch">Nederlands</label>';
echo '<input type="text" id="Dutch" name="Dutch" value="" />';

echo '<label for="English">English</label>';
echo '<input type="text" id="English" name="English" value="" />';

echo '<label for="Spanish">Spanish</label>';
echo '<input type="text" id="Spanish" name="Spanish" value="" />';

echo '<label for="category">Category</label><br>';
echo '<select name="category">';

foreach ($categoryList as $categoryData) {
    echo "<option value='" . $categoryData['name'] . "'>" . $categoryData['name'] . "</option>";
}

echo '</select><br>';
echo '<td><input type="submit" id="submit" name="submit_update" value="Submit">';
echo '</form>';
echo '</div>';

echo '</div>';
echo '</body>';

}
