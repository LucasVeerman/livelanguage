<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Settings</title>
    <link rel="stylesheet" href="./css/styleSettings.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">
</head>
<body>
    <header id="header">
        <?php echo "<a href='./index.php?action=game&id=" . $_SESSION['id'] . "'><img src='./img/buttonBack.png' name='terug'></a>"; ?>
<!--        <img src="images/buttonBack.png" name="terug" onclick="javascript:location.href='home.php'">-->
        Settings
    </header><br>
        <p class="tekst" style="padding-top: 4%">General</p>
    <div id="algemeen">
        <div class="laag">
            Push notifications
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="laag">
            Sound effects
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="laag">
            Music
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>

    </div>

    <p class="tekst">Notifications</p>
    <div id="algemeen">
        <div class="laag">
            Practice remembrance
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="laag">
            Time remembrance
            <input type="text" name="time" class="time" placeholder="Vul tijd hier in..">
        </div>
        <div class="laag">
        </div>
</body>
</html>