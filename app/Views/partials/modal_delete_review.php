<?php // app/Views/partials/modal_delete_review.php ?>

<div id="deleteReviewModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
    <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5c3211] w-6/12 max-w-md relative text-[#5C3211]">
        <div class="border border-[#5c3211] rounded-xl p-6 relative">
            <button id="closeDeleteReviewModal" type="button" class="absolute top-3 right-3 w-8 h-8 rounded-full flex items-center justify-center text-gray-600 hover:bg-gray-100 transition focus:outline-none">
                <i class="fas fa-xmark text-lg"></i>
            </button>
            
            <form id="deleteReviewForm" action="<?= site_url('review/delete') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id_review" id="delete_review_id">
                <input type="hidden" name="id_tempat" id="delete_review_id_tempat">

                <div class="text-center mb-4">
                    <h2 class="text-xl font-bold text-[#5C3211]">Delete Review</h2>
                </div>

                <div class="space-y-4">
                    <div>
                        <label for="alasan_hapus" class="block text-base font-light text-[#5C3211] mb-2">Why this review should be deleted?</label>
                        <select name="alasan_hapus" id="alasan_hapus" class="mt-1 font-light block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <option value="">Choose a reason</option>
                            <option value="inappropriate_word">Use of inappropriate word</option>
                            <option value="misleading_info">Misleading information</option>
                            <option value="offensive">Offensive</option>
                            <option value="spam">Spam or Promotion</option>
                        </select>
                    </div>
                    <div class="pt-2 text-center">
                        <button type="submit" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>