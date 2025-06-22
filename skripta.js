/* Dropdown menu */
const toggleBtn = document.getElementById("menuToggle");
const dropdown = document.getElementById("dropdownMenu");

toggleBtn.addEventListener("click", () => {
    dropdown.classList.toggle("d-none");
});