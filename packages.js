
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.book-btn').forEach(button => {
        button.addEventListener('click', function() {
            const packageCard = this.closest('.package-card');
            const packageName = packageCard.querySelector('h3').textContent;
            const price = packageCard.querySelector('.price').textContent;
            
            // Store selection in session storage
            sessionStorage.setItem('selectedPackage', packageName);
            sessionStorage.setItem('packagePrice', price);
            
            // Redirect to booking page
            window.location.href = 'planner.html';
        });
    });
});
