<?php
// Variabel $reviews, $tempat, dan $isLoggedIn diharapkan ada dari controller
?>

<div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845]">
    <h3 class="text-xl font-bold text-[#5C3211] mb-4">Reviews</h3>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div id="validationErrors" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops! Terjadi kesalahan:</strong>
            <ul class="mt-2 list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (isset($isLoggedIn) && $isLoggedIn) : ?>
        <div id="addReview" class="w-full cursor-pointer group">
            <i class="fas fa-plus-circle text-lg text-[#5C3211] opacity-50 group-hover:opacity-100 transition"></i>
            <span class="font-medium text-[#5C3211] opacity-50 group-hover:opacity-100 transition">Add review</span>
            <hr class="border-[#5C3211] opacity-50 mt-1 mb-6">
        </div>

        <div id="fillReview" class="w-full hidden">
            <form id="reviewForm" action="<?= site_url('home/submitReview') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?> <input type="hidden" name="ID_tempat" value="<?= esc($tempat['ID_tempat']) ?>">

                <div class="mb-3">
                    <div id="afterRating" class="hidden items-center gap-1.5 bg-[#5C3211] text-white px-3 py-1 rounded-full text-sm shadow-sm">
                        <i class="fas fa-star"></i>
                        <span class="font-semibold" id="displayRatingValue"></span>
                        <i id="cancelRating" class="fas fa-xmark cursor-pointer hover:scale-110 transition-transform"></i>
                    </div>
                    <input type="hidden" name="rating" id="hiddenRatingInput">

                    <div id="afterImage" class="hidden items-center gap-1.5 bg-[#5C3211] text-white px-3 py-1 rounded-full text-sm shadow-sm">
                        <i class="fas fa-image"></i>
                        <span class="font-semibold" id="displayImageName"></span>
                        <i id="cancelImage" class="fas fa-xmark cursor-pointer hover:scale-110 transition-transform"></i>
                    </div>
                    <input type="file" id="reviewImageUpload" name="review_photo" class="hidden" accept="image/png, image/jpeg, image/jpg">
                </div>

                <div class="flex justify-between items-center mb-0">
                    <input type="text" id="reviewTextInput" name="komentar" placeholder="Please refrain from using harsh or inappropriate language" class="flex-1 bg-transparent border-0 p-0 text-sm font-normal text-[#5C3211] placeholder:text-[#5C3211] placeholder:opacity-60 focus:outline-none focus:ring-0 focus:border-0 mr-3">
                    <div class="flex gap-3 text-lg">
                        <i id="closeReview" class="fas fa-xmark text-[#5C3211] hover:opacity-60 cursor-pointer transition-opacity"></i>
                        <button type="submit" class="bg-transparent border-none p-0 cursor-pointer">
                            <i class="fas fa-paper-plane text-[#5C3211] hover:opacity-60 transition-opacity"></i>
                        </button>
                    </div>
                </div>
                <hr class="border-[#5C3211] opacity-60">
                <div class="flex gap-3 text-lg mt-3 mb-4">
                    <i id="openRating" class="fas fa-star text-[#5C3211] hover:opacity-60 cursor-pointer transition-opacity" title="Add Rating"></i>
                    <i id="openImage" class="fas fa-image text-[#5C3211] hover:opacity-60 cursor-pointer transition-opacity" title="Add Image"></i>
                </div>
            </form>
        </div>
    <?php endif; ?>

    <hr class="border-[#5C3211] mb-4">

    <div class="space-y-8">
        <?php if (!empty($reviews)) : ?>
            <?php foreach ($reviews as $review) : ?>
                <div class="border-b border-gray-200 pb-4 last:border-b-0">
                    <div class="mb-2">
                        <p class="font-semibold text-[#5C3211]"><?= esc($review['username'] ?? 'Anonymous') ?>
                            <span class="text-xs text-[#5C3211] font-normal ml-2"><?= esc(date('H:i, M d, Y', strtotime($review['waktu']))) ?></span>
                        </p>
                        <div class="flex items-center text-yellow-500 text-sm rating" data-rating="<?= esc($review['rating']) ?>">
                            <?php // Bintang akan digenerate oleh JS ?>
                        </div>
                    </div>
                    <p class="text-base text-[#5C3211] mb-4 leading-relaxed">
                        <?= esc($review['komentar']) ?>
                    </p>
                    <?php if (!empty($review['foto'])) : ?>
                        <img src="<?= base_url('Assets/' . esc($review['foto'])) ?>" alt="Review Image" class="rounded-xl w-80 h-52 object-cover shadow-md mb-3">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center text-gray-600">Belum ada ulasan untuk tempat ini.</p>
        <?php endif; ?>
    </div>
</div>

<div id="ratingModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
    <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 w-full max-w-lg relative text-[#5C3211]">
        <div class="border border-[#5C3211] rounded-xl p-6 relative">
            <button id="closeRatingModal" class="absolute top-3 left-3 w-7 h-7 rounded-full border border-[#5C3211] flex items-center justify-center text-[#8E5E38] hover:bg-gray-100 transition focus:outline-none">
                <i class="fas fa-xmark text-base"></i>
            </button>
            <div class="text-center">
                <h2 class="text-xl font-bold mt-0 mb-2">Rating</h2>
                <p class="opacity-80 mb-10 font-normal max-w-xs mx-auto">
                    You can give rating from 1 to 5. Decimal is allowed.
                </p>
                <input type="text" id="ratingInput" name="modal_rating_value" placeholder="Example: 4.5" class="rating-input block w-3/5 mx-auto border-0 border-b-2 border-[#5C3211]/60 text-center pt-2 px-2 pb-0 text-[#5C3211] placeholder:text-[#5C3211] placeholder:opacity-60 placeholder:font-light focus:outline-none focus:ring-0 focus:border-[#5C3211] mb-12">
                <button id="submitRating" class="block mx-auto bg-[#5C3211] text-white px-7 py-1 rounded-full shadow-md hover:bg-opacity-80 transition font-semibold text-lg tracking-wider">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // --- FUNGSI UNTUK GENERATE BINTANG REVIEW ---
    function generateStars() {
        const ratingElements = document.querySelectorAll('.rating');
        ratingElements.forEach(element => {
            const rating = parseFloat(element.dataset.rating);
            if (isNaN(rating)) return;
            
            let starsHtml = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= rating) {
                    starsHtml += '<i class="fas fa-star text-yellow-500"></i>';
                } else if (i - 0.5 <= rating) {
                    starsHtml += '<i class="fas fa-star-half-alt text-yellow-500"></i>';
                } else {
                    starsHtml += '<i class="far fa-star text-gray-400"></i>';
                }
            }
            element.innerHTML = starsHtml;
        });
    }
    generateStars();

    // --- PEMILIHAN ELEMEN DOM ---
    const addReviewDiv = document.getElementById('addReview');
    const fillReviewDiv = document.getElementById('fillReview');
    const closeReviewBtn = document.getElementById('closeReview');
    const reviewForm = document.getElementById('reviewForm');

    const openRatingBtn = document.getElementById('openRating');
    const openImageBtn = document.getElementById('openImage');

    const ratingModal = document.getElementById('ratingModal');
    const closeRatingModalBtn = document.getElementById('closeRatingModal');
    const submitRatingBtn = document.getElementById('submitRating');
    const ratingInput = document.getElementById('ratingInput');
    
    const hiddenRatingInput = document.getElementById('hiddenRatingInput');
    const afterRatingBadge = document.getElementById('afterRating');
    const displayRatingValue = document.getElementById('displayRatingValue');
    const cancelRatingBtn = document.getElementById('cancelRating');
    
    const reviewImageUpload = document.getElementById('reviewImageUpload');
    const afterImageBadge = document.getElementById('afterImage');
    const displayImageName = document.getElementById('displayImageName');
    const cancelImageBtn = document.getElementById('cancelImage');

    // --- LOGIKA TAMPILKAN/SEMBUNYIKAN FORM REVIEW ---
    if (addReviewDiv) {
        addReviewDiv.addEventListener('click', () => {
            addReviewDiv.style.display = 'none';
            fillReviewDiv.classList.remove('hidden');
        });
    }

    if (closeReviewBtn) {
        closeReviewBtn.addEventListener('click', () => {
            fillReviewDiv.classList.add('hidden');
            addReviewDiv.style.display = 'block';
            reviewForm.reset();
            afterRatingBadge.classList.add('hidden');
            afterRatingBadge.classList.remove('inline-flex');
            afterImageBadge.classList.add('hidden');
            afterImageBadge.classList.remove('inline-flex');
            hiddenRatingInput.value = '';
            reviewImageUpload.value = '';
        });
    }

    // --- LOGIKA MODAL RATING ---
    if (openRatingBtn) {
        openRatingBtn.addEventListener('click', () => {
            ratingModal.classList.remove('hidden');
            ratingModal.classList.add('flex');
        });
    }
    
    if (closeRatingModalBtn) {
        closeRatingModalBtn.addEventListener('click', () => {
            ratingModal.classList.add('hidden');
            ratingModal.classList.remove('flex');
        });
    }

    if (submitRatingBtn) {
        submitRatingBtn.addEventListener('click', () => {
            let ratingValue = ratingInput.value.replace(',', '.');
            if (ratingValue && !isNaN(ratingValue) && ratingValue >= 1 && ratingValue <= 5) {
                hiddenRatingInput.value = ratingValue;
                displayRatingValue.textContent = ratingValue;
                afterRatingBadge.classList.remove('hidden');
                afterRatingBadge.classList.add('inline-flex');
                ratingModal.classList.add('hidden');
                ratingModal.classList.remove('flex');
            } else {
                alert('Please enter a valid rating between 1 and 5.');
            }
        });
    }

    if (cancelRatingBtn) {
        cancelRatingBtn.addEventListener('click', () => {
            hiddenRatingInput.value = '';
            afterRatingBadge.classList.add('hidden');
            afterRatingBadge.classList.remove('inline-flex');
        });
    }

    // --- LOGIKA GAMBAR ---
    if (openImageBtn) {
        openImageBtn.addEventListener('click', () => {
            reviewImageUpload.click();
        });
    }

    if (reviewImageUpload) {
        reviewImageUpload.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                let fileName = this.files[0].name;
                if(fileName.length > 20) {
                    fileName = fileName.substring(0, 17) + '...';
                }
                displayImageName.textContent = fileName;
                afterImageBadge.classList.remove('hidden');
                afterImageBadge.classList.add('inline-flex');
            }
        });
    }
    
    if (cancelImageBtn) {
        cancelImageBtn.addEventListener('click', () => {
            reviewImageUpload.value = '';
            afterImageBadge.classList.add('hidden');
            afterImageBadge.classList.remove('inline-flex');
        });
    }
    
    // --- JIKA ADA ERROR VALIDASI, JAGA FORM TETAP TERBUKA ---
    const validationErrors = document.getElementById('validationErrors');
    if (validationErrors && addReviewDiv) {
        addReviewDiv.style.display = 'none';
        fillReviewDiv.classList.remove('hidden');
    }
});
</script>