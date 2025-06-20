<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'LombokRec' ?></title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>

    <script>
        const BASE_URL = '<?= base_url() ?>';
        const LOGOUT_URL = '<?= base_url('') ?>';
        // Contoh URL API endpoint untuk digunakan di JavaScript
        const API_URL_ADD_ATTRACTION = '<?= site_url('api/add-attraction') ?>';
        const API_URL_PROFILE_UPDATE = '<?= site_url('api/profile/update') ?>';
        const API_URL_CHANGE_PASSWORD = '<?= site_url('api/profile/change-password') ?>';
        const API_URL_DELETE_ACCOUNT = '<?= site_url('api/profile/delete-account') ?>';
        const API_URL_VERIFY_REQUEST = '<?= site_url('api/admin/verify-request') ?>';
    </script>
    
    <?php if (isset($js_file)) : ?>
        <script src="<?= base_url('js/' . $js_file) ?>"></script>
    <?php endif; ?>
    <style>
        ::-webkit-scrollbar {width: 6px;}
        ::-webkit-scrollbar-track {background: #F8F9FA}
        ::-webkit-scrollbar-thumb {background: #FFC107;border-radius: 3px;}
        ::-webkit-scrollbar-thumb:hover {background: #FF9800;}
    </style>
</head>
<body class="flex min-h-screen font-josefin bg-white">

    <?= $this->renderSection('sidebar') ?>

    <main class="flex-1 pt-3 overflow-y-auto ml-20 bg-[#FFFFFF]">
        <div class="bg-[linear-gradient(to_bottom,#FFC107_50px,#F8F9FA_300px)] rounded-tl-xl min-h-screen p-6 md:p-8 shadow-2xl w-full">
        <?= $this->renderSection('main_content') ?>
        </div>
    </main>

    <?php include APPPATH . 'Views/partials/claim_culinary_modal.php'; ?>

</body>
</html>