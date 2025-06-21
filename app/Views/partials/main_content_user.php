<?php
if (!isset($categories)) {
    $categories = [
        'tourist_destination' => [
            'label' => 'Tourist destination',
            'icon'  => 'fa-solid fa-location-dot'
        ],
        'culinary' => [
            'label' => 'Culinary',
            'icon'  => 'fa-solid fa-utensils'
        ]
    ];
}

if (!isset($current_query)) {
    $current_query = request()->getGet();
}
$active_category = $current_query['category'] ?? '';

$filter_buttons = [];
foreach ($categories as $key => $details) {
    $is_active = ($active_category == $key);
    $temp_query = $current_query;

    if ($is_active) {
        unset($temp_query['category']);
    } else {
        $temp_query['category'] = $key;
    }

    $filter_buttons[] = [
        'url'       => $path . '?' . http_build_query($temp_query),
        'label'     => $details['label'],
        'icon'      => $details['icon'],
        'is_active' => $is_active,
    ];
}
?>
<?php if (isset($show_detail_tempat) && $show_detail_tempat === true) : ?>
    <?php
    // --- TAMPILAN DETAIL TEMPAT ---
    // Variabel $tempat, $reviews, $menu, $promo, $isOwner, $isLoggedIn sudah dari controller Home
    ?>
    <div class="relative z-10">
        <a href="<?= base_url('/home') ?>" class="absolute top-0 left-0 text-white hover:text-gray-200">
            <i class="fa-solid fa-arrow-left text-2xl"></i>
        </a>
        <h1 class="text-3xl md:text-4xl font-bold text-[#FFFFFF] text-center mb-8 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">
            <?= esc($tempat['nama_tempat']) ?>
        </h1>
    </div>

    <div class="p-6 md:p-8 -mt-24 relative z-10">
        <?php // Logika untuk menampilkan flashdata pesan sukses/error (jika ada) ?>
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

<?php else : ?>
<?php if ($path == site_url('home')) : ?>
<h1 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 pt-10 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Where do you want to go?</h1>
<?php endif; ?>
<div class="filter-tabs flex justify-center gap-5 mb-5">
    <?php foreach ($filter_buttons as $button) : ?>
        <a href="<?= $button['url'] ?>"
        <?php if ($button['is_active']) :?>
            class="py-2 px-6 rounded-full cursor-pointer transition flex items-center gap-2 shadow-md bg-[#FFC107] text-white font-bold"
        <?php else : ?>
            class="py-2 px-6 rounded-full cursor-pointer transition flex items-center gap-2 shadow-md bg-white text-[#FFC107]"
        <?php endif; ?>>
            <i class="<?= $button['icon'] ?>"></i>
            <span class="relative top-px"><?= $button['label'] ?></span>
        </a>
    <?php endforeach; ?>
</div>

<div class="search-container flex justify-center mb-5">
    <form action="<?= $path ?>" method="get" class="relative w-full max-w-[500px]">
        <input type="text" id="search_input" name="search" class="search-box w-full py-2.5 px-6 pr-12 border-none rounded-full bg-white text-base text-[#FF8400] outline-none shadow-md placeholder:text-[#5C3211]/50" placeholder="Search..." value="<?= esc($current_search_term ?? '') ?>">
        <button type="submit" id="searchButton" class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center justify-center w-8 h-8 rounded-full cursor-pointer transition border-none bg-transparent p-0">
            <i class="fa-solid fa-magnifying-glass text-[#F4A261] hover:opacity-45 text-lg"></i>
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search_input');
    const searchButton = document.getElementById('searchButton');
    const filterButtons = document.querySelectorAll('.filter-button');

    if (searchInput && searchButton) {
        function submitSearchForm() {
            searchInput.closest('form').submit();
        }
        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') { event.preventDefault(); submitSearchForm(); }
        });
        searchButton.addEventListener('click', function(event) { submitSearchForm(); });
    }

    if (filterButtons.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const wasActive = button.classList.contains("bg-[#FFC107]");
                filterButtons.forEach(btn => {
                    btn.classList.remove("bg-[#FFC107]", "text-white");
                    btn.classList.add("bg-white", "text-[#FFC107]");
                });
                if (!wasActive) {
                    button.classList.remove("bg-white", "text-[#FFC107]");
                    button.classList.add("bg-[#FFC107]", "text-white");
                }
            });
        });
    }
});
</script>


<?php if (!empty($current_search_term) || !empty($active_category)) : ?>
    <h3 class="text-2xl font-bold text-[#5C3211] mb-4 text-center">
        Search Results for: "<?= esc($current_search_term) ?>"
    </h3>
    <div id="afterSearch" class="space-y-4 text-left font-josefin">
        <?php if (!empty($destinasi) && is_array($destinasi)) : ?>
            <?php foreach ($destinasi as $tempat) : ?>
                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/' . esc($tempat['foto'])) ?>" alt="<?= esc($tempat['nama_tempat']) ?>" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211] text-left"><?= esc($tempat['nama_tempat']) ?></h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="<?= number_format($tempat['average_rating'] ?? 0, 1) ?>">
                                <span class="font-bold">★ <?= number_format($tempat['average_rating'] ?? 0, 1) ?></span>
                            </div>
                            <p class="text-sm text-[#5C3211] line-clamp-2 text-left">
                                <?= esc($tempat['deskripsi']) ?>
                            </p>
                        </div>
                        <a href="<?= site_url('home?show=detail&id=' . $tempat['ID_tempat']) ?>"  class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5">See details</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="col-span-3 text-center text-[#5C3211]">Tidak ada hasil yang ditemukan untuk pencarian Anda.</p>
        <?php endif; ?>
    </div>

<?php else : ?>
    <div id="awal" class="space-y-6 text-[#5C3211]">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 flex-grow">

            <?php if (!empty($destinasi) && is_array($destinasi)) : ?>
                <?php foreach ($destinasi as $tempat) : ?>
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        
                        <img src="<?= base_url('Assets/' . esc($tempat['foto'])) ?>" alt="<?= esc($tempat['nama_tempat']) ?>" class="w-full h-52 object-cover">
                        
                        <div class="p-4 flex flex-col flex-1 font-jaldi">
                            <div class="text-lg font-bold mb-0 text-left"><?= esc($tempat['nama_tempat']) ?></div> <div class="flex justify-between items-center mt-2">
                                <?php
                                    $rating = number_format($tempat['average_rating'] ?? 0, 1);
                                ?>
                                <div class="text-yellow-500 text-sm rating" data-rating="<?= esc($rating) ?>">
                                    <span class="font-bold">★ <?= esc($rating) ?></span>
                                </div> 
                                <a href="<?= site_url('home?show=detail&id=' . $tempat['ID_tempat']) ?>" class="text-xs font-medium hover:underline">See details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="col-span-3 text-center">Belum ada data destinasi yang bisa ditampilkan.</p>
            <?php endif; ?>
            
        </div>
    </div>
<?php endif; ?>
<?php endif; ?>

<div class="mt-8 flex justify-center text-[#FF9800] font-bold">
    <?php if ($pager) : ?>
        <?= $pager->links() ?>
    <?php endif ?>
</div>