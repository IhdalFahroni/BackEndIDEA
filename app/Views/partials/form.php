<?php // app/Views/partials/add_place_form.php ?>

<div id="addPlace" class="header mb-5 hidden">
    <h2 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">
        Add tourist attraction
    </h2>
    <p class="text-xs font-light text-black text-center bg-white p-2 rounded-lg mb-6 shadow-sm border border-yellow-200">
        All questions (<span class="text-[#FF0000]">*</span>) must be answered. Once submitted, answers cannot be changed. <br>
        Please check the answers are correct before submitting.
    </p>
    <form id="attractionForm" action="<?= site_url('formAddPlace/submit') ?>" method="post" enctype="multipart/form-data">
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="place_name">
                Place name<span class="text-[#FF0000]">*</span>
            </label>
            <input type="text" id="place_name" name="place_name"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" value="<?= old('place_name') ?>" />
                <?= session()->getFlashdata('errors.place_name') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.place_name').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="category">Category<span class="text-[#FF0000]">*</span></label>
            <div class="flex items-center gap-8 pt-4">
                <label class="flex items-center gap-2 cursor-pointer text-gray-600">
                    <input type="radio" name="category" value="tourist_destination" required 
                        class="appearance-none w-4 h-4 border-2 border-gray-300 rounded-full transition-all duration-200 ease-in-out relative
                                checked:bg-[#F59E0B] checked:border-[#F59E0B]
                                focus:ring-[3px] focus:ring-[#F59E0B]/50
                                before:content-[''] before:block before:w-2 before:h-2 before:bg-white before:rounded-full before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 checked:before:block"
                        <?= old('category') == 'tourist_destination' ? 'checked' : '' ?>>
                    <span class="font-normal pt-1 text-black">Tourist destination</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer text-gray-600">
                    <input type="radio" name="category" value="culinary"
                        class="appearance-none w-4 h-4 border-2 border-gray-300 rounded-full transition-all duration-200 ease-in-out relative
                                checked:bg-[#F59E0B] checked:border-[#F59E0B]
                                focus:ring-[3px] focus:ring-[#F59E0B]/50
                                before:content-[''] before:block before:w-2 before:h-2 before:bg-white before:rounded-full before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 checked:before:block"
                        <?= old('category') == 'culinary' ? 'checked' : '' ?>>
                    <span class="font-normal pt-1 text-black">Culinary</span>
                </label>
            </div>
            <?= session()->getFlashdata('errors.category') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.category').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="district_city">
                District/city<span class="text-[#FF0000]">*</span>
            </label>
            <select id="district_city" name="district_city" required
                class=" w-full bg-transparent border-b border-gray-300 py-2 px-[0.1rem] pr-2 text-gray-400 appearance-none 
                        bg-no-repeat bg-right bg-[length:1rem] focus:outline-none focus:ring-0 focus:border-b-[#F59E0B] transition-colors duration-200 
                        ease-in-out valid:text-black"
                style="background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2020%2020%22%20fill%3D%22none%22%20stroke%3D%22%236B7280%22%20stroke-width%3D%221.5%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%2F%3E%3C%2Fsvg%3E');">
                <option value="" disabled selected>Choose</option>
                <option value="mataram" class="text-black" <?= old('district_city') == 'mataram' ? 'selected' : '' ?>>Mataram</option>
                <option value="lombok_barat" class="text-black" <?= old('district_city') == 'lombok_barat' ? 'selected' : '' ?>>West Lombok</option>
                <option value="lombok_tengah" class="text-black" <?= old('district_city') == 'lombok_tengah' ? 'selected' : '' ?>>Central Lombok</option>
                <option value="lombok_timur" class="text-black" <?= old('district_city') == 'lombok_timur' ? 'selected' : '' ?>>East Lombok</option>
                <option value="lombok_utara" class="text-black" <?= old('district_city') == 'lombok_utara' ? 'selected' : '' ?>>North Lombok</option>
            </select>
            <?= session()->getFlashdata('errors.district_city') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.district_city').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="subdistrict">Subdistrict<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="subdistrict" name="subdistrict"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" value="<?= old('subdistrict') ?>" />
            <?= session()->getFlashdata('errors.subdistrict') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.subdistrict').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="village">Village<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="village" name="village"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" value="<?= old('village') ?>" />
            <?= session()->getFlashdata('errors.village') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.village').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="street">Street<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="street" name="street"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required rows="1" placeholder="Answer" value="<?= old('street') ?>" />
            <?= session()->getFlashdata('errors.street') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.street').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="gmaps">Google Map Location<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="gmaps" name="gmaps"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Paste Google Map location link here" value="<?= old('gmaps') ?>" />
            <?= session()->getFlashdata('errors.gmaps') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.gmaps').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="description">Place description<span class="text-[#FF0000]">*</span></label>
            <textarea id="description" name="description"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF] resize-y"
                required rows="1" placeholder="Answer"><?= old('description') ?></textarea>
            <?= session()->getFlashdata('errors.description') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.description').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="harga_tiket">Entrance Ticket Price<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="harga_tiket" name="harga_tiket"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" value="<?= old('harga_tiket') ?>" />
            <?= session()->getFlashdata('errors.harga_tiket') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.harga_tiket').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label>Photo(s)</label>
            <div id="fileUploadVisual"
                class="group flex border-b-0 pb-0 items-center py-2 cursor-pointer transition-all duration-200">
                <svg id="uploadIcon" xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5 flex-shrink-0 mr-2 text-gray-400 transition-colors group-hover:text-[#F59E0B] relative top-1" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <input type="text" id="fileUploadPlaceholder" placeholder="Upload File(s)" readonly 
                    class="flex-grow bg-transparent p-0 pt-3 border-none outline-none text-gray-600
                            placeholder:text-gray-400 placeholder:transition-colors 
                            group-hover:placeholder:text-[#F59E0B] group-hover:placeholder:underline" />
            </div>
            <input id="file-upload" type="file" name="file_upload[]" multiple class="hidden"/>
            <p id="file-list" class="text-xs text-gray-500 mt-2"></p> 
            <?= session()->getFlashdata('errors.file_upload') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.file_upload').'</p>' : '' ?>
        </div>

        <div class="mt-8 mb-4 max-w-xs mx-auto text-center"> 
            <button type="submit" class="bg-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold transition duration-200">
                Submit
            </button>
        </div>
    </form>
</div>
<div id="claimForm" class="header mb-5 hidden">
    <h2 class="text-white text-center text-3xl md:text-5xl font-bold [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">
        Claim culinary site
    </h2>
     <div class="flex justify-end mb-4 mr-4">
        <i id="closeClaimFormBtn" class="fa-solid fa-xmark text-2xl font-bold text-[#FFFFFF]"></i>
    </div>
    <p class="text-xs font-light text-black text-center bg-white p-2 rounded-lg mb-6 shadow-sm border border-yellow-200">
        All questions (<span class="text-[#FF0000]">*</span>) must be answered. Once submitted, answers cannot be changed. <br>
        Please check the answers are correct before submitting.
    </p>
    <form action="<?= site_url('formKlaim/submit') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID_tempat" value="<?= esc($idTempat ?? '') ?>">
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="full_name">Full name<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="full_name" name="nama_lengkap"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
                <?= session()->getFlashdata('errors.full_name') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.full_name').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="phone_number">Phone number<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="phone_number" name="no_hp"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
                <?= session()->getFlashdata('errors.phone_number') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.phone_number').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="email">Email<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="email" name="email"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
                <?= session()->getFlashdata('errors.email') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.email').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label for="taxpayer">Taxpayer Identification Number<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="taxpayer" name="npwp"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
                <?= session()->getFlashdata('errors.taxpayer') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.taxpayer').'</p>' : '' ?>
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-md border border-[#F0D3B3]">
            <label>Supporting document(s)</label>
            <div id="fileUploadVisualClaim"
                class="group flex border-b-0 pb-0 items-center py-2 cursor-pointer transition-all duration-200">
                <svg id="uploadIcon" xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5 flex-shrink-0 mr-2 text-gray-400 transition-colors group-hover:text-[#F59E0B] relative top-1" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <input type="text" id="fileUploadPlaceholderClaim" placeholder="Upload File(s)" readonly
                    class="flex-grow bg-transparent p-0 pt-3 border-none outline-none text-gray-600
                            placeholder:text-gray-400 placeholder:transition-colors 
                            group-hover:placeholder:text-[#F59E0B] group-hover:placeholder:underline" />
            </div>
            <input id="file-uploadClaim" type="file" multiple class="hidden" name="dokumen_pendukung[]"/>
            <p id="file-listClaim" class="text-xs text-gray-500 mt-2"></p> 
            <?= session()->getFlashdata('errors.file-uploadClaim') ? '<p class="error-message text-red-500 text-sm mt-1">'.session()->getFlashdata('errors.file-uploadClaim').'</p>' : '' ?>
        </div>

        <div class="mt-8 mb-4 max-w-xs mx-auto text-center"> 
            <button type="submit" class="bg-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold transition duration-200">
                Submit
            </button>
        </div>
    </form>
</div>