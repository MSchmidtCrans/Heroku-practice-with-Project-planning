//Pull tasks from database based on username
function pullUserTasks(){

//Call pulltasks script
$.ajax({
    url: "pullTasks.php",
    type: "POST",
    dataType : "JSON",

    //Upon succes
    success: function(result) { 
       if (result) {console.log("SUCCES")};
       
       //Iterate through the JSON array for all entries
            for (x in result) {
                createTaskFromObj(result[x]);
     }
    },

    //Upon error
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
       alert("Status: " + textStatus); alert("Error: " + errorThrown); 
   }  
})

};

//Set the column divs to allow drops from drags
function allowDrop(ev) {
    ev.preventDefault();
  }

//Set what data is to be dragged from the source div
function drag(ev) {
ev.dataTransfer.setData("text", ev.target.id);
}

//On drop drop the source div in the target div
function drop(ev) {
    ev.preventDefault();
    let data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    
    //Find the new parent div to update in the database
    parentDiv = ev.target.id;

    //Call update script to update row column
    $.ajax({
        url: "updateTask.php",
        data: {divid: data, rowid: parentDiv},
        type: "POST",
        dataType : "TEXT",

        //Upon succes
        success: function(result) { 
           if (result) {console.log("SUCCES")};
        },

        //Upon error
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
           alert("Status: " + textStatus); alert("Error: " + errorThrown); 
       }  
    })
  }

//Create new task based on object
function createTaskFromObj(obj) {
    
    //Check urgency and set correct color then append to the correct rowid
    if (obj.urgencyvalue == "middel") {
        $("#" + obj.rowid).append("<span id='" + obj.useruniqid + "' class='urgencyNormal' draggable=true ondragstart=drag(event)>" 
        + obj.textvalue + "<img src='media/cancel.png' class='delimg' alt='delete task button' width='25' height='25'></span>");
    } else if(obj.urgencyvalue == "hoog") {
        $("#" + obj.rowid).append("<span id='" + obj.useruniqid + "' class='urgencyHigh' draggable=true ondragstart=drag(event)>" 
        + obj.textvalue + "<img src='media/cancel.png' class='delimg' alt='delete task button' width='25' height='25'></span>");
    } else {
        $("#" + obj.rowid).append("<span id='" + obj.useruniqid + "' class='urgencyLow' draggable=true ondragstart=drag(event)>" 
        + obj.textvalue + "<img src='media/cancel.png' class='delimg' alt='delete task button' width='25' height='25'></span>");
    }
}  