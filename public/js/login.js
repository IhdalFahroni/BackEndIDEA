document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const loginBtn = document.getElementById('loginBtn');

    if (togglePasswordIcon) {
        togglePasswordIcon.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    }

    if(loginBtn) {
        loginBtn.addEventListener('click', function () {
            window.location.href = "HomePageUser.html";
        });
    }
});