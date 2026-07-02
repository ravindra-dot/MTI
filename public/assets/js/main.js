/* =========================================================
              NAVBAR SCROLL EFFECT
========================================================= */
document.addEventListener("DOMContentLoaded", () => {

    const navbar = document.getElementById("smart-navbar");
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileDropdownMenu = document.getElementById("mobile-dropdown-menu");
    const menuIcon = document.getElementById("menu-icon");
    const mobileNavLinks = document.querySelectorAll(".mobile-nav-link");

    let lastScrollY = window.scrollY;
    let isMenuOpen = false;

    /* =========================================================
                  MOBILE MENU TOGGLE
    ========================================================= */
    if (mobileMenuBtn && mobileDropdownMenu) {

        mobileMenuBtn.addEventListener("click", () => {

            isMenuOpen = !isMenuOpen;

            if (isMenuOpen) {
                mobileDropdownMenu.classList.remove("hidden");

                menuIcon?.classList.remove("fa-bars");
                menuIcon?.classList.add("fa-xmark");

            } else {

                mobileDropdownMenu.classList.add("hidden");

                menuIcon?.classList.remove("fa-xmark");
                menuIcon?.classList.add("fa-bars");
            }
        });
    }

    /* =========================================================
                  MOBILE LINK CLICK CLOSE
    ========================================================= */
    mobileNavLinks.forEach(link => {

        link.addEventListener("click", () => {

            mobileDropdownMenu?.classList.add("hidden");

            menuIcon?.classList.remove("fa-xmark");
            menuIcon?.classList.add("fa-bars");

            isMenuOpen = false;
        });
    });

    /* =========================================================
                  NAVBAR SHOW / HIDE ON SCROLL
    ========================================================= */
    window.addEventListener("scroll", () => {

        const currentScroll = window.scrollY;

        if (isMenuOpen) return;

        if (currentScroll < 20) {

            navbar?.classList.remove("-translate-y-full");
            navbar?.classList.add("translate-y-0");

            return;
        }

        if (currentScroll > lastScrollY) {

            navbar?.classList.remove("translate-y-0");
            navbar?.classList.add("-translate-y-full");

        } else {

            navbar?.classList.remove("-translate-y-full");
            navbar?.classList.add("translate-y-0");
        }

        lastScrollY = currentScroll;
    });

});