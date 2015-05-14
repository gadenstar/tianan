/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function($) {

        $(".form-group").click(function() {
            $(this).find(":input").focus()
        }),

        $("body").on("focus", ".form-group :input",
        function() {
            $(".form-group").removeClass("focused"),
            $(this).parents(".form-group").addClass("focused")
        }),

        $("body").on("blur", ".form-group :input",
        function() {
            $(this).parents(".form-group").removeClass("focused"),
            $(this).val() ? $(this).closest(".form-group").find("label").addClass("fade") : $(this).closest(".form-group").find("label").removeClass("fade")
        }),

        $(".form-group .checkbox, .form-group .radio").hover(function() {
            $(this).parents(".form-group").addClass("focused")
        },

        function() {
            $(this).parents(".form-group").removeClass("focused")
        }),

        $(function(){
          $(window).on('scroll',function(){
            var st = $(document).scrollTop();
            if( st>0 ){
              if( $('#content').length != 0  ){
                var w = $(window).width(),mw = $('#content').width();
                if( (w-mw)/2 > 70 )
                  $('.go2top').css({'left':(w-mw)/2+mw+20});
                else{
                  $('.go2top').css({'left':'auto'});
                }
              }
              $('.go2top').fadeIn(function(){
                $(this).removeClass('dn');
              });
            }else{
              $('.go2top').fadeOut(function(){
                $(this).addClass('dn');
              });
            } 
          });
          $('.go2top .go').on('click',function(){
            $('html,body').animate({'scrollTop':0},500);
          });

          $('.go2top .uc-2vm').hover(function(){
            $('#go-top .uc-2vm-pop').removeClass('dn');
          },function(){
            $('.go2top .uc-2vm-pop').addClass('dn');
          });
        });


        $("#owl-example").owlCarousel({
         
              autoPlay: 5000, //Set AutoPlay to 3 seconds
         
              items : 4,
              itemsDesktop : [1199,3],
              itemsDesktopSmall : [979,3]
         
          });
     
} )(window.jQuery);
