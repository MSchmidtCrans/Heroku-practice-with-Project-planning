//Drag and drop functions

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
    console.log(parentDiv);

    //Call update script to update row column
    
  }

//Create new task based on object
function createTaskFromObj(obj) {
    if (obj.urgencyvalue == "middel") {
        $("#rowOne").append("<span id='" + obj.useruniqid + "' class='urgencyNormal' draggable=true ondragstart=drag(event)>" + obj.textvalue + "</span>");
    } else if(obj.urgencyvalue == "hoog") {
        $("#rowOne").append("<span id='" + obj.useruniqid + "' class='urgencyHigh' draggable=true ondragstart=drag(event)>" + obj.textvalue + "</span>");
    } else {
        $("#rowOne").append("<span id='" + obj.useruniqid + "' class='urgencyLow' draggable=true ondragstart=drag(event)>" + obj.textvalue + "</span>");
    }
}  