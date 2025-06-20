<div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-[#F0B845]">
    <div class="mt-2 px-6 md:px-8">
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