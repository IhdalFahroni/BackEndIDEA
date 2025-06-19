<?php
// app/Views/partials/searchResultsList.php
// Tampilan ini akan digunakan saat ada pencarian (searchTerm)

// Variabel $destinasi dan $pager diharapkan tersedia dari controller melalui LandingPage.php

// Opsional: Tambahkan pesan "Results for..." jika ada searchTerm
if (!empty($current_search_term)) {
    echo '<h3 class="text-2xl font-bold text-[#5C3211] mb-4 text-center">Search Results for: "' . esc($current_search_term) . '"</h3>';
}

if (!empty($destinasi) && is_array($destinasi)) : ?>
    <div id="afterSearch" class="space-y-4"> <?php foreach ($destinasi as $tempat) : ?>
            <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                <img src="<?= base_url('Assets/' . esc($tempat['foto'])) ?>" alt="<?= esc($tempat['nama_tempat']) ?>" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                
                <div class="flex-grow flex flex-col self-stretch">
                    <div>
                        <h2 class="text-lg font-bold text-[#5C3211]"><?= esc($tempat['nama_tempat']) ?></h2>
                        <div class="text-yellow-500 my-1 text-sm rating" data-rating="<?= number_format($tempat['average_rating'] ?? 0, 1) ?>">
                            <span class="font-bold">★ <?= number_format($tempat['average_rating'] ?? 0, 1) ?></span>
                        </div>
                        <p class="text-sm text-[#5C3211] line-clamp-2">
                            <?= esc($tempat['deskripsi']) ?>
                        </p>
                    </div>
                    <a href="<?= site_url('tempat/' . $tempat['ID_tempat']) ?>" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                        <span class="relative top-0.5">See details</span> </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-8 flex justify-center">
        <?php if ($pager) : ?>
            <?= $pager->links() ?>
        <?php endif ?>
    </div>

<?php else : ?>
    <p class="col-span-3 text-center text-[#5C3211]">Tidak ada hasil yang ditemukan untuk pencarian Anda.</p>
<?php endif; ?>