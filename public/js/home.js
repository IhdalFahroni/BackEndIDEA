document.addEventListener("DOMContentLoaded", () => {
  // --- NAVIGASI DAN ELEMEN UI UTAMA ---
  const hamburgerBtn = document.getElementById("hamburgerBtn");
  const closeSidebarMenuBtn = document.getElementById("closeBtn");
  const sidebarMenu = document.getElementById("sidebarMenu");
  const mainContent = document.querySelector("main");

  const headerDiv = document.getElementById("header");
  const awalDiv = document.getElementById("awal");
  const notification = document.getElementById("notification");
  const addPlaceForm = document.getElementById("addPlace");
  const profile = document.getElementById("profil");
  const manageVerification = document.getElementById("manageVerification");
  const listManage = document.getElementById("listPlace");

  const openClaimBtn = document.getElementById("openClaimBtn");
  const claimForm = document.getElementById("claimForm");

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
    document.getElementById("manageBtn"),
    document.getElementById("openManageBtn"),
  ].filter(Boolean);

  // --- ELEMEN PROFIL DAN PENGATURAN AKUN ---
  const containerProfile = document.getElementById("containerProfile");
  const profilPage = document.getElementById("profilPage");
  const editProfilePage = document.getElementById("editProfilePage");
  const bawahProfil = document.getElementById("bawahProfil");
  const accountSetting = document.getElementById("accountSetting");
  const editProfileBtn = document.getElementById("editProfileBtn");
  const cancelEditBtn = document.getElementById("cancelEditBtn");

  // --- TOMBOL LOGOUT & DELETE AKUN ---
  const logoutBtn = document.getElementById("logoutBtn");
  const openAccountSettingBtn = document.getElementById(
    "openAccountSettingBtn"
  );
  const closeAccountSettingBtn = document.getElementById(
    "closeAccountSettingBtn"
  );

  // --- FILE UPLOAD & GOOGLE MAPS ---
  const fileInput = document.getElementById("file-upload");
  const fileList = document.getElementById("file-list");
  const fileUploadVisual = document.getElementById("fileUploadVisual");
  const fileUploadPlaceholder = document.getElementById(
    "fileUploadPlaceholder"
  );
  const gmapsInput = document.getElementById("gmaps");

  const editProfileForm = document.getElementById("editProfileForm");
  const changePasswordForm = document.getElementById("changePasswordForm");
  const deleteAccountForm = document.getElementById("deleteAccountForm");

  let activePanel = "awal";

  let previousPanel = "awal";

  // --- FUNGSI showPanel (untuk mengubah tampilan main content) ---
  function showPanel(panelName) {
     console.log("Menyembunyikan semua panel...");
    // Sembunyikan semua panel
    // Pastikan ID-nya sesuai dengan HTML kamu!
    const allPanels = [headerDiv, awalDiv, notification, addPlaceForm, claimForm, manageVerification, profile, listManage];
    allPanels.forEach(panel => {
        if (panel) { // Hanya sembunyikan jika elemen itu ada (tidak null)
            panel.classList.add("hidden");
            console.log(`Menyembunyikan: ${panel.id}`);
        }
    });

    console.log(`Mencoba menampilkan panel: ${panelName}`);
    switch (panelName) {
        case "awal":
            if (headerDiv) { headerDiv.classList.remove("hidden"); console.log("Menampilkan headerDiv"); }
            if (awalDiv) { awalDiv.classList.remove("hidden"); console.log("Menampilkan awalDiv"); }
            break;
        case "notification":
            if (notification) { notification.classList.remove("hidden"); console.log("Menampilkan notification"); }
            break;
        case "addPlace":
            if (addPlaceForm) { addPlaceForm.classList.remove("hidden"); console.log("Menampilkan addPlaceForm"); }
            break;
        case "claimForm":
            if (claimForm) { claimForm.classList.remove("hidden"); console.log("Menampilkan claimForm"); }
            break;
        case "manageVerification":
            if (manageVerification) { manageVerification.classList.remove("hidden"); console.log("Menampilkan manageVerification"); }
            break;
        case "listPlace":
            if (sidebarMenu) sidebarMenu.classList.remove("-translate-x-full"); // Ini bukan elemen utama
            if (listManage) { listManage.classList.remove("hidden"); console.log("Menampilkan listManage"); }
            break;
        case "profil":
            if (profile) { profile.classList.remove("hidden"); console.log("Menampilkan profile"); }
            if (containerProfile) { containerProfile.classList.remove("hidden"); console.log("Menampilkan containerProfile"); }
            if (profilPage) { profilPage.classList.remove("hidden"); console.log("Menampilkan profilPage"); }
            if (bawahProfil) { bawahProfil.classList.remove("hidden"); console.log("Menampilkan bawahProfil"); }
            if (editProfilePage) { editProfilePage.classList.add("hidden"); console.log("Menyembunyikan editProfilePage"); }
            if (accountSetting) { accountSetting.classList.add("hidden"); console.log("Menyembunyikan accountSetting"); }
            break;
    }
    previousPanel = activePanel;
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
        showPanel(
          activePanel === "notification" ? previousPanel : "notification"
        );
      });
    }
  });

  openAddPlaceBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        showPanel(activePanel === "addPlace" ? previousPanel : "addPlace");
      });
    }
  });

  openProfilBtns.forEach((btn) => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        showPanel(activePanel === "profil" ? previousPanel : "profil");
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
          activePanel === "manageVerification"
            ? previousPanel
            : "manageVerification"
        );
      });
    }
  });
    if (openClaimBtn) {
      openClaimBtn.addEventListener("click", (e) => {
        e.preventDefault();
        showPanel(
          "claimForm"
        );
      });
    }

  if (openManage[0]) {
    openManage[0].addEventListener("click", (e) => {
      e.preventDefault();
      sidebarMenu.classList.remove("-translate-x-full");
      mainContent.style.marginLeft = "18rem";
      listManage.classList.remove("hidden");
    });
  }
  if (openManage[1]) {
    openManage[1].addEventListener("click", (e) => {
      e.preventDefault();
      listManage.classList.toggle("hidden");
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
    form
      .querySelectorAll(".border-red-500")
      .forEach((el) => el.classList.remove("border-red-500"));

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
    const isFormValid =
      currentPass.length > 0 && newPass.length > 0 && isNewPassLengthValid;

    // Logika untuk mengatur tombol
    if (isFormValid) {
      formSavePasswordBtn.disabled = false;
      formSavePasswordBtn.classList.remove(
        "text-[#FF9800]",
        "bg-white",
        "opacity-50",
        "cursor-not-allowed"
      );
      formSavePasswordBtn.classList.add("bg-[#FF9800]", "text-white");
    } else {
      formSavePasswordBtn.disabled = true;
      formSavePasswordBtn.classList.remove("bg-[#FF9800]", "text-white");
      formSavePasswordBtn.classList.add(
        "text-[#FF9800]",
        "bg-white",
        "opacity-50",
        "cursor-not-allowed"
      );
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
  document.querySelectorAll('.verification-item').forEach(item => {
        item.querySelectorAll('.approve-btn, .deny-btn').forEach(button => {
            button.classList.add('opacity-50', 'cursor-not-allowed');
            button.disabled = true;
            // Style awal: border & text color
            if (button.classList.contains('deny-btn')) {
                button.classList.add('border', 'border-red-500', 'text-red-500');
                button.classList.remove('bg-red-500', 'text-white');
            } else if (button.classList.contains('approve-btn')) {
                button.classList.add('border', 'border-blue-500', 'text-blue-500');
                button.classList.remove('bg-blue-500', 'text-white');
            }
        });
        // Tandai status verifikasi di dataset
        item.dataset.verified = 'false';
        item.dataset.selected = '';
    });

  function setButtonState(parentItem, selected) {
        const approveBtn = parentItem.querySelector('.approve-btn');
        const denyBtn = parentItem.querySelector('.deny-btn');
        const Approve = parentItem.querySelector('.approve');
        const Deny = parentItem.querySelector('.deny');
        if (parentItem.dataset.verified === 'true') {
            // Sudah diverifikasi, disable semua tombol
            approveBtn.disabled = true;
            denyBtn.disabled = true;
            approveBtn.classList.add('opacity-50', 'cursor-not-allowed');
            denyBtn.classList.add('opacity-50', 'cursor-not-allowed');
            // Style sesuai hasil
            if (parentItem.dataset.selected === 'approve') {
                approveBtn.classList.add('hidden');
                denyBtn.classList.add('hidden');
                Approve.classList.remove('hidden');
            } else if (parentItem.dataset.selected === 'deny') {
                approveBtn.classList.add('hidden');
                denyBtn.classList.add('hidden');
                Deny.classList.remove('hidden');
            }
        } else {
            // Belum diverifikasi, enable tombol
            approveBtn.disabled = false;
            denyBtn.disabled = false;
            approveBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            denyBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            // Style default
            approveBtn.classList.remove('bg-blue-500', 'text-white');
            approveBtn.classList.add('border', 'border-blue-500', 'text-blue-500', 'bg-white');
            denyBtn.classList.remove('bg-red-500', 'text-white');
            denyBtn.classList.add('border', 'border-red-500', 'text-red-500', 'bg-white');
        }
    }

  document.querySelectorAll(".view-form-link").forEach((link) => {
  if (link) {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const parentItem = link.closest(".verification-item");

      
      // Extract all data from the parentItem's dataset
      const requestId = parentItem.dataset.requestId;
      const requestType = parentItem.dataset.type;
      const isVerified = parentItem.dataset.isVerified; // Access the is_verified status if needed
      const username = parentItem.dataset.user; // Get username from data attribute
      const email = parentItem.dataset.email;   // Get email from data attribute
      
      setButtonState(parentItem);
      let dataToDisplay = {};

      if (requestType === "addPlace") { // Note: 'addPlace' not 'add-place' as per your PHP
        dataToDisplay = {
          placeName: parentItem.dataset.placeName,
          category: parentItem.dataset.category,
          district: parentItem.dataset.district,
          subdistrict: parentItem.dataset.subdistrict,
          village: parentItem.dataset.village,
          street: parentItem.dataset.street,
          gmaps: parentItem.dataset.gmaps,
          description: parentItem.dataset.description,
          // data_photo_link: "<?= esc(json_encode(explode(',', $item['foto']))) ?>"
          photo_link: JSON.parse(parentItem.dataset.photoLink || '[]'), // Ensure it's parsed as JSON, default to empty array
        };
        openAddPlaceModal(dataToDisplay);
      } else if (requestType === "claimCulinary") {
        dataToDisplay = {
          fullName: parentItem.dataset.fullName,
          phone: parentItem.dataset.phone,
          email: parentItem.dataset.email,
          tin: parentItem.dataset.tin,
          supporting_document: JSON.parse(parentItem.dataset.supportingDocument || '[]'),
        };
        openClaimCulinaryModal(dataToDisplay);
      }
    });
  }
});


// Helper function to populate and open the addPlace modal
function openAddPlaceModal(data) {
    document.getElementById('add_placeName').textContent = data.placeName;
    document.getElementById('add_category').textContent = data.category;
    document.getElementById('add_district').textContent = data.district;
    document.getElementById('add_subdistrict').textContent = data.subdistrict;
    document.getElementById('add_village').textContent = data.village;
    document.getElementById('add_street').textContent = data.street;
    document.getElementById('add_gmaps').href = data.gmaps;
    document.getElementById('add_gmaps').textContent = data.gmaps; // Display the link text
    document.getElementById('add_description').textContent = data.description;

    const photoLinkDiv = document.getElementById('add_photo_link');
    photoLinkDiv.innerHTML = ''; // Clear previous images
    if (data.photo_link && data.photo_link.length > 0) {
        data.photo_link.forEach(photo => {
            const img = document.createElement('img');
            img.src = UPLOADS_URL + photo.trim(); // Adjust path as needed
            img.alt = 'Place Photo';
            img.classList.add('w-24', 'h-auto', 'inline-block', 'mr-2', 'mb-2', 'rounded'); // Tailwind classes
            photoLinkDiv.appendChild(img);
        });
    } else {
        photoLinkDiv.textContent = 'No photos available.';
    }

    document.getElementById('addPlaceModal').classList.remove('hidden');
}

// Helper function to populate and open the claimCulinary modal
function openClaimCulinaryModal(data) {
    document.getElementById('claim_fullName').textContent = data.fullName;
    document.getElementById('claim_phone').textContent = data.phone;
    document.getElementById('claim_email').textContent = data.email;
    document.getElementById('claim_tin').textContent = data.tin;

    const supportingDocumentDiv = document.getElementById('claim_supporting_document');
    supportingDocumentDiv.innerHTML = ''; // Clear previous documents
    if (data.supporting_document && data.supporting_document.length > 0) {
        data.supporting_document.forEach(doc => {
            const link = document.createElement('a');
            link.href = UPLOADS_URL + doc.trim(); // Adjust path as needed
            link.textContent = doc.trim();
            link.target = '_blank';
            link.classList.add('text-blue-700', 'underline', 'block');
            supportingDocumentDiv.appendChild(link);
        });
    } else {
        supportingDocumentDiv.textContent = 'No supporting documents available.';
    }

    document.getElementById('claimCulinaryModal').classList.remove('hidden');
}


// Existing modal close functionality (ensure this is present and correct)
document.querySelectorAll('.modal-close-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const modalId = btn.dataset.closeModal;
        document.getElementById(modalId).classList.add('hidden');
    });
});

  // --- TOMBOL DENY/APPROVE (TANPA AJAX) ---
  // Event listener untuk tombol Deny (form submission)
  document.querySelectorAll('.deny-btn').forEach(button => {
        button.addEventListener('click', () => {
            if (button.disabled) return;
            if (window.confirm('Are you sure you want to DENY this request?')) {
                const parentItem = button.closest('.verification-item');
                parentItem.dataset.verified = 'true';
                parentItem.dataset.selected = 'deny';
                setButtonState(parentItem, 'deny');
            }
        });
    });

    document.querySelectorAll('.approve-btn').forEach(button => {
        button.addEventListener('click', () => {
            if (button.disabled) return;
            if (window.confirm('Are you sure you want to APPROVE this request?')) {
                const parentItem = button.closest('.verification-item');
                parentItem.dataset.verified = 'true';
                parentItem.dataset.selected = 'approve';
                setButtonState(parentItem, 'approve');
            }
        });
    });

  showPanel("awal");
});
