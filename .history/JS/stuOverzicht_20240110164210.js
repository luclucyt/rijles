let lessen = document.querySelectorAll(".les-wrapper");
let detail = document.querySelector(".detail-wrapper");
const spinner = document.querySelector(".spinner-background");

lessen.forEach((les) => {
    les.addEventListener("click", () => {
        spinner.style.display = "flex";

        lessen.forEach((les) => {
            les.classList.remove("selected-les");
        });

        les.classList.add("selected-les");

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "inc/getLesData.php", false);

        let formData = new FormData();

        //get the value from "data-lesID"
        let lesID = les.getAttribute("data-lesID");
        formData.append("lesID", lesID);

        xhr.onload = () => {
            let response = xhr.responseText;
            try {
                response = JSON.parse(response);
            } catch {
                response = [
                    (datum) => "-",
                    (startTijd) => "-",
                    (eindTijd) => "-",
                    (docent) => "-",
                    (todo) => "-",
                    (note) => "-",
                ];
            }

            //show them in the detail-wrapper
            document.querySelector(".detail-datum").innerHTML = response.datum;
            document.querySelector(".detail-startTijd").innerHTML =
                response.startTijd;
            document.querySelector(".detail-eindTijd").innerHTML =
                response.eindTijd;
            document.querySelector(".detail-instructeur").innerHTML =
                response.docent;
            document.querySelector(".opmerking-content").innerHTML =
                response.note;
            document.querySelector(".todo-content").innerHTML = response.todo;

            // spinner.style.display = "none";
        };
        xhr.send(formData);

        detail.style.display = "block";
        detail.style.animation = "fadeIn 0.5s ease forwards";
    });
});

let firstLes = document.querySelector(".les-wrapper");
firstLes.click();

//add an event listener to the close the detail-wrapper
document.querySelector(".detail-close").addEventListener("click", () => {
    //animate it out
    detail.style.animation = "fadeOut 0.5s ease forwards";
    setTimeout(() => {
        detail.style.display = "none";
        detail.style.animation = "none";
    }, 500);
});
