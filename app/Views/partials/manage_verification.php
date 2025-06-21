<div id="manageVerification" class="header mb-5 hidden">
    <h1 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Manage Verification</h1>
    <div class="bg-white text-[#5C3211] rounded-xl p-6 shadow-md max-w-3xl mx-auto border border-[#F0D3B3] max-h-[70vh] overflow-y-auto pr-2.5">

        <?php if (!empty($verificationItems)) : ?>

            <?php foreach ($verificationItems as $item) : ?>
            <div class="verification-item mb-4 p-4 border border-gray-200 rounded-lg shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4"
                data-request-id="<?= esc($item['ID_formPengajuanTempat']) ?>"
                data-type="<?= esc($item['type']) ?>"
                data-is-verified="<?= esc($item['is_verified'] ? 'true' : 'false') ?>"
                data-user="<?= esc($item['username']) ?>"
                data-email="<?= esc($item['email']) ?>"
                <?php if ($item['type'] == 'addPlace') : ?>
                    data-place-name="<?= esc($item['nama_tempat']) ?>"
                    data-category="<?= esc($item['kategori']) ?>"
                    data-district="<?= esc($item['kabupaten_kota']) ?>"
                    data-subdistrict="<?= esc($item['kecamatan']) ?>"
                    data-village="<?= esc($item['kelurahan']) ?>"
                    data-street="<?= esc($item['nama_jalan']) ?>"
                    data-gmaps="<?= esc($item['google_maps']) ?>"
                    data-description="<?= esc($item['deskripsi']) ?>"
                    data-photo-link="<?= esc(json_encode(explode(',', $item['foto']))) ?>"
                    <?php else : // Assuming 'claimCulinary' or similar
                    // Add data attributes for claim culinary details here
                    // data-full-name="..."
                    // data-phone="..."
                    // etc.
                ?>
                    data-full-name="Ihdal Fahroni"
                    data-phone="08877776663"
                    data-email="rmsumberejeki@gmail.com"
                    data-tin="123456789"
                    data-supporting-document='["sumber_rejeki.png"]'
                <?php endif; ?>
            >
                <div class="flex-grow">
                    <p class="font-semibold text-lg"><?= esc($item['username']) ?></p>
                    <p class="text-sm text-gray-500"><?= esc($item['email']) ?></p>
                    <h3 class="font-semibold mt-2 text-base md:text-lg">
                        <?php if($item['type'] == 'addPlace') : ?>
                            Addition of new place
                        <?php else : ?>
                            Claim culinary request
                        <?php endif; ?>
                    </h3>
                    <a class="view-form-link text-blue-500 text-sm flex items-center mt-1">
                        <i class="fa-solid fa-file-alt mr-1"></i> <span class="relative top-0.5 hover:underline">See form</span>
                    </a>
                </div>
                <div class="flex-shrink-0 flex gap-2">
                    <form action="<?= site_url('home/verifyRequest') ?>" method="post" class="inline" data-action-form>
                        <input type="hidden" name="request_id" value="<?= esc($item['ID_formPengajuanTempat']) ?>">
                        <input type="hidden" name="action" value="deny">
                        <button type="submit" class="deny-btn border border-red-500 text-red-500 text-xs px-3 py-1 rounded-full hover:bg-red-500 hover:text-white"
                            <?= esc($item['is_verified'] ? 'disabled' : '') ?>>
                            <i class="fa-solid fa-times"></i> Deny
                        </button>
                    </form>
                    <form action="<?= site_url('home/verifyRequest') ?>" method="post" class="inline" data-action-form>
                        <input type="hidden" name="request_id" value="<?= esc($item['ID_formPengajuanTempat']) ?>">
                        <input type="hidden" name="action" value="approve">
                        <button type="submit" class="approve-btn border border-blue-500 text-blue-500 text-xs px-3 py-1 rounded-full hover:bg-blue-500 hover:text-white"
                            <?= esc($item['is_verified'] ? 'disabled' : '') ?>>
                            <i class="fa-solid fa-check"></i> Approve
                        </button>
                    </form>
                    <div class="approve text-blue-500 text-base px-3 py-1 hidden">Approved</div>
                    <div class="deny text-red-500 text-base px-3 py-1 hidden">Denied</div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center text-gray-500 py-8">No pending verifications at the moment.</p>
        <?php endif; ?>

        <p class="pt-3 text-center">That's all.</p>
    </div>
</div>

<div id="addPlaceModal" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black/60 flex justify-center items-center z-[1000] hidden">
    <div class="bg-gradient-to-b from-[#FFC107] to-[#F8F9FA] rounded-xl p-6 md:p-8 w-11/12 max-w-lg relative shadow-2xl">
        <div class="modal-close-btn" data-close-modal="addPlaceModal">
            <i class="fa-solid fa-xmark text-lg text-[#1F2937]"></i>
        </div>
        <h2 class="text-2xl font-bold text-center text-white mb-6 [text-shadow:1px_1px_rgba(0,0,0,0.5)]">Add new place</h2>
        <div class="max-h-[70vh] overflow-y-auto pr-2.5 pr-2">
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Place name*</label><p id="add_placeName" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Category*</label><p id="add_category" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">District/city*</label><p id="add_district" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Subdistrict*</label><p id="add_subdistrict" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Village*</label><p id="add_village" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Street*</label><p id="add_street" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Google Map Location*</label><a id="add_gmaps" href="#" target="_blank" class="text-blue-700 underline break-all"></a></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Place description*</label><p id="add_description" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Photo(s)</label><div id="add_photo_link"></div></div> </div>
    </div>
</div>
<div id="claimCulinaryModal" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black/60 flex justify-center items-center z-[1000] hidden">
    <div class="bg-gradient-to-b from-[#FFC107] to-[#F8F9FA] rounded-xl p-6 md:p-8 w-11/12 max-w-lg relative shadow-2xl">
        <div class="modal-close-btn" data-close-modal="claimCulinaryModal">
            <i class="fa-solid fa-xmark text-lg text-[#1F2937]"></i>
        </div>
        <h2 class="text-2xl font-bold text-center text-white mb-6 [text-shadow:1px_1px_rgba(0,0,0,0.5)]">Claim culinary site</h2>
        <div class="max-h-[70vh] overflow-y-auto pr-2.5 pr-2">
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Full name*</label><p id="claim_fullName" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Phone number*</label><p id="claim_phone" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Email*</label><p id="claim_email" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Taxpayer Identification Number*</label><p id="claim_tin" class="text-[#1F2937] font-semibold"></p></div>
            <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Supporting document(s)</label><div id="claim_supporting_document" class="text-[#1F2937] font-semibold"></div></div> </div>
    </div>
</div>