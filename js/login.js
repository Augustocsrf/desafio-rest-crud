function logIn(){
    logInProcess('./php/loginProccess.php', drawSuccess, drawFail);
}

function logInProcess(url, succ, fail){
    req = new XMLHttpRequest();

    logInValues = {
        login: document.querySelector('#login').value,
        password: document.querySelector('#password').value        
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

    console.log("readyState:" + req.readyState + "/ Status:" + req.status);

    logValues = JSON.stringify(logInValues);

    req.open("POST", url);
    req.send(logValues);
}

function drawSuccess(id, response){
    response = JSON.parse(response);
    var text = document.getElementById(id);

    if(response["failed"]){
        text.innerHTML = "<p class='alert alert-danger text-center'> Erro no Login. <br> Login ou Senha errado. </p>";
        document.querySelector('#password').value = "";
    } else {
        text.innerHTML = "<p class='alert alert-success text-center'> Success </p>";
        window.location.href = "./pages/mainpage.html";
    }
}

function drawFail(id){
    var tableBody = document.getElementById(id);
    tableBody.innerHTML = "<p class='alert alert-danger'>Fail to connect to database </p>";
}
