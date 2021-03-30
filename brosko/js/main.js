$(document).ready(function() {












	$('.slider').slick({
		arrows: false,
		dots:true,
		appendDots: $('.menu'),
		infinite: false, //небесконечный слайдер
		draggable: false, //no-swipe
		waitForAnimate:false,
		fade: true,
  		cssEase: 'ease-in',
  		slidesToShow: 1,
  		
  		swipe: false,
		swipeToSlide: false,
		touchMove: false,
		draggable: false,
		adaptiveHeight: true
	});

	$('.carousel').slick({
		lazyLoad: 'ondemand',
		arrows: true,
		dots:false,
		//autoplay: true,
		infinite: true, //небесконечный слайдер
		cssEase: 'ease',
		waitForAnimate:true,
		
	});
	var i = 0;
	for (var name of dataFromPhp){
		if(name != ''){
			$("button[aria-controls=slick-slide0"+ i +"]").text(name);
			i++;
			if (name == "МАНИКЮР | ПЕДИКЮР"){
				let html_alert = ' <div class="alert-temp-wrapper"> ' + 
	                                '<div class="alert-temp"> ' +  
	                                    '<div class="alert__image">' + 
	                                       '<img src="https://broskonails.ru/wp-content/themes/brosko/img/mark.svg">' + 
	                               	   ' </div> '+
	                               	   '<div class="alert__text">' + 
											'В стоимость процедур, отмеченных этим значком входит снятие, покрытие и выравнивание' + 
	                               	   '</div>' + 
	                               	 '</div>'+ 
	                            '</div> ';
				$(".alert-home").html(html_alert);
			}
		}
		

	}

$("#slick-slide-control00").focus(function(){
	$(".alert-home").fadeIn(1000);
})


$("button[role='tab']").click(function(){
	if ($(this).text() != "МАНИКЮР | ПЕДИКЮР"){
		$(".alert-home").fadeOut('slow');
	}
})




if($(window).width() <= 900){
	$(".headers h2:nth-child(2)").fadeOut();
	$(".headers h2:nth-child(1)").fadeOut();

} 
$("#map iframe").height($('#map').height());
$("#map iframe").width($('#map').width());


/*
$(".menu button").click(function(){
	$(".price").height($('.slick-list').height());
});
*/

$(window).resize(
	function(){
		$("#map iframe").height($('#map').height());
		$("#map iframe").width($('#map').width());

		

		if($(window).width() <= 900){
			$(".headers h2:nth-child(2)").fadeOut();
			$(".headers h2:nth-child(1)").fadeOut();
			
		} 
		else {
			$(".headers h2:nth-child(2)").fadeIn();
			$(".headers h2:nth-child(1)").fadeIn();
			
		}
	});





 
$(window).scroll(function(){
	if ($(this).scrollTop() > 600) {
	$('.scrollup').fadeIn();
	} else {
	$('.scrollup').fadeOut();
	}
});
 
$('.scrollup').click(function(){
$("html, body").animate({ scrollTop: 400 }, 600);
return false;
});

if ($(window).width() > 992) {
        new WOW().init();
    }

    console.log($(window).width());

});