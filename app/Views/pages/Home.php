<?php // app/Views/pages/dashboard.php ?>

<?= $this->extend('layouts/home_template') ; ?>
<?php $path ?>
<?php // Section untuk Sidebar ?>
<?= $this->section('sidebar') ?>
    <?php if (isset($user_role)) : ?>
        <?php if ($user_role === 'user') : ?>
            <?php include APPPATH . 'Views/partials/sidebar_user.php'; ?>
        <?php elseif ($user_role === 'pemilik') : ?>
            <?php include APPPATH . 'Views/partials/sidebar_pemilik.php'; ?>
        <?php elseif ($user_role === 'admin') : ?>
            <?php include APPPATH . 'Views/partials/sidebar_admin.php'; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php // Jika sidebarMenu yang melayang adalah komponen universal yang sama untuk semua, letakkan di sini atau di home_template
// Namun, karena kode sidebarMenu berbeda di setiap homeUser/Pemilik/Admin,
// asumsi bahwa kode di dalam partial sidebar_X.php sudah mencakupnya.
?>
<?= $this->endSection() ?>

<?php // Section untuk Main Content ?>
<?= $this->section('main_content') ?>
    <?php // Header halaman utama (Where do you want to go? / Welcome, Owner! / Admin Dashboard) ?>
    <div id="header" class="header text-center mb-5 ">
        <?php if (isset($user_role)) : ?>
            <?php if ($user_role === 'user') : ?>
                <h1 class="text-white text-3xl md:text-5xl font-bold mb-5 pt-10 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Where do you want to go?</h1>
            <?php elseif ($user_role === 'pemilik') : ?>
                <h1 class="text-white text-3xl md:text-5xl font-bold mb-5 pt-10 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Welcome, Owner!</h1>
            <?php elseif ($user_role === 'admin') : ?>
                <h1 class="text-white text-3xl md:text-5xl font-bold mb-5 pt-10 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Admin Dashboard</h1>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Logika filter dan search bar (sekarang ada di main_content_user.php) ?>
        <?php // Hapus kode filter dan search bar dari sini jika Anda memindahkannya ke main_content_user.php ?>
    </div>

    <?php
    // Konten utama yang berubah tergantung tab/navigasi yang diklik (Home, Notifikasi, Add Place, Profil, Manage)
    // Semua partial ini diasumsikan memiliki class 'hidden' by default dan diatur oleh JavaScript.
    ?>

        // --- DEBUGGING $PATH ---
    echo '<pre style="background-color: #ffd700; padding: 10px; border: 1px solid orange;">';
    echo 'DEBUG from ' . __FILE__ . ':<br>';
    if (isset($path)) {
        echo '$path IS SET: ' . $path . '<br>';
    } else {
        echo '$path IS NOT SET in this view!';
    }
    echo '</pre>';
    // die('DEBUG: Checking $path in main view.'); // UNCOMMENT INI UNTUK HENTIKAN EKSEKUSI
    // --- END DEBUGGING ---

    <?php // Konten utama untuk menampilkan destinasi/hasil pencarian ?>
    <?php include APPPATH . 'Views/partials/main_content_user.php'; ?>

    <?php // Modals dan Divs tersembunyi yang mungkin ada di main_content ?>
    <?php if (isset($user_role)) : ?>
        <?php // Notifikasi, Add Place, Profil (untuk user, pemilik, admin) ?>
        <?php include APPPATH . 'Views/partials/notification_content.php'; ?>
        <?php include APPPATH . 'Views/partials/add_place_form.php'; ?>
        <?php include APPPATH . 'Views/partials/profile_content.php'; ?>
    <?php endif; ?>

    <?php // Konten khusus admin ?>
    <?php if (isset($user_role) && $user_role === 'admin') : ?>
        <?php include APPPATH . 'Views/partials/manage_verification.php'; ?>
    <?php endif; ?>

    <?php // Tambahkan partial modal lain di sini jika ada yang khusus untuk main_content ?>

<?= $this->endSection() ?>