loginBTN = document.getElementById("login-submit");

loginBTN.addEventListener("click", function () {
    let email = document.getElementById("login-mail").value ?? "";
    let password = document.getElementById("login-password").value ?? "";

    loginBTN.disabled = true;
    loginBTN.style.cursor = "not-allowed";
    loginBTN.style.backgroundColor = "var(--callToActionDisabled)";

    let formData = new FormData();
    formData.append("mail", email);
    formData.append("password", password);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "inc/loginSubmit.php", true);

    xhr.onload = () => {
        let response = xhr.responseText;
        console.log(response);
        try {
            response = JSON.parse(response);
            console.log(response);
        } catch (error) {
            response = JSON.parse(response);
            console.log(response);

            response = [0, "Er is iets fout gegaan, probeer het later opnieuw"];
        }

        if (response[0] == 1) {
            alert(response[1]);

            localStorage.setItem("loggedIn", true);
            localStorage.setItem("userID", response[2]);

            window.location.href = "index.php";
        } else {
            document.getElementById("login-error").innerHTML = response[1];
        }

        loginBTN.disabled = false;
        loginBTN.style.cursor = "pointer";
        loginBTN.style.backgroundColor = "var(--callToAction)";
    };

    xhr.send(formData);
});
