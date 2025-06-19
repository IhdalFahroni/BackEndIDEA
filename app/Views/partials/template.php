<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lombok Recommendation</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {width: 6px;}
        ::-webkit-scrollbar-track {background: #F8F9FA}
        ::-webkit-scrollbar-thumb {background: #FFC107;border-radius: 3px;}
        ::-webkit-scrollbar-thumb:hover {background: #FF9800;}
    </style>
</head>

<?= $this->include('partials/slides'); ?>

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
<script src="<?= base_url('js/Landing.js') ?>"></script>
</body>
</html>