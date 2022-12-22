


$(document).ready(function () {
    $('.accordion-panel').on('click', '.accordion__header', function () {
        $('.accordion__body').slideUp().removeClass('flipInX');
        $('.accordion__button').removeClass('fa-minus');
        if ($(this).next().is(':hidden')) {
            $(this).next().slideDown().addClass('flipInX');
            $(this).find('.accordion__button').addClass('fa-minus');
        } else {
            $(this).next().slideUp();
            $(this).find('.accordion__button').addClass('fa-plus');
        }
    });
});




$(function(){

	$('.nft-slider').on('initialized.owl.carousel translate.owl.carousel', function(e){
        idx = e.item.index;
        $('.owl-item.big').removeClass('big');
        $('.owl-item.medium-left').removeClass('medium-left');
        $('.owl-item.medium-right').removeClass('medium-right');
        $('.owl-item.little-left').removeClass('little-left');
        $('.owl-item.little-right').removeClass('little-right');
        $('.owl-item').eq(idx).addClass('big');
        $('.owl-item').eq(idx-1).addClass('medium-left');
        $('.owl-item').eq(idx+1).addClass('medium-right');
        $('.owl-item').eq(idx-2).addClass('little-left');
        $('.owl-item').eq(idx+2).addClass('little-right');
    });


    $('.nft-slider').owlCarousel({
        center: true,
        items:5,
        loop:true,
        nav: true,
        margin:-200,
        autoplay: false,
        autoplayTimeout: 5000,
		mouseDrag: false,
		startPosition: 7,
		slideBy: 1,
		responsive : {
			// breakpoint from 0 up
			0 : {
				autoplayTimeout: 50,
				autoplay: false,
				items:3,
				mouseDrag: true,
				slideBy: 1,
			},
			481: {
				autoplayTimeout: 5000,

			},
		}
    })
});



(function () {
	const ANIMATION_DURATION = 500;
	const ANIMATION_INTERVAL = 1000;

	document.documentElement.style.setProperty('--animation-duration', ANIMATION_DURATION + 'ms');
	const container = document.getElementById('main_animation_container');
	const images = Array.from(container.children);
	images.forEach(el => el.style.opacity = '0');
	images[0].style.opacity = '1';

	let current = 0;
	setInterval(() => {
		const min = 0;
		const max = images.length - 1;
		let next = Math.floor(Math.random() * (max - min + 1)) + min;

		if (next === current) {
			next++;
			if (next === images.length) {
				next = 0;
			}
		}

		images[next].classList.add('main_fadeIn');
		images[current].classList.add('main_fadeOut');

		setTimeout(() => {
			images[next].style.opacity = '1';
			images[current].style.opacity = '0';

			images[next].classList.remove('main_fadeIn');
			images[current].classList.remove('main_fadeOut');

			current = next;
		}, ANIMATION_DURATION - 50);
	}, ANIMATION_INTERVAL);
})();


$(document).ready(function() {
	$('body').on('click', '.number-minus, .number-plus', function(){
		var $row = $(this).closest('.number');
		var $input = $row.find('.number-text');
		var step = $row.data('step');
		var val = parseFloat($input.val());
		if ($(this).hasClass('number-minus')) {
			val -= step;
		} else {
			val += step;
		}
		$input.val(val);
		$input.change();
		return false;
	});

	$('body').on('change', '.number-text', function(){
		var $input = $(this);
		var $row = $input.closest('.number');
		var step = $row.data('step');
		var min = parseInt($row.data('min'));
		var max = parseInt($row.data('max'));
		var val = parseFloat($input.val());
		if (isNaN(val)) {
			val = step;
		} else if (min && val < min) {
			val = min;
		} else if (max && val > max) {
			val = max;
		}
		$input.val(val);
	});
});


$(document).ready(function () {
    //меню бургер
    $('.header_burger, .header_link a').click(function (event) {
      $('.header_burger,.header_menu').toggleClass('active');
      $('body').toggleClass('lock');
    });
    $('.header_flag').click(function (e) {
      e.preventDefault();
      $('.header_flag_down').toggleClass('flex');
    });
    $('.tt').click(function (e) {
      e.preventDefault();
      $('.paper_down').toggleClass('flex');
      $('.tt svg').toggleClass('svg_rotate');
    });

  });

// document.getElementById('buyButtonCard').addEventListener('click', () => {
// 	document.dispatchEvent(new Event('openSaleModalCard'));
// });
