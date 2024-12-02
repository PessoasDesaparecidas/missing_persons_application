const header = document.getElementById('header');

// Função para adicionar ou remover a classe com base na rolagem
window.addEventListener('scroll', () => {

  if (window.scrollY > 50) {
    header.classList.add('header-scroll');
  } else {
    header.classList.remove('header-scroll');
  }
});
window.addEventListener('load', () => {

  if (window.scrollY > 50) {
    header.classList.add('header-scroll');
  } else {
    header.classList.remove('header-scroll');
  }
});


// document.addEventListener("click", closeAllSelect);
function scrollright() {
  document.getElementById("section3").scrollLeft += 400;
}
function scrollleft() {
  document.getElementById("section3").scrollLeft -= 400;
}

const containe = document.querySelector('.containe');

// document.addEventListener('mousemove', (e) => {
//   const x = (e.clientX / window.innerWidth) * 100;
//   const y = (e.clientY / window.innerHeight) * 100;

//   containe.style.backgroundPosition = `${x}% ${y}%`;
// });




let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");


btn.addEventListener("click", () => {
  profileDropdownList.classList.toggle("active");
});


window.addEventListener('click', function (e) {
  if (!btn.contains(e.target)) profileDropdownList.classList.remove('active');
});

window.addEventListener('load', () => {
  const currentPathName = window.location.pathname
  const currentPage = currentPathName.split("/")[2]

  const navLinksInHeader = document.querySelectorAll("#header nav a")

  const clearClassListNavLinks = () => {
    navLinksInHeader.forEach((navLink) => {
      navLink.classList.remove("active-link")
    })
  }

  switch (currentPage) {
    case "index.php":
      clearClassListNavLinks()
      navLinksInHeader[0].classList.add("active-link")
      break;
    case "orientacao.php":
      clearClassListNavLinks()
      navLinksInHeader[1].classList.add("active-link")
      break;
    case "desaparecidos.php":
      clearClassListNavLinks()
      navLinksInHeader[2].classList.add("active-link")
      break;
    case "sobre.php":
      clearClassListNavLinks()
      navLinksInHeader[3].classList.add("active-link")
      break;
    case "termos.php":
      clearClassListNavLinks()
      navLinksInHeader[4].classList.add("active-link")
      break;
    default:
      clearClassListNavLinks()

      break;
  }
})


        window.addEventListener("scroll", () => {
            const scrollTop = document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;

            const progressBar = document.getElementById("progressBar");
            progressBar.style.width = scrollPercentage + "%";
        });