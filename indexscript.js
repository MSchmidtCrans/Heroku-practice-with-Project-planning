$(document).ready(function(){

pullUserTasks();
    
//Get values at buttonclick in activity modal
$("#actSubmitBtn").click(function() {

    let actValue = $("#input1").val();
    let actUrgency = $("input[name='urgentie']:checked").val();

    //Create json object
    let jsonObj = {};
    jsonObj.action = actValue;
    jsonObj.urgency = actUrgency;

    //Check if text field isn't empty before adding activity 
    if (actValue != "" && jsonObj.urgency != undefined) {
    
        //Ajaxcall to create new record in database
        $.ajax({
            url: "create.php",
            data: {jsonObj: JSON.stringify(jsonObj)},
            type: "POST",
            dataType : "JSON",
   
            //Upon succes
            success: function(result) {
                //console.log(result); 
               if (result){console.log('succes')};
               createTaskFromObj(result); 
            },
   
            //Upon error
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
               alert("Status: " + textStatus); alert("Error: " + errorThrown); 
               }  
            })

    //Close Modal and reset modal fields 
    $("#input1").val("");
    $("input[name='urgentie']").prop("checked", false);
    $("#modalContainer").css("display", "none");
    } else {
        alert('Graag een omschrijving invullen en/of urgentie kiezen.')
    }     
}); //Click event end

$(document).on('click','#delete',function(){
    let parentid = $(this).parent().attr('id');
    deletediv(parentid);
    //Call delete script

});


}) //Document ready end

