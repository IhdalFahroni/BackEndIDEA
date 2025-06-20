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
                <!-- punya wisata -->
                <p class="text-[#5C3211] font-medium text-base">Tempat wisata</p>

                <!-- punya kuliner -->
                 <p class="text-[#5C3211] font-medium text-base">Tempat kuliner</p>

                <!-- punya wisata -->
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