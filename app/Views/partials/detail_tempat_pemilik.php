<h1 class="text-3xl md:text-4xl font-bold text-[#FFFFFF] text-center mb-8 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">Selong Belanak Beach</h1>

<!-- punya kuliner -->
<div class="flex justify-end items-center space-x-3 mb-3">
    <div id="openEdit" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
        Edit
    </div>
    <div id="saveEdit" class="hidden bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
        Save
    </div>
</div>

<div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845]">
    <div class="flex flex-col md:flex-row gap-6">
        <div class="md:w-1/3 flex-shrink-0">
            <img src="<?= base_url('Assets/SelongBelanakPic.png') ?>" alt="Selong Belanak Beach" class="rounded-xl w-full h-auto object-cover shadow-md mb-3">
            <!-- ini ada di wisata dan kuliner-->
            <p id="alamat" class="text-sm text-[#5C3211] mb-1 font-bold">
                Jl. Mareje, Panjisari, Kec. Praya, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83511
            </p>
            <!-- ini ada di kuliner aja-->
            <textarea id="editAlamat"
                type="text" 
                class="hidden text-sm text-[#5C3211] opacity-50 font-bold w-full bg-transparent focus:outline-none"
                >Jl. Mareje, Panjisari, Kec. Praya, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83511</textarea>
            </textarea> 
            <!-- ini ada di wisata dan kuliner-->
            <a id="googleMaps" href="#" target="_blank" class="text-[#5C3211] text-sm font-medium hover:underline flex items-center gap-1 mt-auto">
                <span class="relative top-0.5">Google Maps</span>
                <i class="fa-solid fa-location-dot"></i>
            </a>
            <!-- ini ada di kuliner aja-->
            <textarea id="editGmaps"
                class="hidden text-[#5C3211] opacity-50 text-sm font-medium w-full bg-transparent focus:outline-none flex items-center">Google Maps
            </textarea>
            <!-- ini ada di kuliner aja -->
            <div class="flex items-center gap-x-3 mt-3"> 
                <div id="openMenu" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Menu
                </div>
                <div id="openPromo" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Promo
                </div>
                <div id="editMenu" class="hidden bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Edit Menu
                </div>
                <div id="editPromo" class="hidden bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Edit Promo
                </div>
            </div>
        </div>
        <div class="md:w-2/3">
            <div class="text-yellow-500 my-1 text-lg rating" data-rating="4.5"></div>
            <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-3 mt-4">
                <p class="text-[#5C3211] text-base font-light">Kategori</p>
                <p class="text-[#5C3211] font-medium text-base">Tempat wisata</p>
                
                <!-- ini di kuliner aja -->
                <p class="text-[#5C3211] font-medium text-base">Tempat kuliner</p>

                <!-- ini di wisata aja -->
                <p class="text-[#5C3211] text-base font-light">Tiket</p>
                <p class="text-[#5C3211] font-medium text-base">Rp5.000</p>

                <p class="text-[#5C3211] text-base mt-0.5 font-light">Deskripsi</p>
                <p class="text-base text-[#5C3211] leading-relaxed text-justify">
                    Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. Pantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan deretan warung yang menyajikan makanan lokal dan minuman segar. Pemandangan sunset di Pantai Selong Belanak menjadi daya tarik utama.
                </p>
                <!-- ini di kuliner aja -->
                <textarea id="editDeskripsi" 
                    class="hidden text-base text-[#5C3211] opacity-50 leading-relaxed text-justify w-full focus:outline-none rounded-lg" 
                    rows="6">RM Sumber Rejeki adalah rumah makan khas Nusantara yang menyajikan beragam masakan rumahan dengan cita rasa autentik. Menu andalan di RM Sumber Rejeki meliputi ayam goreng, ikan bakar, sayur asem, tempe penyet, dan sambal khas yang pedas menggugah selera. Suasana rumah makan yang sederhana namun nyaman menjadikan pengalaman bersantap semakin menyenangkan, cocok untuk makan siang keluarga maupun makan bersama rombongan wisata. Pelayanan yang ramah dan cepat juga menjadi nilai tambah dari RM Sumber Rejeki, membuat banyak pelanggan datang."
                </textarea>
            </div>
        </div>
    </div>
</div>
<!-- setelah ini review -->
<?php include APPPATH . 'Views/partials/review_dan_modalnya.php'; ?>