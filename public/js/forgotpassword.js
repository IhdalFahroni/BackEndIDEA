document.addEventListener("DOMContentLoaded", () => {
  const emailInput = document.getElementById("email");
  const newPasswordInput = document.getElementById("newPassword");
  const confirmPasswordInput = document.getElementById("confirmPassword");
  const resetBtn = document.getElementById("resetBtn");

  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");
  const confirmError = document.getElementById("confirmError");

  const passwordToggles = document.querySelectorAll(".toggle-password");

  function validateForm() {
    const isEmailValid = emailInput.value.includes("@");
    const isPasswordValid = newPasswordInput.value.length >= 8;
    const doPasswordsMatch =
      newPasswordInput.value === confirmPasswordInput.value;

    // Tampilkan/sembunyikan pesan error
    emailError.classList.toggle("hidden", isEmailValid);
    passwordError.classList.toggle("hidden", isPasswordValid);
    // Pesan error konfirmasi hanya muncul jika password utama sudah valid tapi konfirmasi salah
    confirmError.classList.toggle(
      "hidden",
      !isPasswordValid || doPasswordsMatch
    );

    // Aktifkan/nonaktifkan tombol
    if (isEmailValid && isPasswordValid && doPasswordsMatch) {
      resetBtn.disabled = false;
      resetBtn.classList.remove("opacity-50", "cursor-not-allowed");
      resetBtn.classList.add("hover:bg-[#a89e8c]");
    } else {
      resetBtn.disabled = true;
      resetBtn.classList.add("opacity-50", "cursor-not-allowed");
      resetBtn.classList.remove("hover:bg-[#a89e8c]");
    }
  }

  // Listener untuk toggle show/hide password
  passwordToggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const passwordInput = toggle.previousElementSibling;
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggle.classList.remove("fa-eye");
        toggle.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        toggle.classList.remove("fa-eye-slash");
        toggle.classList.add("fa-eye");
      }
    });
  });

  // Panggil validasi setiap kali ada input
  emailInput.addEventListener("input", validateForm);
  newPasswordInput.addEventListener("input", validateForm);
  confirmPasswordInput.addEventListener("input", validateForm);
});
