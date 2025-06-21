<?php // app/Views/partials/notification_content.php ?>

<div id="notification" class="header mb-5 hidden">
    <h1 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Notifications</h1>
    <div class="bg-white text-[#5C3211] rounded-xl p-6 shadow-md max-w-3xl mx-auto border border-[#F0D3B3]">
        <?php if (!empty($notifikasi)): ?>
            <?php foreach ($notifikasi as $notif): ?>
                
                <h3 class="font-semibold mb-1 text-lg"><?= esc($notif['header']) ?></h3>
                <p class="pt-0"><?= esc($notif['isi_notif']) ?></p>
                <p class="font-light text-sm mt-4"><?= date('d F Y, H:i', strtotime($notif['tanggal_jam'])) ?></p>
                
                <hr class="my-2">

            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">There's no notification.</p>
        <?php endif; ?>
        <p class="pt-3 text-center">That's all.</p>
    </div>
</div>