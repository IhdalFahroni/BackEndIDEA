<div id="claimForm" class="header mb-5 hidden fixed top-0 left-0 w-full h-full bg-black/60 flex justify-center items-center z-[1000]">
    <h2 class="text-white text-center text-3xl md:text-5xl font-bold mb-5 [text-shadow:1px_1px_3px_rgba(0,0,0,0.5)]">
        Claim culinary site
    </h2>
     <div class="modal-close-btn" data-close-modal="claimForm">
        <i class="fa-solid fa-xmark text-lg text-[#FFFFFF]"></i>
    </div>
    <p class="text-xs font-light text-black text-center bg-white p-2 rounded-lg mb-6 shadow-sm border border-yellow-200">
        All questions (<span class="text-[#FF0000]">*</span>) must be answered. Once submitted, answers cannot be changed. <br>
        Please check the answers are correct before submitting.
    </p>
    <form>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
            <label for="full_name">Full name<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="full_name"
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
            <label for="phone_number">Phone number<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="phone_number" 
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
            <label for="email">Email<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="email" 
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
            <label for="taxpayer">Taxpayer Identification Number<span class="text-[#FF0000]">*</span></label>
            <input type="text" id="taxpayer" 
                class="w-full bg-transparent border-b border-[#D1D5DB] py-2 px-[0.1rem] outline-none transition-colors duration-200 ease-in-out focus:border-[#F59E0B] placeholder-[#9CA3AF]"
                required placeholder="Answer" />
        </div>
        <div class="bg-white rounded-xl p-5 mb-4 shadow-[-2px_2px_3px_0_rgba(0,0,0,0.1),-1px_1px_2px_0_rgba(0,0,0,0.06)] border border-[#F0D3B3]">
            <label>Supporting document(s)</label>
            <div id="fileUploadVisualClaim"
                class="group flex border-b-0 pb-0 items-center py-2 cursor-pointer transition-all duration-200">
                <svg id="uploadIcon" xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5 flex-shrink-0 mr-2 text-gray-400 transition-colors group-hover:text-[#F59E0B] relative top-1" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <input type="text" id="fileUploadPlaceholderClaim" placeholder="Upload File(s)" readonly 
                    class="flex-grow bg-transparent p-0 pt-3 border-none outline-none text-gray-600
                            placeholder:text-gray-400 placeholder:transition-colors 
                            group-hover:placeholder:text-[#F59E0B] group-hover:placeholder:underline" />
            </div>
            <input id="file-uploadClaim" type="file" multiple class="hidden"/>
            <p id="file-listClaim" class="text-xs text-gray-500 mt-2"></p> 
        </div>

        <div class="mt-8 mb-4 max-w-xs mx-auto text-center"> 
            <button type="submit" class="bg-[#FF9800] text-white hover:bg-[#FF9800]/80 hover:text-white/80 px-7 py-1 rounded-full shadow font-semibold transition duration-200">
                Submit
            </button>
        </div>
    </form>
</div>