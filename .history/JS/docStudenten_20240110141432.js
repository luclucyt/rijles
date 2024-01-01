const seachStudent = document.getElementById("search");

seachStudent.addEventListener("keyup", (e) => {
    let search = e.target.value;
    search = search.trim();

    search = search.toLowerCase();

    //hide the divs that don't match the search
    let studenten = document.querySelectorAll(".student-wrapper");
    studenten.forEach((student) => {
        let naam = student.querySelector(".studenten-naam").innerHTML;

        if (
            naam.toLowerCase() == search ||
            naam.toLowerCase().includes(search)
        ) {
            student.style.display = "block";
        } else {
            student.style.display = "none";
        }
    });
});

const studenten = document.querySelectorAll(".student-wrapper");
let detail = document.querySelector(".detail-wrapper");

studenten.forEach((student) => {
    student.addEventListener("click", (e) => {
        studenten.forEach((student) => {
            student.classList.remove("selected-student");
        });

        student.classList.add("selected-student");

        let userid = student.getAttribute("data-userid");

        let xhr = new XMLHttpRequest();
        xhr.open("GET", "inc/getStudentData.php?userid=" + userid, true);

        xhr.onload = function () {
            let response = this.responseText;

            try {
                response = JSON.parse(response);
            } catch (e) {
                response = [
                    (studentID) => $row["userID"],
                    (naam) => $row["naam"],
                    (mail) => $row["mail"],
                    (adres) => $row["adres"],
                    (postcode) => $row["postcode"],
                    (lessenGebruikt) => $row["lessenGebruikt"],
                    (aanStaandeles) => $row2["datum"] ?? "-",
                ];
            }

            document.querySelector(".studenten-info-naam").innerHTML =
                "Naam: " + response.naam;
            document.querySelector(".studenten-info-email").innerHTML =
                "Mail: " + response.mail;
            document.querySelector(".studenten-info-adres").innerHTML =
                "Adres: " + response.adres;
            document.querySelector(".studenten-info-postcode").innerHTML =
                response.postcode;
            document.querySelector(".studenten-info-telefoon").innerHTML =
                "Telefoon: " + response.telefoon;
            document.querySelector(".studenten-info-lessengebruikt").innerHTML =
                response.lessenGebruikt + " lessen gebruikt.";
            document.querySelector(".studenten-info-aanstaandeles").innerHTML =
                "Naam: " + response.aanStaandeles;

            console.log(response);
        };

        xhr.send();
        detail.style.display = "block";
        detail.style.animation = "fadeIn 0.5s ease forwards";
    });
});

//add an event listener to the close the detail-wrapper
document.querySelector(".detail-close").addEventListener("click", () => {
    //animate it out
    detail.style.animation = "fadeOut 0.5s ease forwards";
    setTimeout(() => {
        detail.style.display = "none";
        detail.style.animation = "none";
    }, 500);
});
