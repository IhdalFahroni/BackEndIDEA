<?php // app/Views/partials/modal_menu.php ?>

<div id="menuModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
    <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 w-6/12 text-[#5C3211]">
        <div class="border border-[#5C3211] rounded-xl p-8 relative">
            <button id="closeMenuModal" class="absolute top-3 right-3 w-5 h-5 rounded-full flex items-center justify-center text-[#5C3211] hover:bg-gray-100 transition focus:outline-none">
                <i class="fas fa-xmark text-lg"></i>
            </button>

            <div id="menuListContainer" class="space-y-2 max-h-[70vh] overflow-y-auto pr-2">
                <?php if (!empty($menu)) : ?>
                    <?php foreach ($menu as $item) : ?>
                        <div class="flex items-start gap-4 mb-2 relative">
                            <?php if (!empty($item['foto_menu'])) : ?>
                                <img src="<?= base_url('Assets/menu_photos/' . esc($item['foto_menu'])) ?>" alt="<?= esc($item['nama_menu']) ?>" class="w-24 h-24 object-cover rounded-md flex-shrink-0 pb-2">
                            <?php else: ?>
                                <div class="w-24 h-24 bg-gray-200 rounded-md flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-utensils text-gray-400 text-3xl"></i>
                                </div>
                            <?php endif; ?>
                            <div class="flex-grow">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-semibold text-lg"><?= esc($item['nama_menu']) ?></h3>
                                    <div class="flex items-center gap-4">
                                        <p class="font-bold text-lg whitespace-nowrap pl-4">Rp <?= number_format($item['harga_menu'], 0, ',', '.') ?></p>
                                        
                                        <?php if ((isset($isOwner) && $isOwner) || session()->get('user_role') === 'admin') : ?>
                                            <form action="<?= site_url('menu/delete') ?>" method="post" onsubmit="return confirm('Anda yakin ingin menghapus menu ini?');">
                                                <input type="hidden" name="id_menu" value="<?= esc($item['ID_menu']) ?>">
                                                <input type="hidden" name="id_tempat" value="<?= esc($tempat['ID_tempat']) ?>">
                                                <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus Menu">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>

                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if (!empty($item['deskripsi_menu'])) : ?>
                                    <p class="text-sm text-gray-600 mt-1 text-left"><?= esc($item['deskripsi_menu']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr class="border-[#5C3211] mb-3">
                    <?php endforeach; ?>
                    <p class="pt-3 text-center">
                        That's all.
                    </p>

                <?php else : ?>
                    <p class="text-center text-[#5C3211] py-8">There's no available menu yet.</p>
                <?php endif; ?>

                <div id="addMenuFormContainer" class="hidden pt-4">
                    <hr class="mb-4">
                    <h3 class="font-bold text-lg text-center mb-4">Tambah Menu Baru</h3>
                    <form id="addMenuForm" action="<?= site_url('menu/add') ?>" method="post" enctype="multipart/form-data" class="space-y-4">
                        <?= csrf_field() ?>
                        <input type="hidden" name="ID_tempat" value="<?= esc($tempat['ID_tempat']) ?>">
                        
                        <div>
                            <label for="nama_menu" class="block text-sm font-medium text-gray-700">Nama Menu</label>
                            <input type="text" name="nama_menu" id="nama_menu" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div>
                            <label for="harga_menu" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="harga_menu" id="harga_menu" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Contoh: 25000" required>
                        </div>
                        <div>
                            <label for="deskripsi_menu" class="block text-sm font-medium text-gray-700">Deskripsi (Opsional)</label>
                            <textarea name="deskripsi_menu" id="deskripsi_menu" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        <div>
                            <label for="foto_menu" class="block text-sm font-medium text-gray-700">Foto Menu (Opsional)</label>
                            <input type="file" name="foto_menu" id="foto_menu" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div class="flex justify-end gap-3 pt-4">
                            <button type="button" id="cancelAddMenuBtn" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Batal</button>
                            <button type="submit" class="bg-[#FFC107] text-white px-4 py-2 rounded-md hover:bg-green-700">Simpan Menu</button>
                        </div>
                    </form>
                </div>
            </div>      
            <?php if (isset($isOwner) && $isOwner) : ?>
                <button id="addMenuItemBtn" title="Tambah Menu Baru" class="absolute px-4 m-2 bottom-5 right-4 w-14 h-14 bg-[#FFC107] rounded-full text-white flex items-center justify-center shadow-lg hover:bg-opacity-80 transition">
                    <i class="fas fa-plus text-xl"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>