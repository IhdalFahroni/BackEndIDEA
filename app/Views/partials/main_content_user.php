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

        function submitSearchForm() {
            searchInput.closest('form').submit();
        }

        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                submitSearchForm();
            }
        });

        if (searchButton) {
            searchButton.addEventListener('click', function(event) {
                submitSearchForm();
            });
        }
    });
</script>


<?php if (!empty($current_search_term)) : ?>
    <?php
    // Opsional: Tambahkan pesan "Results for..." jika ada searchTerm
    echo '<h3 class="text-2xl font-bold text-[#5C3211] mb-4 text-center">Search Results for: "' . esc($current_search_term) . '"</h3>';
    ?>
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
                        <a href="<?= site_url('tempat/' . $tempat['ID_tempat']) ?>" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
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
                                <a href="<?= site_url('tempat/' . $tempat['ID_tempat']) ?>" class="text-xs font-medium hover:underline">See details</a>
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

<div class="mt-8 flex justify-center text-[#FF9800] font-bold">
    <?php if ($pager) : ?>
        <?= $pager->links() ?>
    <?php endif ?>
</div>