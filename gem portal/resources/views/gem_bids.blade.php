<!DOCTYPE html>
<!-- saved from url=(0039)https://bidplus.gem.gov.in/servicelists -->
<html class=" js cssanimations"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-store">
        <meta http-equiv="Cache-Control" content="must-revalidate">
        <meta http-equiv="Cache-Control" content="pre-check=0">
        <meta http-equiv="Cache-Control" content="post-check=0">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
        <meta name="keywords" content="GeM, Goverenment E-Market, GeM SPV">
        <meta name="description" content="">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                <![endif]-->

        <link rel="icon" href="https://bidplus.gem.gov.in/resources//images/favicon.png" type="image/favicon">
        <link href="./GeM _ Bid Lists_files/stylesheet_v1.css" rel="stylesheet" type="text/css" media="all">
        <link href="./GeM _ Bid Lists_files/font-awesome.css" rel="stylesheet" type="text/css" media="all">
        <link href="./GeM _ Bid Lists_files/bootstrap.css" rel="stylesheet" type="text/css" media="all">

        <link href="./GeM _ Bid Lists_files/style_v2-29.css" rel="stylesheet" type="text/css" media="all">
        <link href="./GeM _ Bid Lists_files/cart_styles.css" rel="stylesheet" type="text/css" media="all">
        <link href="./GeM _ Bid Lists_files/responsive3.css" rel="stylesheet">

        <link href="./GeM _ Bid Lists_files/jquery-ui.css" rel="stylesheet" type="text/css" media="all">
        <script src="./GeM _ Bid Lists_files/jquery-1.11.3.min.js"></script>
        <script src="./GeM _ Bid Lists_files/jquery.writtenNumber.min.js"></script>
        <script src="./GeM _ Bid Lists_files/bootstrap.js"></script>
        <script type="text/javascript" src="./GeM _ Bid Lists_files/jquery-ui.js"></script>
        <link href="./GeM _ Bid Lists_files/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all">
        <script src="./GeM _ Bid Lists_files/modernizr.custom.js"></script>

        <!-- SmartMenus jQuery plugin -->
        <link href="./GeM _ Bid Lists_files/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <script type="text/javascript" src="./GeM _ Bid Lists_files/jquery.smartmenus.js"></script>
        <script type="text/javascript" src="./GeM _ Bid Lists_files/jquery.smartmenus.bootstrap.js"></script> 
        <!--[if lte IE 9]>
              <script src="js/ie.js" type="text/javascript"></script>
              <![endif]-->

        <title>GeM  |
            Bid Lists        </title>
        <style>
            .navbar-inverse .navbar-nav>li {

                margin-left: 9px;
            }
            #breadCrumb ul{
                border-bottom: 1px solid #ededed;
            }
            #breadCrumb{
                background: #f8f8f800;
            }
            .hover ul{ 
                display:block; 
            }
            .navbar-brand>img, .selectTop {  
                display: block;
                width: 100%;
            }
            /*.bid-navset{
                padding-top: 0.6em;
            }*/
            .navbar-brand{
                max-width:100%;
            }
            .navbar-nav .dropdown-menu > li > a {
                white-space: nowrap;
            }

        </style>
        <script type="text/javascript">
            var requests = [];
            $( document ).ready(function() {
                 $('#divSearchCat').find('label').click(function(e) {
                    e.preventDefault();
                    var concept = $(this).attr('rel');
                    var selected_cat_id = $(this).attr('category-id');
                    var ele = parseInt(selected_cat_id) + 1;

                    $('#divSearchCat label').removeClass('active-search');
                    $(this).addClass('active-search');

                    if(concept == 'Services'){
                        $('#srch-main .simple-input').hide();
                        $('#srch-main .suggester-input').val('');
                        $('#srch-main .suggester-input').addClass('loading').show();
                        $("#srch-main .suggester-input").prop('disabled', true);
                        getServiceOptions('D');
                    }else{
                        $('#srch-main .simple-input').show();
                        $('#srch-main .suggester-input').hide();
                    }
                    var current_val = concept;

                    //var param = $(this).text(current_val);
                    $('#h_search_category').val(concept);
                    $('#h_cat_id').val(selected_cat_id);

                    //sessionStorage.setItem('selected_cat_name',concept);
                    //sessionStorage.setItem('selected_cat_id',selected_cat_id);
                });
               });

function getServiceOptions(){
        var ajax1 = $.ajax({
            url:"https://gem.gov.in/searchresult/getServices",
            type:"POST",
            data:{},
            success:function(qText){
            }
        });
        requests.push(ajax1);
        $.when.apply($,requests).done(function(){
            var counter = 0;
            $.each(arguments, function (i, data) {
                console.log(data);
                if(counter >= 1){
                    return false;
                }
                var obj = (typeof data === 'object')?JSON.parse(JSON.parse(JSON.stringify(data))[0]):JSON.parse(data); 
                if(typeof obj['list'] !="undefined"){
                    var serviceOptions = obj['list'];
                    var serviceName = [];
                    for(var i=0;i<serviceOptions.length;i++){
                        serviceName.push(serviceOptions[i]['display_name']);
                    }
                    sessionStorage.setItem('serviceNames',JSON.stringify(serviceName));
                    bindSuggester(serviceName);
                    $('.suggester-input').removeClass('loading');
                    $(".suggester-input").prop('disabled', false);
                }
                counter++;
            });
        });
    }
    </script>
    <script type="text/javascript" async="" src="./GeM _ Bid Lists_files/apxor.min.js"></script><style>@import url(https://fonts.googleapis.com/css?family=Open+Sans);#flox-chat-iframe-wrapper-outer {    display: block;    z-index: 10000;    width: 100vw;    background-color: transparent;    border-radius: 30px}#flox-chat-img {    z-index: 10001}#flox-chat-close,#flox-chat-img,#flox-chat-mob-ancr {    bottom: 42px;    cursor: pointer;    color: var(--font-white);    outline: none;    position: fixed;    width: auto;}#flox-chat-close img {    position: relative;    background-position: center top}#flox-chat-img img {    vertical-align: middle;    margin-bottom: 0;    box-sizing: content-box;}#flox-chat-close {    z-index: 999;    background: 0 0;    width: 28px;    height: 17px;    background-color: #26acae;    text-align: center;    position: fixed;    display: block;    padding: 10px 16px;    display: flex;    flex-direction: column;    align-items: center;    justify-content: center;    font-family: Roboto;    height: 28px;    line-height: 28px;    font-size: 18px;    color: #FFFFFF;    -webkit-box-sizing: unset;    -moz-box-sizing: unset;    -ms-box-sizing: unset;    box-sizing: unset;}#flox-chat-iframe {    position: static;    border: none;    border-radius: 0px;    vertical-align: middle;    width: 100%;    height: calc(100%);    min-height: 173px}#flox-chat-iframe-wrapper.fadeout,#flox-chat-iframe-wrapper.fadein {    z-index: 100000!important;    width: 350px;    height: 540px;    max-width: calc(50vw);    max-width: 50%;    max-height: calc(100vh - 30px);    min-height: 173px;    position: fixed!important;    border-radius: 0px;    overflow: hidden}#flox-chat-iframe-wrapper.contract,#flox-chat-iframe-wrapper.expand {    z-index: 100000!important;    width: 350px;    height: 540px;    max-width: calc(50vw);    max-width: 50%;    max-height: calc(100vh - 30px);    min-width: 180px;    min-height: 173px;    position: fixed!important;    border-radius: 0px;    overflow: hidden}#flox-chat-iframe-wrapper.left {    left: 20px}@keyframes wrapperShow {    0% {        opacity: 0;        height: 540px;        min-height: 0;    }    100% {        opacity: 1;        height: 540px;    }}@-moz-keyframes wrapperShow {    0% {        opacity: 0;        height: 540px;        min-height: 0;    }    100% {        opacity: 1;        height: 540px;    }}@-webkit-keyframes wrapperShow {    0% {        opacity: 0;        height: 540px;        min-height: 0;    }    100% {        opacity: 1;        height: 540px;    }}@keyframes wrapperHide {    0% {        opacity: 1;        height: 540px;    }    100% {        opacity: 0;        height: 540px;        min-height: 0;    }}@-moz-keyframes wrapperHide {    0% {        opacity: 1;        height: 540px;    }    100% {        opacity: 0;        height: 540px;        min-height: 0;    }}@-webkit-keyframes wrapperHide {    0% {        opacity: 1;        height: 540px;    }    100% {        opacity: 0;        height: 540px;        min-height: 0;    }}@keyframes wrapperShowExpand {    0% {        opacity: 0;        transform: scale(0);    }    100% {        opacity: 1;        transform: scale(1);    }}@-moz-keyframes wrapperShowExpand {    0% {        opacity: 0;        transform: scale(0);    }    100% {        transform: scale(1);        opacity: 1;    }}@-webkit-keyframes wrapperShowExpand {    0% {        opacity: 0;        transform: scale(0);    }    100% {        opacity: 1;        transform: scale(1);    }}@keyframes wrapperHideContract {    0% {        opacity: 1;        transform: scale(1);    }    100% {        opacity: 0;        transform: scale(0);    }}@-moz-keyframes wrapperHideContract {    0% {        opacity: 1;        transform: scale(1);    }    100% {        opacity: 0;        transform: scale(0);    }}@-webkit-keyframes wrapperHideContract {    0% {        opacity: 1;        transform: scale(1);    }    100% {        opacity: 0;        transform: scale(0);    }}#flox-chat-iframe-wrapper.fadein {    -webkit-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    -moz-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    animation-name: wrapperShow;    -webkit-animation-name: wrapperShow;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    animation-duration: .5s;    -webkit-animation-duration: .5s}#flox-chat-iframe-wrapper.fadeout {    height: 0;    min-height: 0;    animation-name: wrapperHide;    -webkit-animation-name: wrapperHide;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    animation-duration: .5s;    -webkit-animation-duration: .5s}#flox-chat-iframe-wrapper.expand {    -webkit-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    -moz-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    animation-name: wrapperShowExpand;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    -webkit-animation-name: wrapperShowExpand;    animation-duration: 0.3s;    -webkit-animation-duration: 0.3s}#flox-chat-iframe-wrapper.contract {    animation-name: wrapperHideContract;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    -webkit-animation-name: wrapperHideContract;    animation-duration: 0.3s;    -webkit-animation-duration: 0.3s;    transform: scale(0);}.flox-chat-title {    text-align: center;    vertical-align: middle;    bottom: 0;    position: relative;    font-size: 16px;    font-weight: 700;    color: #FFF;    opacity: 1;    font-family: 'Open Sans';    -webkit-transition: opacity 1s;    transition: opacity 1s linear}.cb-circle,.flox-toolTipBox {    text-align: center;    background-color: #FFF;    font-family: arial}#flox-chat-mob-ancr {    z-index: 100}@keyframes csSlideDown {    0% {        opacity: .8    }    100% {        opacity: 0    }}@-moz-keyframes csSlideDown {    0% {        opacity: .8    }    100% {        opacity: 0    }}@-webkit-keyframes csSlideDown {    0% {        opacity: .8    }    100% {        opacity: 0    }}@keyframes csCloseBtnSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@keyframes csSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@-webkit-keyframes csSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@-moz-keyframes csSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@media screen and (min-width:0) and (max-width:600px) {    #flox-chat-mob-ancr {        display: block;        z-index: 1000000;        opacity: 0    }    #flox-mobile-anchor {        width: auto;        height: 51px;        display: block    }    #flox-chat-close,    #flox-chat-img,    #flox-chat-mob-ancr {        bottom: 42px    }}@media screen and (min-width:600px) and (max-width:1023px) {    #flox-chat-iframe-wrapper {        bottom: 400px    }    #flox-chat-close,    #flox-chat-img,    #flox-chat-mob-ancr {        bottom: 42px    }}#flox-chat-close.slideCloseButtonUp{    animation-name: csCloseBtnSlideUp;    -webkit-animation-name: csCloseBtnSlideUp;    animation-duration: .5s;    -webkit-animation-duration: .5s;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    width: auto;    display: flex;    opacity: 1;}#flox-chat-close.cs-close-top{    height: 12px;    line-height: 12px;    padding: 7px;    border-radius: 25px;    webkit-box-shadow: -2px 2px 25px rgba(95, 95, 95, 0.64);    -moz-box-shadow: -2px 2px 25px rgba(95, 95, 95, 0.64);    box-shadow: -2px 2px 25px rgba(95, 95, 95, 0.64);}#flox-chat-img.slideright {    animation-name: csSlideUp;    -webkit-animation-name: csSlideUp;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    animation-duration: .5s;    -webkit-animation-duration: .5s;    width: auto;    opacity: 1;}#flox-chat-img.slideleft {    animation-name: csSlideDown;    -webkit-animation-name: csSlideDown;    animation-duration: .5s;    -webkit-animation-duration: .5s;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    padding: 0;    opacity: 0;    z-index: -1000}@keyframes rightFadeInOut {    0% {        position: absolute;        right: 100px;        opacity: 0    }    50% {        opacity: 0    }    100% {        right: 0;        position: absolute;        opacity: 1    }}@-webkit-keyframes rightFadeInOut {    0% {        position: absolute;        right: 100px;        -webkit-opacity: 0    }    50% {        -webkit-opacity: 0    }    100% {        right: 0;        position: absolute;        -webkit-opacity: 1    }}@-moz-keyframes rightFadeInOut {    0% {        position: absolute;        right: 100px;        opacity: 0    }    50% {        opacity: 0    }    100% {        right: 0;        position: absolute;        opacity: 1    }}@keyframes leftFadeInOut {    0% {        position: absolute;        right: 0;        opacity: 1    }    10% {        opacity: 0    }    100% {        opacity: 0;        right: 100px    }}@-moz-keyframes leftFadeInOut {    0% {        position: absolute;        right: 0;        opacity: 1    }    10% {        opacity: 0    }    100% {        opacity: 0;        right: 100px    }}@-webkit-keyframes leftFadeInOut {    0% {        position: absolute;        right: 0;        -webkit-opacity: 1    }    10% {        -webkit-opacity: 0    }    100% {        -webkit-opacity: 0;        right: 100px    }}@-webkit-keyframes float {    0%,    100% {        box-shadow: 0 5px 15px 0 rgba(175, 175, 175, .6);        transform: translatey(0)    }    50% {        box-shadow: 0 15px 15px 0 rgba(175, 175, 175, .2);        transform: translatey(-3px)    }}#flox-text-item {    color: #FFF;    overflow: hidden;    font-size: 16px;    right: 0}#flox-text-items.slideright {    animation-name: rightFadeInOut;    animation-duration: .21s;    opacity: 1;    -webkit-opacity: 1}#flox-text-items.slideleft {    opacity: 0;    width: auto;    animation-name: leftFadeInOut;    -webkit-animation-name: leftFadeInOut;    animation-duration: .21s;    -webkit-animation-duration: .21s}#flox-chat-mob-ancr {    width: 160px;    display: none}#flox-chat-close.flox-hideHeader {    top: 0!important;    right: 0!important;    padding: 0!important;    width: auto}.flox-hideHeader img {    width: 18px;    height: 18px;    padding: 3px;    background-color: grey;    border-radius: 7px}.flox-circle_2:before,.flox-circle_3:before {    content: '';    background: #fff}.cb-circle {    width: 250px;    border: 5px solid #00bfb6;    padding: 80px 0;    margin: 30px auto;    border-radius: 50%;    font-size: 24px;    font-weight: 900;    position: relative;    color: #00bfb6}.flox-circle_2,.flox-circle_2:before {    position: absolute;    width: 25px;    padding: 20px}.flox-circle_2 {    border: 5px solid #00bfb6;    border-radius: 50%;    right: -15px;    bottom: 15px}.flox-circle_2:before {    border-radius: 50%;    right: 0;    bottom: 0}.flox-circle_3,.flox-circle_3:before {    position: absolute;    width: 5px;    padding: 10px 15px}.flox-circle_3 {    border: 5px solid #00bfb6;    border-radius: 50%;    right: -35px;    bottom: 13px}.flox-circle_3:before {    border-radius: 50%;    right: 0;    bottom: 0}.flox-toolTipBox {    z-index: 100;    cursor: pointer;    width: auto;    border: 1px solid #eaeaea;    padding: 10px 10px 10px 20px;    color: #797979;    position: fixed;    transform: translatey(0);    animation: float 3s ease-in-out infinite}.default_arrow:after,.default_arrow:before {    content: '';    width: 0;    height: 0;    position: absolute;    border-left: 7px solid transparent;    border-bottom: 10px solid transparent}.default_arrow:before {    border-right: 10px solid #949591;    border-top: 7px solid #949591;    right: 22px;    bottom: -18px}.default_arrow:after {    border-right: 10px solid #fff;    border-top: 7px solid #fff;    right: 24px;    bottom: -13px}.flox-toolTipHeaderWrapper {    display: inline-block;    margin-right: 20px;    text-align: left;    vertical-align: middle}#flox-toolTipImage {    background-color: #26acae;    vertical-align: middle;    margin-bottom: 0}.flox-toolTipBoxCaption {    font-size: 11px;    line-height: 15px}.flox-toolTipHeader {    font-size: 14px;    line-height: 18px;    font-weight: 600;    font-family: 'Open Sans'}</style><script>(function() {
			// injected DOM script is not a content script anymore,
			// it can modify objects and functions of the page
			var _pushState = history.pushState;
			history.pushState = function(state, title, url) {
				_pushState.call(this, state, title, url);
				window.dispatchEvent(
					new CustomEvent('state-changed', { detail: url })
				);
			};
			// repeat the above for replaceState too
		})();</script><script>(function() {
			// injected DOM script is not a content script anymore,
			// it can modify objects and functions of the page
			var _pushState = history.pushState;
			history.pushState = function(state, title, url) {
				_pushState.call(this, state, title, url);
				window.dispatchEvent(
					new CustomEvent('state-changed', { detail: url })
				);
			};
			// repeat the above for replaceState too
		})();</script><script>(function() {
			// injected DOM script is not a content script anymore,
			// it can modify objects and functions of the page
			var _pushState = history.pushState;
			history.pushState = function(state, title, url) {
				_pushState.call(this, state, title, url);
				window.dispatchEvent(
					new CustomEvent('state-changed', { detail: url })
				);
			};
			// repeat the above for replaceState too
		})();</script></head>
    <body class="">

        <header> 
            <!---------------------------mobile header------------------------------------>
            <section class="sec mobhead">
                <div class="col-md-12 col-xs-12">
                    <div class="col-xs-2 col-sm-2">
                        <a href="https://bidplus.gem.gov.in/servicelists#" class="mse"> <img src="./GeM _ Bid Lists_files/menu-v5.svg" alt="menu"> </a>
                    </div>
                    <div class="col-xs-8 col-sm-8">
                        <div class="text-center">
                            <a href="/home" title="GeM Logo, Government of India"><img src="./GeM _ Bid Lists_files/gem-new-logo-v4.svg" alt="GeM Logo, Government of India" style="width: 60%;"></a>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2">
                        <div class="btn-group pull-right mobile-toggle">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="./GeM _ Bid Lists_files/login-v4.svg" alt="menu">
                            </a>
                            <ul class="dropdown-menu mobile-menu">
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-xs-12 ">
                    <div class="radio serch-radio">
                        <label class="active-search">Products</label>
                        <label>Services</label>
                        <label>Content</label>
                    </div>
                    <div class="s003">
                        <form style="margin: 0;">
                            <div class="inner-form">
                                <div class="input-field second-wrap">
                                    <input id="search" type="text" placeholder="Enter Keywords?">
                                </div>
                                <div class="input-field third-wrap">
                                    <button class="btn-search" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mmen">
                    <a href="https://bidplus.gem.gov.in/servicelists#" class="mobmelo"> <img src="./GeM _ Bid Lists_files/gem-new-logo-v2.svg" alt="gem"> </a>
                    <a href="https://bidplus.gem.gov.in/servicelists#" class="sd"><img src="./GeM _ Bid Lists_files/vcancel-v4.svg" alt="gem"></a>
                    <ul class="sc">
                        <!--<li>
                           <a href="" target="_blank">LMS</a>
                           </li>-->
                        <li class="menuac">
                            <a href="https://bidplus.gem.gov.in/servicelists#">Need Help ?</a>
                            <ul>
                                <li><a href="https://gem.gov.in/userFaqs">FAQs</a></li>
                                <li> <a href="https://gem.gov.in/training/videos/buyers" target="_blank">Video Guides</a></li>
                                <li><a href="https://gem.gov.in/training" target="_blank">Training Event Calendar</a></li>
                                <li><a href="https://lms.gem.gov.in/" target="_blank">LMS</a></li>
                            </ul>
                        </li>
                        <!--li>
                           <a href="/new-categories"> </a>
                           </li-->

                        <li>
                            <a href="/logout"> Logout</a>
                        </li>
                        <li>
                            <a href="https://gem.gov.in/training">Training</a>
                        </li>
                        <li>
                            <a href="https://gem.gov.in/forum">Forums </a>
                        </li>
                        <li>
                            <a href="https://gem.gov.in/gallery">Gallery</a>
                        </li>
                        <li class="fml">
                            <a href="https://gem.gov.in/support">Resources </a><span>|</span>
                        </li>
                        <li class="menuac">
                            <a href="javascript: void(0)">Corporate</a>
                            <ul>
                                <li>
                                    <a href="https://gem.gov.in/aboutus">About Us</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/mou">MoU's</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/statistics">Statistics</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/contactUs">Contact Us</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/landing/index/careers">Careers</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/RTI" title="Right to Information">Right to Information</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/testimonial">Testimonials</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/web-information-manager" title="Web Information Manager">Web Information Manager</a>
                                </li>
                                <li>
                                    <a href="https://gem.gov.in/help" title="Help">Help</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="https://bidplus.gem.gov.in/gemtickets">Support Desk</a>
                        </li>
                        <li class="ges">
                            <a href="javascript: void(0)"> 1-800-419-3436 / 1-800-102-3436</a>
                        </li>
                    </ul>
                </div>
            </section>
            <!-------------------------------end------------------------------------------->
            <section class="deskhead">
                <!--NAVIGATION-->
                <section id="indexHeader sce ">
                    <div class="topStrip sce black-top">
                        <div class="container" id="content-fix">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="leftLinks">
                                        <ul class="inline-menu text-left pull-left">
                                            <!--<li><p class="home-new"><a title="Home" href="/home"><img src="https://bidplus.gem.gov.in/resources/images/home.svg" alt="Home" /></a></p></li>-->
                                            <li><a href="https://bidplus.gem.gov.in/servicelists#" title="High Contrast"><span class="fdn"><i class="fa fa-circle" aria-hidden="true"></i>  Dark Mode</span></a></li>
                                            <li class="font-size-left">
                                                <span>Font Size</span>
                                                <a href="https://bidplus.gem.gov.in/servicelists#" title="Decrease font size" class="fm ">A- </a>
                                                <a href="https://bidplus.gem.gov.in/servicelists#" title="Reset font size" class="fd "> A </a>
                                                <a href="https://bidplus.gem.gov.in/servicelists#" title="Increase font size" class="fp "> A+</a>
                                            </li>
                                            <li class="needhelpli"><a href="https://bidplus.gem.gov.in/servicelists#pagi_content" title="Skip to Main Content">Skip to Main Content</a></li>
                                        </ul>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="inline-menu text-right pull-right">
                                        <li><i class="fa fa-phone-square" aria-hidden="true"></i> 1800-419-3436</li>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> helpdesk-gem[at]gov[dot]in</li>
                                        <li class="dropdown top-drop on-focus needhelpli">
                                            <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Need Help ? <span class="caret"></span></a>
                                            <ul class="dropdown-menu dropdown-top  ">
                                                <li><a href="https://gem.gov.in/userFaqs" title="FAQs">FAQs</a>

                                                </li>
                                                <li><a href="https://gem.gov.in//feedback" title="Video Guides" target="_blank">Feedback</a>

                                                </li>
                                               <!-- <li><a href="https://gem.gov.in/training/videos/buyers" title="Video Guides" target="_blank">Video Guides</a>

                                                </li>-->
                                                <li><a href="https://gem.gov.in/gemtickets/create" title="Raise-a Ticket">Raise-a Ticket</a></li>
                                                <li><a href="https://gem.gov.in/help" title="Document Help">Document Help</a></li>
                                                <li> <a href="https://gem.gov.in/contactUs" title="Contact Us">Contact Us</a></li>
                                                <li class="last-style"> <a href="https://bidplus.gem.gov.in/servicelists#" title="Contact Us"></a></li>

                                            </ul>
                                        </li>
                                    </ul>


                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-logo-black new-hearder sticky fixed">
                        <div class="container" id="content-fix">
                            <div class="row logwrp">
                                <div class="col-sm-3 col-md-2 clearfix">
                                    <a class="navbar-brand" title="GeM Logo, Government of India" href="/home"><img src="./GeM _ Bid Lists_files/gem-new-logo-v4.svg" alt="GeM Logo, Government of India"></a> 
                                </div>
                                <div class="col-sm-3 col-md-6 col-xs-12">
                                    <div class="radio radio-button serch-radio" id="divSearchCat">
                                        <label class="active-search" rel="Products" category-id="0">Products</label>  
                                        <label rel="Services" category-id="2">Services</label>  
                                        <label rel="Content" category-id="1">Content</label>  
                                        </div>  
                                    <div class="s003">
                                        <form id="srch-main" class="form-inline" action="https://gem.gov.in/searchresult/query/" method="GET">
                                            <div class="inner-form">
                                              
                                                <div class="input-field second-wrap">
                                                    <input autocomplete="off" name="qs" type="text" class="suggester-input suggester form-control" placeholder="Looking for something on GeM?" id="search" value="" style="display:none;">  
                                                    <input name="q" type="text" class="simple-input form-control mkpProductSearchText" placeholder="Looking for something on GeM?" id="search" value="">  
                                                    <input name="lang" type="hidden" id="lang" value="english">  
                                                    <input name="search_category" type="hidden" id="h_search_category" value="">  
                                                    <input name="category_id" type="hidden" id="h_cat_id" value="0">  
                                                    </div>  
                                                <div id="suggest-options" style="display:none;"><ul class="frmCtrl" tabindex="0"><li class="token-search" style="width: 20px;"></li></ul></div>
                                                <div class="input-field third-wrap">
                                                    <button class="btn-search" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-4 col-xs-12">
                                                                
                                    <div id="navbar" class="navbar-collapse row collapse sce">
                                        <ul class="nav navbar-nav bid-navset pull-right" data-smartmenus-id="15963866936363025">
                                   <li class="on-focus">
                                                                                               
                                                         
                                                        
                                                                                                                    
                                                    </li>
                                                    <li><a class="btn-nov1" title="Logout" href="/logout">Logout</a></li>  <li class="on-focus">
                                                                                               
                                                         
                                                    
                                                                                                                    <ul class="dropdown-menu" id="sm-15963866936363025-4" role="group" aria-hidden="true" aria-labelledby="sm-15963866936363025-3" aria-expanded="false">
                                                            
                                                                    <li class=" on-focus">
                                                                        <a href="https://mkp.gem.gov.in/registration/signup#!/buyer" title="Buyers">Buyers</a>
                                                                    </li>
                                                                    
                                                                    <li class="last-style on-focus">
                                                                        <a href="https://mkp.gem.gov.in/registration/signup#!/seller" title="Sellers">Sellers</a>
                                                                    </li>
                                                                                                                            </ul>
                                                    </li>
                                                                                                
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                              
                            </div>
                        </div>
                    </div>

                    <!--MAIN HEADER-->
                </section>
                                <section class="new-nov black-top" style="padding: 0px;">
                    <div class="container" id="content-fix">
                        <div class="row">
                            <div class="col-md-2 col-xs-6">
                                <div class="cat_menu_container">
                                    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_menu_text"><i class="fa fa-bars" style="    margin-right: 13px;"></i> categories </div>
                                    </div>
                                    <ul class="cat_menu">

                                        <li class="hassubs"><a href="https://bidplus.gem.gov.in/servicelists#">Products &nbsp;&nbsp;<i class="fa fa-angle-right" style="font-size:18px"></i></a>
                                            <ul class="dropdown-cate">
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Computers</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//computers-desktop-computer/search">Desktops</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//computers-0806nb/search">Laptops</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//computers-0806aio/search">All in One</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//computers-server/search">Servers</a></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Office Machines</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//duplicating-machines-0901mfm/search">Multifunction Machines</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//computer-printer-0901print/search">Printers</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//paper-processing-machines-and-accessories-paper-shredding-machines79/search" class=" ">Paper Shredding Machines</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//projectors-and-supplies-28052-mmp/search">Multimedia Projector (MMP)</a></p>
                                                </div></li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Automobiles</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//cars/search">Cars</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//buses/search">Buses</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//utility-vehicles/search">Utility Vehicles</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//ambulances/search">Ambulance</a></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Office Supplies</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//un000000-un000000-1-un000000-2-ball-point-pen/search" class=" ">Ball Point Pen</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//gel-pen/search">Gel Pen</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//writing-and-printing-paper-plain-copier-paper/search">Printer or Photo Copier Paper</a></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Appliances</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//domestic-appliances-and-supplies-and-consumer-electronic-products-consumer-electronics-audio-and-visual-equipmentold-28051-tv/search">Televisions</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//air-conditioner/search">Air Conditioner</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//online-ups/search">Online UPS</a></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Furniture</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//revolving-chair/search">Revolving Chair</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//-chairs-office/search">Office Chairs</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//almirah--steel/search">Steel Almirah</a></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Specialized Vehicles</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//25101900-hopper-tipper-dumper/search">Hopper Tipper Dumper</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//tractors/search">Tractors</a></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Softwares</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//operating-system-software/search">Operating System</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//geographic-information-system-gis-software/search">GIS Software</a></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://bidplus.gem.gov.in/servicelists#" class="dropdown-cate-a">Two Wheeler</a>
                                                    <div class="filter-bid clearfix">
                                                        <p><a href="https://mkp.gem.gov.in//two-wheeler-motor-cycles-and-scooters-and-mopeds/search">Motor Cycle</a></p>
                                                        <p><a href="https://mkp.gem.gov.in//bicycle/search">Bicycle</a></p>
                                                    </div>
                                                </li>

                                            </ul>
                                        </li>

                                       <li class="hassubs">
                              <a href="https://mkp.gem.gov.in/services#!/browse/">Services</a>
                             
                           </li>
                           <li><a href="https://mkp.gem.gov.in/browse_nodes/all_categories">Browse All Categories</a></li>
						   <li><a href="https://mkp.gem.gov.in/search?q=">Browse All Products</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <div id="navbar" class="navbar-collapse collapse sce">
                                    <ul class="nav navbar-nav bid-nov-set" data-smartmenus-id="15963866936401765">

                                        <li>
                                            <a href="https://gem.gov.in/page/detail/26/english" title="GeM Advantages" id="nov-color">GeM Advantages</a>
                                        </li>
                                        <li>
                                            <a href="https://gem.gov.in/page/detail/27/english" title="GeM Exclusive" id="nov-color">GeM Exclusive</a>
                                        </li>
                                        <li>
                                            <a href="https://gem.gov.in/userFaqs" title="" id="nov-color">FAQs</a>
                                        </li>
                                        <li>
                                            <a href="https://gem.gov.in/contactUs" title="" id="nov-color">Contact Us</a>
                                        </li>
										<li>
                                            <a href="https://gem.gov.in/user_feedback" title="" id="nov-color">Rate a Seller</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>

                            </div>
                            <div class="col-md-2">
                                <div class="new-on-gem">
                                    <ul class="inline-menu ">
                                        <li><a href="https://gem.gov.in/latest"><img src="./GeM _ Bid Lists_files/new-on.png"> New on GeM</a></li>
                                        <li><a href="https://gem.gov.in/landing/index/allnews" id="scrolltop-maincontent1"><i class="fa fa fa-bell-o"></i></a></li>
                                    </ul>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                            </section>
        </header><link rel="stylesheet" type="text/css" href="./GeM _ Bid Lists_files/progress-wizard.min.css">
<style>
    .input-group-btn .btn{
        font-size: 14.8px;
        line-height: 141%;
    }
    .btn-ser{
        background: white !important;
        color: #000000 !important;
    }
    .pull-right-set{
        position: absolute;
        right: 0;
    }
    .block-active{border-top: 3px solid #f7a62d;}
    .bid_active{background: #f7a62d;}
    .form-control{
            color: #5D4848 !important;
    }
    .filter-nav{
        border-bottom: 1px solid #d7cbcb;
margin-bottom: 14px;
    }
    .nav-tabs{
        border-bottom: 0px solid #ddd;

margin-bottom: 0px;
    }
</style>
<section id="breadCrumb">
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="https://fulfilment.gem.gov.in/fulfilment/home">Home</a></li>
                <li class="divider">/</li>
                <li style="text-transform:none;">
                Bid List                </li>
            </ul>

        </div>
    </div>
</section>
<section id="conten ">
    <div class="container" id="skip_main_content">
        <div class="row">

            <!-- tab content -->
            <div class="">
                <div class="tab-content"> 
                    <!------------------------------- Tab No 1 ---------------------------------->
                    <div class="tab-pane active text-style" id="tab1">
                                                                        <!--  <h4 class="bidra">Bid/RA Notices </h4>-->
                        <div class=" col-md-12">
                            <p style="text-align: right; margin-top: -10px; margin-bottom: 2px;"><a href="https://bidplus.gem.gov.in/advance-search" target="_blank">Advanced Search <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
                            <div id="exTab2" class="row">
                                <div class="row">
                                    <div class="col-md-12">
                                         <div class="filter-nav">
                                         <div class="row">
                                            
                                    <div class="col-md-7">
                                        <ul class="nav nav-tabs sce">
                                            <li class=""><a href="#">Bids / RAs</a></li>
                                            <li class="active"><a href="#">Service Bids/RAs</a></li>
                                            <li class=""><a href="#">Bunch Bids/RAs</a></li>
                                            <li class=""><a href="#">Service Bunch Bids/RAs</a></li>
                                            <li class=""><a href="#">Bid to RAs</a></li>
                                        </ul>
                                    </div>
                                               
                                         </div>
                                               <div class="clearfix"></div>
                                    </div>
                                    </div>
                                    <div class="col-md-5 col-xs-12 pull-right-set">
                                        
                                        <form method="get" action="https://bidplus.gem.gov.in/servicelists">
                                            <div class="input-group">
                                                <div class="input-group-btn search-panel on-focus">
                                                    <button type="button" class="btn btn-ser btn-default dropdown-toggle" data-toggle="dropdown">
                                                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="https://bidplus.gem.gov.in/servicelists#bidNo">Bid/RA Number</a></li>
                                                        <li class="last-style"><a href="https://bidplus.gem.gov.in/servicelists#bidcat">Item</a></li>
                                                    </ul>
                                                </div>
                                                <input type="hidden" id="search_param" name="search_param" value="all">         
                                                <input type="text" class="form-control" id="search_by" name="search_by" placeholder="Enter search terms" value="">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default search_btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-content sce">
                                    <div class="tab-pane active" id="1">
                                                        @foreach($tncs as $tnc)

                                        <div id="pagi_content">
                                                    <div class="border block " style="display: block;">
                                                        <div class="block_header">
                                                            <p class="bid_no pull-left"> BID NO: <a style="color:#fff !important" href="/tnc/{{ $tnc->id }}">GEM/2020/B/{{ rand(100,999) }}-{{ $tnc->id }}</a></p> 
                                                            <p class="pull-right view_corrigendum" data-bid="1755206" style="display:block; margin-left: 10px;"><a href="https://bidplus.gem.gov.in/servicelists#">View Corrigendum</a></p>

                                                             <div class="clearfix"></div>
                                                        </div>

                                                        <div class="col-block">
                                                            <p><strong style="text-transform: none !important;">Item(s): </strong><span>Cleaning &amp; Sanitation and Disinfection Service</span></p>
                                                            <p><strong>Quantity Required: </strong><span>1089</span></p>
                                                            
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-block">
                                                            <p><strong>Department Name And Address:</strong></p>
                                                            <p class="add-height">
                                                                Ministry Of Communications<br> Department Of Posts<br> Rajasthan Postal Circle Department Of Posts                                                            </p>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-block">
                                                            <p><strong>Start Date: </strong><span>22-06-2020 01:13 PM</span></p>
                                                            <p><strong>End Date: </strong><span>03-08-2020 09:00 AM</span></p>
                                                            <div class="clearfix"></div>

                                                        </div>


                                                                                                                <div class="clearfix"></div>
                                                    </div>
                                                    @endforeach

                                                    



                                                            

                                                </div>
                                        <div id="myModal1" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><b>Buyer requirement comparison</b></h4>
                                                    </div>
                                                    <div class="modal-body" id="chart_data2">

                                                    </div>

                                                </div>

                                            </div>
                                        </div> 

                                        <div id="myModal2" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><b>Incomplete Profile</b></h4>
                                                    </div>
                                                    <div class="modal-body" id="">
                                                        <p class="phead"> 
                                                            Please ensure your profile is complete (PAN should be verified, Registered Address and Primary Bank Account should be present) 
                                                        </p>
                                                        <a href="https://bidplus.gem.gov.in/servicelists" id="forceRedirect"><input type="button" class="btn btn-primary" value="Go"></a>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> 
                                        
                                         <div id="myModal3" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><b>Seller Permission</b></h4>
                                                    </div>
                                                    <div class="modal-body" id="chart_data3">
                                                        <p>You do not have the permission to access Bids.Please contact your primary seller to enable respective role for your user Id.</p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></section>

            <script type="text/javascript" src="./GeM _ Bid Lists_files/bootbox.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '.view_requirement', function (e) {
            var bid_id = $(this).attr('data-bid_id');
            e.preventDefault();
            $.ajax({
                url: "https://bidplus.gem.gov.in/bidding/sellerbid/getAttributes/" + bid_id,
                async: false,
                type: "POST",
                data: {'csrf_bd_gem_nk': '36f94cee3b5d8462ad4ec0e0197bf4c8'},
                dataType: "html",
                success: function (data) {
                    if (data)
                    {
                        $('#chart_data2').html(data);
                    }
                }
            });
        });
        
        $('body').on('click', '.view_requirement_ser', function (e) {
            var bid_id = $(this).attr('data-bid_id');
            e.preventDefault();
            $.ajax({
                url: "https://bidplus.gem.gov.in/bidding/sellerbid/getAttributesService/" + bid_id,
                async: false,
                type: "POST",
                data: {'csrf_bd_gem_nk': '36f94cee3b5d8462ad4ec0e0197bf4c8'},
                dataType: "html",
                success: function (data) {
                    if (data)
                    {
                        $('#chart_data2').html(data);
                    }
                }
            });
        });
        
        $('.view_corrigendum').click(function(e) {
             e.preventDefault();
        var dataBid = $(this).attr('data-bid');
         $.ajax({
                                    url: "https://bidplus.gem.gov.in/bidding/bid/viewCorrigendum/" + dataBid,
                                    type: "POST",
                                    dataType: "html",
                                    data: {'csrf_bd_gem_nk': '36f94cee3b5d8462ad4ec0e0197bf4c8'},

                                    success: function (data) {
                                        if(data==0)
                                        {
                                            bootbox.alert('No corrigendum found for this bid.');
                                        }
                                        else
                                        {
                                             $('#myModal5').modal('show');
                                             $('#atcBody').html(data);
                                        }
                                       
                                    }
                                });
        });


        $('body').on('click', '.participateBtn', function (e) {
            var HREF = $(this).attr('data-url');
            var profileCheck = 1;
            e.preventDefault();
            if (profileCheck == 1)
            {
                $.ajax({
                    url: "https://bidplus.gem.gov.in/bidding/bid/profileIncomplete/",
                                        async: false,
                                        type: "POST",
                                        data: {'csrf_bd_gem_nk': '36f94cee3b5d8462ad4ec0e0197bf4c8'},
                                        dataType: "json",
                                        success: function (data) {
                                            if (data)
                                            {
                                                if (data != "" && data == 1)
                                                {
                                                    $('#myModal2 .phead').html('Failed to verify your profile due to an intermittent issue, please try again!');
                                                    $("#myModal2").modal();
                                                } else if (data != "" && data.redirect_url.length > 10 && profileCheck == 1)
                                                {
                                                    $('#forceRedirect').attr('href', data.redirect_url);
                                                    var message = data.message;
                                                    if (message != "")
                                                        $('.phead').html(message);

                                                    $("#myModal2").modal();

                                                }
                                            } else
                                            {
                                                window.location = HREF;
                                            }
                                        }
                                    });
                                } else
                                {
                                    window.location = HREF;
                                }

                            });


                            $('.search-panel .dropdown-menu').find('a').click(function (e) {
                                e.preventDefault();
                                var param = $(this).attr("href").replace("#", "");
                                var concept = $(this).text();
                                $('.search-panel span#search_concept').text(concept);
                                $('.input-group #search_param').val(param);
                            });
                            var matches = 'Filter by';
                            var hrefid = $('#search_param').val();
                            $('.search-panel span#search_concept').text(matches);
                            if (hrefid !== 'all')
                            {
                                matches = $("a[href='#" + hrefid + "']").text();
                                $('.search-panel span#search_concept').text(matches);
                            }

                            $('.download_emd_doc').click(function () {

                                var bid_id = $(this).attr('data-bid_id');
                                showLoader();
                                $.ajax({
                                    url: "https://bidplus.gem.gov.in/bidding/sellerbid/epbgemd_darftdocument/" + bid_id,
                                    type: "POST",
                                    dataType: "json",
                                    data: {'csrf_bd_gem_nk': '36f94cee3b5d8462ad4ec0e0197bf4c8'},

                                    success: function (data) {
                                        hideLoader();
                                        console.log(data);
                                        if (data.emd_requestid && data.emd_requestid != "")
                                        {
                                            window.location.href = 'https://bidplus.gem.gov.in/show_EMDepbgDocument/' + data.emd_requestid;
                                        }
                                    }
                                });

                            });
                        });

</script>
 <div id="myModal5" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title" id="myModalLabel"><b>Corrigendum</b></h4>
                                            </div>
                                            <div class="modal-body" id="atcBody">
                                            </div>
                                                        <div class="modal-footer" style="text-align:justify;font-size: 12px;">Disclaimer: This corrigendum has been published by the Buyer after due approval of the Competent Authority in Buyer Organization. Buyer organization is solely responsible for the impact of the above clauses on the bidding process, its outcome and consequences thereof including any eccentricity / restriction arising in the bidding process owing to publication of such corrigendum due to modification of technical specification and / or terms and conditions governing the bid. Buyer has been allowed to publish this corrigendum for upfront information of prospective sellers so that bidder can respond to bid with matching catalog and conditions of bid (if modulated due to publication of the corrigendum on the GeM portal). However, it is to be noted that buyer organization is solely responsible for the corrigendum.</div>
                                                    </div>

                                    </div>
  </div><link href="./GeM _ Bid Lists_files/gigw-style.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
    #loaderPopUp,#popUp{left:50%;margin-top:-50px;border:5px solid #add8e6;padding:10px;background:#fff;color:#000;position:fixed}#loaderPopUp{width:18%;top:50%;margin-left:-115px;z-index:9999}#popUp{width:40%;top:20%;margin-left:-250px;z-index:99999}#loaderPopUp p{margin-top:10%;font-size:20px}.backgroundLoder{position:fixed;left:0;top:0;width:100%;height:100%;z-index:9999;background:#000;opacity:.5}


    #notisPopUp{left:50%;border:5px solid #add8e6;padding:10px;background:#fff;color:#000;position:fixed}
    #notisPopUp{width:40%;top:10%;margin-left:-250px;z-index:99999}
    #notisPopUp a{ color:#000;}
    #notisPopUp a:hover{color:#007fff}
    .fsco img {
        width: 1.7em;
        margin-bottom: 0.3em;
        margin-left: 0.3em;
    }
    .incident-gem {
        margin-top: 23px !important;
    }
    .stqc-gem{
        padding: 1px 0px 5px 0px;
    border-radius: 4px;
    width: 80%;
    float: right;
    }
</style>

<div class="clearfix"></div>
<!--FOOTER-->

<section id="footer" class="sec blbg sce">
    <!--<div class="footer-top">
        <div class="container">
            <div class="lowerFooterLink" id="footer-link">

                <ul>
                    <li>
                        <a href="https://gem.gov.in/training">Training</a>
                    </li>
                    <li>
                        <a href="https://gem.gov.in/forum">Forums </a>
                    </li>
                    <li>
                        <a href="https://gem.gov.in/gallery">Gallery</a>
                    </li>

                    <li>
                        <a href="https://gem.gov.in/support">Resources </a>
                    </li>
                    <li >
                        <a href="https://gem.gov.in/aboutus">About Us </a>
                        <span style="position: relative; left: 0.5em;color:#000">|</span>

                    </li>
                    <li >
                        <a href="https://gem.gov.in/mou">MOUs</a>

                    </li>
                    <li>
                        <a href="https://gem.gov.in/statistics">Statistics</a>
                    </li>
                    <li>
                        <a href="https://gem.gov.in/contactUs">Contact Us</a>
                    </li>
                    <li>
                        <a href="https://gem.gov.in/landing/index/careers">Careers</a>
                    </li>
                    <li>
                        <a href="https://gem.gov.in/RTI" title="Right to Information">RTI</a>
                    </li>
                    <li>
                        <a href="https://gem.gov.in/testimonial" title="Right to Information">Testimonials</a>
                    </li>
                </ul>

                <div class="clearfix"></div>

            </div>

        </div>
        <div class="clearfix"></div>
    </div>-->
    <div class="clearfix"></div>            
    <div class="">
       <div class="cont" style="padding-bottom: 13em;">
      <div class="col-md-2 col-xs-6 col-sm-6">
         <div class="list-inline secb gem-fot">
            <h6>WEB INFO</h6>            
            <p>
               <a class="internalLink" target="_blank" href="https://gem.gov.in/termsCondition" title="Terms of Use">Terms of Use</a>
            </p>
            <p>
               <a href="https://gem.gov.in/websitePolicies" title="">Website Policies </a>
            </p>
            <p>
               <a href="https://gem.gov.in/help" title="Document Help">Document Help</a>
            </p>
            <p><a href="https://gem.gov.in/sitemap" title="Site Map">Site Map</a></p>
            <p>
               <a href="https://gem.gov.in/web-information-manager" title="Web Information Manager">Web Information Manager</a>
            </p>
         </div>
      </div>
      <div class="col-md-2 col-xs-6 col-sm-6">
         <div class="list-inline secb gem-fot">
            <h6>ABOUT <span style="text-transform: none;">GeM</span></h6>
            <p>
               <a href="https://gem.gov.in/aboutus" title="Introduction to GeM">Introduction to GeM</a>
            </p>
             <p>
               <a href="https://gem.gov.in/statistics" title="Statistics">Statistics</a>
            </p>
            <p>
               <a href="https://gem.gov.in/RTI" title="Right to Information">Right to Information</a>
            </p>
             <p>
               <a href="https://sso.gem.gov.in/ARXSSO/oauth/login" title="Analytics"> Analytics</a>
            </p>
            <p>
               <a href="https://gem.gov.in/new-categories" title="New on GeM"> New on GeM</a>
            </p>
             <h6 class="incident-gem"><a href="https://gem.gov.in/brand-gem" title="BRAND GeM" style="text-transform: none ;">BRAND GeM</a></h6>
            
         </div>
      </div>
      <div class="col-md-2 col-xs-6 col-sm-6">
         <div class=" list-inline secb gem-fot">
            <h6>NEWS &amp; EVENTS</h6>
            <p><a href="https://bidplus.gem.gov.in/media" title="Newsroom">Newsroom</a></p>
            <p><a href="https://gem.gov.in/gallery" title="Gallery">Gallery</a></p>
            <p><a href="https://bidplus.gem.gov.in/landing/index/allnews" title="Notifications">Notifications</a></p>
            <p><a href="https://gem.gov.in/ccm_data" title="Consultative Committee Meeting">CCM Schedule </a></p>
            <p><a href="https://gem.gov.in/forum" title="Forums">Forums </a></p>
             <h6 class="incident-gem"><a href="https://gem.gov.in/testimonial_buyers" title="Testimonials">Testimonials</a></h6>
         </div>
      </div>
      <div class="col-md-2 col-xs-6 col-sm-6">
         <div class="list-inline secb gem-fot">
            <h6>Resources</h6>
			<p>
               <a href="https://assets-bg.gem.gov.in/resources/pdf/GeM_handbook.pdf" title="Forms and Formats">GeM Handbook</a>
            </p>
            <p>
               <a href="https://gem.gov.in/support/government_oms_circulars" title="Office Memorandum/Circulars">OM’s/Circulars</a>
            </p>
            <p>
               <a href="https://gem.gov.in/support/terms_conditions" title="Terms and Conditions ">Terms and Conditions </a>
            </p>
             <p>
               <a href="https://gem.gov.in/support/buyers" title="Policies/Manuals">Policies/Manuals</a>
            </p>
            
            <p>
               <a href="https://gem.gov.in/support/miscellaneous" title="Miscellaneous">Miscellaneous</a>
            </p>
           <h6 class="incident-gem" style="text-transform: none;"><a href="https://gem.gov.in/mou" title="Memorandum of Understanding">MoUs</a></h6>
           
                     </div>
      </div>
      <div class="col-md-2 col-xs-6 col-sm-6">
         <div class="list-inline secb gem-fot">
            <h6>Training</h6>            
            <p><a class="internalLink" href="https://lms.gem.gov.in/" target="_blank" title="Learning Management System">LMS</a></p>
            <p><a href="https://gem.gov.in/training" title="Training Calendar">Training Calendar</a></p>
            <p><a href="https://gem.gov.in/training/training_module" title="Training Module">Training Module</a></p>
            <p><a href="https://gem.gov.in/training/facilitators" title="Facilitators">Facilitators</a></p>
            <p><a download="GeM New Logo" href="https://gem.gov.in/resources/images/download-gem-logo.jpg" title="Download GeM Logo">Download GeM Logo</a></p>
           
           
         </div>
      </div>
      <div class="col-md-2 col-xs-6 col-sm-6">
         <div class="list-inline secb gem-fot">
            <h6>Need Help ?</h6>
            <p><a href="https://gem.gov.in/userFaqs" title="Frequently Asked Questions (FAQs)">FAQs</a></p>
            <p><a href="https://gem.gov.in/training/videos/buyers" title="Video Guides">Video Guides</a></p>
            <p><a href="https://gem.gov.in/gemtickets/create" title="Raise-a Ticket">Raise-a Ticket</a></p>
            <p><a href="https://gem.gov.in/contactUs" title="Contact Us">Contact Us</a></p>
            <p><a href="https://gem.gov.in/landing/index/careers" title="Careers">Careers</a></p>
         </div>
      </div>
   </div>
 <div class="clearfix"></div>
</div>
<div class="footer-logo-new hidden-xs sce">
    <div class="col-sm-12 vis ">
         <ul class="text-center list-inline flogo ">
             <li>
               <a class="externalLink" href="http://commerce.gov.in/" title="External link that opens in a new window" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/dept-commerce.png" alt="Ministry of Commerce and Industry"></a>
            </li>
            <li>
               <a class="externalLink" href="https://msme.gov.in/" title="External link that opens in a new window" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/msme-min.png" alt="Ministry of Micro, Small  Medium Enterprises"></a>
            </li>
            <li>
               <a class="externalLink" href="https://www.gst.gov.in/" title="External link that opens in a new window" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/gst-min1-min.png" alt="Goods and Services Tax"></a>
            </li>
            <li>
               <a class="externalLink" href="http://www.makeinindia.com/home" title="External link that opens in a new window" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/makeinindia.png" alt="make in india"></a>
            </li>
             <li>
                 <a class="externalLink" href="http://digitalindia.gov.in/" title="External link that opens in a new window" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/digital-india.png" alt="Digital India"></a>
            </li>
           
            <li>
               <a class="externalLink" href="https://www.comodo.com/" title="External link that opens in a new window" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/comodo_secure_seal.png" alt="comodo secure seal"></a>
            </li>
             <li>
               <a class="internalLink" href="https://bidplus.gem.gov.in/cppp" title="CPPP Tenders" target="_blank" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/cppp-tendars-v1.png" alt="central public procurement portal(CPPP)"></a>
            </li>
            <li>
               <a class="externalLink" href="https://www.india.gov.in/" title="External link that opens in a new window" rel="noopener noreferrer"><img src="./GeM _ Bid Lists_files/gem-india.jpg" alt="india.gov.in"></a>
            </li>
            <li>
               <a class="internalLink" href="https://assets-bg.gem.gov.in/resources/pdf/Application_Security_Test_Report_GeM_21122018.pdf" title="STQC Certification for Quality Evaluation of GeM" target="_blank"><img src="./GeM _ Bid Lists_files/stqc-1-min.png" alt="STQC"></a>
               <a class="internalLink" href="https://assets-bg.gem.gov.in/resources/pdf/stqc.pdf" title="STQC" target="_blank"><img src="./GeM _ Bid Lists_files/stqc-2-min.png" alt="Standardisation Testing and Quality Certification (STQC)"></a>	  
            </li>
         </ul>
       
      </div>
	  <div class="clearfix"></div>
   </div>
    <div class="footer-logo-bot sce">
   <div class="cont ">
   
      <div class="col-sm-2 vis col-xs-6 ">
       <p class="cpy ">© 2020 GeM All rights reserved </p>
			
        </div>
         <div class="col-sm-6 vis col-xs-6 vis text-center">
             <div class="stqc-gem">
         <!--<p style="margin: 0;">Last Updated: <strong>04-Jan-2019</strong></p>-->
          <p class="cpy ">Site operated and maintained by Managed Service Provider</p>
         </div>
      </div>
        <div class="col-sm-4 col-xs-12 text-center ">
         <ul class=" list-inline fsco ">
            <li>
               <a href="https://twitter.com/GeM_India" target="_blank" rel="noopener noreferrer" class="externalLink"><img src="./GeM _ Bid Lists_files/twitters.svg" class="svg" alt="twitter"></a>
               <a href="https://www.facebook.com/govGeM/" target="_blank" rel="noopener noreferrer" class="externalLink"><img src="./GeM _ Bid Lists_files/facebook-icons.svg" alt="fb" class="svg "></a>
               <a href="https://www.youtube.com/channel/UC1LaBWVVZv3k23BZApfDlsQ" target="_blank" rel="noopener noreferrer" class="externalLink"><img src="./GeM _ Bid Lists_files/youtube_new-gem.svg" alt="you tube" class="svg "></a>
               <a href="https://www.linkedin.com/company/government--e--marketplace-gem-?trk=biz-companies-cym" target="_blank" rel="noopener noreferrer" class="externalLink"><img src="./GeM _ Bid Lists_files/inc-v1.svg" alt="linkedin" class="svg "></a>
               <a href="https://www.slideshare.net/GeMProcurementReimag" target="_blank" rel="noopener noreferrer" class="externalLink"><img src="./GeM _ Bid Lists_files/slideshare.svg" alt="slide share" class="svg "></a>
            </li>
         </ul>
      </div>
    
     
   </div>
    <div class="clearfix"></div>
   </div>
</section>

<script async="" charset="UTF-8" src="./GeM _ Bid Lists_files/029b3b98-dab1-4bdc-a2a0-d9f9d02f8d65.js" type="text/javascript"></script>
<!--FOOTER ENDS--> 
<input type="hidden" id="cname" value="csrf_bd_gem_nk">
<input type="hidden" id="chash" value="36f94cee3b5d8462ad4ec0e0197bf4c8">

<!--GeM Loader -->
<div class="backgroundLoder" style="display:none"></div>
<div id="loaderPopUp" style="display:none">
    <img src="./GeM _ Bid Lists_files/gemloader.gif" style="float:left"><p>Please wait...</p>
</div>
<!--// GeM Loader -->



<!--GeM Loader Script --> 
<script type="text/javascript">

    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $('#myBtn').show();
        } else {
            $('#myBtn').hide();
        }
    }

// When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
    $.showPopUp = function () {
        $("#popUp").fadeIn(1000);
        $(".backgroundLoder").fadeIn(500);
    }
    function hidePopUp() {
        $("#popUp").hide();
        $(".backgroundLoder").hide();
    }
    $.showLoader = function () {
        $("#loaderPopUp").fadeIn(1000);
        $(".backgroundLoder").fadeIn(500);
    }

    $.hideLoader = function () {
        $("#loaderPopUp").hide();
        $(".backgroundLoder").hide();
    }

    function shownotification() {
        $("#notisPopUp").fadeIn(1000);
        $(".backgroundLoder").fadeIn(500);
    }

    function hidenotification() {
        $("#notisPopUp").hide();
        $(".backgroundLoder").hide();
    }
    $('a#notifyseller').on('click', function () {

        shownotification();
        return false;
    });

    $('#sellernotifyclose').on('click', function () {
        hidenotification();
        return false;
    });

</script>
<!--// GeM Loader -->
<!--GOOGLE ANALYTICS--> 
<script>
    function showLoader(LoaderMsg)
    {

        $('.LoaderMsg').html(LoaderMsg);
        $('#myModalLoader').modal('show');
    }

    function hideLoader()
    {
        $('#myModalLoader').modal('hide');
    }




    var baseUrl = "https://bidplus.gem.gov.in/";
</script>

<script>
    $(document).on("click", '.saveSpecs:visible', function (e) {

        e.preventDefault();
        var variantID = $('#currentVariant').val();
        var bid_type = $('#bid_type').val();
        var token = $('#token').val();
        var detailID = $(this).attr('data-biddetail');
        var itemID = $('#currentItem').val();
        var btype = $('.productMain[data-bdid=' + detailID + ']').data('ptype');//0=>product(goods), 1=> services                
        var ajaxexe = false;
        if (btype == 1)
        {
            var count = 0;
            var error_count = 0;
            var ttl_cnt = $('#ttl_cnt').val();
            $("[spec_type='core']").each(function () {
                if ($(this).val() == null || $(this).val() == '') {
                    error_count++;
                }
            });
            if (error_count == 0)
            {
                ajaxexe = true;
            } else
            {
                alert('Please select all specification parameters');
            }
            var minimum_rate = $('#minimum_rate').val();
            if(minimum_rate!='' && minimum_rate <= 0)
            {
                $('#minimum_rate').focus()
                alert('Please provide valid minimum rate');
                return false;
            }
        } else
        {
            ajaxexe = true;
        }
        if (ajaxexe == true)
        {
            $.ajax({
                url: "https://bidplus.gem.gov.in/bidding/saveSpecs/",
                async: false,
                type: "POST",
                data: $('#form_att').serialize() + "&bid_type=" + btype + "&variantID=" + variantID + "&itemID=" + itemID + "&detailID=" + detailID + "&token=" + token + "&csrf_bd_gem_nk=36f94cee3b5d8462ad4ec0e0197bf4c8&minimum_rate="+minimum_rate,
                dataType: "html",
                success: function (data) {
                    if (data)
                    {
                        if (data == 1)
                        {
                            location.reload();
                        }

                    }

                }
            });
        }

    });
    $(document).on("click", '.step1_save:visible', function (e) {
        e.preventDefault();
        var bidID = $('#bidID').val();
        var bid_type = $('#bid_type').val();
        $.ajax({
            url: "https://bidplus.gem.gov.in/bidding/step1_save/",
            async: false,
            type: "POST",
            data: "bidID=" + bidID + "&bid_type=" + bid_type + "&csrf_bd_gem_nk=36f94cee3b5d8462ad4ec0e0197bf4c8", //$('#form_contract').serialize() + "&
            dataType: "html",
            success: function (data) {
                if (data)
                {
                    window.location.href = data;
                }

            }
        });
    });
    
    $(document).on("click", '.saveConsignee:visible', function (e) {
        var kk = 1;
        $('input[name="delivery_day[]"]').each(function() {
            if($(this).val() > max_days){
                 return false;
            }
            if($(this).val()>180){
                kk++;
                return true;
            }
        });
        if(kk==1){
            saveConsgineeDetails();
        }else{
            e.preventDefault();
            $('#CAModal').modal('show');
            return false;
        }
    });
    function saveConsgineeDetails(){
        bootbox.confirm("Are you sure you want to save these consignees ?", function (result) {
            if (result == true)
            {
                $(".bootbox-confirm").find('.btn-primary').attr("disabled",true);
                //e.preventDefault();
                var variantID = $('#currentVariant').val();
                var detailID = $(this).attr('data-biddetail');
                var itemID = $('#currentItem').val();
                var formData = $(document).find('form').serialize();
                var detailID = $('#bdID').val();
                var btype = $('.productMain[data-bdid=' + detailID + ']').data('ptype');//0=>product(goods), 1=> services                 
                $.ajax({
                    url: "https://bidplus.gem.gov.in/bidding/saveConsignee/",
                    async: false,
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (data) {
                        $(".bootbox-confirm").find('.btn-primary').attr("disabled",false);
                        if (data)
                        {
                            if (data.status == 0)
                            {
                                bootbox.alert(data.msg, function () {
                                    window.location = window.location;
                                });
                                return false;
                            }
                            if (data.status == 1)
                            {
                                bootbox.alert(data.msg, function () {
                                    window.location = window.location;
                                });
                                //location.reload();
                            }

                        }

                    }
                });
            }

        });
    }


    $(document).ready(function () {
        $('.fm').click(function (e) {
            e.preventDefault();
            var str = $('body').css('font-size');
            var res = str.replace("px", "");
            if (res > 10) {
                $('body').css('font-size', parseInt(res - 1));
				$('.fp').css("opacity", " unset");
            } else {
                $('.fm').css("opacity", " 0.3");
            }
        });
        $('.fp').click(function (e) {
            e.preventDefault();
            var str = $('body').css('font-size');
            var res = str.replace("px", "");
            if (res < 25) {
                $('body').css('font-size', parseInt(res) + 1);
				$('.fm').css("opacity", " unset");
            } else {
                $('.fp').css("opacity", " 0.3");
            }
        });
        $('.fdn').click(function (e) {
            e.preventDefault();
            var myCookie = checkMode();
            if (myCookie == null) {
                document.cookie = "themeOption=1; domain=.gem.gov.in; path=/;";
                $('body').addClass('nightmode');
            } else {
                if(myCookie == 1) {
                    document.cookie = "themeOption=0; domain=.gem.gov.in; path=/;";
                    $('body').removeClass('nightmode');
                } else {
                    document.cookie = "themeOption=1; domain=.gem.gov.in; path=/;";
                    $('body').addClass('nightmode');
                }
            }
//            if($('body').hasClass('nightmode')) {
//                document.cookie = "nightmode=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=.gemorion.org; path=/;";
//            } else {
//                document.cookie = "nightmode=1; domain=.gemorion.org; path=/;";
//            }
//            $('body').toggleClass('nightmode');
            
            function checkMode() {
                var dc = document.cookie;
                var prefix = "themeOption=";
                var begin = dc.indexOf("; " + prefix);
                if (begin == -1) {
                    begin = dc.indexOf(prefix);
                    if (begin != 0) return null;
                } else {
                    begin += 2;
                    var end = document.cookie.indexOf(";", begin);
                    if (end == -1) { end = dc.length; }
                }
                return decodeURI(dc.substring(begin + prefix.length, end));
            }
        });
        $('.fd').click(function (e) {
            e.preventDefault();
            $('body').css('font-size', '1.5em');
             $('.fp').css("opacity", " unset");
        $('.fm').css("opacity", " unset");
        });

        $('.products').click(function () {
            $('.blocks').addClass('productMain');
            $('.blocks').removeClass('consigneeMain');
        });

        $('.consignees').click(function () {
            $('.blocks').removeClass('productMain');
            $('.blocks').addClass('consigneeMain');
        });
        $(document).on("click", '.productMain:visible', function (e) {
            //  showLoader('Please wait while system is fetching product specifications');
            e.preventDefault();
            var btype = $(this).data('ptype');//0=>product(goods), 1=> services
            var specMsg = 'Please wait while we are fetching product specifications';
            if (btype == 1)
            {
                specMsg = 'Please wait while we are fetching service specifications';
            }
            showLoader(specMsg);
            $('.color-bid').removeClass('active');
            $(this).children('.color-bid').addClass('active');
            var hasSaved = $(this).children('.color-bid').hasClass('specsSaved');
            var variantID = $(this).attr('data-variant');
            var category = $(this).attr('data-category');
            $('#currentVariant').val(variantID);
            var itemID = $(this).attr('data-item');
            $('#currentItem').val(itemID);
            var token;
            typeof token;
            token = $('#token').val();
            if (typeof token == 'undefined')
            {
                token = 'unavailable';
            }
            var bdid = $(this).attr('data-bdid');
            var roleid = 0;

            var btype = $(this).data('ptype');//0=>product(goods), 1=> services

            $.ajax({
                url: "https://bidplus.gem.gov.in/bidding/showSpecs/",
                async: false,
                type: "POST",
                data: "csrf_bd_gem_nk=36f94cee3b5d8462ad4ec0e0197bf4c8&variantID=" + variantID + "&itemID=" + itemID + "&btype=" + btype + "&token=" + token + "&bdid=" + bdid,
                dataType: "html",
                success: function (data) {
                    setTimeout(function () {
                        hideLoader();
                    }, 100);

                    if (data != 0)
                    {
                        $('.specsDiv').find("span:first").html("<p class='phead'>Specification for " + category + "</p>");
                        $('.specsDiv').show();
                        $('.techSpecs').html(data);
                        if (hasSaved == false && roleid != 5)
                        {
                            $('#Step1End').html('<input data-bidDetail="' + bdid + '" type="button" value="Save" class="saveSpecs btn btn-md btn-primary" style="float:right">');
                        }
                        if (btype == 1) {
                            //$('.my-select').multiSelect();   
                        }

                    } else
                    {
                        $('.specsDiv').show();
                        $('.techSpecs').html('There is some issue while fetching technical specifications please try again !');
                    }

                }
            });
        });

    });</script>
<script> 
$(document).ready(function(){ 
$('.on-focus').keyup(function (e) { 
$(this).addClass('open'); 
}); 
$(".on-focus li").focusout(function(e){ 
$(this).removeClass('open'); 
$(this).trigger('mouseover'); 
$('.last-style').on('focusout',function(e){ 
$(this).parent().parent().removeClass('open'); 
}) 
//$('.on-focus').removeClass('hover'); 
}); 

}); 
</script>
<!--GOOGLE ANALYTICS--> 




<div id="myModalLoader" class="modal">
    <div class="loader">
        <img src="./GeM _ Bid Lists_files/gemloader.gif" style="float:left">
        <p style="margin-top: 12px;" class="LoaderMsg"> </p> 

    </div>
</div>

<script>
var externalLnk;
$( document ).ready(function() {
    $('.externalLink').on('click',function(event){
        event.preventDefault();
        var result = confirm('This will open a new tab and lead you to an external website.'); 
        $('.externalLink[href="'+externalLnk+'"]').attr('target','_blank');
        var url = externalLnk;
        if (result == true) { 
            var url= $(this).attr('href');
            window.open(url,'_blank');
        }
        /*var that = $(this);
        var p = $('.cd-popup').children().children()[0];
        $(p).html('This link  opens in a New Tab!');
        event.preventDefault();
        $('.cd-popup').addClass('is-visible').show();
        //close popup
        $('.cd-popup').on('click', function(event){
            if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
                    event.preventDefault();
                    $(this).removeClass('is-visible');
            }
            if($(event.target)[0].innerHTML=='OK'){
                $(this).removeClass('is-visible');
                that.attr('target','_blank');
                var url = that.attr('href');
                window.open(url,'_blank')
            } else {
                $(this).removeClass('is-visible');
                that.removeAttr('target');
            }
        });
            //close popup when clicking the esc keyboard button
        $(document).keyup(function(event){
            if(event.which=='27'){
                $('.cd-popup').removeClass('is-visible');
            }
        });*/
    });
});
</script>
<!-- for internal Link -->
<script>
$( document ).ready(function() {
    $('.internalLink').on('click',function(event){
        event.preventDefault();
        var result = confirm('This link opens in a new tab.'); 
            $('.internalLink[href="'+internalLink+'"]').removeAttr('target');
            var internalLink = $(this).attr('href');
                var url = internalLink;
            if (result == true) { 
               var url = internalLink;
            window.open(url,'_blank')
            }
            else{
                $('.internalLink[href="'+internalLnk+'"]').removeAttr('target');
            }
    });
});
</script>
<!-- for Language Change-->
<script>
function redirect(val,event){
    var p = $('.cd-popup').children().children()[0];
    $(p).html('This will lead you to GeM '+ val.toUpperCase() + ' website');
    event.preventDefault();
    $('.cd-popup').addClass('is-visible').show();
    //close popup
    $('.cd-popup').on('click', function(event){
        if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
                event.preventDefault();
                $(this).removeClass('is-visible');
        }
        if($(event.target)[0].innerHTML=='OK'){
            var base_url='https://bidplus.gem.gov.in/';
            window.location.href = goto+'/?lang='+val;
        } else {
            window.location.reload();
        }
    });
//close popup when clicking the esc keyboard button
    $(document).keyup(function(event){
    if(event.which=='27'){
            $('.cd-popup').removeClass('is-visible');
}
    });
}
	$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 50) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
$('.menuac').click(function(){
     
   if($(this).hasClass('meact')){
      $('.menuac').removeClass('meact');
   }else{
	   $('.menuac').removeClass('meact');
     $(this).addClass('meact');
   }
    
});

$('.sd, .mse').click(function(e) {
        e.preventDefault();
        $('.mmen').toggleClass('open');
    }); 

</script>
<div class="cd-popup" style="display:none;" role="alert">
    <div class="cd-popup-container">
            <p id="confirm-msg"></p>
            <ul class="cd-buttons">
                    <li><a href="javascript:void(0);">OK</a></li>
                    <li><a href="javascript:void(0);">Cancel</a></li>
            </ul>
            <a href="javascript:void(0);" class="cd-popup-close img-replace">Close</a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->
<div id="flox-chat-iframe-wrapper-outer" style="width: 1351px;"><div id="flox-chat-iframe-wrapper" class="contract" style="transform-origin: 0% 100%; left: 20px; border-radius: 25px 25px 25px 0px; display: none; bottom: 30px;"><iframe id="flox-chat-iframe" name="flox-chat-bot-iframe" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" allow="geolocation *; microphone; camera" src="./GeM _ Bid Lists_files/saved_resource.html" style="width: 100%; border-radius: 25px 25px 25px 0px;"></iframe></div><div id="flox-chat-close" class="showHeader" title="Close" style="background: rgb(255, 255, 255); left: 390px; border-radius: 25px; display: none; bottom: 546px;"><img src="./GeM _ Bid Lists_files/1589391907738_close.png" height="12" width="12" alt="Close Xploree" id="floxChatCloseImage" style="width: 12px; height: 12px;"></div></div><div id="flox-chat-img" tabindex="0" class="flox-chat-img slideright" style="background: rgb(65, 165, 224) !important; border-radius: 25px; display: block; bottom: 30px; left: 20px; padding: 0px 10px 0px 0px;"><img src="./GeM _ Bid Lists_files/1589391829043_GeM_header.png" height="42" width="42" alt="Ask GeMmy" id="floxChatAncrImage" style="display: inline-block; width: 42px; height: 42px;"><span class="flox-chat-title" id="flox-text-item" style="padding-left: 5px; font-size: 16px;">Ask GeMmy</span></div><div id="flox-chat-mob-ancr" style="left: 20px; padding: 0px 10px 0px 0px;"><a href="https://client.xbotapps.com/?botid=029b3b98-dab1-4bdc-a2a0-d9f9d02f8d65&amp;acid=&amp;instance=BID" id="flox-mobile-anchor" target="_blank"></a></div></body></html>