<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Admin | LombokRec</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/homeAdmin.js') ?>"></script>
    <style>
        ::-webkit-scrollbar {width: 6px;}
        ::-webkit-scrollbar-track {background: #F8F9FA}
        ::-webkit-scrollbar-thumb {background: #FFC107;border-radius: 3px;}
        ::-webkit-scrollbar-thumb:hover {background: #FF9800;}
    </style>
</head>
<body class="bg-[#FFFFFF] font-josefin flex min-h-screen">

    <aside class="text-[#FFC107] w-20 flex flex-col items-center fixed top-0 left-0 h-screen z-20 bg-[#FFFFFF]">
        <div class="p-5">
            <div id="hamburgerBtn" class="w-12 h-12 mt-2 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
                <i class="fa-solid fa-bars text-xl "></i>
            </div>
        </div>

        <div class="flex-1 p-5 space-y-6">
            <a href="<?= base_url('/homeadmin') ?>" class="w-12 h-12 rounded flex items-center justify-center font-bold cursor-pointer transition hover:scale-110 hover:bg-gray-100">
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
            <a href="<?= base_url('/homeadmin') ?>" class="flex items-center rounded cursor-pointer transition hover:scale-110 hover:bg-gray-100">
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
        <div class="bg-[linear-gradient(to_bottom,#FFC107_50px,#F8F9FA_300px)] rounded-tl-xl min-h-screen p-6 md:p-8 shadow-2xl w-full">
            <div id="header" class="header text-center mb-5 ">
                <h1 class="text-white text-3xl md:text-5xl font-bold mb-5 pt-10 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Where do you want to go?</h1>
                <div class="filter-tabs flex justify-center gap-5 mb-5">
                    <button class="filter-button py-2 px-6 bg-white rounded-full text-[#FF9800] cursor-pointer transition flex items-center gap-2 shadow-md">
                        <i class="fa-solid fa-location-dot"></i> <span class="relative top-px">Tourist destination</span>
                    </button>
                    <button class="filter-button py-2 px-6 bg-white rounded-full text-[#FF9800] cursor-pointer transition flex items-center gap-2 shadow-md">
                        <i class="fa-solid fa-utensils"></i> <span class="relative top-px">Culinary</span>
                    </button>
                </div>
                <div class="search-container flex justify-center">
                    <div class="relative w-full max-w-[500px]">
                        <input type="text" class="search-box w-full py-2.5 px-6 pr-12 border-none rounded-full bg-white text-base text-[#FF8400] outline-none shadow-md placeholder:text-[#5C3211]/50" placeholder="Search...">
                        <span id="searchIcon" class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center justify-center w-8 h-8 rounded-full cursor-pointer transition">
                            <i class="fa-solid fa-magnifying-glass text-[#F4A261] hover:opacity-45 text-lg"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div id="awal" class="space-y-6 text-[#5C3211]">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 flex-grow">
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        <img src="<?= base_url('Assets/SelongBelanakPic.png') ?>" alt="Selong Belanak Beach" class="w-full h-52 object-cover">
                        <div class="p-4 flex flex-col flex-1 font-jaldi">
                            <div class="text-lg font-bold mb-0">Selong Belanak Beach, Central Lombok</div>
                            <div class="flex justify-between items-center mt-2">
                                <div class="text-yellow-500 my-1 text-sm rating" data-rating="3.5"></div>
                                <div class="text-xs font-medium hover:underline">See details</div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        <img src="<?= base_url('Assets/RinjaniPic.png') ?>" alt="Rinjani Mountain" class="w-full h-52 object-cover">
                        <div class="p-4 flex flex-col flex-1 font-jaldi">
                            <div class="text-lg font-bold mb-2.5">Rinjani Mountain, East Lombok</div>
                            <div class="flex justify-between items-center mt-auto">
                                <div class="text-yellow-500 my-1 text-sm rating" data-rating="3.5"></div>
                                <div class="text-xs font-medium hover:underline">See details</div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        <img src="<?= base_url('Assets/GiliMenoPic.png') ?>" alt="Gili Meno" class="w-full h-52 object-cover">
                        <div class="p-4 flex flex-col flex-1 font-jaldi">
                            <div class="text-lg font-bold mb-2.5">Gili Meno, North Lombok</div>
                            <div class="flex justify-between items-center mt-auto">
                                <div class="text-yellow-500 my-1 text-sm rating" data-rating="3.5"></div>
                                <div class="text-xs font-medium hover:underline">See details</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 flex-grow">
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        <img src="<?= base_url('Assets/RinjaniPic.png') ?>" alt="Rinjani Mountain" class="w-full h-52 object-cover">
                        <div class="p-4 flex flex-col flex-1 font-jaldi">
                            <div class="text-lg font-bold mb-2.5">Rinjani Mountain, East Lombok</div>
                            <div class="flex justify-between items-center mt-auto">
                                <div class="text-yellow-500 my-1 text-sm rating" data-rating="3.5"></div>
                                <div class="text-xs font-medium hover:underline">See details</div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        <img src="<?= base_url('Assets/RinjaniPic.png') ?>" alt="Rinjani Mountain" class="w-full h-52 object-cover">
                        <div class="p-4 flex flex-col flex-1 font-jaldi">
                            <div class="text-lg font-bold mb-2.5">Rinjani Mountain, East Lombok</div>
                            <div class="flex justify-between items-center mt-auto">
                                <div class="text-yellow-500 my-1 text-sm rating" data-rating="3.5"></div>
                                <div class="text-xs font-medium hover:underline">See details</div>
                            </div>
                        </div>
                    </div>
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        <img src="<?= base_url('Assets/RinjaniPic.png') ?>" alt="Rinjani Mountain" class="w-full h-52 object-cover">
                        <div class="p-4 flex flex-col flex-1 font-jaldi">
                            <div class="text-lg font-bold mb-2.5">Rinjani Mountain, East Lombok</div>
                            <div class="flex justify-between items-center mt-auto">
                                <div class="text-yellow-500 my-1 text-sm rating" data-rating="5"></div>
                                <div class="text-xs font-medium hover:underline">See details</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button id="load-more-button" class="py-2 px-6 text-white font-bold rounded-full bg-[#FF9800] cursor-pointer transition flex items-center gap-2 shadow-md hover:opacity-50">
                        <span class="relative top-px">Load More</span>
                    </button>
                </div>
            </div>

            <div id="afterSearch" class="space-y-4 hidden">
                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/SelongBelanakPic.png') ?>" alt="Resort" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211]">Selong Belanak Beach, Central Lombok</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="5"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Belanak Beach is one of the most stunning beach destinations in Lombok, West Nusa Tenggara. This beach is perfect for travelers looking to relax, soak up the sun, or learn to surf—as the waves at the end of the beach are calm enough for beginners. Along the beach, visitors can also find a row of stalls serving local food and refreshing drinks. The sunset view at Selong Belanak Beach is the main attraction.
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5 hover:underline">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/SelongSelo.png') ?>" alt="Selong Selo Restaurant" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211]">Selong Selo Restaurant</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="5"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Selo, especially Aura Lounge & Bar, is a famous restaurant in South Lombok known for its stunning ocean views and authentic Indonesian cuisine. The restaurant offers delicious dishes prepared by renowned chefs, as well as a wide variety of drinks and cocktails.
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5 hover:underline">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/SelongSelo.png') ?>" alt="Karaoke" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211]">Karaoke</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="5"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Selo, especially Aura Lounge & Bar, is a famous restaurant in South Lombok known for its stunning ocean views and authentic Indonesian cuisine. The restaurant offers delicious dishes prepared by renowned chefs, as well as a wide variety of drinks and cocktails.
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5 hover:underline">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/SelongSelo.png') ?>" alt="Karaoke" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211]">Resort</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="4.5"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Selo, especially Aura Lounge & Bar, is a famous restaurant in South Lombok known for its stunning ocean views and authentic Indonesian cuisine. The restaurant offers delicious dishes prepared by renowned chefs, as well as a wide variety of drinks and cocktails.
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5 hover:underline">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button id="load-more-button" class="py-2 px-6 text-white font-bold rounded-full bg-[#FF9800] cursor-pointer transition flex items-center gap-2 shadow-md hover:opacity-50">
                        <span class="relative top-px">Load More</span>
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
</body>
</html>
