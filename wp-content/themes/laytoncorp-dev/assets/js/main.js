/**
 * Laytoncorp Main Scripts
 */

(function() {
	'use strict';

	// Helper: Select elements
	const select = (el, all = false) => {
		el = el.trim();
		if (all) {
			return [...document.querySelectorAll(el)];
		} else {
			return document.querySelector(el);
		}
	};

	/**
	 * Intersection Observer for Section Fade-in
	 */
	const observeSections = () => {
		const sections = select('section', true);
		
		const observer = new IntersectionObserver((entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					observer.unobserve(entry.target);
				}
			});
		}, {
			root: null,
			threshold: 0.1,
			rootMargin: '0px 0px -50px 0px'
		});

		sections.forEach(section => {
			observer.observe(section);
		});
	};

	/**
	 * Header Scroll State
	 */
	const handleHeaderScroll = () => {
		const header = select('.site-header');
		if (header) {
			const onScroll = () => {
				if (window.scrollY > 50) {
					header.classList.add('is-scrolled');
				} else {
					header.classList.remove('is-scrolled');
				}
			};
			window.addEventListener('scroll', onScroll);
			// Check initial state
			onScroll();
		}
	};

	/**
	 * Hero Slideshow Logic
	 */
	const initSlideshow = () => {
		const slideshowContainer = select('.hero-slideshow');
		const slides = select('.hero-slide', true);
		
		if (slides.length > 1) {
			let currentSlide = 0;
			const slideIntervalTime = 6000; // 6 seconds
			let slideInterval;
			let isPaused = false;

			// Set initial state
			slides[0].classList.add('active');

			const nextSlide = () => {
				if (isPaused) return;
				
				slides[currentSlide].classList.remove('active');
				currentSlide = (currentSlide + 1) % slides.length;
				slides[currentSlide].classList.add('active');
			};

			// Start interval
			slideInterval = setInterval(nextSlide, slideIntervalTime);

			// Pause on hover
			if (slideshowContainer) {
				slideshowContainer.addEventListener('mouseenter', () => {
					isPaused = true;
				});

				slideshowContainer.addEventListener('mouseleave', () => {
					isPaused = false;
				});
			}
		}
	};

	/**
	 * Init
	 */
	window.addEventListener('load', () => {
		observeSections();
		handleHeaderScroll();
		initSlideshow();
	});

})();
