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