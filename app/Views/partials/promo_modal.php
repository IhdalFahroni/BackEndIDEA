<?php // app/Views/partials/promo_modal.php ?>

<div id="promoModal" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black/60 flex justify-center items-center z-[1000] hidden">
    <div class="bg-gradient-to-b from-[#FFC107] to-[#F8F9FA] rounded-xl p-6 md:p-8 w-11/12 max-w-lg relative shadow-2xl">
        <div class="modal-close-btn" data-close-modal="promoModal">
            <i class="fa-solid fa-xmark text-lg text-[#1F2937]"></i>
        </div>
        <h2 class="text-2xl font-bold text-center text-white mb-6 [text-shadow:1px_1px_rgba(0,0,0,0.5)]">Promo</h2>
        <div class="max-h-[70vh] overflow-y-auto pr-2.5">
            <?php // Variabel $promo diharapkan dari controller Tempat::detail() ?>
            <?php if (!empty($promo)) : ?>
                <?php foreach ($promo as $item) : ?>
                    <div class="bg-white rounded-lg p-3 sm:p-4 mb-4 border border-[#F0D3B3]">
                        <h3 class="font-semibold text-lg text-[#5C3211]"><?= esc($item['nama_promo']) ?></h3>
                        <p class="text-sm text-gray-700 mb-2"><?= esc($item['deskripsi_promo']) ?></p>
                        <p class="text-xs text-gray-500">Periode: <?= esc($item['tanggal_mulai']) ?> - <?= esc($item['tanggal_akhir']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-[#5C3211]">Promo belum tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>