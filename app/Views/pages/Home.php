<?php // app/Views/pages/dashboard.php ?>

<?= $this->extend('layouts/home_template'); ?>

<?= $this->section('sidebar') ?>
<?php if (isset($user_role)) : ?>
    <?php include APPPATH . 'Views/partials/sidebar.php'; ?>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('main_content') ?>
    <div id="header" class="header mb-5 ">
        <?php include APPPATH . 'Views/partials/main_content_user.php'; ?>
    </div>

    <?php if (isset($user_role)) : ?>
        <?php include APPPATH . 'Views/partials/notification_content.php'; ?>
        <?php include APPPATH . 'Views/partials/form.php'; ?>
        <?php include APPPATH . 'Views/partials/profile.php'; ?>
    <?php endif; ?>

    <?php if (isset($user_role) && $user_role === 'admin') : ?>
        <?php include APPPATH . 'Views/partials/manage_verification.php'; ?>
    <?php endif; ?>
    <script>
        window.SHOW_DETAIL_TEMPAT = <?= $show_detail_tempat ? 'true' : 'false' ?>;
    </script>

<?= $this->endSection() ?>