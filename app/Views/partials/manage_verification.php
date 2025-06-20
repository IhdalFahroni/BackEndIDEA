<?php // app/Views/partials/manage_verification.php ?>

<div id="manageVerification" class="header mb-5 hidden">
    <h1 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Manage Verification</h1>
    <div class="bg-white text-[#5C3211] rounded-xl p-6 shadow-md max-w-3xl mx-auto border border-[#F0D3B3] max-h-[70vh] overflow-y-auto pr-2.5">
        
        <?php // Contoh data verifikasi (Anda harus mendapatkan ini dari database di controller) ?>
        <?php $verificationItems = [
            ['id' => 1, 'type' => 'add-place', 'user' => 'ihdal_f', 'email' => 'ihdalfahroni@gmail.com', 'request_text' => 'Addition of new place', 'is_verified' => false, 'selected_action' => ''],
            ['id' => 2, 'type' => 'claim-culinary', 'user' => 'another_user', 'email' => 'another@example.com', 'request_text' => 'Claim culinary request', 'is_verified' => false, 'selected_action' => ''],
            // Tambahkan item lain dari database Anda di sini
        ]; ?>

        <?php foreach ($verificationItems as $item) : ?>
        <div class="verification-item mb-4 p-4 border border-gray-200 rounded-lg shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4" 
             data-type="<?= $item['type'] ?>" 
             data-request-id="<?= $item['id'] ?>"
             data-verified="<?= $item['is_verified'] ? 'true' : 'false' ?>"
             data-selected="<?= $item['selected_action'] ?>">
            <div class="flex-grow">
                <p class="font-semibold text-lg"><?= esc($item['user']) ?></p>
                <p class="text-sm text-gray-500"><?= esc($item['email']) ?></p>
                <h3 class="font-semibold mt-2 text-base md:text-lg"><?= esc($item['request_text']) ?></h3>
                <a href="#" class="view-form-link text-blue-500 text-sm hover:underline flex items-center mt-1">
                    <i class="fa-solid fa-file-alt mr-1"></i> <span class="relative top-0.5">See form</span>
                </a>
            </div>
            <div class="flex-shrink-0 flex gap-2">
                <form action="<?= site_url('home/verifyRequest') ?>" method="post" style="display:inline;" data-action-form>
                    <input type="hidden" name="request_id" value="<?= esc($item['id']) ?>">
                    <input type="hidden" name="action" value="deny">
                    <input type="hidden" name="request_type" value="<?= esc($item['type']) ?>">
                    <button type="submit" class="deny-btn border border-red-500 text-red-500 text-xs px-3 py-1 rounded-full hover:bg-red-500 hover:text-white"
                        <?= $item['is_verified'] ? 'disabled' : '' ?>>
                        <i class="fa-solid fa-times"></i> Deny
                    </button>
                </form>
                <form action="<?= site_url('home/verifyRequest') ?>" method="post" style="display:inline;" data-action-form>
                    <input type="hidden" name="request_id" value="<?= esc($item['id']) ?>">
                    <input type="hidden" name="action" value="approve">
                    <input type="hidden" name="request_type" value="<?= esc($item['type']) ?>">
                    <button type="submit" class="approve-btn border border-blue-500 text-blue-500 text-xs px-3 py-1 rounded-full hover:bg-blue-500 hover:text-white"
                        <?= $item['is_verified'] ? 'disabled' : '' ?>>
                        <i class="fa-solid fa-check"></i> Approve
                    </button>
                </form>
                <div class="approve text-blue-500 text-base px-3 py-1 hidden">Approved</div>
                <div class="deny text-red-500 text-base px-3 py-1 hidden">Denied</div>
            </div>
        </div>
        <?php endforeach; ?>

        <p class="pt-3 text-center">That's all.</p>
    </div>
</div>