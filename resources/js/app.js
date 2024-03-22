import './bootstrap';
window.addEventListener("load", () => {

  document
    .querySelector("#showMenu")
    .addEventListener("click", function (e) {
      document.querySelector("#mobileNav").classList.remove("hidden");
    });

  document
    .querySelector("#hideMenu")
    .addEventListener("click", function (e) {
      document.querySelector("#mobileNav").classList.add("hidden");
    });

  document.querySelectorAll('#mobileNav a').forEach((link) => {
    link.addEventListener("click", (e) => {
      document.querySelector("#mobileNav").classList.add("hidden");
    })
  })
})
