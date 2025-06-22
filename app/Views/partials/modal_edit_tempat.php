<?php // app/Views/partials/modal_edit_tempat.php ?>

<div id="editTempatModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
    <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 w-full max-w-3xl relative text-[#5C3211]">
        <div class="border border-[#5C3211] rounded-xl p-6 relative">
            <button id="closeEditTempatModal" type="button" class="absolute top-3 right-3 w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-gray-100 transition">
                <i class="fas fa-xmark text-lg"></i>
            </button>
            
            <h2 class="text-2xl font-bold text-center mb-6">Edit Informasi Tempat</h2>

            <?php if (session()->has('errors')) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                    <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

            <form action="<?= site_url('tempat/update') ?>" method="post" enctype="multipart/form-data" class="space-y-4 max-h-[70vh] overflow-y-auto pr-4">
                <?= csrf_field() ?>
                <input type="hidden" name="id_tempat" value="<?= esc($tempat['ID_tempat']) ?>">

                <div>
                    <label for="nama_tempat">Nama Tempat</label>
                    <input type="text" name="nama_tempat" class="mt-1 block w-full border-gray-300 rounded-md" value="<?= old('nama_tempat', $tempat['nama_tempat']) ?>" required>
                </div>

                <div>
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="mt-1 block w-full border-gray-300 rounded-md" required><?= old('deskripsi', $tempat['deskripsi']) ?></textarea>
                </div>
                
                <div class="flex justify-end gap-4 pt-4">
                    <button type="button" id="cancelEditTempatBtn" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md">Batal</button>
                    <button type="submit" class="bg-[#FF9800] text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>