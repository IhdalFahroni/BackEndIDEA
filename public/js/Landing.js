/**
 * File JavaScript Utama untuk Aplikasi LombokREC.
 * * Catatan:
 * - Kode ini adalah file eksternal dan tidak bisa menjalankan PHP.
 * - Data dari PHP (seperti base_url) diambil dari atribut `data-*` pada tag <body>.
 * - Logika untuk status aktif tombol filter sepenuhnya ditangani oleh PHP di sisi server.
 */

// Ambil data URL dari atribut data-* di tag <body>.
// Ini adalah "jembatan" antara PHP dan JavaScript.
const BASE_URL = document.body.dataset.baseUrl || "";
const LANDING_URL = document.body.dataset.landingUrl || "";

// Jalankan semua kode setelah seluruh dokumen HTML selesai dimuat.
document.addEventListener("DOMContentLoaded", () => {
  /**
   * BAGIAN 1: SLIDESHOW DI HALAMAN UTAMA
   */
  const headerElement = document.querySelector(".header");
  const heroElement = document.querySelector(".hero");
  const heroTextElement = document.getElementById("hero-text");

  // Hanya jalankan slideshow jika elemen-elemennya ada di halaman saat ini.
  if (headerElement && heroElement && heroTextElement) {
    const slidesData = [
      {
        image: "LandingPagePic1.jpg",
        text: "Discover the beauty of Lombok<br>from stunning destinations<br>to delicious local cuisine",
        positionClass: "justify-center items-center text-center",
      },
      {
        image: "LandingPagePic2.png",
        text: "Thousands of beaches to explore.",
        positionClass: "justify-end items-center text-right",
      },
      {
        image: "LandingPagePic3.png",
        text: "Stunning natural landscapes.",
        positionClass: "justify-start items-center text-left",
      },
      {
        image: "LandingPagePic4.png",
        text: "Rich cultural heritage.",
        positionClass: "justify-start items-end text-left",
      },
      {
        image: "LandingPagePic5.png",
        text: "Various local traditions.",
        positionClass: "justify-end items-start text-right",
      },
      {
        image: "LandingPagePic6.png",
        text: "Delightful authentic cuisine.",
        positionClass: "justify-start items-center text-left",
      },
    ];

    const allPositionClasses = [
      "justify-center",
      "justify-start",
      "justify-end",
      "items-center",
      "items-start",
      "items-end",
      "text-center",
      "text-left",
      "text-right",
    ];
    function preloadImages() {
      slidesData.forEach((slide) => {
        const img = new Image();
        const imageUrl = `${BASE_URL}Assets/${slide.image}`;
        img.src = imageUrl;
      });
    }
    preloadImages(); // Panggil fungsi preloading

    let currentIndex = 0;
    const transitionDuration = 500;
    const slideInterval = 5000;

    const changeSlide = () => {
      heroTextElement.classList.add("opacity-0");
      setTimeout(() => {
        const currentSlide = slidesData[currentIndex];
        // Bangun URL gambar yang benar menggunakan BASE_URL
        const imageUrl = `${BASE_URL}Assets/${currentSlide.image}`;

        headerElement.style.backgroundImage = `url('${imageUrl}')`;
        heroTextElement.innerHTML = currentSlide.text;

        heroElement.classList.remove(...allPositionClasses);
        heroElement.classList.add(...currentSlide.positionClass.split(" "));

        heroTextElement.classList.remove("opacity-0");
        currentIndex = (currentIndex + 1) % slidesData.length;
      }, transitionDuration);
    };

    changeSlide(); // Tampilkan slide pertama
    setInterval(changeSlide, slideInterval); // Mulai interval slideshow
  }

  /**
   * BAGIAN 2: FUNGSI PENCARIAN
   */
  // const searchIcon = document.getElementById("searchIcon");
  // const searchBox = document.querySelector(".search-box");

  // const performSearch = () => {
  //   debugger;
  //   const searchTerm = searchBox.value.trim();
  //   if (searchTerm) {
  //     // Redirect ke halaman dengan parameter pencarian menggunakan LANDING_URL
  //     window.location.href = `${LANDING_URL}?search=${encodeURIComponent(
  //       searchTerm
  //     )}`;
  //   }
  // };

  // if (searchIcon && searchBox) {
  //   searchIcon.addEventListener("click", performSearch);
  //   searchBox.addEventListener("keyup", (e) => {
  //     if (e.key === "Enter") {
  //       performSearch();
  //     }
  //   });
  // }

  /**
   * BAGIAN 3: FUNGSI RATING BINTANG
   */
  const generateStars = (element) => {
    const rating = parseFloat(element.getAttribute("data-rating"));
    if (isNaN(rating)) return;

    let starsHTML = "";
    for (let i = 1; i <= 5; i++) {
      if (i <= rating) {
        // Bintang Penuh
        starsHTML += '<i class="fa-solid fa-star"></i>';
      } else if (i - 0.5 <= rating) {
        // Bintang Setengah
        starsHTML += '<i class="fa-solid fa-star-half-alt"></i>';
      } else {
        // Bintang Kosong
        starsHTML += '<i class="fa-regular fa-star"></i>';
      }
    }
    element.innerHTML = starsHTML;
  };

  // Terapkan fungsi generateStars ke semua elemen dengan kelas .rating
  document.querySelectorAll(".rating").forEach(generateStars);
});
