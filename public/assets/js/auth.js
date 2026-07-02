/*==================
SWITCH AUTH TABS
====================*/
function switchAuthTab(target) {

    const loginForm = document.getElementById('form-login');
    const registerForm = document.getElementById('form-register');

    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');

    if (target === 'login') {

        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');

        tabLogin.classList.add('text-blue-900', 'border-blue-900', 'bg-white');
        tabLogin.classList.remove('text-gray-400', 'bg-gray-50');

        tabRegister.classList.remove('text-blue-900', 'border-blue-900', 'bg-white');
        tabRegister.classList.add('text-gray-400', 'bg-gray-50');

    } else {

        registerForm.classList.remove('hidden');
        loginForm.classList.add('hidden');

        tabRegister.classList.add('text-blue-900', 'border-blue-900', 'bg-white');
        tabRegister.classList.remove('text-gray-400', 'bg-gray-50');

        tabLogin.classList.remove('text-blue-900', 'border-blue-900', 'bg-white');
        tabLogin.classList.add('text-gray-400', 'bg-gray-50');
    }
}

function togglePassword(inputId, iconId) {

    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {
        input.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

    } else {

        input.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
