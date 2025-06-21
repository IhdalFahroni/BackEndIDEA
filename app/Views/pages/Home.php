<?php // app/Views/pages/dashboard.php ?>

<?= $this->extend('layouts/home_template'); ?>

<?= $this->section('sidebar') ?>
<?php if (isset($user_role)) : ?>
    <?php include APPPATH . 'Views/partials/sidebar.php'; ?>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('main_content') ?>
    <?php if (isset($show_detail_tempat) && $show_detail_tempat === true) : ?>
        <?php // Tampilkan detail tempat jika $show_detail_tempat diatur ?>
        <?php include APPPATH . 'Views/partials/detail_tempat_user.php'; // Atau _pemilik.php, _admin.php sesuai role ?>
    <?php else : ?>
        <?php // Tampilkan konten dashboard utama ?>
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
            <?php include APPPATH . 'Views/partials/main_content_user.php'; ?>
        </div>

        <?php // Partial untuk Notifikasi, Add Place Form, Profile (disembunyikan secara default) ?>
        <?php if (isset($user_role)) : ?>
            <?php include APPPATH . 'Views/partials/notification_content.php'; ?>
            <?php include APPPATH . 'Views/partials/add_place_form.php'; ?>
            <?php include APPPATH . 'Views/partials/profile.php'; ?>
        <?php endif; ?>

        <?php if (isset($user_role) && $user_role === 'admin') : ?>
            <?php include APPPATH . 'Views/partials/manage_verification.php'; ?>
        <?php endif; ?>
    <?php endif; ?>
<?= $this->endSection() ?>