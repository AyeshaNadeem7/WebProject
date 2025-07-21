const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
  navLinks.classList.toggle('active');
  hamburger.classList.toggle('active');
});


function scrollSlider(direction) {
    const slider = document.getElementById("slider");
    const scrollAmount = 260;
    requestAnimationFrame(() => {
        slider.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    });
}

  const reveals = document.querySelectorAll(".reveal");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        requestAnimationFrame(() => {
          entry.target.classList.add("show");
        });
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '50px',
  });
  
  reveals.forEach(reveal => observer.observe(reveal));

  const backToTopBtn = document.getElementById("backToTop");

window.addEventListener("scroll", () => {
  backToTopBtn.style.display = window.scrollY > 400 ? "block" : "none";
});

backToTopBtn.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

function showSuccess() {
  const email = document.getElementById("newsletterEmail").value.trim();

  if (!email || !email.includes('@')) {
    alert("Please enter a valid email.");
    return;
  }

  const toast = document.getElementById("successToast");

  toast.classList.add("show");
  setTimeout(() => {
    toast.classList.remove("show");
  }, 5000); // disappears after 3 seconds

  document.getElementById("newsletterEmail").value = ""; // clear input
}