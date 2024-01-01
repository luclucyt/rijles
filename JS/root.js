//check if the user is logged in (localstorage)
if (localStorage.getItem("loggedIn") != null && localStorage.getItem("userID") != null) {
    //logedin
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "inc/getUserData.php", true);

    let formData = new FormData();
    formData.append('userID', localStorage.getItem("userID"))

    xhr.onload = () => {
        if (xhr.responseText == "false") {
            //not logedin
            window.location.href = "login.php";
        }
    }

    xhr.send(formData);
}else{
    //not logedin
    window.location.href = "login.php";
}
