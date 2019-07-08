
function getAll(){
    getAllOnDB('../php/getByIdOnDb.php', drawSuccess, drawFail);
}

function getAllOnDB(url, succ, fail){
    req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if(req.readyState == 4){
            if(req.status == 200){
                succ('tableBody', req.responseText);
            } else {
                fail('tableBody', req.status);
            }
        }
    };

    req.open("POST", url);
    req.send();
}

function drawSuccess(id, response){
    var tableBody = document.getElementById(id);
    tableBody.innerHTML = response;
}

function drawFail(id){
    var tableBody = document.getElementById(id);
    tableBody.innerHTML = "DUCK";
}

window.onload = getAll();
