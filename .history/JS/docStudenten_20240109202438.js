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

studenten.forEach((student) => {
    student.addEventListener("click", (e) => {
        let userid = student.getAttribute("data-userid");

        let xhr = new XMLHttpRequest();
        xhr.open("GET", "inc/getStudentData.php?userid=" + userid, true);

        xhr.onload = function () {
            let response = this.responseText;

            try {
                response = JSON.parse(response);
            } catch (e) {
                response = [
                    'studentID' => $row['userID'],
                    'naam' => $row['naam'],
                    'mail' => $row['mail'],
                    'adres' => $row['adres'],
                    'postcode' => $row['postcode'],
                    'lessenGebruikt' => $row['lessenGebruikt'],
                    'aanStaandeles' => $row2['datum'] ?? '-',
                ]
            }

            console.log(response);
        };

        xhr.send();
    });
});
