function toggleDropdown() {
    const menu = document.getElementById('userMenu');
    menu.classList.toggle('hidden');
}

const openProfileModal = document.getElementById("openProfileModal");
const profileModal = document.getElementById("profileModal");
const closeProfileModal = document.getElementById("closeProfileModal");

openProfileModal.addEventListener("click", () => {
    profileModal.classList.remove("hidden");
});

closeProfileModal.addEventListener("click", () => {
    profileModal.classList.add("hidden");
});

window.addEventListener("click", (event) => {
    if (event.target === profileModal) {
        profileModal.classList.add("hidden");
    }
});

function toggleMenu() {
    const logo = document.getElementById('logo');

    logo.classList.add('rotate-animation');

    setTimeout(() => {
        location.reload();
    }, 500);
}