const inputs = document.querySelectorAll(".input-field");
const toggles = document.querySelectorAll(".toggle");
const main = document.querySelector("main");

inputs.forEach( inp => {
    inp.addEventListener("focus", () => {
        inp.classList.add("active");
    });
    inp.addEventListener("blur", () => {
        if(inp.value != "") return;
        inp.classList.remove("active");
    });
});

toggles.forEach(toggle => {
    toggle.addEventListener("click", () => {
        main.classList.toggle("register-mode");
    });
});