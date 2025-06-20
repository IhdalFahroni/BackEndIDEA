<h1 class="text-3xl md:text-4xl font-bold text-[#FFFFFF] text-center mb-8 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Selong Belanak Beach</h1>

<!--ini punya kuliner-->
<div class="flex justify-end items-center space-x-3 mb-3">
    <span class="text-base font-bold text-white text-shadow-sm" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.4);">Own this place?</span>
    <div id="openClaim" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
        Claim
    </div>
</div>

<div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845]">
    <div class="flex flex-col md:flex-row gap-6">
        <div class="md:w-1/3 flex-shrink-0"><img src="<?= base_url('Assets/SelongBelanakPic.png') ?>" alt="Selong Belanak Beach" class="rounded-xl w-full h-auto object-cover shadow-md mb-3">
            <p class="text-sm text-[#5C3211] mb-1 font-bold">Selong Belanak, Kec. Praya Bar., Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83572</p>
            <a href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                <span class="relative top-0.5">Google Maps</span>
                <i class="fa-solid fa-location-dot"></i>
            </a>
            <!-- untuk kuliner -->
            <div class="flex items-center gap-x-3 mt-3">
                <div id="openMenu" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Menu
                </div>
                <div id="openPromo" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Promo
                </div>
            </div>
        </div>
        <div class="md:w-2/3">
            <div class="text-yellow-500 my-1 text-lg rating" data-rating="4.5"></div>
            <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-3 mt-4">
                <p class="text-[#5C3211] text-base font-light">Kategori</p>
                <p class="text-[#5C3211] font-medium text-base">Tempat wisata</p>

                <!-- if session['kategori=culinary'] -->
                <!-- punya kuliner -->
                <p class="text-[#5C3211] font-medium text-base">Tempat kuliner</p>

                <!-- punya wisata aja -->
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
<!-- setelah ini review -->
<?php include APPPATH . 'Views/partials/review_dan_modalnya.php'; ?>