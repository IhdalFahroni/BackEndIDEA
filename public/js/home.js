document.addEventListener("DOMContentLoaded", () => {
  // --- Navigasi Sidebar ---
  const hamburgerBtn = document.getElementById("hamburgerBtn");
  const closeSidebarMenuBtn = document.getElementById("closeBtn");
  const sidebarMenu = document.getElementById("sidebarMenu");
  const mainContent = document.querySelector("main"); // Main content area

  // --- Div yang akan muncul di main content (dari partials) ---
  // Sesuaikan ID ini dengan ID div yang ada di partials Anda
  const headerDiv = document.getElementById("header"); // Header di main content (judul halaman)
  const awalDiv = document.getElementById("awal"); // Div yang berisi grid/list destinasi di main_content_user.php
  // const afterSearchDiv = document.getElementById('afterSearch'); // KEMUNGKINAN BESAR INI TIDAK ADA LAGI SEBAGAI DIV TERPISAH
  const notification = document.getElementById("notification");
  const addPlaceForm = document.getElementById("addPlace");
  const profile = document.getElementById("profil");
  const manageVerification = document.getElementById("manageVerification"); // Untuk Admin

  // --- Pop-up Form/Modals (jika di-load di home_template atau dashboard.php) ---
  const addPlaceModal = document.getElementById("addPlaceModal");
  const claimCulinaryModal = document.getElementById("claimCulinaryModal");

  // --- Tombol Umum ---
  const searchIcon = document.getElementById("searchIcon"); // Ikon pencarian di search bar
  const filterButtons = document.querySelectorAll(".filter-button"); // Tombol filter kategori

  // --- Tombol Sidebar/Aksi yang membuka panel main content ---
  const openNotificationBtns = [
    document.getElementById("notificationBtn"),
    document.getElementById("openNotificationBtn"),
  ];
  const openAddPlaceBtns = [
    document.getElementById("addPlaceBtn"),
    document.getElementById("openAddPlaceBtn"),
  ];
  const openProfilBtns = [
    document.getElementById("profilBtn"),
    document.getElementById("openProfilBtn"),
  ];
  // Pastikan ID ini ada di sidebar Admin
  const openManageVerificationBtns = [
    document.getElementById("manageVerificationBtn"),
    document.getElementById("openManageVerificationBtn"),
  ].filter(Boolean); // Filter(Boolean) untuk hapus null jika elemen tidak ada

  // --- Elemen Tampilan Profil & Pengaturan Akun ---
  const containerProfile = document.getElementById("containerProfile"); // Pembungkus profil
  const profilPage = document.getElementById("profilPage"); // Tampilan profil utama
  const editProfilePage = document.getElementById("editProfilePage"); // Form edit profil
  const bawahProfil = document.getElementById("bawahProfil"); // Div berisi tombol setting/logout
  const accountSetting = document.getElementById("accountSetting"); // Form pengaturan akun
  const editProfileBtn = document.getElementById("editProfileBtn"); // Tombol Edit Profile
  const saveEditBtn = document.getElementById("saveEditBtn"); // Tombol Save Edit Profile
  const cancelEditBtn = document.getElementById("cancelEditBtn"); // Tombol Cancel Edit Profile
  const editUsernameInput = document.getElementById("editUsername"); // Input username edit
  const editFullNameInput = document.getElementById("editFullName"); // Input full name edit
  const usernameError = document.getElementById("usernameError"); // Error message for username

  // --- Elemen Ganti Password Profil ---
  const savePasswordBtn = document.getElementById("savePasswordBtn");
  const currentPasswordInput = document.getElementById("currentPassword");
  const newPasswordInput = document.getElementById("newPass");
  const passwordError = document.getElementById("passwordError");

  // --- Tombol Logout & Delete Akun ---
  const logoutBtn = document.getElementById("logoutBtn");
  const openAccountSettingBtn = document.getElementById(
    "openAccountSettingBtn"
  );
  const closeAccountSettingBtn = document.getElementById(
    "closeAccountSettingBtn"
  );
  const deleteAccountBtn = document.getElementById("deleteAccountBtn");

  // --- File Upload & Google Maps untuk Form Add Place ---
  const fileInput = document.getElementById("file-upload");
  const fileList = document.getElementById("file-list");
  const fileUploadVisual = document.getElementById("fileUploadVisual");
  const fileUploadPlaceholder = document.getElementById(
    "fileUploadPlaceholder"
  );
  const gmapsInput = document.getElementById("gmaps");
  const attractionForm = document.getElementById("attractionForm");

  // --- Variabel State ---
  let activePanel = "awal"; // Panel yang sedang aktif, default ke 'awal'

  // --- FUNGSI UTAMA UNTUK MENGGANTI KONTEN MAIN ---
  function showPanel(panelName) {
    // Sembunyikan semua panel yang mungkin
    if (headerDiv) headerDiv.classList.add("hidden");
    if (awalDiv) awalDiv.classList.add("hidden");
    // if (afterSearchDiv) afterSearchDiv.classList.add('hidden'); // KEMUNGKINAN BESAR TIDAK ADA LAGI
    if (notification) notification.classList.add("hidden");
    if (addPlaceForm) addPlaceForm.classList.add("hidden");
    if (manageVerification) manageVerification.classList.add("hidden");
    if (profile) profile.classList.add("hidden");

    // Tampilkan panel yang diminta
    switch (panelName) {
      case "awal":
        if (headerDiv) headerDiv.classList.remove("hidden");
        if (awalDiv) awalDiv.classList.remove("hidden");
        break;
      // case 'afterSearch': // KEMUNGKINAN BESAR TIDAK DIGUNAKAN LAGI UNTUK TOGGLE
      //     if (headerDiv) headerDiv.classList.remove('hidden');
      //     if (afterSearchDiv) afterSearchDiv.classList.remove('hidden');
      //     break;
      case "notification":
        if (notification) notification.classList.remove("hidden");
        break;
      case "addPlace":
        if (addPlaceForm) addPlaceForm.classList.remove("hidden");
        break;
      case "manageVerification":
        if (manageVerification) manageVerification.classList.remove("hidden");
        break;
      case "profil":
        if (profile) profile.classList.remove("hidden");
        // Atur sub-panel profil
        if (containerProfile) containerProfile.classList.remove("hidden");
        if (profilPage) profilPage.classList.remove("hidden");
        if (bawahProfil) bawahProfil.classList.remove("hidden");
        if (editProfilePage) editProfilePage.classList.add("hidden");
        if (accountSetting) accountSetting.classList.add("hidden");
        break;
    }
    activePanel = panelName;

    // Tutup sidebar jika terbuka setelah mengganti panel
    if (sidebarMenu && sidebarMenu.classList.contains("translate-x-0")) {
      sidebarMenu.classList.remove("translate-x-0");
      sidebarMenu.classList.add("-translate-x-full");
      if (mainContent) mainContent.style.marginLeft = "5rem";
    }
  }

  // --- SIDEBAR TOGGLE ---
  if (mainContent) mainContent.style.transition = "margin-left 0.3s"; // Tambahkan transisi jika belum ada di CSS

  if (hamburgerBtn && sidebarMenu && mainContent) {
    hamburgerBtn.addEventListener("click", () => {
      sidebarMenu.classList.remove("-translate-x-full");
      sidebarMenu.classList.add("translate-x-0"); // Pastikan ini diatur agar terbuka
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

  // Search Icon (Sekarang hanya submit form, bukan ganti panel JS)
  // Form action sudah diatur di HTML untuk full page reload
  // Cukup pastikan tombol submit berfungsi, tidak perlu event listener di searchIcon lagi
  // searchIcon.addEventListener('click', () => showPanel('afterSearch')); // Hapus ini

  // Tombol Notifikasi
  openNotificationBtns.forEach((btn) => {
    if (btn) {
      // Pastikan tombol ada di DOM
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        // Toggle panel (jika sedang di notif, kembali ke awal; jika tidak, tampilkan notif)
        if (activePanel === "notification") {
          showPanel("awal");
        } else {
          showPanel("notification");
        }
      });
    }
  });

  // Tombol Add Place
  openAddPlaceBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        if (activePanel === "addPlace") {
          showPanel("awal");
        } else {
          showPanel("addPlace");
        }
      });
    }
  });

  // Tombol Profil
  openProfilBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        if (activePanel === "profil") {
          showPanel("awal");
        } else {
          showPanel("profil");
          if (editProfilePage && profilPage && bawahProfil && accountSetting) {
            // Pastikan tampilan awal profil yang terlihat saat pertama kali membuka profil
            profilPage.classList.remove("hidden");
            bawahProfil.classList.remove("hidden");
            accountSetting.classList.add("hidden");
            editProfilePage.classList.add("hidden");
          }
        }
      });
    }
  });

  // Tombol Manage Verification (khusus Admin)
  openManageVerificationBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        if (activePanel === "manageVerification") {
          showPanel("awal");
        } else {
          showPanel("manageVerification");
          // Jika manageVerification memiliki sub-panel atau state khusus, inisialisasi di sini
        }
      });
    }
  });

  // --- LOGIKA PROFIL (EDIT, SAVE, CANCEL) ---
  if (editProfileBtn) {
    editProfileBtn.addEventListener("click", () => {
      if (profilPage) profilPage.classList.add("hidden");
      if (editProfilePage) editProfilePage.classList.remove("hidden");
      if (bawahProfil) bawahProfil.classList.add("hidden"); // Sembunyikan tombol setting/logout saat edit
      validateProfileForm(); // Panggil validasi awal saat masuk mode edit
    });
  }

  if (saveEditBtn) {
    saveEditBtn.addEventListener("click", () => {
      if (profilPage) profilPage.classList.remove("hidden");
      if (editProfilePage) editProfilePage.classList.add("hidden");
      if (bawahProfil) bawahProfil.classList.remove("hidden"); // Tampilkan lagi tombol setting/logout
      // Logika submit form ke server akan berada di sini (AJAX atau form biasa)
    });
  }

  if (cancelEditBtn) {
    cancelEditBtn.addEventListener("click", () => {
      if (profilPage) profilPage.classList.remove("hidden");
      if (editProfilePage) editProfilePage.classList.add("hidden");
      if (bawahProfil) bawahProfil.classList.remove("hidden"); // Tampilkan lagi tombol setting/logout
    });
  }

  // --- VALIDASI FORM PROFIL & PASSWORD ---
  function validateProfileForm() {
    // Pastikan semua elemen yang dibutuhkan ada sebelum memproses
    if (
      !editUsernameInput ||
      !editFullNameInput ||
      !saveEditBtn ||
      !usernameError
    )
      return;

    const username = editUsernameInput.value.trim();
    const fullName = editFullNameInput.value.trim();
    const isUsernameLengthValid = username.length >= 8 && username.length <= 20;

    if (username.length > 0 && !isUsernameLengthValid) {
      usernameError.classList.remove("hidden");
    } else {
      usernameError.classList.add("hidden");
    }

    const isFormValid = isUsernameLengthValid && fullName.length > 0; // Tambahkan validasi lainnya jika ada

    if (isFormValid) {
      saveEditBtn.disabled = false;
      saveEditBtn.classList.remove(
        "text-[#FF9800]",
        "bg-white",
        "opacity-50",
        "cursor-not-allowed"
      );
      saveEditBtn.classList.add("bg-[#FF9800]", "text-white");
    } else {
      saveEditBtn.disabled = true;
      saveEditBtn.classList.remove("bg-[#FF9800]", "text-white");
      saveEditBtn.classList.add(
        "text-[#FF9800]",
        "bg-white",
        "opacity-50",
        "cursor-not-allowed"
      );
    }
  }
  if (editUsernameInput && editFullNameInput) {
    editUsernameInput.addEventListener("input", validateProfileForm);
    editFullNameInput.addEventListener("input", validateProfileForm);
  }
  // Panggil validasi saat halaman dimuat jika input sudah ada nilainya
  if (editUsernameInput && editFullNameInput) validateProfileForm();

  // --- LOGIKA GANTI PASSWORD ---
  const validateAndUpdatePasswordButton = () => {
    // Ganti nama agar tidak sama
    // Pastikan elemen ada sebelum digunakan
    if (
      !currentPasswordInput ||
      !newPasswordInput ||
      !savePasswordBtn ||
      !passwordError
    )
      return;

    const currentPass = currentPasswordInput.value.trim();
    const newPass = newPasswordInput.value.trim();
    const isNewPassLengthValid = newPass.length >= 8 && newPass.length <= 20;

    if (newPass.length > 0 && !isNewPassLengthValid) {
      passwordError.classList.remove("hidden");
    } else {
      passwordError.classList.add("hidden");
    }

    const isFormValid =
      currentPass !== "" && newPass !== "" && isNewPassLengthValid;

    if (isFormValid) {
      savePasswordBtn.disabled = false;
      savePasswordBtn.classList.remove(
        "text-[#FF9800]",
        "bg-white",
        "opacity-50",
        "cursor-not-allowed"
      );
      savePasswordBtn.classList.add("bg-[#FF9800]", "text-white");
    } else {
      savePasswordBtn.disabled = true;
      savePasswordBtn.classList.remove("bg-[#FF9800]", "text-white");
      savePasswordBtn.classList.add(
        "text-[#FF9800]",
        "bg-white",
        "opacity-50",
        "cursor-not-allowed"
      );
    }
  };
  if (currentPasswordInput && newPasswordInput) {
    // Cek keberadaan input sebelum menambahkan listener
    currentPasswordInput.addEventListener(
      "input",
      validateAndUpdatePasswordButton
    );
    newPasswordInput.addEventListener("input", validateAndUpdatePasswordButton);
    validateAndUpdatePasswordButton(); // Panggil saat DOM dimuat
  }

  if (savePasswordBtn) {
    savePasswordBtn.addEventListener("click", () => {
      if (savePasswordBtn.disabled) {
        return;
      }
      alert("Successfully change password");
      // Reset input setelah berhasil
      if (currentPasswordInput) currentPasswordInput.value = "";
      if (newPasswordInput) newPasswordInput.value = "";
      validateAndUpdatePasswordButton(); // Perbarui status tombol
    });
  }

  // --- TOMBOL PENGATURAN AKUN & LOGOUT ---
  if (openAccountSettingBtn) {
    openAccountSettingBtn.addEventListener("click", () => {
      if (containerProfile) containerProfile.classList.add("hidden");
      if (bawahProfil) bawahProfil.classList.add("hidden");
      if (accountSetting) accountSetting.classList.remove("hidden");
      validateAndUpdatePasswordButton(); // Panggil validasi password saat membuka pengaturan akun
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

  if (deleteAccountBtn) {
    deleteAccountBtn.addEventListener("click", () => {
      const message =
        "This action will permanently delete your account. Are you sure you want to continue?";
      const userConfirmed = window.confirm(message);
      if (userConfirmed) {
        console.log("Pengguna mengonfirmasi penghapusan akun.");
        alert("Your account has been successfully deleted.");
        // Arahkan pengguna ke halaman login atau halaman utama
        // window.location.href = '/login.html'; // Sesuaikan URL
      } else {
        console.log("Account deletion canceled.");
      }
    });
  }

  if (logoutBtn) {
    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      const message =
        "Are you sure you want to log out? You can still log in with this account in the next session.";
      const userConfirmed = window.confirm(message);

      if (userConfirmed) {
        console.log("Logging out...");
        // Arahkan pengguna ke halaman login (ini adalah action PHP)
        // window.location.href = '<?= base_url('/logout') ?>'; // Contoh URL logout
        alert("You have been successfully logged out.");
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
        window.open("https://www.google.com/maps", "_blank"); // Sesuaikan URL ini
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

  // --- ATTRACTION FORM SUBMISSION ---
  if (attractionForm) {
    attractionForm.onsubmit = (e) => {
      e.preventDefault();
      let isValid = true;

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
          inputElement.parentNode.insertBefore(
            errorSpan,
            inputElement.nextSibling
          );
        }
        errorSpan.textContent = message;
        isValid = false;
      };

      const hideError = (inputElement) => {
        inputElement.classList.remove("border-red-500");
        let errorSpan = inputElement.nextElementSibling;
        if (errorSpan && errorSpan.classList.contains("error-message")) {
          errorSpan.textContent = "";
        }
      };

      attractionForm
        .querySelectorAll(
          'input[type="text"]:not(#fileUploadPlaceholder), textarea'
        )
        .forEach((input) => {
          if (!input.value.trim()) {
            showError(input, "This field is required.");
          } else {
            hideError(input);
          }
        });

      const urlRegex =
        /^(https?:\/\/(?:www\.|m\.)?google\.(?:com|co\.\w{2}|ru)\/maps\S*|https?:\/\/maps\.app\.goo\.gl\/\S*)/i;

      if (!gmapsInput.value.trim()) {
        showError(gmapsInput, "This field is required.");
      } else if (!urlRegex.test(gmapsInput.value.trim())) {
        showError(
          gmapsInput,
          "Please enter a valid map URL (e.g., Google Maps link)."
        );
      } else {
        hideError(gmapsInput);
      }

      // Tambahkan validasi untuk radio button category
      const categoryRadios = attractionForm.querySelectorAll(
        'input[name="category"]'
      );
      let isCategorySelected = Array.from(categoryRadios).some(
        (radio) => radio.checked
      );
      if (!isCategorySelected) {
        // Tampilkan error di sekitar group radio
        const categoryLabel = attractionForm.querySelector(
          'label[for="category"]'
        ); // Sesuaikan selector jika perlu
        if (categoryLabel) {
          showError(categoryLabel, "Please select a category."); // Tampilkan di label
        }
        isValid = false;
      } else {
        const categoryLabel = attractionForm.querySelector(
          'label[for="category"]'
        );
        if (categoryLabel) hideError(categoryLabel);
      }

      if (isValid) {
        alert("Form has been submitted!");
        e.target.reset();
        fileList.textContent = "";
        fileUploadPlaceholder.value = "";
        fileUploadPlaceholder.placeholder = "Upload File(s)";
        attractionForm
          .querySelectorAll(".border-red-500")
          .forEach((el) => el.classList.remove("border-red-500"));
        attractionForm
          .querySelectorAll(".error-message")
          .forEach((el) => (el.textContent = ""));
      }
    };
  } else {
    console.error("Error: Form dengan ID 'attractionForm' tidak ditemukan!");
  }

  // --- MODAL FUNCTIONS (Open/Close) ---
  function openAddPlaceModal(data) {
    // Pastikan modal ada sebelum mencoba memanipulasinya
    if (!addPlaceModal) {
      console.error("Error: Modal 'addPlaceModal' tidak ditemukan!");
      return;
    }

    document.getElementById("add_placeName").textContent = data.placeName;
    document.getElementById("add_category").textContent = data.category;
    document.getElementById("add_district").textContent = data.district;
    document.getElementById("add_subdistrict").textContent = data.subdistrict;
    document.getElementById("add_village").textContent = data.village;
    document.getElementById("add_street").textContent = data.street;
    const gmapsLink = document.getElementById("add_gmaps");
    gmapsLink.href = data.gmaps;
    gmapsLink.textContent = data.gmaps;
    document.getElementById("add_description").textContent = data.description;

    const photoLinksContainer = document.getElementById("photo_link");
    photoLinksContainer.innerHTML = "";

    if (data.photo_link && data.photo_link.length > 0) {
      data.photo_link.forEach((fileName) => {
        const link = document.createElement("a");
        link.href = `<?= base_url('Assets/') ?>${fileName}`; // Gunakan base_url
        link.textContent = fileName;
        link.target = "_blank";
        link.className = "text-blue-600 hover:underline block";
        photoLinksContainer.appendChild(link);
      });
    } else {
      photoLinksContainer.textContent = "No photo uploaded.";
    }

    addPlaceModal.classList.remove("hidden");
  }

  function openClaimCulinaryModal(data) {
    if (!claimCulinaryModal) {
      console.error("Error: Modal 'claimCulinaryModal' tidak ditemukan!");
      return;
    }

    document.getElementById("claim_fullName").textContent = data.fullName;
    document.getElementById("claim_phone").textContent = data.phone;
    document.getElementById("claim_email").textContent = data.email;
    document.getElementById("claim_tin").textContent = data.tin;

    const documentLinksContainer = document.getElementById(
      "supporting_document"
    );
    documentLinksContainer.innerHTML = "";

    if (data.supporting_document && data.supporting_document.length > 0) {
      data.supporting_document.forEach((fileName) => {
        const link = document.createElement("a");
        link.href = `<?= base_url('Assets/') ?>${fileName}`; // Gunakan base_url
        link.textContent = fileName;
        link.target = "_blank";
        link.className = "text-blue-600 hover:underline block";
        documentLinksContainer.appendChild(link);
      });
    } else {
      documentLinksContainer.textContent = "No document uploaded.";
    }

    claimCulinaryModal.classList.remove("hidden");
  }

  function closeModal(modalElement) {
    if (modalElement) {
      modalElement.classList.add("hidden");
    }
  }

  document.querySelectorAll(".modal-close-btn").forEach((btn) => {
    if (btn) {
      // Pastikan tombol ada
      btn.addEventListener("click", function () {
        const modalId = this.dataset.closeModal;
        const modalToClose = document.getElementById(modalId);
        closeModal(modalToClose);
      });
    }
  });

  document.querySelectorAll(".modal-overlay").forEach((overlay) => {
    if (overlay) {
      // Pastikan overlay ada
      overlay.addEventListener("click", function (e) {
        if (e.target === this) {
          // Hanya tutup jika klik di overlay, bukan di dalam modal
          closeModal(this);
        }
      });
    }
  });

  // --- LOGIKA VERIFIKASI (UNTUK ADMIN) ---
  // Inisialisasi: semua tombol approve/deny disabled & style awal
  document.querySelectorAll(".verification-item").forEach((item) => {
    const approveBtn = item.querySelector(".approve-btn");
    const denyBtn = item.querySelector(".deny-btn");
    const Approve = item.querySelector(".approve");
    const Deny = item.querySelector(".deny");

    // Pastikan elemen ada sebelum memanipulasi
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

    // Pastikan status ini diinisialisasi untuk setiap item
    item.dataset.verified = "false";
    item.dataset.selected = ""; // Atau atur dari PHP jika ada status awal

    // Sembunyikan status approval/denial awal
    if (Approve) Approve.classList.add("hidden");
    if (Deny) Deny.classList.add("hidden");
  });

  // Fungsi untuk mengatur status tombol verifikasi
  function setButtonState(parentItem) {
    const approveBtn = parentItem.querySelector(".approve-btn");
    const denyBtn = parentItem.querySelector(".deny-btn");
    const Approve = parentItem.querySelector(".approve");
    const Deny = parentItem.querySelector(".deny");

    // Jika item sudah diverifikasi (dari data-verified atribut)
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
      // Belum diverifikasi, enable tombol
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

      // Style default (pastikan ini konsisten dengan CSS Anda)
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

      // Sembunyikan status teks jika belum ada aksi
      if (Approve) Approve.classList.add("hidden");
      if (Deny) Deny.classList.add("hidden");
    }
  }

  // Event listener untuk link "See form"
  document.querySelectorAll(".view-form-link").forEach((link) => {
    if (link) {
      link.addEventListener("click", (e) => {
        e.preventDefault();
        const parentItem = link.closest(".verification-item");
        const requestType = parentItem.dataset.type;

        // Pastikan tombol diinisialisasi ke status yang benar (enabled jika belum diverifikasi)
        setButtonState(parentItem);

        // Contoh data hardcode untuk modal, Anda akan mengambilnya dari server
        if (requestType === "add-place") {
          const addData = {
            placeName: "Universitas Mataram",
            category: "Tourist destination",
            district: "Mataram",
            subdistrict: "Selaparang",
            village: "Gomong",
            street: "Majapahit Street No.62",
            gmaps: "https://maps.app.goo.gl/96YcpUGoX1Xedrss7",
            description:
              "Universitas Mataram is a state university in the city of Mataram, West Nusa Tenggara province, Indonesia.",
            photo_link: ["unram.jpg"],
          };
          openAddPlaceModal(addData);
        } else if (requestType === "claim-culinary") {
          const claimData = {
            fullName: "Ihdal Fahroni",
            phone: "08877776663",
            email: "rmsumberejeki@gmail.com",
            tin: "123456789",
            supporting_document: ["sumber_rejeki.png"],
          };
          openClaimCulinaryModal(claimData);
        }
      });
    }
  });

  // Event listener untuk tombol Deny
  document.querySelectorAll(".deny-btn").forEach((button) => {
    if (button) {
      button.addEventListener("click", () => {
        if (button.disabled) return;
        if (window.confirm("Are you sure you want to DENY this request?")) {
          const parentItem = button.closest(".verification-item");
          parentItem.dataset.verified = "true";
          parentItem.dataset.selected = "deny";
          setButtonState(parentItem, "deny");
          // Tambahkan AJAX call ke server untuk deny request
        }
      });
    }
  });

  // Event listener untuk tombol Approve
  document.querySelectorAll(".approve-btn").forEach((button) => {
    if (button) {
      button.addEventListener("click", () => {
        if (button.disabled) return;
        if (window.confirm("Are you sure you want to APPROVE this request?")) {
          const parentItem = button.closest(".verification-item");
          parentItem.dataset.verified = "true";
          parentItem.dataset.selected = "approve";
          setButtonState(parentItem, "approve");
          // Tambahkan AJAX call ke server untuk approve request
        }
      });
    }
  });

  // Inisialisasi awal showPanel (penting agar panel awal muncul)
  showPanel("awal");
});
