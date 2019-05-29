<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="loginscript.js"></script>
    <title>Projecplanning login pagina</title>

    <?php
    // Start the session
    session_start();
    
    ?>

    <body>
    

</head>
<body>
    <div id="main" class="mainContainer">
        <div id="sub" class="smallContainer">
            <form action="#" method="post" class="loginForm userForm">
                <h1>Project planning Login</h1>
                <input type="text" id="username" name="user" placeholder="Gebruikersnaam" maxlength="25" required></br>
                <input type="password" id="pswrd" name="ps" placeholder="Wachtwoord" maxlength="25" required>
                <input type="submit" value="Inloggen" class="inlogBtn greenBtn">
                <input type="button" value="Nieuwe gebruiker" class="greenBtn" onclick="$('.newUserForm').css('display', 'Block');
                                                                                        $('.loginForm').css('display', 'none')">
            </form>
            <form action="#" method="post" class="newUserForm userForm" style="display: none;">
                    <h1>Project planning Login</h1>
                    <input type="text" id="newusername" name="newUserName" placeholder="Gewenste gebruikersnaam" maxlength="20" required></br>
                    <input type="text" id="newpswrd" name="newPsWrd" placeholder="Nieuw wachtwoord" required>
                    <input type="text" id="newfirstname" name="newFirstName" placeholder="Voornaam" required>
                    <input type="text" id="newlastname" name="newLastName" placeholder="Achternaam" required>
                    <input type="email" id="newmailadress" name="newMailAdrs" placeholder="Uw mail adres" required>
                    <input type="button" value="Opslaan" class="newUserBtn greenBtn">
                    <input type="button" value="Annuleren" class="cancelBtn redBtn" onclick="$('.newUserForm').css('display', 'None');
                                                                                    $('.loginForm').css('display', 'block')">
                </form>
        </div>

    </div>


</body>

<style>
* {
    box-sizing: border-box;
    margin: 0px;
    padding: 0px;
    font-family: 'Baloo Bhai', cursive;
}

body {
    background-image: url("Media/bg.jpg")
}

.mainContainer {
    background-color: rgba(99, 91, 91, 0.75);
    width: 100%;
    height: 100vh;
    text-align: center;
    margin: auto 0px;
}

h1 {
    color: white;
    margin-bottom: 20px;
    margin-top: 20px;
}

.smallContainer {
    padding: 20px;
}


.userForm {
    position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 15px;
  height: auto;
  border: solid 1px rgb(2, 17, 2);
  background-color: rgb(40, 122, 40);
  width: 50%;
  height: auto;
  border-radius: 5px;  
  box-shadow: 0 8px 14px 7px rgba(230, 218, 218, 0.4);
}

.userForm input {
    width: 80%;
    font-size: 15px;
    padding: 10px;
    margin: 10px;
    border-radius: 5px;  
}

.greenBtn {
    color: white;
    background-color: rgb(63, 243, 63);
    margin-bottom: 15px;
}

.redBtn {
    background-color: rgb(221, 43, 43);
    margin-bottom: 15px;
}

@media screen and (max-width: 400px) {
    .userForm {
        width: 100%;
    }
    .smallContainer {
    padding: 0px;
    }
    
}

</style>

</html>