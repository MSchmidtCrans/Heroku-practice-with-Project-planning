$(document).ready(function(){

    //Get values at buttonclick in activity modal
    $(".inlogBtn").click(function() {
        let username = $("#username").val();
        let pswrd = $("#pswrd").val();

        //Create json object
        let jsonObj = {};
        jsonObj.username = username;
        jsonObj.passwrd = pswrd;

        //Ajaxcall to create new record in database
        $.ajax({
            url: "login.php",
            data: {jsonObj: JSON.stringify(jsonObj)},
            type: "POST",
            dataType : "JSON",
   
            //Upon succes
            success: function(result) { 
               if (result){console.log('succes')};
               //console.log(result);
               if (result.passwrd === pswrd){ 
                   window.open("http://10.1.254.73/Projectplanning-met-backend/index.php", "_self");
                } else {
                    alert("Verkeerd wachtwoord of gebruiker ingevoerd. Probeer het nogmaals..")
                    resetFields();
                };
            },
   
            //Upon error
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
               alert("Status: " + textStatus); alert("Error: " + errorThrown); 
               }  
            })
    })

    $(".newUserBtn").click(function() {

        //Create json object
        let jsonObj = {};
        jsonObj.username = $("#newusername").val();
        jsonObj.passwrd = $("#newpswrd").val();
        jsonObj.mailadress = $("#newmailadress").val();
        jsonObj.firstname = $("#newfirstname").val();
        jsonObj.lastname = $("#newlastname").val();
        
        //Check if username already exists (must be unique!!)
        //Ajaxcall to lookup username
        $.ajax({
            url: "checkUser.php",
            data: {jsonObj: JSON.stringify(jsonObj)},
            type: "POST",
            dataType : "JSON",
   
            //Upon succes
            success: function(result) { 
               if (result != "") {
               alert('Gebruikersnaam is helaas al in gebruik. Kies een andere gebruikersnaam alstublieft.')
               $("#newusername").val("");
               } else {          

                        //Ajaxcall to create new record in database
                        $.ajax({
                            url: "createUser.php",
                            data: {jsonObj: JSON.stringify(jsonObj)},
                            type: "POST",
                            dataType : "JSON",
                
                            //Upon succes
                            success: function(result) { 
                            if (result){console.log('succes')};
                            console.log(result);
                            alert('Uw nieuwe account is succesvol aangemaakt. U kunt nu inloggen met uw gebruikersnaam en wachtwoord.');
                            $(".newUserForm")[0].reset();
                            $('.newUserForm').css('display', 'none');
                                $('.loginForm').css('display', 'block');
                            },
                
                            //Upon error
                            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                            }  
                            })
                        }
                    },
        //Upon error
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
           alert("Status: " + textStatus); alert("Error: " + errorThrown); 
           }  
        })
    })
});

//Functions --------------------

function resetFields() {
    $("#username").val("");
    $("#pswrd").val("");
}