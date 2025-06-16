document.addEventListener('DOMContentLoaded', () => {
    //navigasi sidebar
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const closeSidebarMenuBtn = document.getElementById('closeBtn'); 
    const sidebarMenu = document.getElementById('sidebarMenu');
    const mainContent = document.querySelector('main');
    
    //div yang akan muncul di main container
    const headerDiv = document.getElementById('header');
    const awalDiv = document.getElementById('awal');
    const afterSearchDiv = document.getElementById('afterSearch');
    const notification = document.getElementById('notification');
    const addPlaceForm = document.getElementById('addPlace');
    const profile = document.getElementById('profil');
    
    //pop up form untuk diverifikasi admin
    const manageVerification = document.getElementById('manageVerification'); 
    const addPlaceModal = document.getElementById('addPlaceModal');
    const claimCulinaryModal = document.getElementById('claimCulinaryModal');
    
    //tombol
    const searchIcon = document.getElementById('searchIcon');
    const filterButtons = document.querySelectorAll('.filter-button');
    const openNotificationBtns = [document.getElementById('notificationBtn'), document.getElementById('openNotificationBtn')];
    const openAddPlaceBtns = [document.getElementById('addPlaceBtn'), document.getElementById('openAddPlaceBtn')];
    const openManageVerificationBtns = [document.getElementById('manageVerificationBtn'), document.getElementById('openManageVerificationBtn')];
    const openProfilBtns = [document.getElementById('profilBtn'), document.getElementById('openProfilBtn')];
    
    //tampilan profil
    const containerProfile = document.getElementById('containerProfile');
    const profilPage = document.getElementById('profilPage');
    const editProfilePage = document.getElementById('editProfilePage');
    const bawahProfil = document.getElementById('bawahProfil');
    const accountSetting = document.getElementById('accountSetting');
    
    //changa password profil
    const savePasswordBtn = document.getElementById('savePasswordBtn');
    const currentPasswordInput = document.getElementById('currentPassword');
    const newPasswordInput = document.getElementById('newPass');
    const passwordError = document.getElementById('passwordError');
    
    //tombol di profil
    const logoutBtn = document.getElementById('logoutBtn');
    const openAccountSettingBtn = document.getElementById('openAccountSettingBtn');
    const closeAccountSettingBtn = document.getElementById('closeAccountSettingBtn');
    
    //file upload dan direct ke gmaps untuk form addplace
    const fileInput = document.getElementById("file-upload");
    const fileList = document.getElementById("file-list");
    const fileUploadVisual = document.getElementById("fileUploadVisual");
    const fileUploadPlaceholder = document.getElementById("fileUploadPlaceholder");
    const gmapsInput = document.getElementById("gmaps");

    let activePanel = 'awal'; 

    // fungsi untuk ganti ganti main content
    function showPanel(panelName) {
        headerDiv.classList.add('hidden');
        awalDiv.classList.add('hidden');
        afterSearchDiv.classList.add('hidden');
        notification.classList.add('hidden');
        addPlaceForm.classList.add('hidden');
        manageVerification.classList.add('hidden'); 
        profile.classList.add('hidden');
        
        switch (panelName) {
            case 'awal':
                headerDiv.classList.remove('hidden');
                awalDiv.classList.remove('hidden');
                break;
            case 'afterSearch':
                headerDiv.classList.remove('hidden');
                afterSearchDiv.classList.remove('hidden');
                break;
            case 'notification':
                notification.classList.remove('hidden');
                break;
            case 'addPlace':
                addPlaceForm.classList.remove('hidden');
                break;
            case 'manageVerification':
                manageVerification.classList.remove('hidden');
                break;
            case 'profil':
                profile.classList.remove('hidden');
                containerProfile.classList.remove('hidden');
                profilPage.classList.remove('hidden');
                bawahProfil.classList.remove('hidden');
                editProfilePage.classList.add('hidden'); 
                accountSetting.classList.add('hidden');
                break;
        }
        activePanel = panelName;

        if (sidebarMenu.classList.contains('translate-x-0')) {
            sidebarMenu.classList.remove('translate-x-0');
            sidebarMenu.classList.add('-translate-x-full');
            mainContent.style.marginLeft = '5rem';
        }
    }

    mainContent.style.transition = 'margin-left 0.3s';

    //buka tutup sidebar
    hamburgerBtn.addEventListener('click', () => {
        sidebarMenu.classList.remove('-translate-x-full');
        mainContent.style.marginLeft = '18rem'; 
    });
    closeSidebarMenuBtn.addEventListener('click', () => {
        sidebarMenu.classList.add('-translate-x-full');
        mainContent.style.marginLeft = '5rem'; 
    });

    //search icon untuk after search
    searchIcon.addEventListener('click', () => showPanel('afterSearch'));
    
    openNotificationBtns.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (activePanel === 'notification') {
            showPanel('awal');
        } else {
            showPanel('notification');
        }
    }));

    openAddPlaceBtns.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (activePanel === 'addPlace') {
            showPanel('awal');
        } else {
            showPanel('addPlace');
        }
    }));
    
    openProfilBtns.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (activePanel === 'profil') {
            showPanel('awal');
        } else {
            showPanel('profil');
        }
    }));

    function generateStars(element) {
        let rating = parseFloat(element.getAttribute("data-rating")); // Ambil rating
        let fullStars = Math.floor(rating); // Bintang penuh
        let halfStar = rating % 1 >= 0.5 ? 1 : 0; // Bintang setengah jika >= 0.5
        let emptyStars = 5 - (fullStars + halfStar); // Sisa bintang kosong

        let starsHTML = "";

        // Tambah bintang penuh
        for (let i = 0; i < fullStars; i++) {
            starsHTML += '<i class="fa-solid fa-star"></i>';
        }
        // Tambah bintang setengah jika ada
        if (halfStar) {
            starsHTML += '<i class="fa-solid fa-star-half-alt"></i>';
        }
        // Tambah bintang kosong
        for (let i = 0; i < emptyStars; i++) {
            starsHTML += '<i class="fa-regular fa-star"></i>';
        }

        element.innerHTML = starsHTML;
    }

    document.querySelectorAll(".rating").forEach(generateStars);
    
    if (openAccountSettingBtn) {
        openAccountSettingBtn.addEventListener('click', () => {
            containerProfile.classList.add('hidden');
            bawahProfil.classList.add('hidden');
            accountSetting.classList.remove('hidden');
        });
    }

    if (closeAccountSettingBtn) {
        closeAccountSettingBtn.addEventListener('click', () => {
            accountSetting.classList.add('hidden');
            containerProfile.classList.remove('hidden');
            bawahProfil.classList.remove('hidden');
            profilPage.classList.remove('hidden');
            editProfilePage.classList.add('hidden');
        });
    }

    const validateAndUpdateButton = () => {
        const currentPass = currentPasswordInput.value.trim();
        const newPass = newPasswordInput.value.trim();
        const isNewPassLengthValid = newPass.length >= 8 && newPass.length <= 20;

        if (newPass !== '' && !isNewPassLengthValid) {
            passwordError.classList.remove('hidden');
        } else {
            passwordError.classList.add('hidden');
        }

        const isFormValid = currentPass !== '' && newPass !== '' && isNewPassLengthValid;

        if (isFormValid) {
            savePasswordBtn.disabled = false;
            savePasswordBtn.classList.remove('text-[#FF9800]', 'bg-white', 'opacity-50', 'cursor-not-allowed');
            savePasswordBtn.classList.add('bg-[#FF9800]', 'text-white');
        } else {
            savePasswordBtn.disabled = true;
            savePasswordBtn.classList.remove('bg-[#FF9800]', 'text-white');
            savePasswordBtn.classList.add('text-[#FF9800]', 'bg-white', 'opacity-50', 'cursor-not-allowed');
        }
    };

    currentPasswordInput.addEventListener('input', validateAndUpdateButton);
    newPasswordInput.addEventListener('input', validateAndUpdateButton);
    
    validateAndUpdateButton();

    if (savePasswordBtn) {
        savePasswordBtn.addEventListener('click', () => {
            if (savePasswordBtn.disabled) {
                return;
            }
            
            alert('Successfully change password');
            
            currentPasswordInput.value = '';
            newPasswordInput.value = '';
            
            validateAndUpdateButton();
        });
    }

    if (logoutBtn) {
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault(); 
            const message = "Are you sure you want to log out? You can still log in with this account in the next session.";
            
            const userConfirmed = window.confirm(message);

            if (userConfirmed) {
                console.log("Logging out...");
                // Mengarahkan pengguna ke halaman login
                // window.location.href = '/halaman-login.html'; 
                alert("You have been successfully logged out.");
            } else {
                console.log("Log out canceled.");
            }
        });
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const wasActive = button.classList.contains('bg-[#FF9800]');

            filterButtons.forEach(btn => {
                btn.classList.remove('bg-[#FF9800]', 'text-white');
                btn.classList.add('bg-white', 'text-[#FF9800]');
            });

            if (!wasActive) {
                button.classList.remove('bg-white', 'text-[#FF9800]');
                button.classList.add('bg-[#FF9800]', 'text-white');
            }
        });
    });

    if (gmapsInput) {
        let mapsAlertShown = false; 
        gmapsInput.addEventListener('focus', () => {
            if (!mapsAlertShown) {
                window.open('https://www.google.com/maps', '_blank');
        
                alert("Please search for and mark the location on Google Maps that just opened.\n\n" +
                    "Once you have found the location, click the 'Share' button,\n" +
                    "then copy the link provided and paste it into this field.");
                mapsAlertShown = true; 
            }
        });
    }

    if (fileUploadVisual) { 
    fileUploadVisual.onclick = () => {
        fileInput.click();
        };
    } else {
        console.error("Error: Div 'fileUploadVisual' tidak ditemukan!");
    }

    if (fileInput) { 
    fileInput.onchange = () => {
        if (fileInput.files.length > 0) {
            let filesText = Array.from(fileInput.files)
                                    .map(file => file.name)
                                    .join(', ');
            fileList.textContent = `Selected: ${filesText}`;
            fileUploadPlaceholder.value = `${fileInput.files.length} file(s) selected`; 
        } else {
            fileList.textContent = '';
            fileUploadPlaceholder.value = ''; 
            fileUploadPlaceholder.placeholder = "Upload File(s)"; 
        }
    };
    } else {
        console.error("Error: Input 'file-upload' tidak ditemukan!");
    }

    const attractionForm = document.getElementById("attractionForm");
    if (attractionForm) {
        attractionForm.onsubmit = (e) => {
            e.preventDefault(); 
            let isValid = true; 

            const showError = (inputElement, message) => {
                inputElement.classList.add('border-red-500'); 
                let errorSpan = inputElement.nextElementSibling;
                if (!errorSpan || !errorSpan.classList.contains('error-message')) {
                    errorSpan = document.createElement('p');
                    errorSpan.classList.add('error-message', 'text-red-500', 'text-sm', 'mt-1');
                    inputElement.parentNode.insertBefore(errorSpan, inputElement.nextSibling); 
                }
                errorSpan.textContent = message;
                isValid = false; 
            };
            
            const hideError = (inputElement) => {
                inputElement.classList.remove('border-red-500'); 
                let errorSpan = inputElement.nextElementSibling;
                if (errorSpan && errorSpan.classList.contains('error-message')) {
                    errorSpan.textContent = ''; 
                    
                }
            };

            attractionForm.querySelectorAll('input[type="text"]:not(#fileUploadPlaceholder), textarea').forEach(input => {
                if (!input.value.trim()) {
                    showError(input, "This field is required.");
                } else {
                    hideError(input);
                }
            });

            const urlRegex = /^(https?:\/\/(?:www\.|m\.)?google\.(?:com|co\.\w{2}|ru)\/maps\S*|https?:\/\/maps\.app\.goo\.gl\/\S*)/i;

            if (!gmapsInput.value.trim()) {
                showError(gmapsInput, "This field is required.");
            } else if (!urlRegex.test(gmapsInput.value.trim())) {
                showError(gmapsInput, "Please enter a valid map URL (e.g., Google Maps link).");
            } else {
                hideError(gmapsInput);
            }
                    
            if (isValid) {
                alert("Form has been submitted!"); 
                e.target.reset();  
                fileList.textContent = ''; 
                fileUploadPlaceholder.value = ''; 
                fileUploadPlaceholder.placeholder = "Upload File(s)"; 
                attractionForm.querySelectorAll('.border-red-500').forEach(el => el.classList.remove('border-red-500'));
                attractionForm.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            }
        };
    } else { 
        console.error("Error: Form dengan ID 'attractionForm' tidak ditemukan!");
    }

    function openAddPlaceModal(data) {
        document.getElementById('add_placeName').textContent = data.placeName;
        document.getElementById('add_category').textContent = data.category;
        document.getElementById('add_district').textContent = data.district;
        document.getElementById('add_subdistrict').textContent = data.subdistrict;
        document.getElementById('add_village').textContent = data.village;
        document.getElementById('add_street').textContent = data.street;
        const gmapsLink = document.getElementById('add_gmaps');
        gmapsLink.href = data.gmaps;
        gmapsLink.textContent = data.gmaps;
        document.getElementById('add_description').textContent = data.description;

        const photoLinksContainer = document.getElementById('photo_link');
        photoLinksContainer.innerHTML = '';
        
        if (data.photo_link && data.photo_link.length > 0) {
            data.photo_link.forEach(fileName => {
                const link = document.createElement('a');
                link.href = `../Assets/${fileName}`; 
                link.textContent = fileName;
                link.target = '_blank'; 
                link.className = 'text-blue-600 hover:underline block'; 
                photoLinksContainer.appendChild(link);
            });
        } else {
            photoLinksContainer.textContent = 'No photo uploaded.';
        }

        addPlaceModal.classList.remove('hidden');
    }

    function openClaimCulinaryModal(data) {
        document.getElementById('claim_fullName').textContent = data.fullName;
        document.getElementById('claim_phone').textContent = data.phone;
        document.getElementById('claim_email').textContent = data.email;
        document.getElementById('claim_tin').textContent = data.tin; // Taxpayer Identification Number
        
        const documentLinksContainer = document.getElementById('supporting_document');
        documentLinksContainer.innerHTML = '';

        if (data.supporting_document && data.supporting_document.length > 0) {
            data.supporting_document.forEach(fileName => {
                const link = document.createElement('a');
                link.href = `../Assets/${fileName}`;
                link.textContent = fileName;
                link.target = '_blank';
                link.className = 'text-blue-600 hover:underline block';
                documentLinksContainer.appendChild(link);
            });
        } else {
            documentLinksContainer.textContent = 'No document uploaded.';
        }

        claimCulinaryModal.classList.remove('hidden');
    }

    function closeModal(modalElement) {
        if (modalElement) {
            modalElement.classList.add('hidden');
        }
    }

    document.querySelectorAll('.modal-close-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const modalId = this.dataset.closeModal;
            const modalToClose = document.getElementById(modalId);
            closeModal(modalToClose);
        });
    });

    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this);
            }
        });
    });

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

    openManageVerificationBtns.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (activePanel === 'manageVerification') {
            showPanel('awal');
        } else {
            showPanel('manageVerification');
            // Tidak perlu reset tombol di sini, biarkan status tetap
        }
    }));

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

    document.querySelectorAll('.view-form-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const parentItem = link.closest('.verification-item');
            const requestType = parentItem.dataset.type;

            // Hanya enable tombol jika belum diverifikasi
            setButtonState(parentItem);

            if (requestType === 'add-place') {
                const addData = {
                    placeName: "Universitas Mataram",
                    category: "Tourist destination",
                    district: "Mataram",
                    subdistrict: "Selaparang",
                    village: "Gomong",
                    street: "Majapahit Street No.62",
                    gmaps: "https://maps.app.goo.gl/96YcpUGoX1Xedrss7",
                    description: "Universitas Mataram is a state university in the city of Mataram, West Nusa Tenggara province, Indonesia.",
                    photo_link: ["unram.jpg",]
                };
                openAddPlaceModal(addData);
            } else if (requestType === 'claim-culinary') {
                const claimData = {
                    fullName: "Ihdal Fahroni",
                    phone: "08877776663",
                    email: "rmsumberejeki@gmail.com",
                    tin: "123456789",
                    supporting_document: ["sumber_rejeki.png",]
                };
                openClaimCulinaryModal(claimData);
            }
        });
    });

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
    
    showPanel('awal');
});