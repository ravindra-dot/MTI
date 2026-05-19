/*==================
RECAPTCHA SITE KEY 
====================*/
const SITE_KEY = "6Lc5ruwsAAAAAEA7eRiZ2fpUAg1b-ikB-EHOBKos";

/*==================
SWITCH AUTH TABS
====================*/

function switchAuthTab(target) {
  const loginForm = document.getElementById("form-login");
  const registerForm = document.getElementById("form-register");
  const tabLogin = document.getElementById("tab-login");
  const tabRegister = document.getElementById("tab-register");

  if (!loginForm || !registerForm || !tabLogin || !tabRegister) return;

  if (target === "login") {
    loginForm.classList.remove("hidden");
    registerForm.classList.add("hidden");

    tabLogin.className =
      "w-1/2 py-4 text-blue-900 bg-white border-b-2 border-blue-900 font-bold text-center cursor-pointer";

    tabRegister.className =
      "w-1/2 py-4 text-gray-400 bg-gray-50 hover:bg-gray-100 transition text-center cursor-pointer";
  } else {
    loginForm.classList.add("hidden");
    registerForm.classList.remove("hidden");

    tabRegister.className =
      "w-1/2 py-4 text-blue-900 bg-white border-b-2 border-blue-900 font-bold text-center cursor-pointer";

    tabLogin.className =
      "w-1/2 py-4 text-gray-400 bg-gray-50 hover:bg-gray-100 transition text-center cursor-pointer";
  }
}

/*===============================
REGISTRATION VALIDATION FUNCTION
==================================*/
function validateRegForm() {
  const emailEl = document.getElementById("reg-email");
  const passwordEl = document.getElementById("reg-password");
  const emailError = document.getElementById("email-error");
  const passwordError = document.getElementById("password-error");

  if (!emailEl || !passwordEl || !emailError || !passwordError) return false;

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

  let isValid = true;

  if (!emailRegex.test(emailEl.value)) {
    emailError.classList.remove("hidden");
    isValid = false;
  } else {
    emailError.classList.add("hidden");
  }

  if (!passwordRegex.test(passwordEl.value)) {
    passwordError.classList.remove("hidden");
    isValid = false;
  } else {
    passwordError.classList.add("hidden");
  }

  return isValid;
}

/*==============================
REGISTERRATION  SUBMIT HANDLER
================================*/
function handleRegisterSubmit(event) {
  event.preventDefault();

  if (!validateRegForm()) return false;

  if (typeof grecaptcha !== "undefined") {
    grecaptcha.ready(function () {
      grecaptcha
        .execute(SITE_KEY, { action: "register" })
        .then(function (token) {
          const tokenInput = document.getElementById("recaptcha-token");

          if (tokenInput) tokenInput.value = token;

          if (typeof AuthEngine !== "undefined") {
            AuthEngine.login();
          } else {
            localStorage.setItem("isLoggedIn", "true");
            localStorage.setItem("userName", "Ravindra Singh");
          }

          window.location.href = "dashboard.html";
        });
    });
  } else {
    if (typeof AuthEngine !== "undefined") AuthEngine.login();

    window.location.href = "dashboard.html";
  }
}

/*==============================
LOGIN SUBMIT HANDLER
================================*/
function handleLoginSubmit(event) {
  event.preventDefault();

  if (typeof AuthEngine !== "undefined") {
    AuthEngine.login();
  } else {
    localStorage.setItem("isLoggedIn", "true");
    localStorage.setItem("userName", "Ravindra Singh");
  }

  window.location.href = "dashboard.html";
}

/*====================================================
    SYSTEM LIFECYCLE INITIALIZER
=======================================================*/
document.addEventListener("DOMContentLoaded", () => {
  document
    .getElementById("form-register")
    ?.addEventListener("submit", handleRegisterSubmit);

  document
    .getElementById("form-login")
    ?.addEventListener("submit", handleLoginSubmit);

  document
    .getElementById("tab-login")
    ?.addEventListener("click", () => switchAuthTab("login"));

  document
    .getElementById("tab-register")
    ?.addEventListener("click", () => switchAuthTab("register"));

  document.getElementById("reg-email")?.addEventListener("input", function () {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailRegex.test(this.value)) {
      document.getElementById("email-error")?.classList.add("hidden");
    }
  });

  document
    .getElementById("reg-password")
    ?.addEventListener("input", function () {
      const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

      if (passwordRegex.test(this.value)) {
        document.getElementById("password-error")?.classList.add("hidden");
      }
    });

  const urlParams = new URLSearchParams(window.location.search);

  if (urlParams.get("tab") === "register") {
    switchAuthTab("register");
  } else {
    switchAuthTab("login");
  }
});
