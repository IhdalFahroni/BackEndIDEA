<main class="flex-1overflow-y-auto mx-10">
        <div class="main-container min-h-screen p-6 md:p-8 w-full">
            <div id="header" class="header text-center mb-5 ">
                <div class="filter-tabs flex justify-center gap-5 mb-5">
                    <button class="filter-button-tourist py-2 px-6 bg-white rounded-full text-[#FF9800] cursor-pointer transition flex items-center gap-2 shadow-md">
                        <i class="fa-solid fa-location-dot"></i> <span class="relative top-px">Tourist destination</span>
                    </button>
                    <button class="filter-button-culinary py-2 px-6 bg-white rounded-full text-[#FF9800] cursor-pointer transition flex items-center gap-2 shadow-md">
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
                <?php for ($i=1; $i<=3; $i++) :?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 flex-grow">
                    <?php for ($j=1; $j<=3; $j++) :?>
                    <div class="destination-card bg-[#FFFFFF] rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl cursor-pointer flex flex-col">
                        <img src="<?= base_url('Assets/SelongBelanakPic.png') ?>" alt="Selong Belanak Beach" class="w-full h-52 object-cover">
                        <div class="p-4 flex flex-col flex-1 jaldi-font">
                            <div class="text-lg font-bold mb-0">Selong Belanak Beach, South Lombok</div>
                            <div class="flex justify-between items-center mt-2">
                                <div class="text-yellow-500 text-sm rating" data-rating="4.5"></div>
                                <div class="text-xs font-medium hover:underline">See details</div>
                            </div>
                        </div>
                    </div>
                    <?php endfor;?>
                </div>
                <?php endfor;?>
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
                            <h2 class="text-lg font-bold text-[#5C3211]">Resort</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="2"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Selo, khususnya Aura Lounge & Bar, adalah restoran terkenal di Lombok Selatan yang dikenal dengan pemandangan lautnya yang menakjubkan dan menu makanan Indonesia autentik. Restoran ini menawarkan hidangan lezat yang dibuat oleh chef terkenal, serta berbagai macam minuman dan koktail.
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/SelongSelo.png') ?>" alt="Selong Selo Restaurant" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211]">Selong Selo Restaurant</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="3.5"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Selo, khususnya Aura Lounge & Bar, adalah restoran terkenal di Lombok Selatan yang dikenal dengan pemandangan lautnya yang menakjubkan dan menu makanan Indonesia autentik. Restoran ini menawarkan hidangan lezat yang dibuat oleh chef terkenal, serta berbagai macam minuman dan koktail.
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/SelongSelo.png') ?>" alt="Karaoke" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211]">Karaoke</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="4.5"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Selo, khususnya Aura Lounge & Bar, adalah restoran terkenal di Lombok Selatan yang dikenal dengan...
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-4 flex items-center shadow-md border border-[#F0D3B3] gap-4">
                    <img src="<?= base_url('Assets/SelongSelo.png') ?>" alt="Karaoke" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                    <div class="flex-grow flex flex-col self-stretch">
                        <div>
                            <h2 class="text-lg font-bold text-[#5C3211]">Resort</h2>
                            <div class="text-yellow-500 my-1 text-sm rating" data-rating="5"></div>
                            <p class="text-sm text-[#5C3211] line-clamp-2">
                                Selong Selo, khususnya Aura Lounge & Bar, adalah restoran terkenal di Lombok Selatan yang dikenal dengan...
                            </p>
                        </div>
                        <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                            <span class="relative top-0.5">Google Maps</span>
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>