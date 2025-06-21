<?php // app/Views/partials/detail_tempat.php (atau tempat_detail.php jika itu nama file Anda) ?>

<?= $this->extend('layouts/home_template') ; ?>

<?php // SECTION UNTUK SIDEBAR ?>
<?= $this->section('sidebar') ?>
    <?php // Pastikan $user_role tersedia dari controller Tempat::detail() ?>
    <?php include APPPATH . 'Views/partials/sidebar.php'; ?>
<?= $this->endSection() ?>

<?php // Section untuk Main Content ?>
<?= $this->section('main_content') ?>

<div class="relative z-10">
    <a href="<?= base_url('/home') ?>" class="absolute top-0 left-0 text-white hover:text-gray-200">
        <i class="fa-solid fa-arrow-left text-2xl"></i>
    </a>
    <h1 class="text-3xl md:text-4xl font-bold text-[#FFFFFF] text-center mb-8 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">
        <?= esc($tempat['nama_tempat']) ?>
    </h1>
</div>

<div class="p-6 md:p-8 -mt-24 relative z-10">
    <?php // Logika untuk menampilkan flashdata pesan sukses/error ?>
    <?php if (session()->getFlashdata('success') || session()->getFlashdata('error') || session()->getFlashdata('errors')) : ?>
        <div class="mx-auto max-w-xl p-4 mb-4 rounded-lg
            <?= session()->getFlashdata('error') || session()->getFlashdata('errors') ? 'bg-red-100 text-red-700 border border-red-400' : 'bg-green-100 text-green-700 border border-green-400' ?>" role="alert">
            <?= session()->getFlashdata('success') ?? session()->getFlashdata('error') ?>
            <?php if (session()->getFlashdata('errors')) : ?>
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $field => $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <script> setTimeout(() => { const alertDiv = document.querySelector('.alert'); if(alertDiv) alertDiv.remove(); }, 5000); </script>
    <?php endif; ?>

    <?php // Logika tombol "Claim" ?>
    <?php if ($tempat['kategori'] === 'culinary' && !session()->get('isLoggedIn')) : ?>
    <div class="flex justify-end items-center space-x-3 mb-3">
        <span class="text-base font-bold text-white text-shadow-sm" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.4);">Own this place?</span>
        <div id="openClaim" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full cursor-pointer">
            Claim
        </div>
    </div>
    <?php elseif ($tempat['kategori'] === 'culinary' && session()->get('isLoggedIn') && !$isOwner) : ?>
         <div class="flex justify-end items-center space-x-3 mb-3">
            <span class="text-base font-bold text-white text-shadow-sm" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.4);">Own this place?</span>
            <div id="openClaim" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full cursor-pointer">
                Claim
            </div>
        </div>
    <?php endif; ?>

    <div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845]">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/3 flex-shrink-0">
                <img src="<?= base_url('Assets/' . esc($tempat['foto'])) ?>" alt="<?= esc($tempat['nama_tempat']) ?>" class="rounded-xl w-full h-auto object-cover shadow-md mb-3">
                <p class="text-sm text-[#5C3211] mb-1 font-bold"><?= esc($tempat['kelurahan']) ?>, Kec. <?= esc($tempat['kecamatan']) ?>, Kabupaten <?= esc($tempat['kabupaten_kota']) ?>, Nusa Tenggara Bar. 83572</p>
                <?php if (!empty($tempat['Maps'])) : ?>
                <a href="<?= esc($tempat['Maps']) ?>" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                    <span class="relative top-0.5">Google Maps</span>
                    <i class="fa-solid fa-location-dot"></i>
                </a>
                <?php endif; ?>
                
                <?php if ($tempat['kategori'] === 'culinary') : ?>
                <div class="flex items-center gap-x-3 mt-3">
                    <div id="openMenu" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full cursor-pointer">
                        Menu
                    </div>
                    <div id="openPromo" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full cursor-pointer">
                        Promo
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="md:w-2/3">
                <div class="text-yellow-500 my-1 text-lg rating" data-rating="<?= number_format($tempat['average_rating'] ?? 0, 1) ?>"></div>
                <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-3 mt-4">
                    <p class="text-[#5C3211] text-base font-light">Kategori</p>
                    <?php if ($tempat['kategori'] === 'culinary') : ?>
                        <p class="text-[#5C3211] font-medium text-base">Tempat kuliner</p>
                    <?php else : ?>
                        <p class="text-[#5C3211] font-medium text-base">Tempat wisata</p>
                    <?php endif; ?>

                    <?php if ($tempat['kategori'] !== 'culinary' && !empty($tempat['harga_tiket'])) : ?>
                    <p class="text-[#5C3211] text-base font-light">Tiket</p>
                    <p class="text-[#5C3211] font-medium text-base">Rp<?= number_format($tempat['harga_tiket'], 0, ',', '.') ?></p>
                    <?php endif; ?>

                    <p class="text-[#5C3211] text-base mt-0.5 font-light">Deskripsi</p>
                    <p class="text-base text-[#5C3211] leading-relaxed text-justify">
                        <?= esc($tempat['deskripsi']) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php include APPPATH . 'Views/partials/review_dan_modalnya.php'; ?>

<?= $this->endSection() ?>