document.addEventListener("DOMContentLoaded", () => {
  // --- NAVIGASI DAN ELEMEN UI UTAMA ---
  const hamburgerBtn = document.getElementById("hamburgerBtn");
  const closeSidebarMenuBtn = document.getElementById("closeBtn");
  const sidebarMenu = document.getElementById("sidebarMenu");
  const mainContent = document.querySelector("main");

  const headerDiv = document.getElementById("header");
  const awalDiv = document.getElementById("awal");
  const notification = document.getElementById("notification");
  const addPlaceForm = document.getElementById("addPlace"); // Ini adalah FORM
  const profile = document.getElementById("profil");
  const manageVerification = document.getElementById("manageVerification");
  const listManage = document.getElementById('listPlace');

  const addPlaceModal = document.getElementById("addPlaceModal");
  const claimCulinaryModal = document.getElementById("claimCulinaryModal");

  const searchInput = document.getElementById("search_input");
  const searchButton = document.getElementById("searchButton");
  const filterButtons = document.querySelectorAll(".filter-button");

  const openNotificationBtns = [
    document.getElementById("notificationBtn"),
    document.getElementById("openNotificationBtn"),
  ].filter(Boolean);
  const openAddPlaceBtns = [
    document.getElementById("addPlaceBtn"),
    document.getElementById("openAddPlaceBtn"),
  ].filter(Boolean);
  const openProfilBtns = [
    document.getElementById("profilBtn"),
    document.getElementById("openProfilBtn"),
  ].filter(Boolean);
  const openManageVerificationBtns = [
    document.getElementById("manageVerificationBtn"),
    document.getElementById("openManageVerificationBtn"),
  ].filter(Boolean);
  const openManage = [
    document.getElementById('manageBtn'), 
    document.getElementById('openManageBtn')
  ].filter(Boolean);

  // --- ELEMEN PROFIL DAN PENGATURAN AKUN ---
  const containerProfile = document.getElementById("containerProfile");
  const profilPage = document.getElementById("profilPage");
  const editProfilePage = document.getElementById("editProfilePage");
  const bawahProfil = document.getElementById("bawahProfil");
  const accountSetting = document.getElementById("accountSetting");
  const editProfileBtn = document.getElementById("editProfileBtn");
  const cancelEditBtn = document.getElementById("cancelEditBtn");

  // --- ELEMEN GANTI PASSWORD PROFIL ---
  const savePasswordBtn = document.getElementById("savePasswordBtn");
  const passwordError = document.getElementById("passwordError");

  // --- TOMBOL LOGOUT & DELETE AKUN ---
  const logoutBtn = document.getElementById("logoutBtn");
  const openAccountSettingBtn = document.getElementById(
    "openAccountSettingBtn"
  );
  const closeAccountSettingBtn = document.getElementById(
    "closeAccountSettingBtn"
  );
  const deleteAccountBtn = document.getElementById("deleteAccountBtn"); // Ini tombol submit di form delete akun

  // --- FILE UPLOAD & GOOGLE MAPS ---
  const fileInput = document.getElementById("file-upload");
  const fileList = document.getElementById("file-list");
  const fileUploadVisual = document.getElementById("fileUploadVisual");
  const fileUploadPlaceholder = document.getElementById(
    "fileUploadPlaceholder"
  );
  const gmapsInput = document.getElementById("gmaps");

  // --- FORMS (REFERENSI KE ELEMEN <form> LANGSUNG) ---
  const attractionForm = document.getElementById("attractionForm");
  const editProfileForm = document.getElementById("editProfileForm");
  const changePasswordForm = document.getElementById("changePasswordForm");
  const deleteAccountForm = document.getElementById("deleteAccountForm");
  // Untuk verify, kita akan menggunakan querySelectorAll untuk form di manage_verification.php
  const verifyActionForms = document.querySelectorAll(
    ".verification-item form[data-action-form]"
  );

  let activePanel = "awal";

  // --- FUNGSI showPanel (untuk mengubah tampilan main content) ---
  function showPanel(panelName) {
    if (headerDiv) headerDiv.classList.add("hidden");
    if (awalDiv) awalDiv.classList.add("hidden");
    if (notification) notification.classList.add("hidden");
    if (addPlaceForm) addPlaceForm.classList.add("hidden");
    if (manageVerification) manageVerification.classList.add("hidden");
    if (profile) profile.classList.add("hidden");
    if (listManage) listManage.classList.add('hidden');

    switch (panelName) {
      case "awal":
        if (headerDiv) headerDiv.classList.remove("hidden");
        if (awalDiv) awalDiv.classList.remove("hidden");
        break;
      case "notification":
        if (notification) notification.classList.remove("hidden");
        break;
      case "addPlace":
        if (addPlaceForm) addPlaceForm.classList.remove("hidden");
        break;
      case "manageVerification":
        if (manageVerification) manageVerification.classList.remove("hidden");
        break;
      case 'listPlace':
        if(sidebarMenu) sidebarMenu.classList.remove('-translate-x-full');
        if(listManage) listManage.classList.remove('hidden');
        break;
      case "profil":
        if (profile) profile.classList.remove("hidden");
        if (containerProfile) containerProfile.classList.remove("hidden");
        if (profilPage) profilPage.classList.remove("hidden");
        if (bawahProfil) bawahProfil.classList.remove("hidden");
        if (editProfilePage) editProfilePage.classList.add("hidden");
        if (accountSetting) accountSetting.classList.add("hidden");
        break;
    }
    activePanel = panelName;

    if (sidebarMenu && sidebarMenu.classList.contains("translate-x-0")) {
      sidebarMenu.classList.remove("translate-x-0");
      sidebarMenu.classList.add("-translate-x-full");
      if (mainContent) mainContent.style.marginLeft = "5rem";
    }
  }

  // --- SIDEBAR TOGGLE ---
  if (mainContent) mainContent.style.transition = "margin-left 0.3s";
  if (hamburgerBtn && sidebarMenu && mainContent) {
    hamburgerBtn.addEventListener("click", () => {
      sidebarMenu.classList.remove("-translate-x-full");
      sidebarMenu.classList.add("translate-x-0");
      mainContent.style.marginLeft = "18rem";
    });
  }
  if (closeSidebarMenuBtn && sidebarMenu && mainContent) {
    closeSidebarMenuBtn.addEventListener("click", () => {
      sidebarMenu.classList.remove("translate-x-0");
      sidebarMenu.classList.add("-translate-x-full");
      mainContent.style.marginLeft = "5rem";
    });
  }

  // --- EVENT LISTENERS UNTUK TOMBOL UTAMA NAVIGASI SIDEBAR/TOPBAR ---
  openNotificationBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        showPanel(activePanel === "notification" ? "awal" : "notification");
      });
    }
  });

  openAddPlaceBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        showPanel(activePanel === "addPlace" ? "awal" : "addPlace");
      });
    }
  });

  openProfilBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        showPanel(activePanel === "profil" ? "awal" : "profil");
        if (editProfilePage && profilPage && bawahProfil && accountSetting) {
          profilPage.classList.remove("hidden");
          bawahProfil.classList.remove("hidden");
          accountSetting.classList.add("hidden");
          editProfilePage.classList.add("hidden");
        }
      });
    }
  });

  openManageVerificationBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        showPanel(
          activePanel === "manageVerification" ? "awal" : "manageVerification"
        );
      });
    }
  });

  if (openManage[0]) { 
        openManage[0].addEventListener('click', (e) => {
            e.preventDefault();
            sidebarMenu.classList.remove('-translate-x-full');
            mainContent.style.marginLeft = '18rem';
            listManage.classList.remove('hidden');
        });
    }
    if (openManage[1]) { 
        openManage[1].addEventListener('click', (e) => {
            e.preventDefault();
            listManage.classList.toggle('hidden');
        });
    }

  // --- LOGIKA PROFIL (EDIT, SAVE, CANCEL) ---
  if (editProfileBtn) {
    editProfileBtn.addEventListener("click", () => {
      if (profilPage) profilPage.classList.add("hidden");
      if (editProfilePage) editProfilePage.classList.remove("hidden");
      if (bawahProfil) bawahProfil.classList.add("hidden");
      validateProfileForm();
    });
  }

  // saveEditBtn tidak lagi memiliki event listener klik di sini
  // Karena form akan disubmit oleh browser secara native
  if (cancelEditBtn) {
    cancelEditBtn.addEventListener("click", () => {
      if (profilPage) profilPage.classList.remove("hidden");
      if (editProfilePage) editProfilePage.classList.add("hidden");
      if (bawahProfil) bawahProfil.classList.remove("hidden");
    });
  }

  // --- VALIDASI FORM PROFIL & PASSWORD (Client-Side) ---
  const showError = (inputElement, message) => {
    inputElement.classList.add("border-red-500");
    let errorSpan = inputElement.nextElementSibling;
    if (!errorSpan || !errorSpan.classList.contains("error-message")) {
      errorSpan = document.createElement("p");
      errorSpan.classList.add(
        "error-message",
        "text-red-500",
        "text-sm",
        "mt-1"
      );
      inputElement.parentNode.insertBefore(errorSpan, inputElement.nextSibling);
    }
    errorSpan.textContent = message;
  };

  const hideError = (inputElement) => {
    inputElement.classList.remove("border-red-500");
    let errorSpan = inputElement.nextElementSibling;
    if (errorSpan && errorSpan.classList.contains("error-message")) {
      errorSpan.textContent = "";
    }
  };

  // Validasi Form Edit Profil
  function validateProfileForm(form) {
    let isValid = true;
    form.querySelectorAll(".error-message").forEach((el) => el.remove());
    form
      .querySelectorAll(".border-red-500")
      .forEach((el) => el.classList.remove("border-red-500"));

    const usernameInput = form.querySelector("#editUsername");
    const firstNameInput = form.querySelector("#editFirstName");
    const lastNameInput = form.querySelector("#editLastName");

    if (!usernameInput || !firstNameInput || !lastNameInput) return false;

    const username = usernameInput.value.trim();
    const firstName = firstNameInput.value.trim();
    const lastName = lastNameInput.value.trim();
    const isUsernameLengthValid = username.length >= 8 && username.length <= 20;

    if (username.length === 0) {
      showError(usernameInput, "Username is required.");
      isValid = false;
    } else if (!isUsernameLengthValid) {
      showError(usernameInput, "Username must be 8-20 characters.");
      isValid = false;
    } else {
      hideError(usernameInput);
    }

    if (firstName.length === 0) {
      showError(firstNameInput, "First Name is required.");
      isValid = false;
    } else {
      hideError(firstNameInput);
    }

    if (lastName.length === 0) {
      showError(lastNameInput, "Last Name is required.");
      isValid = false;
    } else {
      hideError(lastNameInput);
    }

    // Periksa saveEditBtn yang relevan dengan form ini
    const formSaveEditBtn = form.querySelector("#saveEditBtn"); // Pastikan ini tombol dalam form ini
    if (formSaveEditBtn) {
      if (isValid) {
        formSaveEditBtn.disabled = false;
        formSaveEditBtn.classList.remove(
          "text-[#FF9800]",
          "bg-white",
          "opacity-50",
          "cursor-not-allowed"
        );
        formSaveEditBtn.classList.add("bg-[#FF9800]", "text-white");
      } else {
        formSaveEditBtn.disabled = true;
        formSaveEditBtn.classList.remove("bg-[#FF9800]", "text-white");
        formSaveEditBtn.classList.add(
          "text-[#FF9800]",
          "bg-white",
          "opacity-50",
          "cursor-not-allowed"
        );
      }
    }
    return isValid;
  }

  // Event listener untuk form edit profil
  if (editProfileForm) {
    editProfileForm.addEventListener("input", () =>
      validateProfileForm(editProfileForm)
    );
    editProfileForm.addEventListener("submit", (e) => {
      if (!validateProfileForm(editProfileForm)) {
        e.preventDefault(); // Hentikan submit jika validasi gagal
        alert("Tolong perbaiki kesalahan pada form profil.");
      }
      // Jika valid, form akan disubmit secara alami oleh browser
    });
    validateProfileForm(editProfileForm); // Validasi awal saat DOM dimuat
  }

  // Validasi Form Ganti Password
  function showPasswordFormErrors(form) {
    let isValid = true;
    // Bersihkan error lama sebelum validasi baru
    form.querySelectorAll(".error-message").forEach((el) => el.remove());
    form.querySelectorAll(".border-red-500").forEach((el) => el.classList.remove("border-red-500"));

    const currentPassInput = form.querySelector("#currentPassword");
    const newPassInput = form.querySelector("#newPass");

    if (!currentPassInput || !newPassInput) return false;

    const currentPass = currentPassInput.value.trim();
    const newPass = newPassInput.value.trim();
    const isNewPassLengthValid = newPass.length >= 8 && newPass.length <= 20;

    // Validasi Current Password
    if (currentPass.length === 0) {
        showError(currentPassInput, "Current password is required."); // Asumsi fungsi showError sudah ada
        isValid = false;
    } else {
        hideError(currentPassInput); // Asumsi fungsi hideError sudah ada
    }

    // Validasi New Password
    if (newPass.length === 0) {
        showError(newPassInput, "New password is required.");
        isValid = false;
    } else if (!isNewPassLengthValid) {
        showError(newPassInput, "Password must be 8-20 characters.");
        isValid = false;
    } else {
        hideError(newPassInput);
    }

    return isValid;
  }

  function updatePasswordButtonState(form) {
    const currentPassInput = form.querySelector("#currentPassword");
    const newPassInput = form.querySelector("#newPass");
    const formSavePasswordBtn = form.querySelector("#savePasswordBtn");

    if (!currentPassInput || !newPassInput || !formSavePasswordBtn) return;

    const currentPass = currentPassInput.value.trim();
    const newPass = newPassInput.value.trim();
    const isNewPassLengthValid = newPass.length >= 8 && newPass.length <= 20;

    // Tentukan validitas form secara keseluruhan
    const isFormValid = currentPass.length > 0 && newPass.length > 0 && isNewPassLengthValid;

    // Logika untuk mengatur tombol
    if (isFormValid) {
        formSavePasswordBtn.disabled = false;
        formSavePasswordBtn.classList.remove("text-[#FF9800]", "bg-white", "opacity-50", "cursor-not-allowed");
        formSavePasswordBtn.classList.add("bg-[#FF9800]", "text-white");
    } else {
        formSavePasswordBtn.disabled = true;
        formSavePasswordBtn.classList.remove("bg-[#FF9800]", "text-white");
        formSavePasswordBtn.classList.add("text-[#FF9800]", "bg-white", "opacity-50", "cursor-not-allowed");
    }
  }

  if (changePasswordForm) {
    // Saat pengguna mengetik, tampilkan error dan perbarui tombol secara real-time
    changePasswordForm.addEventListener("input", () => {
        showPasswordFormErrors(changePasswordForm);
        updatePasswordButtonState(changePasswordForm);
    });

    // Saat form disubmit, lakukan validasi akhir
    changePasswordForm.addEventListener("submit", (e) => {
        // Panggil fungsi yang menampilkan error
        const isFormValid = showPasswordFormErrors(changePasswordForm); 
        
        // Panggil juga fungsi untuk memastikan status tombol sudah benar
        updatePasswordButtonState(changePasswordForm); 

        if (!isFormValid) {
            e.preventDefault(); // Hentikan submit jika tidak valid
            alert("Please fix the errors in the change password form.");
        }
    });
}

// --- Event Listener untuk Tombol Pengaturan Akun & Logout ---
if (openAccountSettingBtn) {
    openAccountSettingBtn.addEventListener("click", () => {
        if (containerProfile) containerProfile.classList.add("hidden");
        if (bawahProfil) bawahProfil.classList.add("hidden");
        if (accountSetting) accountSetting.classList.remove("hidden");
        
        // KITA PANGGIL FUNGSI YANG HANYA MENGATUR TOMBOL, TANPA MENAMPILKAN ERROR
        updatePasswordButtonState(changePasswordForm);
    });
}

  if (closeAccountSettingBtn) {
    closeAccountSettingBtn.addEventListener("click", () => {
      if (accountSetting) accountSetting.classList.add("hidden");
      if (containerProfile) containerProfile.classList.remove("hidden");
      if (bawahProfil) bawahProfil.classList.remove("hidden");
      if (profilPage) profilPage.classList.remove("hidden");
      if (editProfilePage) editProfilePage.classList.add("hidden");
    });
  }

  // Event listener untuk form hapus akun
  if (deleteAccountForm) {
    deleteAccountForm.addEventListener("submit", (e) => {
      const message =
        "This action will permanently delete your account. Are you sure you want to continue?";
      const userConfirmed = window.confirm(message);
      if (!userConfirmed) {
        e.preventDefault(); // Hentikan submit jika tidak dikonfirmasi
      }
      // Jika dikonfirmasi, form akan disubmit secara alami
    });
  }

  // Logout
  if (logoutBtn) {
    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      const message =
        "Are you sure you want to log out? You can still log in with this account in the next session.";
      const userConfirmed = window.confirm(message);

      if (userConfirmed) {
        console.log("Logging out...");
        window.location.href = LOGOUT_URL; // Gunakan variabel global
      } else {
        console.log("Log out canceled.");
      }
    });
  }

  // --- BINTANG RATING ---
  function generateStars(element) {
    let rating = parseFloat(element.getAttribute("data-rating"));
    let fullStars = Math.floor(rating);
    let halfStar = rating % 1 >= 0.5 ? 1 : 0;
    let emptyStars = 5 - (fullStars + halfStar);

    let starsHTML = "";
    for (let i = 0; i < fullStars; i++) {
      starsHTML += '<i class="fa-solid fa-star"></i>';
    }
    if (halfStar) {
      starsHTML += '<i class="fa-solid fa-star-half-alt"></i>';
    }
    for (let i = 0; i < emptyStars; i++) {
      starsHTML += '<i class="fa-regular fa-star"></i>';
    }
    element.innerHTML = starsHTML;
  }
  document.querySelectorAll(".rating").forEach(generateStars);

  // --- FILTER BUTTONS ---
  if (filterButtons.length > 0) {
    filterButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const wasActive = button.classList.contains("bg-[#FF9800]");

        filterButtons.forEach((btn) => {
          btn.classList.remove("bg-[#FF9800]", "text-white");
          btn.classList.add("bg-white", "text-[#FF9800]");
        });

        if (!wasActive) {
          button.classList.remove("bg-white", "text-[#FF9800]");
          button.classList.add("bg-[#FF9800]", "text-white");
        }
      });
    });
  }

  // --- GMAPS INPUT ---
  if (gmapsInput) {
    let mapsAlertShown = false;
    gmapsInput.addEventListener("focus", () => {
      if (!mapsAlertShown) {
        window.open("https://www.google.com/maps", "_blank");
        alert(
          "Please search for and mark the location on Google Maps that just opened.\n\n" +
            "Once you have found the location, click the 'Share' button,\n" +
            "then copy the link provided and paste it into this field."
        );
        mapsAlertShown = true;
      }
    });
  }

  // --- FILE UPLOAD ---
  if (fileUploadVisual) {
    fileUploadVisual.onclick = () => {
      if (fileInput) fileInput.click();
    };
  } else {
    console.error("Error: Div 'fileUploadVisual' tidak ditemukan!");
  }

  if (fileInput) {
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        let filesText = Array.from(fileInput.files)
          .map((file) => file.name)
          .join(", ");
        fileList.textContent = `Selected: ${filesText}`;
        fileUploadPlaceholder.value = `${fileInput.files.length} file(s) selected`;
      } else {
        fileList.textContent = "";
        fileUploadPlaceholder.value = "";
        fileUploadPlaceholder.placeholder = "Upload File(s)";
      }
    };
  } else {
    console.error("Error: Input 'file-upload' tidak ditemukan!");
  }

  // --- LOGIKA VERIFIKASI (UNTUK ADMIN) ---
  // Inisialisasi: semua tombol approve/deny disabled & style awal
  document.querySelectorAll(".verification-item").forEach((item) => {
    const approveBtn = item.querySelector(".approve-btn");
    const denyBtn = item.querySelector(".deny-btn");
    const Approve = item.querySelector(".approve");
    const Deny = item.querySelector(".deny");

    if (approveBtn) {
      approveBtn.classList.add("opacity-50", "cursor-not-allowed");
      approveBtn.disabled = true;
      approveBtn.classList.remove("bg-blue-500", "text-white");
      approveBtn.classList.add("border", "border-blue-500", "text-blue-500");
    }
    if (denyBtn) {
      denyBtn.classList.add("opacity-50", "cursor-not-allowed");
      denyBtn.disabled = true;
      denyBtn.classList.remove("bg-red-500", "text-white");
      denyBtn.classList.add("border", "border-red-500", "text-red-500");
    }

    item.dataset.verified = "false";
    item.dataset.selected = "";

    if (Approve) Approve.classList.add("hidden");
    if (Deny) Deny.classList.add("hidden");
  });

  function setButtonState(parentItem) {
    const approveBtn = parentItem.querySelector(".approve-btn");
    const denyBtn = parentItem.querySelector(".deny-btn");
    const Approve = parentItem.querySelector(".approve");
    const Deny = parentItem.querySelector(".deny");

    if (parentItem.dataset.verified === "true") {
      if (approveBtn) {
        approveBtn.disabled = true;
        approveBtn.classList.add("opacity-50", "cursor-not-allowed", "hidden");
      }
      if (denyBtn) {
        denyBtn.disabled = true;
        denyBtn.classList.add("opacity-50", "cursor-not-allowed", "hidden");
      }

      if (parentItem.dataset.selected === "approve" && Approve) {
        Approve.classList.remove("hidden");
      } else if (parentItem.dataset.selected === "deny" && Deny) {
        Deny.classList.remove("hidden");
      }
    } else {
      if (approveBtn) {
        approveBtn.disabled = false;
        approveBtn.classList.remove(
          "opacity-50",
          "cursor-not-allowed",
          "hidden"
        );
      }
      if (denyBtn) {
        denyBtn.disabled = false;
        denyBtn.classList.remove("opacity-50", "cursor-not-allowed", "hidden");
      }

      if (approveBtn) {
        approveBtn.classList.remove("bg-blue-500", "text-white");
        approveBtn.classList.add(
          "border",
          "border-blue-500",
          "text-blue-500",
          "bg-white"
        );
      }
      if (denyBtn) {
        denyBtn.classList.remove("bg-red-500", "text-white");
        denyBtn.classList.add(
          "border",
          "border-red-500",
          "text-red-500",
          "bg-white"
        );
      }

      if (Approve) Approve.classList.add("hidden");
      if (Deny) Deny.classList.add("hidden");
    }
  }

  document.querySelectorAll(".view-form-link").forEach((link) => {
    if (link) {
      link.addEventListener("click", (e) => {
        e.preventDefault();
        const parentItem = link.closest(".verification-item");
        const requestId = parentItem.dataset.requestId; // Anda perlu menambahkan data-request-id ke HTML
        const requestType = parentItem.dataset.type;

        setButtonState(parentItem);

        let dataToDisplay = {};
        // Jika ingin mengambil data dari server, Anda harus membuat form submit di sini
        // atau mengisi hidden input di modal dan mengarahkannya ke endpoint yang mengambil data.
        // Untuk sekarang, data masih hardcode.
        if (requestType === "add-place") {
          dataToDisplay = {
            placeName: "Universitas Mataram",
            category: "Tourist destination",
            district: "Mataram",
            subdistrict: "Selaparang",
            village: "Gomong",
            street: "Majapahit Street No.62",
            gmaps: "https://maps.app.goo.gl/96YcpUGoX1Xedrss7",
            description: "Universitas Mataram is a state university...",
            photo_link: ["unram.jpg"],
          };
          openAddPlaceModal(dataToDisplay);
        } else if (requestType === "claim-culinary") {
          dataToDisplay = {
            fullName: "Ihdal Fahroni",
            phone: "08877776663",
            email: "rmsumberejeki@gmail.com",
            tin: "123456789",
            supporting_document: ["sumber_rejeki.png"],
          };
          openClaimCulinaryModal(dataToDisplay); // Menggunakan dataToDisplay
        }
      });
    }
  });

  // --- TOMBOL DENY/APPROVE (TANPA AJAX) ---
  // Event listener untuk tombol Deny (form submission)
  document.querySelectorAll(".deny-btn").forEach((button) => {
    if (button) {
      button.addEventListener("click", (e) => {
        if (button.disabled) {
          e.preventDefault();
          return;
        } // Hentikan jika disabled
        if (!window.confirm("Are you sure you want to DENY this request?")) {
          e.preventDefault(); // Hentikan submit jika tidak dikonfirmasi
        }
        // Jika dikonfirmasi, form akan disubmit secara alami oleh browser
      });
    }
  });

  // Event listener untuk tombol Approve (form submission)
  document.querySelectorAll(".approve-btn").forEach((button) => {
    if (button) {
      button.addEventListener("click", (e) => {
        if (button.disabled) {
          e.preventDefault();
          return;
        } // Hentikan jika disabled
        if (!window.confirm("Are you sure you want to APPROVE this request?")) {
          e.preventDefault(); // Hentikan submit jika tidak dikonfirmasi
        }
        // Jika dikonfirmasi, form akan disubmit secara alami oleh browser
      });
    }
  });
  

  showPanel("awal");
});
