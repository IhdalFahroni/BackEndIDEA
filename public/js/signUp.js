document.addEventListener('DOMContentLoaded', () => {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const passwordInput = document.getElementById('password');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const passwordError = document.getElementById('passwordError');
    const usernameError = document.getElementById('usernameError');
    const signUpBtn = document.getElementById('signUpBtn');
    const namaDepanInput = document.getElementById('nama_depan');
    const namaBelakangInput = document.getElementById('nama_belakang');
    const usernameInput = document.getElementById('username');
    const allField = document.getElementById('allField');

    if (togglePasswordIcon) {
        togglePasswordIcon.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    }

    function checkFormAndDisplayErrors() {
        const firstName = namaDepanInput.value.trim();
        const lastName = namaBelakangInput.value.trim();
        const email = emailInput.value.trim();
        const username = usernameInput.value.trim();
        const password = passwordInput.value;

        const isAllFieldsFilled = firstName !== "" && email !== "" && username !== "" && password !== "" && lastName !== "";

        if (isAllFieldsFilled) {
            allField.classList.add('hidden');
        } else {
            allField.classList.remove('hidden');
        }

        if (username !== "") {
            if (username.length < 8 || username.length > 20) {
                usernameError.classList.remove('hidden');
            } else {
                usernameError.classList.add('hidden');
            }
        } else {
            usernameError.classList.add('hidden');
        }

        if (email !== "") {
            if (!email.includes('@')) {
                emailError.classList.remove('hidden');
            } else {
                emailError.classList.add('hidden');
            }
        } else {
            emailError.classList.add('hidden');
        }

        if (password !== "") {
            if (password.length < 8 || password.length > 20) {
                passwordError.classList.remove('hidden');
            } else {
                passwordError.classList.add('hidden');
            }
        } else {
            passwordError.classList.add('hidden');
        }

        const isFirstNameValid = firstName !== "";
        const isLastNameValid = lastName !== "";
        const isUsernameValid = username.length >= 8 && username.length <= 20;
        const isEmailValid = email.includes('@') && email !== "";
        const isPasswordValid = password.length >= 8 && password.length <= 20;

        const isFormCompletelyValid = isFirstNameValid && isLastNameValid && isUsernameValid && isEmailValid && isPasswordValid;

        if (isFormCompletelyValid) {
            signUpBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            signUpBtn.classList.add('cursor-pointer');
            signUpBtn.disabled = false;
        } else {
            signUpBtn.classList.add('opacity-50', 'cursor-not-allowed');
            signUpBtn.classList.remove('cursor-pointer');
            signUpBtn.disabled = true;
        }
    }

    if (namaDepanInput) {
        namaDepanInput.addEventListener('input', checkFormAndDisplayErrors);
    }
    if (usernameInput) {
        usernameInput.addEventListener('input', checkFormAndDisplayErrors);
    }
    if (emailInput) {
        emailInput.addEventListener('input', checkFormAndDisplayErrors);
    }
    if (passwordInput) {
        passwordInput.addEventListener('input', checkFormAndDisplayErrors);
    }
});
