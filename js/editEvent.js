function edit(){
    editOnDB('../php/editDb.php', drawSuccess, drawFail);
}

function editOnDB(url, succ, fail){
    req = new XMLHttpRequest();

    updateValues = {
        idIdentify: document.querySelector('#idIdentifier').value,
        newName: document.querySelector('#newName').value,
        newEventDescr: document.querySelector('#newEventDescr').value,
        newStart: document.querySelector('#newStart').value,
        newEnd: document.querySelector('#newEnd').value
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
    tableBody.innerHTML = "<p class='alert alert-danger text-center'> Elemento não alterado devido a algum problema de conexão </p>"; 
}
