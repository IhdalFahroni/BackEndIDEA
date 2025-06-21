<?php // app/Views/partials/profile.php ?>

<div id="profil" class="header mb-5 hidden">
    <?php if (session()->getFlashdata('profile_error') || session()->getFlashdata('profile_success') || session()->getFlashdata('password_error') || session()->getFlashdata('password_success') || session()->getFlashdata('delete_error') || session()->getFlashdata('delete_success')) : ?>
        <div class="mx-auto max-w-xl p-4 mb-4 rounded-lg
            <?= session()->getFlashdata('profile_error') || session()->getFlashdata('password_error') || session()->getFlashdata('delete_error') ? 'bg-red-100 text-red-700 border border-red-400' : 'bg-green-100 text-green-700 border border-green-400' ?>" role="alert">
            <?php if (session()->getFlashdata('profile_error')) : ?>
                <?= session()->getFlashdata('profile_error') ?>
            <?php elseif (session()->getFlashdata('profile_success')) : ?>
                <?= session()->getFlashdata('profile_success') ?>
            <?php elseif (session()->getFlashdata('password_error')) : ?>
                <?= session()->getFlashdata('password_error') ?>
            <?php elseif (session()->getFlashdata('password_success')) : ?>
                <?= session()->getFlashdata('password_success') ?>
            <?php elseif (session()->getFlashdata('delete_error')) : ?>
                <?= session()->getFlashdata('delete_error') ?>
            <?php elseif (session()->getFlashdata('delete_success')) : ?>
                <?= session()->getFlashdata('delete_success') ?>
            <?php endif; ?>
            <?php // Tampilkan error validasi spesifik juga jika ada ?>
            <?php if (session()->getFlashdata('errors')) : ?>
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $field => $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <script> setTimeout(() => { const alertDiv = document.querySelector('.alert'); if(alertDiv) alertDiv.remove(); }, 5000); </script>
    <?php endif; ?>

    <div id="containerProfile" class="bg-[#FFFFFF] rounded-xl p-4 flex items-center justify-between shadow-md overflow-hidden mt-8 border border-[#F0D3B3]">
        <div id="profilPage" class="flex items-center w-full relative">
            <?php if (isset($user_role)) : ?>
                <?php if ($user_role !== 'admin') : ?>
                <button id="editProfileBtn" class="absolute top-4 right-4 bg-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition">Edit</button>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(session()->get('foto') !== null) :?>
            <img src="<?= base_url('Assets/profil/' . esc(session()->get('foto'))) ; ?>" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
            <?php else: ?>
            <img src="<?= base_url('Assets/profil/default.png') ?>" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
            <?php endif; ?>
            <div class="ml-6 flex flex-col">
                <?php if (isset($user_role)) : ?>
                    <?php if ($user_role === 'pemilik') : ?>
                    <div class="w-24 bg-blue-500 text-center text-white rounded-full px-2 py-1 flex items-center gap-2 mb-2">
                        <i class="fas fa-star text-base font-semibold"></i>
                        <span class="pt-1"> Owner </span>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($user_role === 'admin') : ?>
                    <span class="text-5xl font-normal text-[#5C3211]">Admin</span>
                <?php else : ?>
                    <span class="text-5xl font-normal text-[#5C3211]"><?= esc(session()->get('username')) ; ?></span>
                    <div class="flex items-center mt-1 gap-4">
                        <span class="text-xl text-[#5C3211] font-normal"><?= esc(session()->get('nama_depan')) ; ?> <?= esc(session()->get('nama_belakang')) ; ?></span>
                        <span class="text-lg text-[#5C3211] font-light"><?= esc(session()->get('email') ?? '') ; ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="editProfilePage" class="flex items-center w-full relative <?= $user_role === 'admin' ? 'hidden' : '' ?>">
            <form id="editProfileForm" action="<?= site_url('home/updateProfile') ?>" method="post">
                <div class="absolute top-4 right-4 flex items-center gap-3">
                    <button type="button" id="cancelEditBtn" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white px-7 py-1 rounded-full shadow font-semibold transition">
                        Cancel
                    </button>
                    <button type="submit" id="saveEditBtn" class="border border-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition">
                        Save change
                    </button>
                </div>
                
                <?php if(session()->get('foto')!==null) :?>
                <img src="<?= base_url('Assets/profil/' . esc(session()->get('foto'))) ; ?>" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
                <?php else: ?>
                <img src="<?= base_url('Assets/profil/default.png') ?>" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
                <?php endif; ?>                       
                <div class="ml-6 flex flex-col">
                    <div class="relative">
                        <input type="text" id="editUsername" name="username" class="text-5xl py-2 font-normal text-[#5C3211] border border-[#5C3211] rounded-lg focus:outline-none focus:border-[#FF9800] px-3 pt-3" placeholder="Username" value="<?= esc(old('username', session()->get('username'))) ?>" />                           
                        <p id="usernameError" class="absolute top-full mt-1 text-sm text-[#FF0000] hidden">
                            Username must be 8-20 characters
                        </p>
                    </div>
                    <div class="flex items-center mt-6 gap-4"> 
                        <input type="text" id="editFirstName" name="firstName" class="text-xl py-2 text-[#5C3211] font-normal border border-[#5C3211] rounded-lg focus:outline-none focus:border-[#FF980B] px-3 pt-3" placeholder="First Name" value="<?= esc(old('firstName', session()->get('nama_depan'))) ?>" />
                        <input type="text" id="editLastName" name="lastName" class="text-xl py-2 text-[#5C3211] font-normal border border-[#5C3211] rounded-lg focus:outline-none focus:border-[#FF980B] px-3 pt-3" placeholder="Last Name" value="<?= esc(old('lastName', session()->get('nama_belakang'))) ?>" />
                        <span class="text-lg text-[#5C3211] font-light"><?= esc(session()->get('email') ?? '') ?></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="bawahProfil" class="bg-[#FFFFFF] rounded-xl p-4 flex items-center justify-between shadow-md overflow-hidden mt-8 border border-[#F0D3B3] hidden">
        <div class="flex flex-col w-full">
            <button id="openAccountSettingBtn" class="flex items-center gap-3 py-2 px-4 rounded transition text-[#5C3211] font-medium text-lg focus:outline-none">
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

            <form id="changePasswordForm" action="<?= site_url('home/changePassword') ?>" method="post">
                <div>
                    <div class="mb-4">
                        <span class="text-xl font-semibold">Change password</span>
                    </div>
                    <div class="flex flex-col max-w-sm gap-4"> 
                        <input type="password" id="currentPassword" name="current_password" placeholder="Current password" class="border border-[#5C3211] rounded-lg px-4 py-2 focus:outline-none focus:border-[#FF9800]">
                        <div class="relative">
                            <input type="password" id="newPass" name="new_password" placeholder="New password" class="border border-[#5C3211] w-full rounded-lg px-4 py-2 focus:outline-none focus:border-[#FF9800]">
                            <p id="passwordError" class="absolute mt-1 text-sm text-red-500 hidden">Password need to contain at least 8 characters.</p>
                        </div>
                    </div>
                    <button type="submit" id="savePasswordBtn" class="border border-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition mt-8">
                        Save new password
                    </button>
                </div>
            </form>

            <hr class="my-6 border-[#F0D3B3]">

            <?php if (isset($user_role) && $user_role !== 'admin') : // Sembunyikan untuk admin ?>
            <form id="deleteAccountForm" action="<?= site_url('home/deleteAccount') ?>" method="post">
                <div class="mt-12">
                    <div class="mb-2">
                        <span class="text-xl font-semibold">Delete account</span>
                    </div>
                    <p class="text-base font-light">Permanently delete your account</p>
                    <button type="submit" id="deleteAccountBtn" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition mt-4">
                        Delete account
                    </button>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>