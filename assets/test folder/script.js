jQuery(document).ready(function ($) {
	var mySwiper = new Swiper('.swiper-container', {
	  // Optional parameters
	  direction: 'vertical',
	  loop: true,

	  // If we need pagination
	  pagination: {
	    el: '.swiper-pagination',
	    type: 'custom',
	    renderCustom: function (swiper, current, total) {
			var names = [];
			$(".swiper-wrapper .swiper-slide").each(function(i) {
			  names.push($(this).data("name"));
			});
			var text = `<div class="custom-pagination">`;
			for (let i = 1; i <= total; i++) {
			  if (current == i) {
			    text += `<div class="name"> ${names[i]} </div>`;
			    text += `<div class="numbers"> ${current} / ${total} </div>`;
			  } 
			}
			text += `</div>`;
			return text;
		 },
	  },

	  // Navigation arrows
	  navigation: {
	    nextEl: '.swiper-button-next',
	    prevEl: '.swiper-button-prev',
	  },
	}) 
});
