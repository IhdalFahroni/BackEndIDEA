<?php // app/Views/pages/dashboard.php ?>

<?= $this->extend('layouts/home_template') ; ?>

<?php // Section untuk Sidebar (ROLE-SPECIFIC) ?>
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
<?= $this->endSection() ?>

<?php // Section untuk Main Content ?>
<?= $this->section('main_content') ?>
    <?php // Header halaman utama (Where do you want to go? / Welcome, Owner! / Admin Dashboard) ?>
    <div id="header" class="header text-center mb-5 ">
        <?php include APPPATH . 'Views/partials/main_content_user.php'; ?>
    </div>

    <?php // KONTEN UTAMA DASHBOARD DINAMIS - default adalah main_content_user ?>

    <?php // Partial untuk Notifikasi, Add Place Form, Profile (disembunyikan secara default) ?>
    <?php if (isset($user_role)) : ?>
        <?php include APPPATH . 'Views/partials/notification_content.php'; ?>
        <?php include APPPATH . 'Views/partials/add_place_form.php'; ?>
        <?php include APPPATH . 'Views/partials/profile.php'; ?>
        <?php include APPPATH . 'Views/partials/account_setting.php'; // Termasuk account setting di sini ?>
    <?php endif; ?>

    <?php // Partial khusus Admin (Manage Verification) ?>
    <?php if (isset($user_role) && $user_role === 'admin') : ?>
        <?php include APPPATH . 'Views/partials/manage_verification.php'; ?>
    <?php endif; ?>

<?= $this->endSection() ?>