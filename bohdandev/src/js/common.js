

document.addEventListener('DOMContentLoaded', (event) => {

	const mMenu = document.querySelector('.m-menu');
	const menu = document.querySelector('.menu');
	mMenu.addEventListener('click', (event) => {
		mMenu.classList.toggle("open");
		menu.classList.toggle('menu-open');
	});

	AOS.init({
		duration: 1300
	});

	Fancybox.bind("[data-fancybox]", {

		
	});


});






