const SITE_KEY = "6Lc5ruwsAAAAAEA7eRiZ2fpUAg1b-ikB-EHOBKos";

function switchAuthTab(target) {
  const loginForm = document.getElementById("form-login");
  const registerForm = document.getElementById("form-register");
  const tabLogin = document.getElementById("tab-login");
  const tabRegister = document.getElementById("tab-register");

  if (target === "login") {
    loginForm.classList.remove("hidden");
    registerForm.classList.add("hidden");
    tabLogin.className =
      "w-1/2 py-4 text-blue-900 bg-white border-b-2 border-blue-900";
    tabRegister.className =
      "w-1/2 py-4 text-gray-400 bg-gray-50 hover:bg-gray-100 transition";
  } else {
    loginForm.classList.add("hidden");
    registerForm.classList.remove("hidden");
    tabRegister.className =
      "w-1/2 py-4 text-blue-900 bg-white border-b-2 border-blue-900";
    tabLogin.className =
      "w-1/2 py-4 text-gray-400 bg-gray-50 hover:bg-gray-100 transition";
  }
}

// Handles standard front-end fields validation
function validateRegForm() {
  const email = document.getElementById("reg-email").value;
  const password = document.getElementById("reg-password").value;

  const emailError = document.getElementById("email-error");
  const passwordError = document.getElementById("password-error");

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

  let isValid = true;

  if (!emailRegex.test(email)) {
    emailError.classList.remove("hidden");
    isValid = false;
  } else {
    emailError.classList.add("hidden");
  }

  if (!passwordRegex.test(password)) {
    passwordError.classList.remove("hidden");
    isValid = false;
  } else {
    passwordError.classList.add("hidden");
  }

  return isValid;
}

//New submission handler intercepts form submit to fetch reCAPTCHA token asynchronously
function handleRegisterSubmit(event) {
  event.preventDefault(); // Pause form tracking/submission

  // Run normal input validations first
  if (!validateRegForm()) {
    return false;
  }

  // Request token securely from Google reCAPTCHA
  grecaptcha.ready(function () {
    grecaptcha.execute(SITE_KEY, { action: "register" }).then(function (token) {
      // Assign token to our hidden form input
      document.getElementById("recaptcha-token").value = token;

      // Resume submitting the form natively to your action URL (dashboard.html / backend)
      document.getElementById("form-register").submit();
    });
  });
}

// Real-time input error cleanups
document.getElementById("reg-email").addEventListener("input", function () {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailRegex.test(this.value))
    document.getElementById("email-error").classList.add("hidden");
});

document.getElementById("reg-password").addEventListener("input", function () {
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  if (passwordRegex.test(this.value))
    document.getElementById("password-error").classList.add("hidden");
});

const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("tab") === "register") switchAuthTab("register");
