<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | LombokRec</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/signUp.js') ?>"></script>
</head>
<body class="min-h-screen flex justify-center items-center font-jaldi bg-Landing bg-cover h-screen">

    <div class="absolute inset-0 w-full h-full backdrop-blur-sm flex justify-center items-center">
        <div class="bg-[#FFFFFF] p-8 rounded-[15px] shadow-lg text-center w-[450px] relative z-10">
            
            <h2 class="text-[22px] font-bold text-[#5C3211] mb-5 tracking-wider">Sign Up</h2>

            <input 
                type="text" 
                id="name" 
                class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                placeholder="Name">

            <input 
                type="text" 
                id="email" 
                class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                placeholder="Email">
            <p id="emailError" class="text-red-600 text-xs text-left hidden">Email must contain "@"</p>

            <input 
                type="text" 
                id="username"
                class= "bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                placeholder="Username">
            <p id="usernameError" class="text-red-600 text-xs text-left hidden">Username must contains 8-20 characters</p>

            <div class="relative w-full"> 
                <input 
                    type="password"
                    id="password" 
                    class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                    placeholder="Password"> 
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <i class="fas fa-eye-slash font-normal text-[#5C3211] hover:text-gray-700 cursor-pointer" id="togglePasswordIcon"></i>
                    </div>
            </div>
            <p id="passwordError" class="text-red-600 text-xs text-left hidden">Password must contains 8-20 characters</p>

            <p id="allField" class="text-red-600 text-xs text-center">All field must be filled in</p>
            
            <button 
                id="signUpBtn"
                class="block w-full py-3 mt-4 mb-2.5 bg-[#5C3211] text-white font-bold rounded-full text-base hover:bg-[#a89e8c] no-underline cursor-not-allowed opacity-50">
                Sign Up
            </button>

        </div>
    </div>
</body>
</html>