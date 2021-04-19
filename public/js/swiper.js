  var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
	  preventClick: true,
      slidesPerView: 'auto',
	  loop: true,
	  keyboard: {
        enabled: true,
      },
      coverflowEffect: {
        rotate: 10,
        stretch: 0,
        depth: 100,
        modifier: 3,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
		clickable: true

      },
    });