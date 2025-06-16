<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tempat Wisata Admin</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/wisataAdmin.js') ?>"></script>
    <style>
        .main-container {
            background: linear-gradient(to bottom, #FFC107 50px, #F8F9FA 300px); 
            border-top-left-radius: 0.75rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3), 0 6px 6px rgba(0, 0, 0, 0.2);
            position: relative; 
            z-index: 30; 
        }
        .main-container-detail {
            background-image: linear-gradient(to bottom right, #FFC107, #FFFFFF);
            border-top-left-radius: 0.75rem;
        }
        ::-webkit-scrollbar {width: 6px;}
        ::-webkit-scrollbar-track {background: #f1f1f1;}
        ::-webkit-scrollbar-thumb {background: #FFC107;border-radius: 3px;}
        ::-webkit-scrollbar-thumb:hover {background: #e0a800;}
    </style>
</head> 
<body class="flex min-h-screen bg-[#FFFFFF] font-josefin">

    <aside class="text-[#FFC107] w-20 flex flex-col items-center fixed top-0 left-0 h-screen z-20 bg-[#FFFFFF]">
        <div class="p-5">
            <div id="hamburgerBtn" class="w-12 h-12 mt-2 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <i class="fa-solid fa-bars text-xl "></i>
            </div>
        </div>

        <div class="flex-1 p-5 space-y-6">
            <a href="HomePageAdmin.php" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
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
            <a href="HomePageAdmin.php" class="flex items-center rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
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
                    <span class="text-lg font-semibold text-[#5C3211]">Admin</span> 
                    <span class="text-base font-light text-[#5C3211]">@email.gmail.com</span>
                </div>
            </div>
        </div>
    </div>

    <main class="flex-1 pt-3 overflow-y-auto ml-20 bg-[#FFFFFF]">
        <div id="main-content-area" class="min-h-screen p-6 md:p-8 shadow-2xl w-full"> 
            <div id="awal">
                <h1 class="text-3xl md:text-4xl font-bold text-[#FFFFFF] text-center [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Selong Belanak Beach</h1>

                <div class="flex justify-end items-center space-x-3 mb-3">
                    <div id="openEdit" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                        Edit
                    </div>
                    <div id="saveEdit" class="hidden bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                        Save
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg mb-4 border border-[#F0B845]">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/3 flex-shrink-0">
                            <img src="<?= base_url('Assets/SelongBelanakPic.png') ?>" alt="Selong Belanak Beach" class="rounded-xl w-full h-auto object-cover shadow-md mb-3">
                            <p id="alamat" class="text-sm text-[#5C3211] mb-1 font-bold">Selong Belanak, Kec. Praya Bar., Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83572</p>
                            <textarea id="editAlamat"
                                type="text" 
                                class="hidden text-sm text-[#5C3211] opacity-50 font-bold w-full bg-transparent focus:outline-none"
                            >Selong Belanak, Kec. Praya Bar., Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83572</textarea>
                            </textarea>
                            <a id="googleMaps" href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                                <span class="relative top-0.5">Google Maps</span>
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                            <textarea id="editGmaps"
                                class="hidden text-[#5C3211] opacity-50 text-sm font-medium w-full bg-transparent focus:outline-none flex items-center">Google Maps
                            </textarea>
                        </div>
                        <div class="md:w-2/3">
                            <div class="text-yellow-500 my-1 text-lg rating" data-rating="4.5"></div>
                            <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-3 mt-4"> <p class="text-[#5C3211] text-base font-light">Kategori</p>
                                <p class="text-[#5C3211] font-medium text-base">Tempat wisata</p>

                                <p class="text-[#5C3211] text-base font-light">Tiket</p>
                                <p id="tiket" class="text-[#5C3211] font-medium text-base">Rp5.000</p>
                                <input id="editTiket"
                                    type="text" 
                                    value="Rp5.000" 
                                    class="hidden text-[#5C3211] opacity-50 font-medium text-base bg-transparent focus:outline-none border-none w-full" 
                                />

                                <p class="text-[#5C3211] text-base mt-0.5 font-light">Deskripsi</p>
                                <p id="deskripsi" class="text-base text-[#5C3211] leading-relaxed text-justify">
                                    Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. Pantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan deretan warung yang menyajikan makanan lokal dan minuman segar. Pemandangan sunset di Pantai Selong Belanak menjadi daya tarik utama.
                                </p>
                                <textarea id="editDeskripsi" 
                                    class="hidden text-base text-[#5C3211] opacity-50 leading-relaxed text-justify w-full focus:outline-none rounded-lg" 
                                    rows="6">Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. Pantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan deretan warung yang menyajikan makanan lokal dan minuman segar. Pemandangan sunset di Pantai Selong Belanak menjadi daya tarik utama.
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center items-center space-x-3 mb-3">
                    <div id="manageReviewBtn" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                        Manage Review
                    </div>
                    <div id="saveReviewBtn" class="hidden bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                        Save
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845] relative">                    
                    <div class="space-y-8">
                        <div>
                            <div class="mb-2">
                                <p class="font-semibold text-[#5C3211]">ihdal_f <span class="text-xs text-[#5C3211] font-normal ml-2">4 hour ago</span></p>
                                <div class="flex items-center text-yellow-500 text-sm">
                                    <i class="fas fa-star"></i>
                                    <span class="ml-1 font-semibold text-[#5C3211]">4.4</span>
                                </div>
                            </div>
                            <p class="text-base font-semibold text-[#5C3211] mb-4 leading-relaxed">
                                Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. Pantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan deretan warung yang menyajikan makanan lokal dan minuman segar.
                            </p>
                            <img src="<?= base_url('Assets/review_selong_belanak.png') ?>" alt="Review Image" class="rounded-xl w-80 h-52 object-cover shadow-md mb-3">
                        </div>
                    </div> 
                    <button id="trashCan" class="absolute right-4 bottom-4 hover:text-red-600 text-[#5C3211] p-3 transition hidden">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>

            <div id="notification" class="header mb-5 hidden">
                <h1 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Notifications</h1>
                <div class="bg-white text-[#5C3211] rounded-xl p-6 shadow-md max-w-3xl mx-auto border border-[#F0D3B3]">
                    <h3 class="font-semibold mb-1 text-lg">
                        Request for new place addition
                    </h3>
                    <p class="pt-0 ">
                        ihdal_f has submitted a request to add a new place.
                    </p>
                    <p class="font-light text-sm mt-4">
                        10:30, July 28, 2025
                    <hr class="my-2">
                    <h3 class="font-semibold mb-1 text-lg">
                        Request for culinary site claim 
                    </h3>
                    <p class="pt-0 ">
                        ihdal_f has submitted a request to claim a culinary site.
                    </p>
                    <p class="font-light text-sm mt-4">
                        10:30, July 28, 2025
                    <hr class="my-2">
                    <p class="pt-3 text-center">
                        That's all.
                    </p>
                </div>
            </div>

            <div id="addPlace" class="header mb-5 hidden">
                <h2 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">
                    Add tourist attraction
                </h2>
                <p class="text-xs font-light text-black text-center bg-white p-2 rounded-lg mb-6 shadow-sm border border-yellow-200">
                    All questions (<span class="text-[#FF0000]">*</span>) must be answered. Once submitted, answers cannot be changed. <br>
                    Please check the answers are correct before submitting.
                </p>
                <form id="attractionForm">
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label for="place_name">
                        Place name<span class="text-[#FF0000]">*</span>
                    </label>
                    <input type="text" id="place_name"
                        class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                        required placeholder="Answer" />
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label>Category<span class="text-[#FF0000]">*</span></label>
                    <div class="flex items-center gap-8 pt-4">
                        <label class="flex items-center gap-2 cursor-pointer text-gray-600">
                            <input type="radio" name="category" value="tourist_destination" required 
                                class="appearance-none w-4 h-4 border-2 border-gray-300 rounded-full transition-all duration-200 ease-in-out relative
                                        checked:bg-[#F59E0B] checked:border-[#F59E0B]
                                        focus:ring-[3px] focus:ring-[#F59E0B]/50
                                        before:content-[''] before:block before:w-2 before:h-2 before:bg-white before:rounded-full before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 checked:before:block">
                            <span class="font-normal pt-1 text-black">Tourist destination</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer text-gray-600">
                            <input type="radio" name="category" value="culinary"
                                class="appearance-none w-4 h-4 border-2 border-gray-300 rounded-full transition-all duration-200 ease-in-out relative
                                        checked:bg-[#F59E0B] checked:border-[#F59E0B]
                                        focus:ring-[3px] focus:ring-[#F59E0B]/50
                                        before:content-[''] before:block before:w-2 before:h-2 before:bg-white before:rounded-full before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 checked:before:block">
                            <span class="font-normal pt-1 text-black">Culinary</span>
                        </label>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label for="district_city">
                        District/city<span class="text-[#FF0000]">*</span>
                    </label>
                    <select id="district_city" required
                        class=" w-full bg-transparent border-b border-gray-300 py-2 px-[0.1rem] pr-2 text-gray-400 appearance-none 
                                bg-no-repeat bg-right bg-[length:1rem] focus:outline-none focus:ring-0 focus:border-b-[#F59E0B] transition-colors duration-200 
                                ease-in-out valid:text-black"
                        style="background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2020%2020%22%20fill%3D%22none%22%20stroke%3D%22%236B7280%22%20stroke-width%3D%221.5%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%2F%3E%3C%2Fsvg%3E');">
                        <option value="" disabled selected>Choose</option>
                        <option value="mataram" class="text-black">Mataram</option>
                        <option value="lombok_barat" class="text-black">West Lombok</option>
                        <option value="lombok_tengah" class="text-black">Central Lombok</option>
                        <option value="lombok_timur" class="text-black">East Lombok</option>
                        <option value="lombok_utara" class="text-black">North Lombok</option>
                    </select>
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label for="subdistrict">Subdistrict<span class="text-[#FF0000]">*</span></label>
                    <input type="text" id="subdistrict"
                        class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                        required placeholder="Answer" />
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label for="village">Village<span class="text-[#FF0000]">*</span></label>
                    <input type="text" id="village" 
                        class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                        required placeholder="Answer" />
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label for="street">Street<span class="text-[#FF0000]">*</span></label>
                    <input type="text" id="street" 
                        class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                        required rows="1" placeholder="Answer" />
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label for="gmaps">Google Map Location<span class="text-[#FF0000]">*</span></label>
                    <input type="text" id="gmaps" 
                        class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                        required placeholder="Paste Google Map location link here" />
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
                    <label for="description">Place description<span class="text-[#FF0000]">*</span></label>
                    <textarea id="description" 
                        class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF] resize-y"
                        required rows="1" placeholder="Answer"></textarea>
                </div>
                <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
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
                    <input id="file-upload" type="file" multiple class="hidden"/>
                    <p id="file-list" class="text-xs text-gray-500 mt-2"></p> 
                </div>

                <div class="mt-8 mb-4 max-w-xs mx-auto text-center"> 
                    <button type="submit" class="bg-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold transition duration-200">
                        Submit
                    </button>
                </div>
                </form>
            </div>

            <div id="manageVerification" class="header mb-5 hidden">
                <h1 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Manage Verification</h1>
                <div class="bg-white text-[#5C3211] rounded-xl p-6 shadow-md max-w-3xl mx-auto border border-[#F0D3B3] max-h-[70vh] overflow-y-auto pr-2.5">
                    
                    <div class="verification-item mb-4 p-4 border border-gray-200 rounded-lg shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4" data-type="add-place">
                        <div class="flex-grow">
                            <p class="font-semibold text-lg">ihdal_f</p>
                            <p class="text-sm text-gray-500">ihdalfahroni@gmail.com</p>
                            <h3 class="font-semibold mt-2 text-base md:text-lg">Addition of new place</h3>
                            <a href="#" class="view-form-link text-blue-500 text-sm hover:underline flex items-center mt-1">
                                <i class="fa-solid fa-file-alt mr-1"></i> <span class="relative top-0.5">See form</span>
                            </a>
                        </div>
                        <div class="flex-shrink-0 flex gap-2">
                            <button class="deny-btn border border-red-500 text-red-500 text-xs px-3 py-1 rounded-full hover:bg-red-500 hover:text-white" disabled>
                                <i class="fa-solid fa-times"></i> Deny
                            </button>
                            <button class="approve-btn border border-blue-500 text-blue-500 text-xs px-3 py-1 rounded-full hover:bg-blue-500 hover:text-white" disabled>
                                <i class="fa-solid fa-check"></i> Approve
                            </button>
                            <div class="approve text-blue-500 text-base px-3 py-1 hidden">Approved</div>
                            <div class="deny text-red-500 text-base px-3 py-1 hidden">Denied</div>
                        </div>
                    </div>

                    <div class="verification-item mb-4 p-4 border border-gray-200 rounded-lg shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4" data-type="claim-culinary">
                        <div class="flex-grow">
                            <p class="font-semibold text-lg">ihdal_f</p>
                            <p class="text-sm text-gray-500">ihdalfahroni@gmail.com</p>
                            <h3 class="font-semibold mt-2 text-base md:text-lg">Claim culinary request</h3>
                            <a href="#" class="view-form-link text-blue-500 text-sm hover:underline flex items-center mt-1">
                                <i class="fa-solid fa-file-alt mr-1"></i> <span class="relative top-0.5">See form</span>
                            </a>
                        </div>
                        <div class="flex-shrink-0 flex gap-2">
                            <button class="deny-btn border border-red-500 text-red-500 text-xs px-3 py-1 rounded-full hover:bg-red-500 hover:text-white" disabled>
                                <i class="fa-solid fa-times"></i> Deny
                            </button>
                            <button class="approve-btn border border-blue-500 text-blue-500 text-xs px-3 py-1 rounded-full hover:bg-blue-500 hover:text-white" disabled>
                                <i class="fa-solid fa-check"></i> Approve
                            </button>
                            <div class="approve text-blue-500 text-base px-3 py-1 hidden">Approved</div>
                            <div class="deny text-red-500 text-base px-3 py-1 hidden">Denied</div>
                        </div>
                    </div>

                    <p class="pt-3 text-center">That's all.</p>
                </div>
            </div>

            <div id="addPlaceModal" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black/60 flex justify-center items-center z-[1000] hidden">
                <div class="bg-gradient-to-b from-[#FFC107] to-[#F8F9FA] rounded-xl p-6 md:p-8 w-11/12 max-w-lg relative shadow-2xl">
                    <div class="modal-close-btn" data-close-modal="addPlaceModal">
                        <i class="fa-solid fa-xmark text-lg text-[#1F2937]"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-center text-white mb-6 [text-shadow:1px_1px_rgba(0,0,0,0.5)]">Add new place</h2>
                    <div class="max-h-[70vh] overflow-y-auto pr-2.5 pr-2">
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Place name*</label><p id="add_placeName" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Category*</label><p id="add_category" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">District/city*</label><p id="add_district" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Subdistrict*</label><p id="add_subdistrict" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Village*</label><p id="add_village" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Street*</label><p id="add_street" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Google Map Location*</label><a id="add_gmaps" href="#" target="_blank" class="text-blue-700 underline break-all"></a></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Place description*</label><p id="add_description" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Photo(s)</label><div id="photo_link"></div></div>
                    </div>
                </div>
            </div>
            <div id="claimCulinaryModal" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black/60 flex justify-center items-center z-[1000] hidden">
                <div class="bg-gradient-to-b from-[#FFC107] to-[#F8F9FA] rounded-xl p-6 md:p-8 w-11/12 max-w-lg relative shadow-2xl">
                    <div class="modal-close-btn" data-close-modal="claimCulinaryModal">
                        <i class="fa-solid fa-xmark text-lg text-[#1F2937]"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-center text-white mb-6 [text-shadow:1px_1px_rgba(0,0,0,0.5)]">Claim culinary site</h2>
                    <div class="max-h-[70vh] overflow-y-auto pr-2.5 pr-2">
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Full name*</label><p id="claim_fullName" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Phone number*</label><p id="claim_phone" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Email*</label><p id="claim_email" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Taxpayer Identification Number*</label><p id="claim_tin" class="text-[#1F2937] font-semibold"></p></div>
                        <div class="bg-white rounded-lg p-3 sm:p-4 mb-4"><label class="block text-[#4B5563] text-sm mb-1">Supporting document(s)</label><div id="supporting_document" class="text-[#1F2937] font-semibold"></div></div>
                    </div>
                </div>
            </div>

            <div id="profil" class="header mb-5 hidden">
                <div id="containerProfile" class="bg-[#FFFFFF] rounded-xl p-4 flex items-center justify-between shadow-md overflow-hidden mt-8 border border-[#F0D3B3]">
                    <div id="profilPage" class="flex items-center w-full relative">
                        <img src="https://placehold.co/200x200/FFC107/ffffff?text=Profile" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
                        <div class="ml-6 flex flex-col">
                            <span class="text-5xl font-normal text-[#5C3211]">Admin</span>
                        </div>
                    </div>
                    <div id="editProfilePage" class="flex items-center w-full relative hidden">
                        <button id="saveEditBtn" class="absolute top-4 right-4 border border-[#5C3211] hover:bg-[#5C3211]/5 text-[#5C3211] px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition">Save change</button>
                        <img src="https://placehold.co/200x200/FFC107/ffffff?text=Profile" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
                        <div class="ml-6 flex flex-col">
                            <input type="text" id="editUsername" class="text-5xl py-2 font-normal text-[#5C3211] border border-[#5C3211] rounded-lg mb-1 px-3" placeholder="Username" />
                            <p id="usernameError" class="text-sm text-[#FF0000] hidden">Username must be 8-20 characters</p>
                            <div class="flex items-center mt-2 gap-4">
                                <input type="text" class="text-xl py-2 text-[#5C3211] font-normal border border-[#5C3211] rounded-lg px-3" placeholder="Nama Lengkap" />
                                <span class="text-lg text-[#5C3211] font-light">email@gmail.com</span>
                            </div>
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
        </div>
    </main>

    <div id="deleteReviewModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">

        <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 w-full max-w-lg relative text-[#5C3211]">
            
            <div class="border border-[#5C3211] rounded-xl p-6 relative">
                
                <button id="closeDeleteReviewBtn" class="absolute top-3 left-3 w-7 h-7 rounded-full border border-[#5C3211] flex items-center justify-center text-[#8E5E38] hover:bg-gray-100 hover:text-[#8E5E38] transition focus:outline-none">
                    <i class="fas fa-xmark text-base"></i>
                </button>

                <div class="text-center">
                    <h2 class="text-xl font-bold mt-0 mb-0">Delete review</h2>

                    <p class="text-base mb-8 font-light max-w-xs mx-auto">
                        Why this review should be deleted? <br>Choose the reason below
                    </p>

                    <select
                        id="reasonSelect"
                        class="block w-3/5 mx-auto border-2 border-[#5C3211]/60 rounded-lg text-left pt-2 px-2 pb-0 text-base font-light focus:outline-none focus:ring-0 focus:border-[#5C3211] mb-12"
                    >   <option value="" disabled selected>Choose</option>
                        <option class="font-light">Use of inappropriate word</option>
                        <hr>
                        <option class="font-light">Misleading information</option>
                        <hr>
                        <option class="font-light">Offensive</option>
                    </select>

                    <button id="deleteReviewBtn" class="block mx-auto bg-[#FF0000] text-white px-4 py-0 rounded-lg shadow-md hover:bg-opacity-80 transition font-semibold text-lg tracking-wider">
                        Delete
                    </button>
                </div>
            </div> 
        </div> 
    </div>
    
</body>
</html>