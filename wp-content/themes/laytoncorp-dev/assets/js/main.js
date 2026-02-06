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

	// Helper: Add Event Listener
	const on = (type, el, listener, all = false) => {
		let selectEl = select(el, all);
		if (selectEl) {
			if (all) {
				selectEl.forEach(e => e.addEventListener(type, listener));
			} else {
				selectEl.addEventListener(type, listener);
			}
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
			const headerHeight = header.offsetHeight;
			const onScroll = () => {
				if (window.scrollY > 100) {
					header.classList.add('is-scrolled');
				} else {
					header.classList.remove('is-scrolled');
				}
			};
			window.addEventListener('scroll', onScroll);
		}
	};

	/**
	 * Hero Slideshow Logic
	 */
	const initSlideshow = () => {
		const slides = select('.hero-slide', true);
		if (slides.length > 0) {
			let currentSlide = 0;
			const slideInterval = 6000; // 6 seconds

			// Set initial state
			slides[0].classList.add('active');

			const nextSlide = () => {
				slides[currentSlide].classList.remove('active');
				currentSlide = (currentSlide + 1) % slides.length;
				slides[currentSlide].classList.add('active');
			};

			setInterval(nextSlide, slideInterval);
		}
	};

	/**
	 * Init
	 */
	window.addEventListener('load', () => {
		observeSections();
		handleHeaderScroll();
		initSlideshow();
		console.log('Laytoncorp theme initialized.');
	});

})();
