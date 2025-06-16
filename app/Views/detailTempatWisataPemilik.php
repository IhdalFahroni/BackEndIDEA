<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tempat Wisata Pemilik</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/wisataPemilik.js') ?>"></script>
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
                <i class="fa-solid fa-bars text-xl"></i>
            </div>
        </div>

        <div class="flex-1 p-5 space-y-6">
            <a href="HomePagePemilik.php" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <i class="fa-solid fa-home text-xl"></i>
            </a>
            <div id="addPlaceBtn" class="w-12 h-12  rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <i class="fa-solid fa-plus text-xl"></i>
            </div>
            <div id="notificationBtn" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <i class="fa-solid fa-bell text-xl"></i>
            </div>
            <div id="manageBtn" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <i class="fa-solid fa-arrows-up-down text-xl"></i>
            </div>
        </div>

        <div class="p-5 space-y-3">
            <div id="profilBtn" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <i class="fa-solid fa-user text-[#FFC107 text-xl"></i>
            </div>
        </div>
    </aside>

    <div id="sidebarMenu" class="text-[#FFC107] fixed top-0 w-72 h-screen bg-[#FFFFFF] backdrop-blur-md z-[200] flex flex-col duration-300 ease-in-out -translate-x-full">
        <div class="p-5">
            <div class="flex items-center mt-2">
                <div class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer hover:scale-110 hover:bg-gray-100" id="closeBtn">
                    <i class="fa-solid fa-bars text-xl"></i>
                </div>
                <img src="<?= base_url('Assets/Logo1.png') ?>" alt="Lombok REC Logo" class="h-8 w-auto">
            </div>
        </div>
        <div class="flex-1 p-5 space-y-6">
            <a href="HomePagePemilik.php" class="flex items-center rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
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
            <div class="flex flex-col items-start rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <div id="openManageBtn" class="flex items-center">
                    <span class="w-12 h-12 flex items-center justify-center text-lg"><i class="fa-solid fa-arrows-up-down"></i></span>
                    <span class="text-lg font-medium text-[#5C3211] pt-1">Manage place</span>
                </div>
                <a href="detailTempatKulinerPemilik.php" id="listPlace" class="text-[#5C3211] text-sm font-light pt-1 ml-12 hidden hover:underline">RM Sumber Rejeki</a>
            </div>
        </div>
        <div class="p-5 space-y-3">
            <div id="openProfilBtn" class="flex items-center rounded cursor-pointer transition hover:bg-gray-100">
                <span class="w-12 h-12 flex items-center justify-center text-xl"><i class="fa-solid fa-user"></i></span>
                <div class="flex flex-col">
                    <span class="text-lg font-semibold text-[#5C3211]">Owner</span> 
                    <span class="text-base font-light text-[#5C3211]">@email.gmail.com</span>
                </div>
            </div>
        </div>
    </div>

    <main class="flex-1 pt-3 overflow-y-auto ml-20">
        <div id="main-content-area" class="min-h-screen p-6 md:p-8 shadow-2xl w-full">

            <div id="awal">
                <h1 class="text-3xl md:text-4xl font-bold text-[#FFFFFF] text-center mb-8 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Selong Belanak Beach</h1>
                <div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845]">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/3 flex-shrink-0"><img src="<?= base_url('Assets/SelongBelanakPic.png') ?>" alt="Selong Belanak Beach" class="rounded-xl w-full h-auto object-cover shadow-md mb-3">
                            <p class="text-sm text-[#5C3211] mb-1 font-bold">Selong Belanak, Kec. Praya Bar., Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83572</p>
                            <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                                <span class="relative top-0.5">Google Maps</span>
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                        </div>
                        <div class="md:w-2/3">
                            <div class="text-yellow-500 my-1 text-lg rating" data-rating="4.5"></div>
                            <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-3 mt-4">
                                <p class="text-[#5C3211] text-base font-light">Kategori</p>
                                <p class="text-[#5C3211] font-medium text-base">Tempat wisata</p>

                                <p class="text-[#5C3211] text-base font-light">Tiket</p>
                                <p class="text-[#5C3211] font-medium text-base">Rp5.000</p>

                                <p class="text-[#5C3211] text-base mt-0.5 font-light">Deskripsi</p>
                                <p class="text-base text-[#5C3211] leading-relaxed text-justify">
                                    Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. Pantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan deretan warung yang menyajikan makanan lokal dan minuman segar. Pemandangan sunset di Pantai Selong Belanak menjadi daya tarik utama.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PAKAI #5C3211 BUAT WARNA TULISAN DAN ICON, ADA BEBERAPA DETAIL KECIL YANG DIUBAH DISINI' -->
                <div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845]">
                    
                    <div class="mt-2 px-6 md:px-8"> <!-- 'KLO MAU AMAN, COPY AJA LANGSUNG DARI SINI' -->
                        <div id="addReview" class="w-full cursor-pointer group">
                            <i class="fas fa-plus-circle text-lg text-[#5C3211] opacity-50 group-hover:opacity-100 transition"></i> 
                            <span class="font-medium text-[#5C3211] opacity-50 group-hover:opacity-100 transition">Add review</span>
                            <hr class="border-[#5C3211] opacity-50 mt-1 mb-6">
                        </div>
                        <div id="fillReview" class="w-full hidden">
                            <div class="mb-3">
                                <div id="afterRating" class="hidden inline-flex items-center gap-1.5 bg-[#5C3211] text-white px-3 py-1 rounded-full text-sm shadow-sm">
                                    <i class="fas fa-star"></i>
                                    <span class="font-semibold">4.4</span>
                                    <i id="cancelRating" class="fas fa-xmark cursor-pointer hover:scale-110 transition-transform"></i>
                                </div>
                                <div id="afterImage" class="hidden inline-flex items-center gap-1.5 bg-[#5C3211] text-white px-3 py-1 rounded-full text-sm shadow-sm">
                                    <i class="fas fa-image"></i>
                                    <span class="font-semibold">selong_belanak_review.jpg</span>
                                    <i id="cancelImage" class="fas fa-xmark cursor-pointer hover:scale-110 transition-transform"></i>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mb-0">
                                <input type="text"
                                    id="reviewTextInput" placeholder="Please refrain from using harsh or inappropriate language"
                                    class="flex-1 bg-transparent border-0 p-0 text-sm font-normal text-[#5C3211] placeholder:text-[#5C3211] placeholder:opacity-60 focus:outline-none focus:ring-0 focus:border-0 mr-3">
                                    <div class="flex gap-3 text-lg">
                                    <i id="closeReview" class="fas fa-xmark text-[#5C3211] hover:opacity-60 cursor-pointer transition-opacity"></i>
                                    <i class="fas fa-paper-plane text-[#5C3211] hover:opacity-60 cursor-pointer transition-opacity"></i>
                                </div>
                            </div>
                            <hr class="border-[#5C3211] opacity-60">
                            <div class="flex gap-3 text-lg mt-3 mb-4">
                                <i id="openRating" class="fas fa-star text-[#5C3211] hover:opacity-60 cursor-pointer transition-opacity"></i>
                                <i id="openImage" class="fas fa-image text-[#5C3211] hover:opacity-60 cursor-pointer transition-opacity"></i>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-[#5C3211] mb-4">
                    
                    <div class="space-y-8">
                        <div>
                            <div class="mb-2">
                                <p class="font-semibold text-[#5C3211]">ihdal_f <span class="text-xs text-[#5C3211] font-normal ml-2">4 hour ago</span></p>
                                <div class="flex items-center text-yellow-500 text-sm">
                                    <i class="fas fa-star"></i>
                                    <span class="ml-1 font-semibold text-[#5C3211]">4.4</span>
                                </div>
                            </div>
                            <p class="text-base text-[#5C3211] mb-4 leading-relaxed">
                                Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. Pantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan deretan warung yang menyajikan makanan lokal dan minuman segar.
                            </p>
                            <img src="<?= base_url('Assets/review_selong_belanak.png') ?>" alt="Review Image" class="rounded-xl w-80 h-52 object-cover shadow-md mb-3">
                        </div>
                    </div> 
                </div>
            </div>

            <div id="ratingModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
                <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 w-full max-w-lg relative text-[#5C3211]">
                    <div class="border border-[#5C3211] rounded-xl p-6 relative">
                        <button id="closeRating" class="absolute top-3 left-3 w-7 h-7 rounded-full border border-[#5C3211] flex items-center justify-center text-[#8E5E38] hover:bg-gray-100 hover:text-[#8E5E38] transition focus:outline-none">
                            <i class="fas fa-xmark text-base"></i>
                        </button>
                        <div class="text-center">
                            <h2 class="text-xl font-bold mt-0 mb-2">Rating</h2>
                            <p class="opacity-80 mb-10 font-normal max-w-xs mx-auto">
                                You can give rating from 1 to 5. Decimal is allowed.
                            </p>
                            <input type="text"
                                id="ratingInput"
                                placeholder="Example 4.5"
                                class="rating-input block w-3/5 mx-auto border-0 border-b-2 border-[#5C3211]/60 text-center pt-2 px-2 pb-0 text-[#5C3211] placeholder:text-[#5C3211] placeholder:opacity-60 placeholder:font-light focus:outline-none focus:ring-0 focus:border-[#5C3211] mb-12">
                            <button id="openAfterRating" class="block mx-auto bg-[#5C3211] text-white px-7 py-1 rounded-full shadow-md hover:bg-opacity-80 transition font-semibold text-lg tracking-wider">
                                OK
                            </button>
                        </div>
                    </div> 
                </div> 
            </div>

            <!-- 'DISINI JUGA ADA YG DIUBAH, COPY LANGSUNG SATU DIV' -->
            <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 p-4 hidden">
                <div class="bg-white p-4 rounded-2xl shadow-2xl border border-[#5C3211]/30 w-full max-w-lg relative text-[#5C3211]">
                    <div class="border border-[#5C3211] rounded-xl p-6 relative">
                        <button id="closeImage" class="absolute top-3 left-3 w-7 h-7 rounded-full border border-[#5C3211] flex items-center justify-center text-[#5C3211] hover:bg-gray-100 hover:text-[#8E5E38] transition focus:outline-none">
                            <i class="fas fa-xmark text-base"></i>
                        </button>
                        <div class="text-center">
                            <h2 class="text-xl font-bold mt-0 mb-2">Add Photos</h2>
                            <p class="opacity-80 mb-6 font-normal max-w-xs mx-auto">
                                You can photo up to 5. The photo can be jpg or png.
                            </p>
                            <div class="flex items-center justify-center text-center pt-2 px-2 pb-8">
                                <label for="fileUpload" class="flex items-center gap-2 cursor-pointer group py-4 pb-2">
                                    <i class="fa-solid fa-arrow-up-from-bracket text-lg text-[#5C3211]/60 transition-colors group-hover:text-[#5C3211]"></i>
                                    <span class="text-lg font-medium text-[#5C3211] opacity-60 group-hover:opacity-100 transition pt-1">Upload</span>
                                    <input type="file" id="fileUpload" class="hidden">
                                </label>
                            </div>
                            <input type="file" id="fileUpload" class="hidden">
                            <button id="openAfterImage" class="block mx-auto bg-[#5C3211] text-white px-7 py-1 rounded-full shadow-md hover:bg-opacity-80 transition font-semibold text-lg tracking-wider">
                                OK
                            </button>
                        </div>
                    </div> 
                </div> 
            </div>

            <div id="notification" class="header mb-5 hidden">
                <h1 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Notifications</h1>
                <div class="bg-white text-[#5C3211] rounded-xl p-6 shadow-md max-w-3xl mx-auto border border-[#F0D3B3]">
                    <h3 class="font-semibold mb-1 text-lg">
                        New place Approved
                    </h3>
                    <p class="pt-0 ">
                        Thank you for submitting your place. Request for "Bukit Merese" has been approved. <br>You can search for "Bukit Merese" from now on.
                    </p>
                    <p class="font-light text-sm mt-4">
                        10:30, July 28, 2025
                    <hr class="my-2">
                    <h3 class="font-semibold mb-1 text-lg">
                        New place Denied
                    </h3>
                    <p class="pt-0 ">
                        Thank you for submitting blblblbl (nd tau mau nyebutnya apa). Request for “Bukit Merese” has been denied. Please check the information you provide. 
                    </p>
                    <p class="font-light text-sm mt-4">
                        10:30, July 28, 2025
                    <hr class="my-2">
                    <h3 class="font-semibold mb-1 text-lg">
                        Claim Approved
                    </h3>
                    <p class="pt-0 ">
                        Thank you for submitting blblblbl (nd tau mau nyebutnya apa). Claim for “RM Sumber Rejeki” has been approved. You can edit the information about the culinary site such as place description, menu and promo from now on. 
                    </p>
                    <p class="font-light text-sm mt-4">
                        10:30, July 28, 2025
                    <hr class="my-2">
                    <h3 class="font-semibold mb-1 text-lg">
                        Claim Denied
                    </h3>
                    <p class="pt-0 ">
                        Thank you for submitting blblblbl (nd tau mau nyebutnya apa). Claim for “RM Sumber Rejeki” has been denied. The information provided did not enough to clarify whether or not you are the owner of the culinary site. You can try to provide more supporting documents.
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
            <div id="profil" class="header mb-5 hidden">
                <div id="containerProfile" class="bg-[#FFFFFF] rounded-xl p-4 flex items-center justify-between shadow-md overflow-hidden mt-8 border border-[#F0D3B3]">
                    <div id="profilPage" class="flex items-center w-full relative">
                        <button id="editProfileBtn" class="absolute top-4 right-4 bg-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition">Edit</button>
                        <img src="<?= base_url('Assets/profil.png') ?>" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">
                        <div class="ml-6 flex flex-col">
                            <div class="w-24 bg-blue-500 text-align-center text-white rounded-full px-2 py-1 flex items-center gap-2 mb-2">
                                <i class="fas fa-star text-base font-semibold"></i>
                                <span class="pt-1">Owner</span>
                            </div>
                            <span class="text-5xl font-normal text-[#5C3211]">Username</span>
                            <div class="flex items-center mt-1 gap-4">
                                <span class="text-xl text-[#5C3211] font-normal">Nama Lengkap</span>
                                <span class="text-lg text-[#5C3211] font-light">email@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div id="editProfilePage" class="flex items-center w-full relative hidden">
                        <div class="absolute top-4 right-4 flex items-center gap-3">
                            <button id="cancelEditBtn" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white px-7 py-1 rounded-full shadow font-semibold transition">
                                Cancel
                            </button>
                            <button id="saveEditBtn" class="border border-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition">
                                Save change
                            </button>
                        </div>
                        
                        <img src="<?= base_url('Assets/profil.png') ?>" alt="Profile" class="w-52 h-52 rounded-full object-cover shadow mx-6 my-6">                       
                        <div class="ml-6 flex flex-col">
                            <div class="relative">
                                <input type="text" id="editUsername" class="text-5xl py-2 font-normal text-[#5C3211] border border-[#5C3211] rounded-lg focus:outline-none focus:border-[#FF9800] px-3 pt-3" placeholder="Username" />                           
                                <p id="usernameError" class="absolute top-full mt-1 text-sm text-[#FF0000] hidden">
                                    Username must be 8-20 characters
                                </p>
                            </div>
                            <div class="flex items-center mt-6 gap-4"> <input type="text" id="editFullName" class="text-xl py-2 text-[#5C3211] font-normal border border-[#5C3211] rounded-lg focus:outline-none focus:border-[#FF9800] px-3 pt-3" placeholder="Nama Lengkap" />
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

                        <div class="mt-12">
                            <div class="mb-2">
                                <span class="text-xl font-semibold">Delete account</span>
                            </div>
                            <p class="text-base font-light">Permanently delete your account</p>
                            <button id="deleteAccountBtn" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white px-7 py-1 rounded-full shadow font-semibold flex items-center gap-2 transition mt-4">
                                Delete account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>