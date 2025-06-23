<?php // app/Views/partials/modal_promo.php ?>

<div id="promoModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
    <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 sm:w-11/12 md:w-9/12 lg:w-7/12 max-w-full md:max-w-3xl lg:max-w-4xl relative text-[#5C3211]">
        <div class="border border-[#5C3211] rounded-xl p-8 relative">
            <button id="closePromoModal" class="absolute top-3 right-3 w-5 h-5 rounded-full flex items-center justify-center text-[#5C3211] hover:bg-gray-100 transition focus:outline-none">
                <i class="fas fa-xmark text-lg"></i>
            </button>

            <div id="promoListContainer" class="space-y-4 max-h-[60vh] overflow-y-auto pr-2">

                <?php if (!empty($promo)) : ?>
                    <?php foreach ($promo as $prom) : ?>
                        <div>
                            <h3 class="font-bold text-xl text-[#5C3211] uppercase"><?= esc($prom['nama_promo']) ?></h3>
                            <p class="text-[#5C3211] mt-1 mb-2 text-left font-light"><?= esc($prom['deskripsi_promo']) ?></p>
                            <?php if (!empty($prom['valid_until'])) : ?>
                                <p class="text-lg text-[#5C3211] text-left">Valid until: <?= date('d F Y', strtotime($prom['valid_until'])) ?></p>
                            <?php endif; ?>
                            <?php if ((isset($isOwner) && $isOwner) || session()->get('user_role') === 'admin') : ?>
                                <form action="<?= site_url('promo/delete') ?>" method="post" onsubmit="return confirm('Anda yakin ingin menghapus promo ini?');">
                                    <input type="hidden" name="id_promo" value="<?= esc($prom['ID_promo']) ?>">
                                    <input type="hidden" name="id_tempat" value="<?= esc($tempat['ID_tempat']) ?>">
                                    <button type="submit" class="text-red-500 hover:text-red-700 " title="Hapus Promo">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                        <hr class="border-[#5C3211]">
                    <?php endforeach; ?>
                    <p class="pt-3 text-center">
                        That's all.
                    </p>
                <?php else : ?>
                    <p class="text-center text-[#5C3211] py-8">There's no promo yet.</p>
                <?php endif; ?>

                <div id="addPromoFormContainer" class="hidden pt-4">
                    <hr class="mb-4">
                    <h3 class="font-bold text-lg text-center mb-4">Add New Promo</h3>
                    
                    <?php if (session()->has('errors')) : ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                            <ul class="mt-2 list-disc list-inside">
                            <?php foreach (session('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <form id="addPromoForm" action="<?= site_url('promo/add') ?>" method="post" class="space-y-4">
                        <?= csrf_field() ?>
                        <input type="hidden" name="ID_tempat" value="<?= esc($tempat['ID_tempat']) ?>">
                        
                        <div>
                            <label for="nama_promo" class="block text-sm font-medium text-gray-700">Promo Title</label>
                            <input type="text" name="nama_promo" id="nama_promo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" required>
                        </div>
                        <div>
                            <label for="deskripsi_promo" class="block text-sm font-medium text-gray-700">Promo Description</label>
                            <textarea name="deskripsi_promo" id="deskripsi_promo" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" required></textarea>
                        </div>
                        <div>
                            <label for="valid_until" class="block text-sm font-medium text-gray-700">Valid Until (Optional)</label>
                            <input type="date" name="valid_until" id="valid_until" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                        </div>
                        <div class="flex justify-end gap-3 pt-4">
                            <button type="button" id="cancelAddPromoBtn" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
                            <button type="submit" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">Save Promo</button>
                        </div>
                    </form>
                </div>
                </div>
            
            <?php if (isset($isOwner) && $isOwner) : ?>
                <button id="addPromoItemBtn" title="Tambah Promo Baru" class="absolute px-4 m-2 bottom-5 right-4 w-14 h-14 text-[#FF9800] flex items-center justify-cente hover:bg-opacity-80 transition">
                    <i class="fas fa-plus text-xl"></i>
                </button>
            <?php endif; ?>

        </div>
    </div>
</div>