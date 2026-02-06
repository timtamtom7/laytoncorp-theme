/**
 * Scroll Animations
 * 
 * Handles intersection observer for scroll-triggered animations.
 * Only loaded if 'enable_animations' is true in Customizer.
 */

document.addEventListener('DOMContentLoaded', () => {
    
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -50px 0px', // Trigger slightly before element is fully in view
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Only animate once
            }
        });
    }, observerOptions);

    // Select all elements to animate
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    
    animatedElements.forEach(el => {
        observer.observe(el);
    });

});
