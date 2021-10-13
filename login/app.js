const inputs = document.querySelectorAll(".input-field");

inputs.forEach( inp => {
    inp.addEventListener("focus", () => {
        inp.classList.add("active");
    });
    inp.addEventListener("blur", () => {
        inp.classList.remove("active");
    })
});