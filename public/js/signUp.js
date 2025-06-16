document.addEventListener('DOMContentLoaded', () => {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const passwordInput = document.getElementById('password');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const passwordError = document.getElementById('passwordError');
    const usernameError = document.getElementById('usernameError');
    const signUpBtn = document.getElementById('signUpBtn');
    const nameInput = document.getElementById('name');
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
        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const username = usernameInput.value.trim();
        const password = passwordInput.value;

        const isAllFieldsFilled = name !== "" && email !== "" && username !== "" && password !== "";

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

        const isNameValid = name !== "";
        const isUsernameValid = username.length >= 8 && username.length <= 20;
        const isEmailValid = email.includes('@') && email !== "";
        const isPasswordValid = password.length >= 8 && password.length <= 20;

        const isFormCompletelyValid = isNameValid && isUsernameValid && isEmailValid && isPasswordValid;

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

    if (nameInput) {
        nameInput.addEventListener('input', checkFormAndDisplayErrors);
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

    function handleSignUp() {
        checkFormAndDisplayErrors();

        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const username = usernameInput.value.trim();
        const password = passwordInput.value;
        let isValid = true;

        if (name === "" || email === "" || username === "" || password === "") {
            allField.classList.remove('hidden');
            isValid = false;
        } else {
            allField.classList.add('hidden');
        }

        if (username.length < 8 || username.length > 20) {
            usernameError.classList.remove('hidden');
            isValid = false;
        } else {
            usernameError.classList.add('hidden');
        }

        if (!email.includes('@')) {
            emailError.classList.remove('hidden');
            isValid = false;
        } else {
            emailError.classList.add('hidden');
        }

        if (password.length < 8 || password.length > 20) {
            passwordError.classList.remove('hidden');
            isValid = false;
        } else {
            passwordError.classList.add('hidden');
        }

        if (isValid) {
            console.log("Sign Up button clicked!");
            console.log("Name:", name);
            console.log("Email:", email);
            console.log("Username:", username);
            console.log("Password:", password);
        }

        return isValid;
    }

    if (signUpBtn) {
        signUpBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if(handleSignUp()) {
                alert('Successfully Sign Up');
                window.location.href = 'LoginPage.html';
            }
        });
    }
});
