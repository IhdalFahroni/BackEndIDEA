<body class="text-[#ffffff] font-jaldi"data-base-url="<?= base_url() ?>" data-landing-url="<?= site_url('landing') ?>"></body>>

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