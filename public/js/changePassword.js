document.addEventListener('DOMContentLoaded', () => {
    const newPass = document.getElementById('newPassword');
    const confirmNewPass = document.getElementById('confirmPassword');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const passwordError = document.getElementById('passwordError');
    const passwordDontMatchError = document.getElementById('passwordDontMatch');
    const changeBtn = document.getElementById('changeBtn');

    function updateChangeBtnState() {
        const password = newPass.value;
        const confirm = confirmNewPass.value;
        const isPasswordValid = password.length >= 8 && password.length <= 20;
        const isMatch = password === confirm;
        const isFilled = password !== "" && confirm !== "";

        if (isPasswordValid && isMatch && isFilled) {
            changeBtn.classList.remove('cursor-not-allowed', 'opacity-50');
            changeBtn.classList.add('cursor-pointer');
            changeBtn.disabled = false;
        } else {
            changeBtn.classList.add('cursor-not-allowed', 'opacity-50');
            changeBtn.classList.remove('cursor-pointer');
            changeBtn.disabled = true;
        }
    }

    if (togglePasswordIcon) {
        togglePasswordIcon.addEventListener('click', function () {
            const type = confirmNewPass.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmNewPass.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    }

    // Initial state
    updateChangeBtnState();

    newPass.addEventListener('input', function() {
        const password = newPass.value;
        if (password.length < 8 || password.length > 20) {
            passwordError.classList.remove('hidden'); 
        } else {
            passwordError.classList.add('hidden'); 
        }
        updateChangeBtnState();
    });

    confirmNewPass.addEventListener('input', function() {
        const password = newPass.value;
        const confirm = confirmNewPass.value;
        if (password != confirm) {
            passwordDontMatchError.classList.remove('hidden');
        } else {
            passwordDontMatchError.classList.add('hidden'); 
        }
        updateChangeBtnState();
    });

    if (changeBtn) {
        changeBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (changeBtn.disabled) return;
            alert('Successfuly change password');
            window.location.href = 'LoginPage.html';
        });
    }
});