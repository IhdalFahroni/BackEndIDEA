<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | LombokRec</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/forgotPassword.js') ?>"></script>
</head>
<body class="min-h-screen flex justify-center items-center font-jaldi bg-Landing bg-cover h-screen">

    <div class="absolute inset-0 w-full h-full backdrop-blur-sm flex justify-center items-center">
        <div class="bg-[#FFFFFF] p-8 rounded-[15px] shadow-lg text-center w-[400px] relative z-10">

            <h2 class="text-[22px] font-bold mb-5 text-[#5C3211] tracking-wider">Forgot Password</h2>
            <input 
                type="text" 
                id="email" 
                class="bg-[#FFFFFF] text-[#5C3211] w-full p-2.5 my-2.5 border border-[#D7D5BA] rounded-md bg-lombok-bg text-sm placeholder:text-[#5C3211] pr-10 focus:outline-[#D7D5BA]" 
                placeholder="Email">
            <p id="emailError" class="text-red-600 text-xs text-left hidden">Email must contain "@"</p>


            <button 
                id="forgotBtn" 
                class="bg-[#5C3211] block w-full py-3 mt-4 mb-2.5 text-white font-bold rounded-full cursor-not-allowed opacity-50 text-base hover:bg-[#a89e8c] no-underline">
                Send Link to Email
            </button>

        </div>
    </div>
</body>
</html>