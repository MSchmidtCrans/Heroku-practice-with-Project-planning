<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="helper.js"></script>
    <title>Projecplanning</title>

    <?php
    // Start the session
    session_start();
    
    if (!isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] != true)) {
        header( 'Location: loginStart.php' );
    }
    
    //Set time out on session
    $time = $_SERVER['REQUEST_TIME'];
    $timeout_duration = 10;

    if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset();
        session_destroy();
        session_start();
        }

        $_SESSION['LAST_ACTIVITY'] = $time;

    ?>

</head>
<body>
    <div class="header">
        <p><h1>PROJECT PLANNING</h1></p>
    </div>

    <!--Columns-->
    <div class="mainContainer">
        <div id="rowOne" class="columnFlex" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div class="columnTitle">
            <p><h2>TE DOEN<img src="Media/plus.png" class="plusImg" alt="plus sign" onclick="document.getElementById('modalContainer').style.display='block'"></h2></p>
            </div>            
        </div>
        <div id="rowTwo" class="columnFlex" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div class="columnTitle">
            <p><h2>BEZIG</h2></p>
            </div>
        </div>
        <div id="rowThree" class="columnFlex" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div class="columnTitle"> 
            <p><h2>KLAAR</h2></p>
            </div>
        </div>
    </div>

    <!--Modal block-->
    <div id="modalContainer" class="modalContainerClass">
        <div id="modal" class="modalClass">
            <form action="post">
                <label for="input1">Activiteit: </label>
                <input id="input1" type="text" maxlength="22"><br>
                <label for="input2">Urgentie: </label>
                <input id="input2" type="radio" name="urgentie" value="laag" checked>Laag
                <input type="radio" name="urgentie" value="middel">Middel
                <input type="radio" name="urgentie" value="hoog">Hoog
            </form>
            <button id="actSubmitBtn">Opslaan</button>
            <button id="actCancelBtn" onclick="document.getElementById('modalContainer').style.display='none'">Annuleren</button>
        </div>
    </div>


</body>
</html>