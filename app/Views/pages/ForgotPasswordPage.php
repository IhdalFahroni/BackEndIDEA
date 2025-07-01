<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | LombokRec</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/forgotPassword.js') ?>" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body class="min-h-screen flex justify-center items-center font-jaldi bg-Landing bg-cover h-screen">

    <div class="absolute inset-0 w-full h-full backdrop-blur-sm flex justify-center items-center">
        <div class="bg-[#FFFFFF] p-8 rounded-[15px] shadow-lg text-center w-[400px] relative z-10">
            <a href="<?= site_url('landing') ?>" class="text-left flex justify-start text-[#5C3211] hover:text-gray-200">
                <i class="fa-solid fa-arrow-left text-2xl"></i>
            </a>
            <h2 class="text-[22px] font-bold mb-5 text-[#5C3211] tracking-wider">Reset Password</h2>

            <form action="<?= site_url('password/process-reset') ?>" method="POST">
                <?= csrf_field() ?>

                <input 
                    type="text" 
                    name="email"
                    id="email" 
                    class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md text-sm placeholder:text-[#5C3211] focus:outline-[#D7D5BA]" 
                    placeholder="Enter your email">
                <p id="emailError" class="text-red-600 text-xs text-left hidden">Email format is not valid.</p>

                <div class="relative w-full">
                    <input 
                        type="password"
                        name="new_password" 
                        id="newPassword" 
                        class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                        placeholder="New Password">
                    <i class="fas fa-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer text-[#5C3211]/60 toggle-password"></i>
                </div>
                <p id="passwordError" class="text-red-600 text-xs text-left hidden">Password must contains 8-20 characters.</p>

                <div class="relative w-full">
                    <input 
                        type="password" 
                        name="confirm_password"
                        id="confirmPassword" 
                        class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                        placeholder="Confirm new password">
                    <i class="fas fa-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer text-[#5C3211]/60 toggle-password"></i>
                </div>
                <p id="confirmError" class="text-red-600 text-xs text-left hidden">Password not match.</p>

                <button 
                    type="submit"
                    id="resetBtn" 
                    class="bg-[#5C3211] block w-full py-3 mt-4 mb-2.5 text-white font-bold rounded-full cursor-not-allowed opacity-50 text-base transition duration-300">
                    Reset Password
                </button>
            </form>

        </div>
    </div>
</body>
</html>