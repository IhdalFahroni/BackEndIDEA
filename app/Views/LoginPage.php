<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | LombokRec</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/login.js') ?>"></script>
</head>
<body class="min-h-screen flex justify-center items-center font-jaldi bg-Landing bg-cover h-screen">

    <div class="absolute inset-0 w-full h-full backdrop-blur-sm flex justify-center items-center">
        <div class="bg-[#FFffff] p-8 rounded-[15px] shadow-lg text-center w-[400px] relative z-10">

            <h2 class="text-[22px] font-extrabold text-[#5C3211] mb-5 tracking-wider">Login</h2>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert-error" style="padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; margin-bottom: 16px;">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/login/process') ?>" method="POST">

                <?= csrf_field() ?>
                <input 
                    type="text" 
                    id="username"
                    name="username"
                    class= "bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                    placeholder="Username">

                <div class="relative w-full">
                    <input 
                        type="password"
                        id="password" 
                        name="password"
                        class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                        placeholder="Password"> 
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <i class="fas fa-eye-slash font-normal text-[#5C3211] hover:text-gray-700 cursor-pointer" id="togglePasswordIcon"></i>
                        </div>
                </div>

                <a href="<?= base_url('/forgotpass') ?>" class="block text-right text-xs text-red-600 no-underline mb-4 hover:text-blue-600">
                    Forgot Password?
                </a>

                <button 
                    
                    class="w-full py-3 bg-[#5C3211] text-white font-bold rounded-full cursor-pointer text-base hover:bg-[#a89e8c]">
                    Log In
                </button>
            </form>

            <p class="text-xs text-[#5C3211] mt-5">
                Don't have any account?
                <a href="<?= base_url('/signup') ?>" class="font-normal text-[#F4A261] no-underline hover:text-blue-600"> 
                    Sign Up
                </a>
            </p>

        </div>
    </div>
</body>
</html>