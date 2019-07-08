function rmvById(){
    rmvByIdOnDB('../php/rmvById.php', drawSuccess, drawFail);
}

function rmvByIdOnDB(url, succ, fail){
    req = new XMLHttpRequest();

    //$idIdentify = document.getElementById('idIdentify').value;
    idIdentify = document.querySelector('#idIdentify').value;


    req.onreadystatechange = function() {
        if(req.readyState == 4){
            if(req.status == 200){
                succ('response', req.responseText);
            } else {
                fail('response', req.status);
            }
        }
    };

    req.open("POST", url);
    req.send(idIdentify);
}

function drawSuccess(id, response){
    var tableBody = document.getElementById(id);
    tableBody.innerHTML = response;
}

function drawFail(id){
    var tableBody = document.getElementById(id);
    tableBody.innerHTML = "<p class='alert alert-danger text-center'> Elemento não removido devido a algum problema de conexão   </p>";
}
