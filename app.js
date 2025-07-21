
// Add loading animation
window.addEventListener('load', () => {
    const loader = document.createElement('div');
    loader.className = 'loading';
    loader.innerHTML = '<div class="loading-spinner"></div>';
    document.body.appendChild(loader);

    setTimeout(() => {
        loader.style.opacity = '0';
        setTimeout(() => {
            loader.remove();
        }, 500);
    }, 1000);
});

// Add float animation to CTA buttons
document.querySelectorAll('.cta-btn').forEach(btn => {
    btn.classList.add('btn-float');
});

// Smooth scroll for all anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
