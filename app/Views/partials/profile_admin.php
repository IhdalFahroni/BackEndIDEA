<div id="profil" class="header mb-5 hidden">
    <div id="containerProfile" class="bg-[#FFFFFF] rounded-xl p-4 flex items-center justify-between shadow-md overflow-hidden mt-8 border border-[#F0D3B3]">
        <div id="profilPage" class="flex items-center w-full relative">
            <?php if($_SESSION['foto']!=null) :?>
            <img src="<?= $_SESSION['foto'] ; ?>" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
            <?php else: ?>
            <img src="https://placehold.co/200x200/FFC107/ffffff?text=Profile" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
            <?php endif; ?>
            <div class="ml-6 flex flex-col">
                <span class="text-5xl font-normal text-[#5C3211]">Admin</span>
            </div>
        </div>
    </div>
    <div id="bawahProfil" class="bg-[#FFFFFF] rounded-xl p-4 flex items-center justify-between shadow-md overflow-hidden mt-8 border border-[#F0D3B3] hidden">
        <div class="flex flex-col w-full">
            <button id="openAccountSettingBtn" class="flex items-center gap-3 py-2 px-4  rounded transition text-[#5C3211] font-medium text-lg focus:outline-none">
                <i class="fas fa-gear text-xl"></i>
                <span class="hover:underline pt-1">Account setting</span>
            </button>
            <hr class="my-3 border-[#F0D3B3]">
            <button id="logoutBtn" class="flex items-center gap-3 py-2 px-4 rounded transition text-[#5C3211] font-medium text-lg focus:outline-none">
                <i class="fa-solid fa-right-from-bracket text-xl"></i>
                <span class="hover:underline pt-1">Logout</span>
            </button>
        </div>
    </div>
    <div id="accountSetting" class="bg-[#FFFFFF] text-[#5C3211] hidden rounded-xl p-8 shadow-md overflow-hidden mt-8 border border-[#F0D3B3]">
        <div class="w-full relative">
            <button id="closeAccountSettingBtn" class="absolute top-0 right-0 text-[#5C3211] hover:bg-gray-100 rounded-full transition w-8 h-8 flex items-center justify-center" title="Close">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <div class="mb-4">
                <span class="text-3xl font-bold">Account settings</span>
            </div>

            <hr class="border-t border-[#5C3211]/30 my-6">

            <div>
                <div class="mb-4">
                    <span class="text-xl font-semibold">Change password</span>
                </div>
                <div class="flex flex-col max-w-sm gap-4"> 
                    <input type="password" id="currentPassword" placeholder="Current password" class="border border-[#5C3211] rounded-lg px-4 py-2 focus:outline-none focus:border-[#FF9800]">
                    <div class="relative">
                        <input id="newPass" type="password" placeholder="New password" class="border border-[#5C3211] w-full rounded-lg px-4 py-2 focus:outline-none focus:border-[#FF9800]">
                        <p id="passwordError" class="absolute mt-1 text-sm text-red-500 hidden">Password need to contain at least 8 characters.</p>
                    </div>
                </div>
                <button id="savePasswordBtn" class="border border-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition mt-8">
                    Save new password
                </button>
        </div>
    </div>
</div>