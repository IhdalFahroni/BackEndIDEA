document.addEventListener('DOMContentLoaded', () => {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const forgotBtn = document.getElementById('forgotBtn');

    emailInput.addEventListener('input', function() {
        const email = emailInput.value;
        if (!email.includes('@')) {
            emailError.classList.remove('hidden');
        } else {
            emailError.classList.add('hidden');
            forgotBtn.classList.remove('cursor-not-allowed', 'opacity-50');
            forgotBtn.classList.add('cursor-pointer');
        }
    });
    if (forgotBtn) {
        forgotBtn.addEventListener('click', function (e) {
            e.preventDefault();
            alert('The Link has been sent to your email');
            window.location.href = 'LoginPage.html';
        });
    }
});