<main class="flex-1overflow-y-auto mx-10">
    <div class="main-container min-h-screen p-6 md:p-8 w-full">
        <div id="header" class="header text-center mb-5 ">
            <div class="filter-tabs flex justify-center gap-5 mb-5">
                </div>
            <div class="search-container flex justify-center">
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
                                    <div class="text-yellow-500 text-sm rating" data-rating="4.5"></div> <a href="<?= site_url('tempat/' . $tempat['ID_tempat']) ?>" class="text-xs font-medium hover:underline">See details</a>
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
                <?php endif; ?>
            </div>
        </div>
        <div id="afterSearch" class="space-y-4 hidden">
            </div>
    </div>
</main>