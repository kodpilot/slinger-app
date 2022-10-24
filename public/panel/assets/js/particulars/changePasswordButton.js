let close;
let closed;
let button_close;
const button = document.getElementsByClassName("reset-button");
for (let k = 0; k < button.length; k++) {
    const element = button[k];
    element.addEventListener("click", () => {
        close = document.getElementsByClassName("change")[0];
        closed = document.getElementsByClassName("changed")[0];
        button_close = document.getElementsByClassName("reset-button")[0];
        if (close.classList.contains("d-none")) {
            close.classList.remove("d-none");
            closed.classList.add("d-none");
            button_close.classList.add("d-none");
        } else {
            close.classList.add("d-none");
            closed.classList.remove("d-none");
            button_close.classList.remove("d-none");
        }
    });
}
let second_change;
let second_changed;
let second_button_close;
const button2 = document.getElementsByClassName("reset-button2");
for (let j = 0; j < button2.length; j++) {
    const element = button2[j];
    element.addEventListener("click", () => {
        second_change = document.getElementsByClassName("change")[0];
        second_changed = document.getElementsByClassName("changed")[0];
        second_button_close =
            document.getElementsByClassName("reset-button")[0];
        if (close.classList.contains("d-none")) {
            second_change.classList.remove("d-none");
            second_changed.classList.add("d-none");
            second_button_close.classList.add("d-none");
        } else {
            second_change.classList.add("d-none");
            second_changed.classList.remove("d-none");
            second_button_close.classList.remove("d-none");
        }
    });
}
