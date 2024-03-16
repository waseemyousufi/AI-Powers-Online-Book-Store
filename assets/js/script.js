let searchForm = document.querySelector(".search-form");

document.querySelector("#search-btn").onclick = () => {
  searchForm.classList.toggle("active");
};

window.onscroll = () => {
  if (window.scrollY > 95) {
    document.querySelector(".header .header-1").classList.add("active");
  } else {
    document.querySelector(".header .header-1").classList.remove("active");
  }
};

window.onload = () => {
  if (window.scrollY > 95) {
    document.querySelector(".header .header-1").classList.add("active");
  } else {
    document.querySelector(".header .header-1").classList.remove("active");
  }
};

let loginForm = document.querySelector(".login-form-container");

document.querySelector("#login-btn").onclick = () => {
  loginForm.classList.toggle("active");
};

document.querySelector("#close-login-btn").onclick = () => {
  loginForm.classList.remove("active");
};

var swiper = new Swiper(
  ".banner-slider",

  {
    spaceBetween: 10,
    loop: true,
    centeredSlides: false,
    autoplay: {
      delay: 9500,
      disableOnInteraction: false,
      reverseDirection: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      450: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 1,
      },
      1024: {
        slidesPerView: 1,
      },
    },
  }
);

var swiper = new Swiper(
  ".featured-slider",

  {
    spaceBetween: 30,
    loop: false,
    centeredSlides: false,
    // autoplay:{
    //     delay: 9500,
    //     disableOnInteraction:false,
    //     reverseDirection: true,
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      450: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 8,
      },
    },
  }
);

var swiper = new Swiper(
  ".authors-slider",

  {
    spaceBetween: 30,
    loop: false,
    centeredSlides: false,
    // autoplay:{
    //     delay: 9500,
    //     disableOnInteraction:false,
    //     reverseDirection: true,
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      450: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 6,
      },
    },
  }
);
