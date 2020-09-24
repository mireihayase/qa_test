
var t = 0;
var m = 0;
$(function() {


  if(0 < $("#main_image").size()){
    $('.slider').slick({
      dots: false,
      arrows: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      variableWidth: true,
      centerMode: true,
      speed: 1000
    });
  }

	$('.pagelink').click(function(e) {
		e.preventDefault();
		var url = $(this).attr("href");

		var top = $(url).offset().top;
		
		$('html,body').animate({ scrollTop: (top - 80) + "px" }, 'fast');
	});
  
  m = $("#navi").offset().top;
  
	$(window).scroll(function () {
		var s = $(this).scrollTop();
    var t2 = t;
    t = s;
		if(s > m) {
			$("#navi").addClass("fix");
      
      if( t2 > s ) {
  			$("#header").addClass("fix-h");
      } else {
  			$("#header").removeClass("fix-h");
      }
      
      
      
		} else if(s < m) {
			$("#navi").removeClass("fix");
		}
	});
  
  


});

$(window).resize(function() {

});


