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
</div>