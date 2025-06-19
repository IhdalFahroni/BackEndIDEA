<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
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
        ::-webkit-scrollbar {width: 6px;}
        ::-webkit-scrollbar-track {background: #F8F9FA}
        ::-webkit-scrollbar-thumb {background: #FFC107;border-radius: 3px;}
        ::-webkit-scrollbar-thumb:hover {background: #FF9800;}
    </style>
</head>

<?= $this->renderSection('content'); ?>

<footer class="bg-gradient-to-t from-[#FFC107] 0% via-[#FFE083] 1% to-[#FFFFFF] 5% text-[#5C3211] py-10 px-5 text-center">
    <h3 class="text-3xl font-extrabold mb-5">Contact Us</h3>
    <p class="my-2.5 text-base flex justify-center items-center gap-2"> 
        <i class="fab fa-twitter"></i> X: lombokrec |
        <i class="fas fa-envelope"></i> email: lombokrec@gmail.com |
        <i class="fab fa-instagram"></i> IG: lombokrec
    </p>
    <p class="my-2.5 text-base font-bold">Thank you for visiting our page, hope this website helps you make your itinerary on Lombok</p>
</footer>
<script src="<?= base_url('js/'.$js) ?>"></script>
</body>
</html>