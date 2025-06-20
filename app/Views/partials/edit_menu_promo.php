<div id="editMenuModal" class="hidden modal-overlay fixed inset-0 bg-black bg-opacity-50 justify-center items-center z-50 p-4">

    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg md:max-w-xl relative">

        <div class="p-6 md:p-8">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-1/3 flex-shrink-0 relative">
                    <img src="../Assets/Pelecing.png"
                            alt="Pelecing Kangkung"
                            class="w-32 h-32 object-cover rounded-md aspect-square opacity-50">
                    <input type="file" id="editMenuImage" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" title="Change image">
                    <label for="editMenuImage" class="absolute inset-0 flex pr-10 pb-4 items-center justify-center cursor-pointer">
                        <i class="fas fa-image"></i>
                    </label>
                </div>

                <div class="md:w-2/3 flex flex-col">
                    <input type="text" value="Pelecing Kangkung" class="text-2xl md:text-xl font-bold text-[#5C3211] mb-2 opacity-50 bg-transparent focus:outline-none w-full"/>
                    <textarea class="text-md font-light text-[#5C3211] leading-relaxed mb-3 opacity-50 bg-transparent border-none focus:outline-none resize-none w-full" rows="2">Kale (kangkung) blanched (or steamed) and served cold with spicy tomato chili sauce</textarea>
                    <input type="text" value="Rp10.000/serving" class="text-lg font-normal text-[#5C3211] mt-2 mb-2 opacity-50 bg-transparent w-full border-none focus:outline-none" />
                </div>
            </div>
            <hr class="border-[#5C3211] mb-4">

            <div id="addMenu" class="hidden flex flex-col gap-4 mb-4">
                <label for="addMenuImageInput" class="w-full h-40 rounded-lg flex flex-col cursor-pointer">
                    <div id="addImagePlaceholder">
                        <i class="fas fa-image text-[#5C3211] text-4xl opacity-50 hover:opacity-100"></i>
                        <p class="text-[#5C3211] mt-2 opacity-50 hover:opacity-100">Click to upload image</p>
                    </div>
                    <img id="addImagePreview" src="" class="hidden w-full h-full object-cover rounded-lg" alt="New menu preview"/>
                </label>
                <input type="file" id="addMenuImageInput" accept="image/*" class="hidden">

                <input type="text" placeholder="Menu Name" class="text-lg font-semibold text-[#5C3211] rounded-md focus:outline-none placeholder:text-[#5C3211] opacity-50 w-full"/>
                
                <textarea class="text-md font-light text-[#5C3211] rounded-md border-none focus:outline-none placeholder:text-[#5C3211] opacity-50 resize-none w-full" rows="2" placeholder="Description"></textarea>
                
                <input type="text" placeholder="Price (e.g., Rp 25.000)" class="text-lg font-normal text-[#5C3211] rounded-md w-full border-none focus:outline-none placeholder:text-[#5C3211] opacity-50" />
            </div>

            <div id="addMenuBtnContainer" class="flex justify-end">
                <button id="addMenuBtn" title="Add new menu" class="text-[#FF9800] hover:text-[#FF9800]/80 transition text-xl">
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
            </div>
            
            <hr class="border-[#5C3211] my-6">

            <div class="flex justify-center">
                <button id="closeEditMenu" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
<div id="editPromoModal" class="hidden modal-overlay fixed inset-0 bg-black bg-opacity-50 justify-center items-center z-50 p-4">
    
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg md:max-w-xl relative">

        <div class="p-6 md:p-8">
            <div class="md:w-2/3 flex flex-col">
                <input type="text" value="Diskon 30%" class="text-2xl md:text-xl font-bold text-[#5C3211] mb-2 opacity-50 bg-transparent focus:outline-none w-full"/>
                <textarea class="text-md font-light text-[#5C3211] leading-relaxed opacity-50 bg-transparent border-none focus:outline-none resize-none w-full" rows="1">Every purchase of 2 servings Pelecing Kangkung</textarea>
                <input type="text" value="Valid until: 2 December 2025" class="text-lg font-normal text-[#5C3211] mb-2 opacity-50 bg-transparent w-full border-none focus:outline-none" />
            </div>
            <hr class="border-[#5C3211] mb-4">

            <div id="addPromo" class="hidden flex flex-col gap-4 mb-4">
                <input type="text" placeholder="Promo Name" class="text-2xl md:text-xl font-bold text-[#5C3211] mb-2 opacity-50 bg-transparent focus:outline-none w-full placeholder:text-[#5C3211] opacity-50"/>
                
                <textarea class="text-md font-light text-[#5C3211] leading-relaxed opacity-50 bg-transparent border-none focus:outline-none resize-none w-full placeholder:text-[#5C3211] opacity-50" rows="1" placeholder="Description"></textarea>
                
                <input type="text" value="Valid until: (e.g., 31 December 2025)" class="text-lg font-normal text-[#5C3211] mb-2 opacity-50 bg-transparent w-full border-none focus:outline-none" />
            </div>

            <div id="addPromoBtnContainer" class="flex justify-end">
                <button id="addPromoBtn" title="Add new menu" class="text-[#FF9800] hover:text-[#FF9800]/80 transition text-xl">
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
            </div>
            <hr class="border-[#5C3211] mb-4">

            <div class="flex justify-center">
                <div id="closeEditPromo" class="bg-[#FF9800] text-white font-bold hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full">
                    Save
                </div>
            </div>
        </div>
    </div>
</div>