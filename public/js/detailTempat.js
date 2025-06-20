document.addEventListener("DOMContentLoaded", () => {
    // Variabel global dari home_template.php sudah tersedia
    // const BASE_URL = '...'; 
    // const API_URL_SUBMIT_REVIEW = '...'; // Jika Anda mendefinisikannya di tempat_detail.php

    // --- FUNGSI BINTANG RATING (Diulang dari dashboard.js) ---
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


    // --- LOGIKA MODAL (ULANGI DARI DASHBOARD.JS, TAMBAHKAN REFERENSI) ---
    const claimCulinaryModal = document.getElementById("claimCulinaryModal"); // Ini dari home_template.php
    const menuModal = document.getElementById("menuModal"); // Modal Menu di home_template.php (sekarang)
    const promoModal = document.getElementById("promoModal"); // Modal Promo di home_template.php (sekarang)
    const addReviewModal = document.getElementById("addReviewModal"); // Modal Add Review dari partial review_dan_modalnya.php


    // Fungsi universal untuk menutup modal
    function closeModal(modalElement) {
        if (modalElement) {
            modalElement.classList.add("hidden");
        }
    }

    // Event listener untuk tombol 'x' di modal
    document.querySelectorAll(".modal-close-btn").forEach((btn) => {
        if (btn) { // Pastikan tombol ada
            btn.addEventListener("click", function () {
                const modalId = this.dataset.closeModal;
                const modalToClose = document.getElementById(modalId);
                closeModal(modalToClose);
            });
        }
    });

    // Event listener untuk menutup modal dengan klik di overlay
    document.querySelectorAll(".modal-overlay").forEach((overlay) => {
        if (overlay) { // Pastikan overlay ada
            overlay.addEventListener("click", function (e) {
                if (e.target === this) { // Hanya tutup jika klik di overlay, bukan di dalam modal
                    closeModal(this);
                }
            });
        }
    });


    // --- EVENT LISTENERS KHUSUS HALAMAN DETAIL TEMPAT ---
    const openClaimBtn = document.getElementById("openClaim");
    if (openClaimBtn) {
        openClaimBtn.addEventListener("click", () => {
            if (claimCulinaryModal) { // Pastikan modal ada
                claimCulinaryModal.classList.remove("hidden");
                // Anda mungkin perlu mengisi data modal claim dari sini jika Anda tidak menggunakan form
                // Contoh: mengisi form claimCulinaryModal dengan data yang sudah ada
            }
        });
    }

    const openMenuBtn = document.getElementById("openMenu");
    if (openMenuBtn) {
        openMenuBtn.addEventListener("click", () => {
            if (menuModal) menuModal.classList.remove("hidden");
        });
    }

    const openPromoBtn = document.getElementById("openPromo");
    if (openPromoBtn) {
        openPromoBtn.addEventListener("click", () => {
            if (promoModal) promoModal.classList.remove("hidden");
        });
    }

    const addReviewBtn = document.getElementById("addReviewBtn");
    if (addReviewBtn) {
        addReviewBtn.addEventListener("click", () => {
            if (addReviewModal) addReviewModal.classList.remove("hidden");
        });
    }

    // --- LOGIKA SUBMIT REVIEW (Full Page Reload) ---
    const reviewForm = document.getElementById("reviewForm");
    if (reviewForm) {
        reviewForm.addEventListener("submit", (e) => {
            // Validasi sisi klien di sini jika diperlukan
            const ratingInput = document.getElementById("reviewRating");
            const commentInput = document.getElementById("reviewComment");
            
            if (!ratingInput.value) { // Contoh validasi sederhana
                alert("Rating wajib diisi!");
                e.preventDefault(); // Hentikan submit
                return;
            }
            // Jika validasi klien berhasil, biarkan form disubmit secara alami
            // Data akan dikirim ke action form: site_url('home/submitReview')
        });
    }
});