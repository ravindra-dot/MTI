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

    mobileMenuBtn.addEventListener("click", () => {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            mobileDropdownMenu.classList.remove("hidden");
            menuIcon.classList.remove("fa-bars");
            menuIcon.classList.add("fa-xmark");
        } else {
            mobileDropdownMenu.classList.add("hidden");
            menuIcon.classList.remove("fa-xmark");
            menuIcon.classList.add("fa-bars");
        }
    });

    mobileNavLinks.forEach(link => {
        link.addEventListener("click", () => {
            mobileDropdownMenu.classList.add("hidden");
            menuIcon.classList.remove("fa-xmark");
            menuIcon.classList.add("fa-bars");
            isMenuOpen = false;
        });
    });
    window.addEventListener("scroll", () => {
        const currentScroll = window.scrollY;

        if (isMenuOpen) return;

        if (currentScroll < 20) {
            navbar.classList.remove("-translate-y-full");
            navbar.classList.add("translate-y-0");
            return;
        }

        if (currentScroll > lastScrollY) {
            navbar.classList.remove("translate-y-0");
            navbar.classList.add("-translate-y-full");
        } 

        else {
            navbar.classList.remove("-translate-y-full");
            navbar.classList.add("translate-y-0");
        }

        lastScrollY = currentScroll;
    });

/* =========================================================
              GUESTUSER AND USER VIEW RENDERER
========================================================= */
    // 1. Check if user is logged in
    const isLoggedIn = typeof AuthEngine !== "undefined" ? AuthEngine.isLoggedIn() : false;
    const user = typeof AuthEngine !== "undefined" ? AuthEngine.getCurrentUser() : null;
    const userName = user ? user.name : "Participant";

    // 2. DOM Elements Selection
    const guestNavActions = document.getElementById("guest-nav-actions");
    const MguestNavActions = document.getElementById("Mguest-nav-actions");
    const userNavActions = document.getElementById("user-nav-actions");
    const heroRegisterBtn = document.getElementById("hero-register-btn");
    const heroDashboardBtn = document.getElementById("hero-dashboard-btn");
    const guestCardContent = document.getElementById("guest-card-content");
    const userCardContent = document.getElementById("user-card-content");
    const welcomeUserName = document.getElementById("welcome-user-name");

// 3. Render Logic depending on State
    if (isLoggedIn) {
        if(guestNavActions) {
            guestNavActions.classList.replace("lg:flex", "hidden");
        }
        if(MguestNavActions) {
            MguestNavActions.classList.replace("block", "hidden");
        }
        if(userNavActions) {
            userNavActions.classList.remove("hidden");
            userNavActions.classList.add("flex");
        }
        if(heroRegisterBtn) heroRegisterBtn.classList.add("hidden");
        if(heroDashboardBtn) heroDashboardBtn.classList.remove("hidden");

        if(guestCardContent) guestCardContent.classList.add("hidden");
        if(userCardContent) {
            userCardContent.classList.remove("hidden");
            if(welcomeUserName) welcomeUserName.textContent = userName;
        }
    } else {
        // Guest layout setting (Fallback safety)
        if(guestNavActions) {
            guestNavActions.classList.remove("hidden");
            guestNavActions.classList.add("hidden", "lg:flex");
        }
        if(MguestNavActions) {
            MguestNavActions.classList.remove("hidden");
            MguestNavActions.classList.add("block", "lg:hidden");
        }
        if(userNavActions) {
            userNavActions.classList.replace("flex", "hidden");
        }
        if(heroRegisterBtn) heroRegisterBtn.classList.remove("hidden");
        if(heroDashboardBtn) heroDashboardBtn.shadowRoot ? "" : heroDashboardBtn.classList.add("hidden"); 
        if(guestCardContent) guestCardContent.classList.remove("hidden");
        if(userCardContent) userCardContent.classList.add("hidden");
    }
});