
$(document).ready(function(){
	"use strict";

         $(document).ready(function() {
            var form = $('#myForm2'); // contact form
            var chk = $('.chk-btn'); // submit button
            var txt = $('.txt-btn'); // txt
            var alert = $('.alert-msg2'); // alert div for show alert message
            var alert1 = $('.alert-msg1'); // alert div for show alert message
            var dataRes = "";
            
            // form submit event
            chk.on('change', function(e) {
                e.preventDefault(); // prevent default form submit
                var x = 0;
                if(this.checked)
                  x=1;
                $.ajax({
                    url: 'mail2.php?seq='+this.getAttribute("seq"), // form action url
                    type: 'GET', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: form.serialize(), // serialize form data
                    beforeSend: function() {
                        alert1.fadeOut();
                        alert1.html('Enviando...');
                        chk.attr("style", "display: none; font-size:150%; !important");
                        txt.attr("style", "display: none; font-size:150%; !important");
                    },
                    success: function(data) {
                        dataRes = data;
                        //alert.html(dataRes).fadeIn(); // fade in response data
                        chk.attr("style", "display: inline; font-size:150%;");
                        txt.attr("style", "display: inline; font-size:150%;");
                        alert1.html('').fadeIn();
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
        });




 });
