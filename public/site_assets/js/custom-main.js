(function ($) {
   "use strict";
   
   //Profile img
   $("input[name='user_image']").on("change",function() { 
      readURL(this);
  });

   function readURL(input) {
   if (input.files && input.files[0]) {
   var reader = new FileReader();

   reader.onload = function(e) {
         $(".fileupload_img").attr('src', e.target.result);
   }

   reader.readAsDataURL(input.files[0]);
   }
   }

   //Filter
   $("#filter_list,#filter_by_lang,#filter_by_genre").change(function() {
      var url = $(this).val(); // get selected value
      
     if (url) { // require a URL
         window.location = url; // redirect
     }
     return false;
 });

   // Preloader
   $(window).on('load', function () {
	  $('.preloader').delay(333).fadeOut('slow');
	  $('body').delay(333);
   });
   
   // Main Splide Slider Carousel
   if($('.splide').length > 0){
	  new Splide( '.splide', {
	  autoplay : true,
	  rewind  : true,
	  focus : 'center',
	  autoWidth: true,
	  pauseOnHover: false,
	  pauseOnFocus: false,
      pagination : false,	  
	  type : 'loop',
	  gap : '1em',
	  padding: {
		 right: '8rem',
		 left : '8rem',
	  },
	  breakpoints: {
		767: {
		  padding: {
			 right: '0rem',
			 left : '0rem',
		  },	
		},
	  },
    } ).mount(); 
   }
	
   // Recently Watched Video Carousel	
   $(".recently-watched-video-carousel").owlCarousel({
      nav: true,
	  margin: 20,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
         0: {
            items: 2,
			slideBy: 2,
         margin: 15
         },
         640: {
            items: 3,
			slideBy: 3
         },
         768: {
            items: 4,
			slideBy: 4
         },
		 991: {
            items: 5,
			slideBy: 5
         },
         1198: {
            items: 6,
			slideBy: 6
         }		 
      }
   });
   
   // Video Carousel
   $(".video-carousel").owlCarousel({
	  nav: true,
	  margin: 20,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
         0: {
            items: 2,
			slideBy: 2,		
         margin: 15	
         },
         480: {
            items: 3,
			slideBy: 3
         },
         768: {
            items: 4,
			slideBy: 4
         },
		 991: {
            items: 5,
			slideBy: 5
         },
         1198: {
            items: 7,
			slideBy: 7
         }		 
      }
   });
   
   // Video Shows Carousel
   $(".video-shows-carousel").owlCarousel({
	  nav: true,
	  margin: 20,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
         0: {
            items: 1,
			slideBy: 1
         },
         640: {
            items: 2,
			slideBy: 2
         },
         768: {
            items: 2,
			slideBy: 2
         },
		 991: {
            items: 3,
			slideBy: 3
         },
         1198: {
            items: 3,
			slideBy: 3
         }		 
      }
   });
   
   // TV Season Video Carousel
   $(".tv-season-video-carousel").owlCarousel({
	  nav: true,
	  margin: 20,
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      responsive: {
         0: {
            items: 2,
			slideBy: 2,
         margin: 15
         },
         640: {
            items: 2,
			slideBy: 2
         },
         768: {
            items: 3,
			slideBy: 3
         },
		 991: {
            items: 4,
			slideBy: 4
         },
         1198: {
            items: 5,
			slideBy: 5
         }		 
      }
   });
   
   // Header Dropdown Nav Menu
   $('.dropdown-item').click(function(e){
		e.preventDefault();
		$('.select_season').text(($(this).text()));
   });
   var clicked=false;
   $('.user-menu').on('click', function(e) {
	  if(!clicked){
		$('.user-menu ul').css({'opacity':'1','visibility':'visible'});
		clicked=true;  
	  }else{
		$('.user-menu ul').css({'opacity':'0','visibility':'hidden'});
		clicked=false; 
	  }      
   });
   $("body").click(function(e){
	 if(e.target.className!=='content-user' && e.target.className!=='user-name' && e.target.id!=="userArrow" && e.target.id!=="userPic" ){
		$('.user-menu ul').css({'opacity':'0','visibility':'hidden'});
		clicked=false; 
	 }
   });	
   
   // Nice Select
   $(document).ready(function() {
	  $('select').niceSelect();
   });
   
   $("body").click(function(e){
	  console.log(e.target) 
	  if(e.target.className!=='content-user' && e.target.className!=='user-name' && e.target.id!=="userArrow" && e.target.id!=="userPic" ){
		 $('.user-menu ul').css({'opacity':'0','visibility':'hidden'});
		 clicked=false; 
	  }
   });	
   
   // Social Media
   $(".btn-share").on("click", function (e) {
	   e.preventDefault();  
	   $("#socialGallery").toggle()
   });

   // Scroll Top
   function scrolltop() {
      var wind = $(window);
      wind.on("scroll", function () {
         var scrollTop = $(window).scrollTop();
         if (scrollTop >= 500) {
            $(".scroll-top").fadeIn("slow");
         } else {
            $(".scroll-top").fadeOut("slow");
         }
      });
      $(".scroll-top").on("click", function () {
         var bodyTop = $("html, body");
         bodyTop.animate({
            scrollTop: 0
         }, 800, "easeOutCubic");
      });
   }
   scrolltop();
  
})(jQuery);