<?php // app/Views/partials/menu_modal.php ?>

<div id="menuModal" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black/60 flex justify-center items-center z-[1000] hidden">
    <div class="bg-gradient-to-b from-[#FFC107] to-[#F8F9FA] rounded-xl p-6 md:p-8 w-11/12 max-w-lg relative shadow-2xl">
        <div class="modal-close-btn" data-close-modal="menuModal">
            <i class="fa-solid fa-xmark text-lg text-[#1F2937]"></i>
        </div>
        <h2 class="text-2xl font-bold text-center text-white mb-6 [text-shadow:1px_1px_rgba(0,0,0,0.5)]">Menu</h2>
        <div class="max-h-[70vh] overflow-y-auto pr-2.5">
            <?php // Variabel $menu diharapkan dari controller Tempat::detail() ?>
            <?php if (!empty($menu)) : ?>
                <?php foreach ($menu as $item) : ?>
                    <div class="bg-white rounded-lg p-3 sm:p-4 mb-4 border border-[#F0D3B3]">
                        <h3 class="font-semibold text-lg text-[#5C3211]"><?= esc($item['nama_menu']) ?></h3>
                        <p class="text-sm text-gray-700"><?= esc($item['deskripsi_menu']) ?></p>
                        <p class="text-base font-bold text-[#FF9800] mt-2">Rp<?= number_format($item['harga'], 0, ',', '.') ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-[#5C3211]">Menu belum tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>