<?= $this->extend('partials/template') ; ?>

<?= $this->section('content') ; ?>
<body class="text-[#ffffff] font-jaldi">
    <div class="header h-screen relative text-white flex flex-col justify-between p-5">
        <nav class="top-nav text-right text-2xl my-2.5 mx-5">
            <a href="<?= base_url('/login') ?>" class="text-white no-underline text-2xl ml-2.5 font-bold hover:underline">Login</a>   |
            <a href="<?= base_url('/signup') ?>" class="text-white no-underline text-2xl ml-1 font-bold hover:underline">Sign Up</a>
        </nav>

        <div class="hero flex-1 flex transition-all duration-1000 ease-in-out p-5">
            <h1
                id="hero-text"
                class="text-4xl md:text-6xl font-semibold leading-relaxed inline-block p-5 rounded-lg text-white transition-opacity duration-500 ease-in-out font-josefin"> </h1>
        </div>

        <div class="h-10"></div>
    </div>

    <div class="about py-10 text-[#5C3211] text-center max-w-6xl mx-auto px-4 font-josefin">  <h2 class="text-5xl font-bold mb-2">About Lombok</h2>
        <p class="mb-5 text-lg leading-normal">Lombok is a beautiful island in Indonesia, known for its stunning natural landscapes, rich cultural heritage, and warm hospitality. The local traditions, influenced by the unique Sasak culture, are reflected in its vibrant festivals, music, and handicrafts. Its culinary delights, with bold flavors and aromatic spices, offer a true taste of Indonesian cuisine.</p>
        <div class="video-container mt-5 flex justify-center">
            <video controls autoplay muted loop class="w-11/12 max-w-[1000px] rounded-lg">
                <source src="<?= base_url('Assets/videoLombok.mp4') ?>" type="video/mp4"> Your browser does not support the video.
            </video>
        </div>
    </div>

    <main class="flex-1 overflow-y-auto mx-10">
        <div class="main-container min-h-screen p-6 md:p-8 w-full">
            <div id="header" class="header text-center mb-5 ">
                <?php include APPPATH . 'Views/partials/mainCards.php'; ?>
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
<?= $this->endSection(); ?>
