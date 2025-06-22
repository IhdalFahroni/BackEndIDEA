<?php // app/Views/partials/modal_promo.php ?>

<div id="promoModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
    <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 w-50% max-w-2xl relative text-[#5C3211]">
        <div class="border border-[#5C3211] rounded-xl p-8 relative">
            <button id="closePromoModal" class="absolute top-3 right-3 w-8 h-8 rounded-full border border-[#5C3211] flex items-center justify-center text-[#8E5E38] hover:bg-gray-100 transition focus:outline-none">
                <i class="fas fa-xmark text-lg"></i>
            </button>

            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">Promo & Penawaran Spesial</h2>
                <p class="text-sm opacity-70">Jangan lewatkan promo menarik dari kami!</p>

                <?php if (isset($isOwner) && $isOwner) : ?>
                    <div class="mt-4">
                        <a id="managePromoBtn" href="#" class="inline-block bg-green-600 text-white px-5 py-2 rounded-full text-sm font-semibold shadow-md hover:bg-green-700 transition">
                            <i class="fas fa-edit mr-2"></i>Kelola Promo
                        </a>
                    </div>
                <?php endif; ?>
                </div>

            <div class="space-y-4 max-h-[60vh] overflow-y-auto pr-2">

                <?php if (!empty($promo)) : ?>
                    <?php foreach ($promo as $prom) : ?>
                        <div class="border border-dashed border-gray-400 rounded-lg p-4">
                            <h3 class="font-bold text-lg text-[#d97706] uppercase"><?= esc($prom['nama_promo']) ?></h3>
                            <p class="text-gray-700 mt-1 mb-2 text-left"><?= esc($prom['deskripsi_promo']) ?></p>
                            
                            <?php if (!empty($prom['valid_until'])) : ?>
                                <p class="text-xs text-gray-500 text-left">Berlaku hingga: <?= date('d F Y', strtotime($prom['valid_until'])) ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center text-gray-500 py-8">Saat ini tidak ada promo yang tersedia.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>