<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'LombokRec' ?></title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <style>
        .main-container {
            background: linear-gradient(to bottom, #FFC107 50px, #F8F9FA 300px); 
            border-top-left-radius: 0.75rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3), 0 6px 6px rgba(0, 0, 0, 0.2);
            position: relative; 
            z-index: 30; 
        }
        .main-container-detail {
            background-image: linear-gradient(to bottom right, #FFC107, #FFFFFF);
            border-top-left-radius: 0.75rem;
        }
    </style>
    <script>
        const BASE_URL = '<?= base_url() ?>';
        const UPLOADS_URL = '<?= base_url('Assets/') ?>';
        const LOGOUT_URL = '<?= base_url('logout') ?>';
        const API_URL_ADD_ATTRACTION = '<?= site_url('home/submitAddPlace') ?>';
        const API_URL_PROFILE_UPDATE = '<?= site_url('home/updateProfile') ?>';
        const API_URL_CHANGE_PASSWORD = '<?= site_url('home/changePassword') ?>';
        const API_URL_DELETE_ACCOUNT = '<?= site_url('home/deleteAccount') ?>';
        const API_URL_VERIFY_REQUEST = '<?= site_url('home/verifyRequest') ?>';
        const API_URL_SUBMIT_REVIEW = '<?= site_url('home/submitReview') ?>';
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

    <main class="flex-1 pt-3 overflow-y-auto ml-20">
        <?php if (isset($show_detail_tempat) && $show_detail_tempat === true) : ?>
            <div class="main-container-detail rounded-tl-xl min-h-screen p-6 md:p-8 shadow-2xl w-full">
        <?php else: ?>
            <div class="main-container rounded-tl-xl min-h-screen p-6 md:p-8 shadow-2xl w-full">
        <?php endif; ?>
            <?= $this->renderSection('main_content') ?>
        </div>
    </main>
</body>
</html>