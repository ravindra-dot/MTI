const config = window.appConfig || {};
/*==================
SWITCH AUTH TABS
====================*/
function switchAuthTab(target) {
    const loginForm = document.getElementById('form-login');
    const registerForm = document.getElementById('form-register');

    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');

    if (!loginForm || !registerForm) return;

    const showLogin = target === 'login';

    loginForm.classList.toggle('hidden', !showLogin);
    registerForm.classList.toggle('hidden', showLogin);

    tabLogin?.classList.toggle('text-blue-900', showLogin);
    tabLogin?.classList.toggle('border-blue-900', showLogin);
    tabLogin?.classList.toggle('bg-white', showLogin);

    tabRegister?.classList.toggle('text-blue-900', !showLogin);
    tabRegister?.classList.toggle('border-blue-900', !showLogin);
    tabRegister?.classList.toggle('bg-white', !showLogin);
}

/* =========================
   PASSWORD TOGGLE
========================= */
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (!input) return;

    const isHidden = input.type === "password";
    input.type = isHidden ? "text" : "password";

    icon?.classList.toggle("fa-eye", !isHidden);
    icon?.classList.toggle("fa-eye-slash", isHidden);
}

/* =========================
   SEND OTP
========================= */
window.sendOtp = function () {
    const email = document.getElementById("reg-email").value;
    const errorBox = document.getElementById("email-error");

    if (errorBox) errorBox.innerText = "";

    if (!email) {
        if (errorBox) errorBox.innerText = "Email required";
        return;
    }

    fetch("/send-otp", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": config.csrfToken
        },
        body: JSON.stringify({ email })
    })
    .then(res => res.json())
    .then(data => {

        if (!data.status) {
            if (errorBox) errorBox.innerText = data.message;
            return;
        }

        errorBox.innerText = "";

        document.getElementById("step-email").classList.add("hidden");
        document.getElementById("step-otp").classList.remove("hidden");
    });
};

/* =========================
   VERIFY OTP
========================= */
window.verifyOtp = function () {
    const email = document.getElementById("reg-email").value;
    const otp = document.getElementById("otp").value;

    const box = document.getElementById("otp-error");
    if (box) box.innerText = "";

    fetch("/verify-otp", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": config.csrfToken
        },
        body: JSON.stringify({ email, otp })
    })
    .then(res => res.json())
    .then(data => {

        if (!data.status) {
            if (box) box.innerText = data.message;
            return;
        }

        box.innerText = "";

        document.getElementById("step-otp").classList.add("hidden");
        document.getElementById("step-register").classList.remove("hidden");
    });
};