<?php // app/Views/partials/sidebar_admin.php ?>

<aside class="text-[#FFC107] w-20 flex flex-col items-center fixed top-0 left-0 h-screen z-20 bg-[#FFFFFF]">
    <div class="p-5">
        <div id="hamburgerBtn" class="w-12 h-12 mt-2 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <i class="fa-solid fa-bars text-xl "></i>
        </div>
    </div>

    <div class="flex-1 p-5 space-y-6">
        <a href="<?= base_url('/home') ?>" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <i class="fa-solid fa-home text-xl"></i>
        </a>
        <div id="addPlaceBtn" class="w-12 h-12  rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <i class="fa-solid fa-plus text-xl"></i>
        </div>
        <div id="notificationBtn" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <i class="fa-solid fa-bell text-xl"></i>
        </div>
        <div id="manageVerificationBtn" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <i class="fa-solid fa-clipboard-check text-xl"></i>
        </div>
    </div>

    <div class="p-5 space-y-3">
        <div id="profilBtn" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <i class="fa-solid fa-user text-xl "></i>
        </div>
    </div>
</aside>

<div id="sidebarMenu" class="pt-2 text-[#FFC107] fixed top-0 w-72 h-screen bg-[#FFFFFF] backdrop-blur-md z-[200] flex flex-col duration-300 ease-in-out -translate-x-full">
    <div class="p-5">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer hover:scale-110 hover:bg-gray-100" id="closeBtn">
                <i class="fa-solid fa-bars text-xl"></i>
            </div>
            <img src="<?= base_url('Assets/Logo1.png') ?>" alt="Lombok REC Logo" class="h-8 w-auto">
        </div>
    </div>

    <div class="flex-1 p-5 space-y-6">
        <a href="<?= base_url('/home') ?>" class="flex items-center rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <span class="w-12 h-12 flex items-center justify-center text-lg"><i class="fa-solid fa-home"></i></span>
            <span class="text-lg font-medium text-[#5C3211] pt-2">Home</span>
        </a>
        <a href="#" id="openAddPlaceBtn" class="flex items-center rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <span class="w-12 h-12 flex items-center justify-center text-lg"><i class="fa-solid fa-plus"></i></span>
            <span class="text-lg font-medium text-[#5C3211] pt-2">Add Place</span>
        </a>
        <a href="#" id="openNotificationBtn" class="flex items-center rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <span class="w-12 h-12 flex items-center justify-center text-lg"><i class="fa-solid fa-bell"></i></span>
            <span class="text-lg font-medium text-[#5C3211] pt-1">Notifications</span>
        </a>
        <a href="#" id="openManageVerificationBtn" class="flex items-center rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
            <span class="w-12 h-12 flex items-center justify-center text-lg"><i class="fa-solid fa-clipboard-check"></i></span>
            <span class="text-lg font-medium text-[#5C3211] pt-2">Manage Verification</span>
        </a>
    </div>

    <div class="p-5 space-y-3">
        <div id="openProfilBtn" class="flex items-center rounded cursor-pointer transition hover:bg-gray-100">
            <span class="w-12 h-12 flex items-center justify-center text-xl"><i class="fa-solid fa-user"></i></span>
            <div class="flex flex-col">
                <span class="text-lg font-semibold text-[#5C3211]"><?= esc(session()->get('username')) ; ?></span> 
                <span class="text-base font-light text-[#5C3211]"><?= esc(session()->get('email')) ; ?></span>
            </div>
        </div>
    </div>
</div>