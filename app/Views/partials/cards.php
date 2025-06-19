<?= $this->extend('partials/template'); ?>

<?= $this->section('content') ; ?>
<?php
    // --- Logika untuk Tombol Filter ---
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

    $current_query = request()->getGet();
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
            // PERBAIKAN 1: Menggunakan site_url('landing') agar lebih aman
            'url'       => site_url('landing') . '?' . http_build_query($temp_query),
            'label'     => $details['label'],
            'icon'      => $details['icon'],
            'is_active' => $is_active,
        ];
    }
?>

<main class="flex-1 overflow-y-auto mx-10">
    <div class="main-container min-h-screen p-6 md:p-8 w-full">
        <div id="header" class="header text-center mb-5 ">

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

            <div class="search-container flex justify-center">
                <div class="relative w-full max-w-[500px]">
                    <input type="text" id="search_input" name="search" class="search-box w-full py-2.5 px-6 pr-12 border-none rounded-full bg-white text-base text-[#FF8400] outline-none shadow-md placeholder:text-[#5C3211]/50" placeholder="Search...">
                    <span id="searchIcon" class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center justify-center w-8 h-8 rounded-full cursor-pointer transition">
                        <i class="fa-solid fa-magnifying-glass text-[#F4A261] hover:opacity-45 text-lg"></i>
                    </span>
                </div>
            </div>
        </div>

        <div id="awal" class="space-y-6 text-[#5C3211]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 flex-grow">

                <?php if (!empty($destinasi) && is_array($destinasi)) : ?>
                    <?php foreach ($destinasi as $tempat) : ?>
                        <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                            
                            <img src="<?= base_url('Assets/' . esc($tempat['foto'])) ?>" alt="<?= esc($tempat['nama_tempat']) ?>" class="w-full h-52 object-cover">
                            
                            <div class="p-4 flex flex-col flex-1 jaldi-font">
                                <div class="text-lg font-bold mb-0"><?= esc($tempat['nama_tempat']) ?></div>
                                    <div class="flex justify-between items-center mt-2">
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

            <div class="mt-8 flex justify-center">
                <?php if ($pager) : ?>
                    <?= $pager->links() ?>
                <?php endif ?>
            </div>

        </div>
        <div id="afterSearch" class="space-y-4 hidden">
            </div>
    </div>
</main>
<?= $this->endSection() ; ?>