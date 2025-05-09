// ---------------- Checks script linking ----------------
console.log("script.js Linked");

// ---------------- Navbar opening on-click ----------------
var navMenu = document.getElementById("nav-menu");
var navButtons = navMenu.getElementsByClassName("button");
var navHidden = true;

function openCloseMenu() {
  if (navHidden) {
    openMenu();
  } else {
    closeMenu();
  }
}

function openMenu() {
  navMenu.style.width = "310px";
  navHidden = false;
  for (let i = 0; i < navButtons.length; i++) {
    navButtons[i].style.left = "50px";
  }
}

function closeMenu() {
  navMenu.style.width = "100px";
  navHidden = true;
  for (let i = 0; i < navButtons.length; i++) {
    navButtons[i].style.left = "-200px";
  }
}

// ---------------- Scroll Above Element----------------
function scrollAbove(id) {
  closeMenu();
  let margin = 50;
  var element = document.getElementById(id);
  let dims = element.getBoundingClientRect();
  window.scrollTo(window.scrollX, dims.top + window.scrollY - margin);
}

// ---------------- Projects ----------------
let scrollIndex = 0;
const track = document.getElementById('carousel-track');
const scrollAmount = track.offsetWidth * 0.35;

function scrollCarousel(direction) {
    track.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth'
    });
}
