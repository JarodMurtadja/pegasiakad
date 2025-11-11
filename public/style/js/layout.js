// ==========================
// FINAL VERSION - SIDEBAR.JS
// ==========================

// Elemen penting
const sidebarToggle = document.querySelector("#sidebar-toggle");
const sidebar = document.querySelector("#sidebar");

// Buat overlay (untuk mode HP)
let overlay = document.createElement("div");
overlay.classList.add("sidebar-overlay");
document.body.appendChild(overlay);

// ==========================
// SIDEBAR TOGGLE (Responsif)
// ==========================
if (sidebarToggle && sidebar) {
    sidebarToggle.addEventListener("click", function () {
        sidebar.classList.toggle("active");
        overlay.classList.toggle("show");
    });
}

// Tutup sidebar saat overlay diklik
overlay.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("show");
});

// Tutup sidebar otomatis di HP saat link diklik
document.querySelectorAll(".sidebar-nav a").forEach(link => {
    link.addEventListener("click", () => {
        if (window.innerWidth <= 992 && sidebar.classList.contains("active")) {
            sidebar.classList.remove("active");
            overlay.classList.remove("show");
        }
    });
});

// ==========================
// SIDEBAR ACTIVE LINK
// ==========================
function setActiveLink() {
    const savedPath = localStorage.getItem("activeSidebarLink");
    const openDropdownId = localStorage.getItem("openDropdownId");

    document.querySelectorAll(".sidebar-nav li.sidebar-item a").forEach(link => {
        const linkPath = link.getAttribute("href");
        const path = linkPath.split("/").slice(3).join("/");
        const item = link.closest("li.sidebar-item");

        item.classList.remove("active");

        if (
            window.location.href === linkPath ||
            (window.location.href.includes(path) && path && path !== "kalender") ||
            (window.location.href.includes("jam-pelajaran") && path === "kalender") ||
            (window.location.href.includes("buku-absen") && path.includes("attendance"))
        ) {
            item.classList.add("active");

            // Buka dropdown kalau link di dalamnya
            const dropdown = link.closest(".collapse");
            if (dropdown) {
                const dropdownToggle = document.querySelector(`[data-bs-target="#${dropdown.id}"]`);
                if (dropdownToggle) {
                    dropdown.classList.add("show");
                    dropdownToggle.classList.remove("collapsed");
                    dropdownToggle.setAttribute("aria-expanded", "true");
                }
            }
        }
    });

    // Buka dropdown terakhir yang disimpan
    if (openDropdownId) {
        const dropdown = document.getElementById(openDropdownId);
        if (dropdown) {
            const dropdownToggle = document.querySelector(`[data-bs-target="#${openDropdownId}"]`);
            dropdown.classList.add("show");
            if (dropdownToggle) {
                dropdownToggle.classList.remove("collapsed");
                dropdownToggle.setAttribute("aria-expanded", "true");
            }
        }
    }
}

// ==========================
// SIMPAN LINK AKTIF
// ==========================
document.querySelectorAll(".sidebar-nav li.sidebar-item a").forEach(link => {
    link.addEventListener("click", function () {
        if (!this.parentElement.classList.contains("list-except")) {
            localStorage.setItem("activeSidebarLink", this.getAttribute("href"));
        }

        document.querySelectorAll(".sidebar-nav li.sidebar-item.active").forEach(item => {
            if (!item.classList.contains("list-except")) {
                item.classList.remove("active");
            }
        });

        this.closest("li.sidebar-item").classList.add("active");

        // Simpan dropdown terakhir yang dibuka
        if (this.hasAttribute("data-bs-target")) {
            const targetId = this.getAttribute("data-bs-target").substring(1);
            localStorage.setItem("openDropdownId", targetId);
        } else {
            localStorage.removeItem("openDropdownId");
        }
    });
});

// ==========================
// SIDEBAR STRUCTURE CHECK
// ==========================
document.querySelectorAll(".sidebar-nav li.sidebar-item.list-except ul").forEach(ul => {
    if (ul.children.length > 0) {
        ul.classList.add("has-children");
    }
});

window.addEventListener("load", setActiveLink);
