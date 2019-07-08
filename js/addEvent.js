function add(){
    addOnDB('../php/addEvent.php', drawSuccess, drawFail);
}

function addOnDB(url, succ, fail){
    req = new XMLHttpRequest();

    updateValues = {
        newName: document.querySelector('#eventName').value,
        newEventDescr: document.querySelector('#eventDescr').value,
        newStart: document.querySelector('#datetimeStart').value,
        newEnd: document.querySelector('#datetimeEnd').value
    }

    req.onreadystatechange = function() {
        if(req.readyState == 4){
            if(req.status == 200){
                succ('response', req.responseText);
            } else {
                fail('response', req.status);
            }
        }
    };

    var updateJSON = JSON.stringify(updateValues);

    req.open("POST", url);
    req.send(updateJSON);
}

function drawSuccess(id, response){
    var tableBody = document.getElementById(id);
    tableBody.innerHTML = response;
    console.log(response);
}

function drawFail(id){
    var tableBody = document.getElementById(id);
    tableBody.innerHTML = "<p class='alert alert-danger text-center'> Elemento não adicionado devido a algum problema de conexão </p>"; 
}
