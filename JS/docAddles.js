let usernameInput = document.getElementById('find-user');

usernameInput.addEventListener('keyup', function () {
    let userName = usernameInput.value;
    userName = userName.toLowerCase();

    if(userName.length < 2){
        return;
    }

    let formdata = new FormData();
    formdata.append('username', userName);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'inc/findUser.php', true);
    xhr.onload = function () {
        let response = this.responseText;
        try{
            response = JSON.parse(response);
        }catch (e) {
            response = {
                status: 0,
                data: []
            }
        }

        updateList(response);
    }
    xhr.send(formdata);
});

usernameInput.addEventListener('focusout', function () {
    setTimeout(function () {
        let result = document.getElementsByClassName('result')[0];
        result.innerHTML = '';
    }, 200);
});

function updateList(response) {
    if(response.status === 0){
        return;
    }

    let result = document.getElementsByClassName('result')[0];
    result.innerHTML = '';

    let users = response.data;
    for(let i = 0; i < users.length; i++){
        let user = users[i];
        let userDiv = document.createElement('p');
        
        userDiv.classList.add('user');
        userDiv.innerHTML = user;
        userDiv.addEventListener('click', function () {
            let usernameInput = document.getElementById('find-user');
            usernameInput.value = user;
            result.innerHTML = '';
        });
        result.appendChild(userDiv);
    }
}