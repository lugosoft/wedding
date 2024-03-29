
$(document).ready(function(){
	"use strict";

	var window_width 	 = $(window).width(),
	window_height 		 = window.innerHeight,
	header_height 		 = $(".default-header").height(),
	header_height_static = $(".site-header.static").outerHeight(),
	fitscreen 			 = window_height - header_height;


	$(".fullscreen").css("height", window_height)
	$(".fitscreen").css("height", fitscreen);

  //-------- Active Sticky Js ----------//

     
  //------- Active Nice Select --------//
     if(document.getElementById("default-select")){
          $('select').niceSelect();
    };

    $('.img-pop-up').magnificPopup({
        type: 'image',
        gallery:{
        enabled:true
        }
    });

     
   // -------   Active Mobile Menu-----//





    $('.active-about-carousel').owlCarousel({
        items:1,
        loop:true,
        autoplay:true
    })
    $('.next-trigger').click(function() {
        $(".active-about-carousel").trigger('next.owl.carousel');
    })
        // Go to the previous item
    $('.prev-trigger').click(function() {
        $(".active-about-carousel").trigger('prev.owl.carousel');
    });

    $('.active-gallery-carusel').owlCarousel({
        items:3,
        loop:true,
        autoplay:true
    })
    $('.next-trigger').click(function() {
        $(".active-gallery-carousel").trigger('next.owl.carousel');
    })
        // Go to the previous item
    $('.prev-trigger').click(function() {
        $(".active-gallery-carousel").trigger('prev.owl.carousel');
    });    




  // Select all links with hashes
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top-60
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });

     
  
    var unavailableDates = [
    {start: '2015-08-31', end: '2015-09-05'},
        {start: '2015-09-11', end: '2015-09-15'},
        {start: '2015-09-15', end: '2015-09-23'},
        {start: '2015-10-01', end: '2015-10-07'}
    ];


      // -------   Mail Send ajax

         $(document).ready(function() {
            var form = $('#myForm'); // contact form
            var submit = $('.submit-btn'); // submit button
            var alert = $('.alert-msg'); // alert div for show alert message
            var h1Text = $('.h1'); 
            var p1Text = $('.p1'); 
            var res = '';
            var divOK1 = "<div class='col-lg-12 d-flex flex-column'><a style='color:green; font-size:150%;'>";
            var divOK2 = "</a></div>";
            var divKO1 = "<div class='col-lg-12 d-flex flex-column'><a style='color:red; font-size:150%;'>";
            var divKO2 = "</a></div>";
            var dataRes = "";
            
            // form submit event
            form.on('submit', function(e) {
                e.preventDefault(); // prevent default form submit

                $.ajax({
                    url: 'mail.php', // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: form.serialize(), // serialize form data
                    beforeSend: function() {
                        alert.fadeOut();
                        submit.html('Enviando...'); // change submit button text
                    },
                    success: function(data) {
                        res = data.split("|");
                        
                        if(res[0].trim()=='OK'){
                          dataRes = divOK1+res[1]+divOK2;
                        }else{
                          dataRes = divKO1+res[1]+divKO2;
                        }
                        alert.html(dataRes).fadeIn(); // fade in response data
                        //form.trigger('reset'); // reset form
                        if(res[0].trim()=='OK'){
                          h1Text.html('Asistencia Confirmada').fadeIn(); 
                          p1Text.html('Nos complace saber que nos acompa&ntilde;ar&aacute;n en este d&iacute;a tan especial para nosotros.').fadeIn(); 
                          submit.attr("style", "display: none !important");
                        } // reset submit button text
                        if(res[0].trim()=='KO'){submit.html('Enviar Confirmaci&oacute;n');} // reset submit button text
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
        });




 });
