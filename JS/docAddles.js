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

let addLessonInput = document.getElementsByClassName('submit')[0];
addLessonInput.addEventListener('click', function () {
    let formData = new FormData();
    let stuName = document.getElementById('find-user').value;
    let lessonDate = document.getElementsByClassName('lesson-date')[0].value;
    let lessonStart = document.getElementsByClassName('lesson-start')[0].value;
    let lessonEnd = document.getElementsByClassName('lesson-end')[0].value;
    let lessonNote = document.getElementsByClassName('lesson-note')[0].value;
    let lessonTodo = document.getElementsByClassName('lesson-todo')[0].value;

    formData.append('stuName', stuName);
    formData.append('lessonDate', lessonDate);
    formData.append('lessonStart', lessonStart);
    formData.append('lessonEnd', lessonEnd);
    formData.append('lessonNote', lessonNote);
    formData.append('lessonTodo', lessonTodo);


    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'inc/addLesson.php', true);
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

        if(response.status === 0){
            alert(response.data);
        }else{
            alert(response.data);
            window.location.href = 'index.php';
        }
    }

    xhr.send(formData);
});