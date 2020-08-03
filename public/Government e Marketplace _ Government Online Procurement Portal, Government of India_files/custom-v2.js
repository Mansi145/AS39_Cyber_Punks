if(typeof $.fn.slick!=='undefined'){$('.single-item').slick({dots:true,autoplay:true,autoplaySpeed:9900,});}$(document).ready(function(){var hash=document.location.hash;var prefix="";if(hash){$('#myTab li a[href="'+hash.replace(prefix,"")+'"]').tab('show');}if(typeof $.fn.slick!=='undefined'){$('.pslide').slick({dots:false,infinite:false,speed:300,slidesToShow:5,slidesToScroll:5,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3,infinite:true,dots:true}},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]});}})
var vPlayer;var playerState;var ready;ready=function(){if(typeof $.fn.YTplayer!=='undefined'){vPlayer=$('#video');cvid=$('#video').attr('data-vid');vPlayer.YTplayer({width:'100%',height:500,videoId:cvid,playerVars:{'color':'white','showinfo':0,'controls':0,'modestbranding':1,'autoplay':0,'rel':0},'onReady':function(event){playerState=1;},onStart:function(){playerState=2;},onPause:function(){playerState=3;},onEnd:function(){playerState=4;},'onStateChange':function(event){if(event.data==2){}if(event.data==1){}}});}$('.bannertext').click(function(){$('.videobanner').addClass('playvideo');vPlayer.play();});$('.fd').click(function(e){e.preventDefault();$('body').css('font-size','1em');$('.fp').css("opacity"," unset");$('.fm').css("opacity"," unset");});$('.sd, .mse').click(function(e){e.preventDefault();$('.mmen').toggleClass('open');});/*$('.fdn').click(function(e){e.preventDefault();$('body').toggleClass('nightmode');});*/$('.topse .fm').click(function(e){e.preventDefault();var str=$('body').css('font-size');var res=str.replace("px","");if(res>10){$('body').css('font-size',parseInt(res-1));$('.fp').css("opacity", " unset");}else{$('.fm').css("opacity"," 0.3");}});$('.fp').click(function(e){e.preventDefault();var str=$('body').css('font-size');var res=str.replace("px","");if(res<25){$('body').css('font-size',parseInt(res)+1);$('.fm').css("opacity", " unset");}else{$('.fp').css("opacity"," 0.3");}});
/*
$(document).ready(function(){$('.imsli li[data-id="faq1"]').show();$('.collapse').on('shown.bs.collapse',function(){var sa=$(this).parent().find('.panel-heading').attr('id');sa=sa.replace("#","");console.log('test');$('.imsli  li').hide();$('.imsli li[data-id='+sa+']').show();$(this).parent().removeClass("glyphicon-plus").addClass("glyphicon-minus");}).on('hidden.bs.collapse',function(){$(this).parent().removeClass("glyphicon-minus").addClass("glyphicon-plus");});});
*/
$('.fcircle').click(function(e){e.preventDefault();$('.scrollfixed ').toggleClass('open');});$('.fcircle').click(function(e){e.preventDefault();$('.tpar').toggleClass('open');});$('.closevs').click(function(){vPlayer.stop();$('.videobanner').removeClass('playvideo');});};$(window).scroll(function(){$('body').addClass('arrofixedfade');setTimeout(function(){$('body').removeClass('arrofixedfade');},2200);});$(document).ready(function(){if($(window).width()>540){if(typeof $.fn.slick!=='undefined'){$('.products').slick({dots:true,autoplay:true,autoplaySpeed:6000,});}}else{if(typeof $.fn.slick!=='undefined'){$('.products .gsl').slick({dots:false,autoplay:false,autoplaySpeed:6000,centerMode:true,});}}$('.fcircle').click(function(e){e.preventDefault();$('.tpar').toggleClass('open');});$('.closevs').click(function(){vPlayer.stop();$('.videobanner').removeClass('playvideo');});$('.bo').click(function(e){e.preventDefault();$('.floiconlist').toggleClass('fopen');});$('.counters').counterUp({delay:10,time:1000});if($(document).height()<650){$(".goto").hide();}else{$(".goto").show();}});$(window).scroll(function(){var cutoff=$(window).scrollTop()+230;var cutoffs=$(window).scrollTop()+$(window).height()-300;if($(window).scrollTop()>80){$('body').addClass('topfixed');}else{$('body').removeClass('topfixed');}});$(window).scroll(function(){$('body').removeClass('botfixed');if($(window).scrollTop()+$(window).height()>$(document).height()-80){$('body').addClass('botfixed');}else{$('body').removeClass('botfixed');}if($(document).height()<650){$(".goto").hide();}else{$(".goto").show();}});if(localStorage.getItem("load")==1){localStorage.setItem("load","0");}else{localStorage.setItem("load","1");}$('body').addClass('hows'+localStorage.getItem("load"));$("body").on("click",".goto",function(){$("html, body").animate({scrollTop:1},"slow");});$(document).ready(ready);$(document).ready(function(){ready});
$('.videom').slick({
         dots: true,
         autoplay: 1,
         swipe: false,
         autoplaySpeed: 4000,
     });

     $('.videom').on('afterChange', function(event, slick, currentSlide,
nextSlide) {
         var cs = $('.videobanner');
         cs.removeClass('playvideo');
         cs.find('iframe').attr('src', cs.find('iframe').attr
('data-stopsrc'));
     });


/* responsive issues */


$('.single-itemnm').slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 6000,
    responsive: [{
        breakpoint: 680,
        settings: {
            dots: false,
        }
    }]
});
$(document).ready(function() {
        $('.imsli li[data-id="faq1"]').show();
        $('.collapse').on('shown.bs.collapse', function() {
            var sa = $(this).parent().find('.panel-heading a').attr('href');
            sa = sa.replace("#", "");
            console.log('test');
            $('.imsli  li').hide();
            $('.imsli li[data-id=' + sa + ']').show();
            $(this).parent().removeClass("glyphicon-plus").addClass("glyphicon-minus");
        }).on('hidden.bs.collapse', function() {
            $(this).parent().removeClass("glyphicon-minus").addClass("glyphicon-plus");
        });
    });

if($(document).width() > 780){
$('.single-itemnmhome').slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 6000,
    responsive: [{
        breakpoint: 680,
        settings: {
            dots: false,
        }
    }]
});
} 
if($(document).width() < 770){ 


$('.hmemslcstrd').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
			dots: false,
        }
    }, {
        breakpoint: 680,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
			dots: false,
        }

    }]
});
}

//

$('.menuac').click(function(){
     
   if($(this).hasClass('meact')){
      $('.menuac').removeClass('meact');
   }else{
	   $('.menuac').removeClass('meact');
     $(this).addClass('meact');
   }
    
});


$('.cls4').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
			dots: false,
        }
    }, {
        breakpoint: 680,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
			dots: false,
        }

    }]
});




$('.submenuc').next().toggle();
$('.submenuc').click(function(e) {
    $(this).toggleClass('menacts');
    e.preventDefault();
    $(this).next().toggle();
});