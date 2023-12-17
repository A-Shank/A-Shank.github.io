document.addEventListener("DOMContentLoaded", function () {
	// Initialize the current slide to 0
	let currentSlide = 0;
	// Get all the slides
	const slides = document.querySelectorAll(".slides");
	// Get the total number of slides
	const totalSlides = slides.length;
	// Function to show the current slide
	function showSlide(index) {
		// Loop through each slide and set the display to none
		slides.forEach((slide, i) => {
			// If the current slide is equal to the index, then set the display to block, otherwise set it to none
			slide.style.display = i === index ? "block" : "none";
		});
	}
	// Previous button functionality to show previous slide has a event listener to listen for a click event
	document.querySelector(".prev").addEventListener("click", function () {
		// If the current slide is greater than 0, then decrement the current slide by 1, otherwise set the current slide to the total slides minus 1
		currentSlide = currentSlide > 0 ? currentSlide - 1 : totalSlides - 1;
		// Call the showSlide function and pass in the current slide
		showSlide(currentSlide);
	});
	// Next button functionality to show next slide has a event listener to listen for a click event
	document.querySelector(".next").addEventListener("click", function () {
		// If the current slide is less than the total slides minus 1, then increment the current slide by 1, otherwise set the current slide to 0
		currentSlide = currentSlide < totalSlides - 1 ? currentSlide + 1 : 0;
		// Call the showSlide function and pass in the current slide
		showSlide(currentSlide);
	});

	showSlide(currentSlide); // Initialize the slideshow by showing the first slide
});
