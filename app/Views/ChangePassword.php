<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | LombokRec</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/changePassword.js') ?>"></script>
</head>
<body class="min-h-screen flex justify-center items-center font-jaldi bg-Landing bg-cover h-screen">

    <div class="absolute inset-0 w-full h-full backdrop-blur-sm flex justify-center items-center">
        <div class="bg-[#FFFFFF] p-8 rounded-[15px] shadow-lg text-center w-[400px] relative z-10">
            
            <h2 class="text-[22px] font-bold text-[#5C3211] mb-5 tracking-wider">Change Password</h2>

            <input 
                type="text" 
                id="newPassword" 
                class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                placeholder="New Password">
            <p id="passwordError" class="text-red-600 text-xs text-left mt-1 mb-4 hidden">Password must be 8-20 characters</p>

            <div class="relative w-full"> 
                <input 
                    type="password"
                    id="confirmPassword" 
                    class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                    placeholder="Confirm New Password"> 
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <i class="fas fa-eye-slash font-normal text-[#5C3211] hover:text-gray-700 cursor-pointer" id="togglePasswordIcon"></i>
                    </div>
            </div>
            <p id="passwordDontMatch" class="text-red-600 text-xs text-left mt-1 mb-4 hidden">Password do not match</p>
            
            <button 
                id="changeBtn"
                class="block w-full py-3 mt-4 mb-2.5 bg-[#5C3211] text-white font-bold rounded-full cursor-not-allowed opacity-50 text-base hover:bg-[#a89e8c] no-underline">
                Change
            </button>

        </div>
    </div>
</body>
</html>