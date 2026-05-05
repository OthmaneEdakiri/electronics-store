import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

/* Header */
const accountBtn = document.querySelector(".account-btn");
const accountLinks = document.querySelector(".account-links");

accountBtn.addEventListener("click", () => {
    accountLinks.classList.toggle("hidden");
    accountLinks.classList.toggle("flex");
});

document.addEventListener("click", (event) => {
    if (
        !accountBtn.contains(event.target) &&
        !accountLinks.contains(event.target)
    ) {
        accountLinks.classList.add("hidden");
        accountLinks.classList.remove("flex");
    }
});

// Mobile menu toggle
const mobileMenuBtn = document.getElementById("mobile-menu-btn");
const sidebarOverlay = document.getElementById("sidebar-overlay");
const sidebarBackdrop = document.getElementById("sidebar-backdrop");

if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener("click", function () {
        if (sidebarOverlay) {
            sidebarOverlay.classList.toggle("hidden");
        }
    });
}

if (sidebarBackdrop) {
    sidebarBackdrop.addEventListener("click", function () {
        sidebarOverlay.classList.add("hidden");
    });
}
