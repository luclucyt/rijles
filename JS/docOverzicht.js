document.getElementsByClassName("plus-wrapper")[0].addEventListener("click", function () {
    window.location.href = "doc.LesToevoegen.php";
});

const lessen = document.querySelectorAll(".grid-item");
lessen.forEach((les) => {
    les.addEventListener("click", function () {
        getLesDetail(les);
    });
});

function getLesDetail(les) {
    let id = les.getAttribute("data-id");

    lessen.forEach((student) => {
        student.classList.remove("selected-student");
    });

    les.classList.add("selected-les");

    let formData = new FormData();
    formData.append("lesID", id);
    console.log(formData);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "inc/getLesData.php", true);
    xhr.onload = function () {
        let response = this.responseText;

        try {
            response = JSON.parse(response);
        } catch (e) {
            response = [
                (datum) => '-',
                (startTijd) => '-',
                (eindTijd) => '-',
                (todo) => '-',
                (note) => '-',
                (student) => '-',
                (adres) => '-'
            ];
        }

        document.querySelector(".detail-student").innerHTML = response.student;

        document.querySelector(".detail-startTijd").innerHTML = response.startTijd;
        document.querySelector(".detail-eindTijd").innerHTML = response.eindTijd;
        document.querySelector(".detail-adres").innerHTML = response.adres;

        document.querySelector(".detail-todo").innerHTML = "TODO: " + response.todo;
        document.querySelector(".detail-opmerking").innerHTML = "Notitie: " + response.note;

        spinner.style.display = "none";
    };

    xhr.send(formData);
    document.querySelector(".detail-wrapper").style.display = "block";
    document.querySelector(".detail-wrapper").style.animation = "fadeIn 0.5s ease forwards";
}


//add an event listener to the close the detail-wrapper
document.querySelector(".detail-close").addEventListener("click", () => {
    //animate it out
    document.querySelector(".detail-wrapper").style.animation = "fadeOut 0.5s ease forwards";
    setTimeout(() => {
        document.querySelector(".detail-wrapper").style.display = "none";
        document.querySelector(".detail-wrapper").style.animation = "none";
    }, 500);
});