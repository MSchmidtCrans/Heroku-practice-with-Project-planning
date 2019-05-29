$(document).ready(function(){

//Get values at buttonclick in activity modal
$("#actSubmitBtn").click(function() {

    let actValue = $("#input1").val();
    let actUrgency = $("input[name='urgentie']:checked").val();
    let idClass = actValue + actUrgency;


    //Check if text field isn't empty before adding activity 
    if (actValue != "") {

        //Create json object
        let jsonObj = {};
        jsonObj.action = actValue;
        jsonObj.urgency = actUrgency;

        //Ajaxcall to create new record in database
        $.ajax({
            url: "create.php",
            data: {jsonObj: JSON.stringify(jsonObj)},
            type: "POST",
            dataType : "JSON",
   
            //Upon succes
            success: function(result) { 
               if (result){console.log('succes')};
               createTaskFromObj(result); 
            },
   
            //Upon error
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
               alert("Status: " + textStatus); alert("Error: " + errorThrown); 
               }  
            })

    //Close Modal and reset modal fields 
    $("#inputAct").val("");
    $("input[name='urgentie']").prop("checked", false);
    $("#modalContainer").css("display", "none");
    } else {
        
    }     


}); //Click event end

}) //Document ready end

