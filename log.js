const inputs = document.querySelectorAll(".falt");
const toggleBtns = document.querySelectorAll(".vaxla");
const main = document.querySelector("main");

// Add event listeners for input fields
inputs.forEach((input) => {
input.addEventListener("focus", () => {
input.classList.add("active");
});
});

// Add event listeners for toggle buttons
toggleBtns.forEach((btn) => {
btn.addEventListener("click", () => {
main.classList.toggle("sign-up-mode");
});
});

