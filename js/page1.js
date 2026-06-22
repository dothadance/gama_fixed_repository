/* LOADER */
window.addEventListener("load", () => {
  setTimeout(() => {
    document.getElementById("loader").classList.add("hide");
  }, 2500);
});

const sections = document.querySelectorAll('.text');

function reveal() {
  sections.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
      el.classList.add('show');
    }
  });
}

window.addEventListener('scroll', reveal);
reveal();
