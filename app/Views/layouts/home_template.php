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

    <main class="flex-1 pt-3 overflow-y-auto ml-20 bg-[#FFFFFF]">
        <div class="bg-[linear-gradient(to_bottom,#FFC107_50px,#F8F9FA_300px)] rounded-tl-xl min-h-screen p-6 md:p-8 shadow-2xl w-full">
            <?= $this->renderSection('main_content') ?>
        </div>
    </main>

    <?php include APPPATH . 'Views/partials/claim_culinary_modal.php'; ?>

    <?php 
    // Inklusi kondisional untuk modal Menu dan Promo
    // Variabel $tempat, $menu, $promo akan tersedia jika berasal dari controller Tempat::detail()
    // yang merender tempat_detail.php, yang kemudian extend home_template.php
    if (isset($tempat) && $tempat['kategori'] === 'culinary') :
        // Perlu pastikan $menu dan $promo juga ada jika ini dimasukkan secara global
        // Pastikan controller Tempat::detail() mengisi $data['menu'] dan $data['promo']
        // jika Anda ingin memuat modal ini secara dinamis.
        // Jika tidak, Anda perlu memuatnya di tempat_detail.php di dalam section.
        // Untuk saat ini, kita akan mengasumsikan $menu dan $promo juga tersedia di scope ini.
        ?>
        <?php include APPPATH . 'Views/partials/menu_modal.php'; ?>
        <?php include APPPATH . 'Views/partials/promo_modal.php'; ?>
    <?php endif; ?>

</body>
</html>