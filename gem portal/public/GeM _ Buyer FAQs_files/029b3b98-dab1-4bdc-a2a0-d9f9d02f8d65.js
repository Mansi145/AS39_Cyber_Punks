var startOverImg,moreImg,_d=new Date,apxrId="87d0102c-64de-47c6-b28d-75ffe43d10a2",webBotId="029b3b98-dab1-4bdc-a2a0-d9f9d02f8d65",enableApxor=true,enableCerinaAnalytics=true,botAnimation="expand",ccc="#ffffffff",ccc2="#8d216d",ccce=false,hoverCount=0,iframeBubbleHPosition="left",iframeBubblePositionInPx=20,iframeBubblePaddingTop=0,iframeBubblePaddingRight=10,iframeBubblePaddingBottom=0,iframeBubblePaddingLeft=0,toolTipIsEnabled=false,toolTipName="Didn’t get answer for something?",toolTipImgUrl="https://d2qea2mkheiw5n.cloudfront.net/Chatbot/up-arrow.svg",toolTipBottomPos="100",toolTipBackgroundColor="#4395f8ff",bubbleVerticalPosInPx=(iframeBubblePositionInPx=20,30),botUrl="https://client.xbotapps.com/?botid=029b3b98-dab1-4bdc-a2a0-d9f9d02f8d65",botTxt="Ask GeMmy",logoUrl="https://d9c2no32kl8w7.cloudfront.net/files/029b3b98-dab1-4bdc-a2a0-d9f9d02f8d65/1589391829043_GeM_header.png",showHeader=true,bubbleImageWidth="42",bubbleImageHeight="42",bubbleBorderRadius="25",toolTipfontSize="14px",toolTipImageWidth="24",toolTipImageHeight="24",toolTipBorderRadius="28",logoBgColor="#41a5e0ff",showLogo=true,bubbleFontSize="16px",analyticsUrl="https://client.xbotapps.com/api/bots/029b3b98-dab1-4bdc-a2a0-d9f9d02f8d65/analytics/events",preOpenIframe=false,preOpenTimer=10000,enableOnHoverAction=true,enableHoverActionOnlyOnce=true,botInstance="main instance",preferredLang=undefined,enableBotDelay=false,enableLoadOnDocReady=false,loadDelayTimeOut=1000,openAnimation="fadein",closeAnimation="fadeout",bubbleImagePosition="left",closeBtnPosition='top',iframeBotWidth=350,iframeBotHeight=540,cci="https://d9c2no32kl8w7.cloudfront.net/files/029b3b98-dab1-4bdc-a2a0-d9f9d02f8d65/1589391907738_close.png";if("expand"==botAnimation&&(openAnimation="expand",closeAnimation="contract"),console.log("analyticsUrl",analyticsUrl),enableApxor)var Apxor=window.Apxor||{_q:[],_st:_d};var botExistence=function(){return!!document.getElementById("flox-chat-img")},apxrClientId="";function myFunction(){}function getBotQueryParamsString(){return"&instance="+botInstance+(preferredLang?"&lang="+preferredLang:"")}function showCloseButton(){setTimeout(function(){"top"==closeBtnPosition?(document.getElementById("flox-chat-close").style.display="inline-block",document.getElementById("flox-chat-close").className="cs-close-top slideCloseButtonUp"):(document.getElementById("flox-chat-close").style.display="flex",document.getElementById("floxChatCloseImage").style.width="16px",document.getElementById("floxChatCloseImage").style.height="16px",document.getElementById("flox-chat-close").className="cs-close-bottom slideCloseButtonUp")},100)}function returnApxorClientId(data){return apxrClientId||(apxrClientId=Apxor.getClientId(),console.log("Apxor Client ID "+apxrClientId)),"&acid="+apxrClientId}function getTimeStamp(){return new Date}function openBotEvents(){document.getElementById("flox-text-item").className="flox-chat-title slideleft",document.getElementById("flox-chat-img").className="flox-chat-img slideleft",document.getElementById("flox-chat-iframe-wrapper").style.display="block",document.getElementById("flox-chat-iframe-wrapper").className=openAnimation,GetElementPosition(document.getElementById("flox-chat-img")),showCloseButton(),document.getElementById("flox-chat-iframe").contentWindow.postMessage("animateShowWelcome","*")}function closeBotEvents(t){enableHoverActionOnlyOnce&&(hoverCount+=1),document.getElementById("flox-chat-close").style.display="none",document.getElementById("flox-chat-iframe-wrapper").className=closeAnimation,"expand"==botAnimation?setTimeout(function(){document.getElementById("flox-toolTipBox")&&(document.getElementById("flox-toolTipBox").style.display="block"),document.getElementById("flox-text-item").className="flox-chat-title slideright",document.getElementById("flox-chat-img").className="flox-chat-img slideright"},300):(document.getElementById("flox-toolTipBox")&&(document.getElementById("flox-toolTipBox").style.display="block"),document.getElementById("flox-text-item").className="flox-chat-title slideright",document.getElementById("flox-chat-img").className="flox-chat-img slideright",document.getElementById("flox-chat-iframe-wrapper").style.display="none"),logApxorEvent("cs_chat_launch",null,"Chat bubble close",null,webBotId,apxrId);var IframeVideo=document.getElementById("flox-chat-iframe");IframeVideo.contentWindow.postMessage("stopYoutubeVideo","*"),IframeVideo.contentWindow.postMessage("animateHideWelcome","*")}function generateApxorQueryModel(query,source){return{cs_event:query,cs_time_stamp:getTimeStamp(),cs_event_source:source,cs_bot_instance:botInstance}}function getDeviceType(){return navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i)||"desktop"}function logCerenaEvent(name,query,source,botId){if(enableCerinaAnalytics){var urlPath=analyticsUrl,xmlHttp=new XMLHttpRequest;xmlHttp.open("POST",urlPath),xmlHttp.setRequestHeader("Content-Type","application/json;charset=UTF-8");var body={name:"",channel:getDeviceType(),source:source,data:{}};switch(name){case"cs_chat_launch":var eventName="Chat bubble close"==source?"cs_chat_close":"cs_chat_launch";body.name=eventName,xmlHttp.send(JSON.stringify(body));break;default:console.log("Unknown event triggered",name,query,source,botId)}}}function logApxorEvent(name,query,source,options,webBotId,apxorId){if(enableApxor){var apxorObject=generateApxorQueryModel(query,source);console.log("App Version alias bot ID being sent to apxor"+webBotId),Apxor.logEvent(name,apxorObject,"Query")}}function hexToRgbA(hex){function d(v){return parseInt(v,16)}var a,v,c=hex.slice(1).match(/.{1,2}/g),rgb=[];a=c&&c[3]?(v=c[3],parseFloat(parseInt(parseInt(v,16)/255*1e3)/1e3)):1;for(var slicedC=c,j=0;j<=slicedC.length-1;j++)rgb.push(d(slicedC[j]));return"rgba("+Number(rgb[0])+","+Number(rgb[1])+","+Number(rgb[2])+","+Number(a)+")"}function GetElementPosition(ele){var ifrbblePosiInPx=iframeBubblePositionInPx;return"left"==iframeBubbleHPosition?ele.style.left=ifrbblePosiInPx+"px":ele.style.right=ifrbblePosiInPx+"px"}function GetChatBubblePosition(ele,bbr){var ifrbblePosiInPx=iframeBubblePositionInPx;return"left"==iframeBubbleHPosition?(ele.style.left=ifrbblePosiInPx+"px",ele.style.borderRadius=bbr+"px",ele.style.borderBottomLeftRadius=bbr+"px"):(ele.style.right=ifrbblePosiInPx+"px",ele.style.borderRadius=bbr+"px",ele.style.borderBottomRightRadius=bbr+"px")}function CreateBubbleBorderRadius(ele,bbr){return"left"==iframeBubbleHPosition?(ele.style.borderRadius=bbr+"px",ele.style.borderBottomLeftRadius="0px"):(ele.style.borderRadius=bbr+"px",ele.style.borderBottomRightRadius="0px")}function GetCloseBtnTopPosition(ele,bbr){var ifrbblePosiInPx=iframeBubblePositionInPx;return"left"==iframeBubbleHPosition?ele.style.left=Number(ifrbblePosiInPx)+iframeBotWidth+"px":ele.style.right=Number(ifrbblePosiInPx)+iframeBotWidth+"px",ele}function GetCloseBtnBottomPosition(ele,bbr){var ifrbblePosiInPx=iframeBubblePositionInPx;return"left"==iframeBubbleHPosition?(ele.style.left=ifrbblePosiInPx+"px",ele.style.borderRadius=bbr+"px",ele.style.borderTopLeftRadius=bbr+"px"):(ele.style.right=ifrbblePosiInPx+"px",ele.style.borderRadius=bbr+"px",ele.style.borderTopRightRadius=bbr+"px")}function GetIframeBubblePadding(ele){return ele.style.paddingTop=iframeBubblePaddingTop+"px ",ele.style.paddingRight=iframeBubblePaddingRight+"px ",ele.style.paddingBottom=iframeBubblePaddingBottom+"px ",ele.style.paddingLeft=iframeBubblePaddingLeft+"px",ele}var loadBotContent=function(){if(!botExistence()){var r,tt=toolTipIsEnabled,th=toolTipName,tlu=toolTipImgUrl,tbps=toolTipBottomPos,ttBgClr=toolTipBackgroundColor,a=logoUrl,biw=bubbleImageWidth,bih=bubbleImageHeight,bbr=bubbleBorderRadius,tfs=toolTipfontSize,tiw=toolTipImageWidth,tih=toolTipImageHeight,tbr=toolTipBorderRadius,xc=logoBgColor,bf=bubbleFontSize,e=(e=botUrl)||"",xd=preOpenIframe,userTimer=preOpenTimer,ef=!1,o=showHeader?"showHeader":"flox-hideHeader",i=(i=botTxt)||"",t=0==showLogo?"none":"inline-block",n=document.createElement("div");n.setAttribute("id","flox-chat-img"),n.setAttribute("tabindex","0"),n.setAttribute("class","flox-chat-img slideright"),xc&&n.setAttribute("style","background:"+hexToRgbA(xc)+"!important"),n.style.borderRadius=bbr+"px",n.style.display="none",n.style.bottom=bubbleVerticalPosInPx+"px",GetChatBubblePosition(n),GetIframeBubblePadding(n),n.setAttribute("tabindex",0);var d=document.createElement("span");d.setAttribute("class","flox-chat-title"),d.setAttribute("id","flox-text-item"),d.style.paddingLeft="0",d.style.fontSize=bf||"16px",d.innerHTML=i;var p=document.createElement("span");p.setAttribute("class","flox-chat-title"),p.innerHTML=i;var c=document.createElement("img");c.setAttribute("src",a),c.setAttribute("height",bih),c.style.display=t,c.setAttribute("width",biw),c.setAttribute("alt",i),c.style.borderRadius=bbr,c.style.width=biw+"px",c.style.height=bih+"px",c.setAttribute("id","floxChatAncrImage");var m=document.createElement("img");m.setAttribute("src",a),m.setAttribute("height",bih),m.setAttribute("width",biw),m.style.width=biw+"px",m.style.height=bih+"px",m.setAttribute("alt",i),m.setAttribute("id","floxChatImage");var h=document.createElement("img");h.setAttribute("src",cci),h.setAttribute("height","12"),h.setAttribute("width","12"),h.style.width="12px",h.style.height="12px",h.setAttribute("alt","Close Xploree"),h.setAttribute("id","floxChatCloseImage");var l=document.createElement("div");l.setAttribute("id","flox-chat-mob-ancr"),GetElementPosition(l),GetIframeBubblePadding(l);function generateToolTipBox(){var newToolTipWrapper=document.createElement("div");newToolTipWrapper.className="flox-toolTipBox default",newToolTipWrapper.setAttribute("id","flox-toolTipBox"),newToolTipWrapper.style.display="none",newToolTipWrapper.style.borderRadius=tbr+"px",newToolTipWrapper.style.bottom=tbps+"px",GetElementPosition(newToolTipWrapper);var newToolTipHeaderWrapper=document.createElement("div");newToolTipHeaderWrapper.className="flox-toolTipHeaderWrapper";var newToolTipHeader=document.createElement("div");newToolTipHeader.className="flox-toolTipHeader",newToolTipHeader.innerHTML=th||"Didnâ€™t get answer for something?",newToolTipHeader.style.color=ttBgClr||xc,newToolTipHeader.style.fontSize=tfs;var newToolTipCaption=document.createElement("div");newToolTipCaption.className="flox-toolTipBoxCaption",newToolTipCaption.innerHTML=th,newToolTipCaption.style.color="#9c9b9b";var toolTipImg=document.createElement("img");return toolTipImg.setAttribute("src",tlu),toolTipImg.setAttribute("height",tih),toolTipImg.setAttribute("width",tiw),toolTipImg.style.width=tiw+"px",toolTipImg.style.height=tih+"px",toolTipImg.setAttribute("id","flox-toolTipImage"),toolTipImg.style.padding="6px 6px",toolTipImg.style.background=ttBgClr||xc,toolTipImg.style.borderRadius="50%",newToolTipHeaderWrapper.appendChild(newToolTipHeader),newToolTipWrapper.appendChild(newToolTipHeaderWrapper),newToolTipWrapper.appendChild(toolTipImg),newToolTipWrapper.addEventListener("click",function(){logApxorEvent("cs_chat_launch",null,"Chat Tooltip Click",null,webBotId,apxrId),logCerenaEvent("cs_chat_launch",null,"Chat Tooltip Click",webBotId),ef=!0,document.getElementById("flox-toolTipBox").style.display="none",navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i)?window.open(e+"&acid="+apxrClientId+getBotQueryParamsString(),"_blank"):openBotEvents()}),newToolTipWrapper}var s=document.createElement("a");s.setAttribute("href",e+"&acid="+apxrClientId+getBotQueryParamsString()),s.setAttribute("id","flox-mobile-anchor"),s.setAttribute("target","_blank"),document.addEventListener?n.addEventListener("click",function(t){ef=!0,logApxorEvent("cs_chat_launch",null,"Chat bubble click",null,webBotId,apxrId),logCerenaEvent("cs_chat_launch",null,"Chat bubble click",webBotId),document.getElementById("flox-toolTipBox")&&(document.getElementById("flox-toolTipBox").style.display="none"),navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i)?window.open(e+"&acid="+apxrClientId+getBotQueryParamsString(),"_blank"):openBotEvents(),document.getElementById("flox-chat-iframe").contentWindow.postMessage("focusInputElement","*")}):document.attachEvent&&n.attachEvent("onclick",myFunction),enableOnHoverAction&&(document.addEventListener?n.addEventListener("mouseover",function(t){ef=!0,hoverCount||(logApxorEvent("cs_chat_launch",null,"Chat bubble mouse over",null,webBotId,apxrId),logCerenaEvent("cs_chat_launch",null,"Chat bubble mouse over",webBotId),document.getElementById("flox-toolTipBox")&&(document.getElementById("flox-toolTipBox").style.display="none"),navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i)?window.open(e+"&acid="+apxrClientId+getBotQueryParamsString(),"_blank"):openBotEvents(),document.getElementById("flox-chat-iframe").contentWindow.postMessage("focusInputElement","*"));enableHoverActionOnlyOnce&&(hoverCount+=1)}):document.attachEvent&&n.attachEvent("mouseover",myFunction)),document.addEventListener?n.addEventListener("keyup",function(t){ef=!0,13==t.keyCode&&(logApxorEvent("cs_chat_launch",null,"Chat bubble mouse over",null,webBotId,apxrId),logCerenaEvent("cs_chat_launch",null,"Chat bubble mouse over",webBotId),document.getElementById("flox-toolTipBox")&&(document.getElementById("flox-toolTipBox").style.display="none"),navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i)?window.open(e+"&acid="+apxrClientId+getBotQueryParamsString(),"_blank"):openBotEvents(),document.getElementById("flox-chat-iframe").contentWindow.postMessage("focusInputElement","*"))}):document.attachEvent&&n.attachEvent("keyup",myFunction);function loadIframeContent(){var t=document.createElement("div"),ife=document.createElement("div");ife.setAttribute("id","flox-chat-iframe-wrapper-outer"),t.setAttribute("id","flox-chat-iframe-wrapper"),t.style.transformOrigin="left"==iframeBubbleHPosition?"0% 100%":"100% 100%",GetElementPosition(t),CreateBubbleBorderRadius(t,bbr),(r=document.createElement("div")).setAttribute("id","flox-chat-close"),r.setAttribute("class",o),r.setAttribute("title","Close"),ccce?r.style["background-image"]="linear-gradient("+ccc+", "+ccc2+")":r.style.background=ccc,GetCloseBtnBottomPosition(r,bubbleBorderRadius);var i=document.createElement("iframe");if(i.setAttribute("id","flox-chat-iframe"),i.setAttribute("name","flox-chat-bot-iframe"),i.setAttribute("allowfullscreen","allowfullscreen"),i.setAttribute("mozallowfullscreen","mozallowfullscreen"),i.setAttribute("msallowfullscreen","msallowfullscreen"),i.setAttribute("oallowfullscreen","oallowfullscreen"),i.setAttribute("webkitallowfullscreen","webkitallowfullscreen"),i.setAttribute("allow","geolocation *; microphone; camera"),i.style.width="100%",CreateBubbleBorderRadius(i,bbr),t.appendChild(i),r.style.display="none",t.style.display="none","top"==closeBtnPosition){t.style.bottom=Number(bubbleVerticalPosInPx)+"px";var closeBtnPosi=window.innerHeight<Number(iframeBotHeight)+Number(bubbleVerticalPosInPx)-24?window.innerHeight-24:Number(iframeBotHeight)+Number(bubbleVerticalPosInPx)-24;r.style.bottom=closeBtnPosi+"px","left"==iframeBubbleHPosition?r.style.left=Number(iframeBotWidth)+40+"px":r.style.right=Number(iframeBotWidth)+40+"px"}else r.style.bottom=Number(bubbleVerticalPosInPx)+"px",t.style.bottom=Number(bubbleVerticalPosInPx)+50+"px";t.className=closeAnimation,ife.style.width=document.body.offsetWidth+"px",ife.appendChild(t),r.appendChild(h),"top"==closeBtnPosition?(ife.appendChild(r),document.body.appendChild(ife)):(document.body.appendChild(ife),document.body.appendChild(r)),i.src=botUrl+"&acid="+apxrClientId+getBotQueryParamsString(),r.addEventListener("click",function(t){closeBotEvents(t)}),document.body.appendChild(n),document.body.appendChild(l),document.getElementById("flox-chat-mob-ancr").appendChild(s),"right"==bubbleImagePosition?(document.getElementById("flox-chat-img").appendChild(d),c.style.paddingLeft=botTxt&&""!=botTxt?"5px":"0",document.getElementById("flox-chat-img").appendChild(c)):(document.getElementById("flox-chat-img").appendChild(c),d.style.paddingLeft=botTxt&&""!=botTxt?"5px":"0",document.getElementById("flox-chat-img").appendChild(d)),""==i&&(document.getElementById("flox-text-item").style.display="none")}document.head.appendChild(document.createElement("style")).innerHTML="@import url(https://fonts.googleapis.com/css?family=Open+Sans);#flox-chat-iframe-wrapper-outer {    display: block;    z-index: 10000;    width: 100vw;    background-color: transparent;    border-radius: 30px}#flox-chat-img {    z-index: 10001}#flox-chat-close,#flox-chat-img,#flox-chat-mob-ancr {    bottom: 42px;    cursor: pointer;    color: var(--font-white);    outline: none;    position: fixed;    width: auto;}#flox-chat-close img {    position: relative;    background-position: center top}#flox-chat-img img {    vertical-align: middle;    margin-bottom: 0;    box-sizing: content-box;}#flox-chat-close {    z-index: 999;    background: 0 0;    width: 28px;    height: 17px;    background-color: #26acae;    text-align: center;    position: fixed;    display: block;    padding: 10px 16px;    display: flex;    flex-direction: column;    align-items: center;    justify-content: center;    font-family: Roboto;    height: 28px;    line-height: 28px;    font-size: 18px;    color: #FFFFFF;    -webkit-box-sizing: unset;    -moz-box-sizing: unset;    -ms-box-sizing: unset;    box-sizing: unset;}#flox-chat-iframe {    position: static;    border: none;    border-radius: 0px;    vertical-align: middle;    width: 100%;    height: calc(100%);    min-height: 173px}#flox-chat-iframe-wrapper.fadeout,#flox-chat-iframe-wrapper.fadein {    z-index: 100000!important;    width: 350px;    height: 540px;    max-width: calc(50vw);    max-width: 50%;    max-height: calc(100vh - 30px);    min-height: 173px;    position: fixed!important;    border-radius: 0px;    overflow: hidden}#flox-chat-iframe-wrapper.contract,#flox-chat-iframe-wrapper.expand {    z-index: 100000!important;    width: 350px;    height: 540px;    max-width: calc(50vw);    max-width: 50%;    max-height: calc(100vh - 30px);    min-width: 180px;    min-height: 173px;    position: fixed!important;    border-radius: 0px;    overflow: hidden}#flox-chat-iframe-wrapper.left {    left: 20px}@keyframes wrapperShow {    0% {        opacity: 0;        height: 540px;        min-height: 0;    }    100% {        opacity: 1;        height: 540px;    }}@-moz-keyframes wrapperShow {    0% {        opacity: 0;        height: 540px;        min-height: 0;    }    100% {        opacity: 1;        height: 540px;    }}@-webkit-keyframes wrapperShow {    0% {        opacity: 0;        height: 540px;        min-height: 0;    }    100% {        opacity: 1;        height: 540px;    }}@keyframes wrapperHide {    0% {        opacity: 1;        height: 540px;    }    100% {        opacity: 0;        height: 540px;        min-height: 0;    }}@-moz-keyframes wrapperHide {    0% {        opacity: 1;        height: 540px;    }    100% {        opacity: 0;        height: 540px;        min-height: 0;    }}@-webkit-keyframes wrapperHide {    0% {        opacity: 1;        height: 540px;    }    100% {        opacity: 0;        height: 540px;        min-height: 0;    }}@keyframes wrapperShowExpand {    0% {        opacity: 0;        transform: scale(0);    }    100% {        opacity: 1;        transform: scale(1);    }}@-moz-keyframes wrapperShowExpand {    0% {        opacity: 0;        transform: scale(0);    }    100% {        transform: scale(1);        opacity: 1;    }}@-webkit-keyframes wrapperShowExpand {    0% {        opacity: 0;        transform: scale(0);    }    100% {        opacity: 1;        transform: scale(1);    }}@keyframes wrapperHideContract {    0% {        opacity: 1;        transform: scale(1);    }    100% {        opacity: 0;        transform: scale(0);    }}@-moz-keyframes wrapperHideContract {    0% {        opacity: 1;        transform: scale(1);    }    100% {        opacity: 0;        transform: scale(0);    }}@-webkit-keyframes wrapperHideContract {    0% {        opacity: 1;        transform: scale(1);    }    100% {        opacity: 0;        transform: scale(0);    }}#flox-chat-iframe-wrapper.fadein {    -webkit-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    -moz-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    animation-name: wrapperShow;    -webkit-animation-name: wrapperShow;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    animation-duration: .5s;    -webkit-animation-duration: .5s}#flox-chat-iframe-wrapper.fadeout {    height: 0;    min-height: 0;    animation-name: wrapperHide;    -webkit-animation-name: wrapperHide;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    animation-duration: .5s;    -webkit-animation-duration: .5s}#flox-chat-iframe-wrapper.expand {    -webkit-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    -moz-box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    box-shadow: -2px 24px 54px rgba(95, 95, 95, 0.64);    animation-name: wrapperShowExpand;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    -webkit-animation-name: wrapperShowExpand;    animation-duration: 0.3s;    -webkit-animation-duration: 0.3s}#flox-chat-iframe-wrapper.contract {    animation-name: wrapperHideContract;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    -webkit-animation-name: wrapperHideContract;    animation-duration: 0.3s;    -webkit-animation-duration: 0.3s;    transform: scale(0);}.flox-chat-title {    text-align: center;    vertical-align: middle;    bottom: 0;    position: relative;    font-size: 16px;    font-weight: 700;    color: #FFF;    opacity: 1;    font-family: 'Open Sans';    -webkit-transition: opacity 1s;    transition: opacity 1s linear}.cb-circle,.flox-toolTipBox {    text-align: center;    background-color: #FFF;    font-family: arial}#flox-chat-mob-ancr {    z-index: 100}@keyframes csSlideDown {    0% {        opacity: .8    }    100% {        opacity: 0    }}@-moz-keyframes csSlideDown {    0% {        opacity: .8    }    100% {        opacity: 0    }}@-webkit-keyframes csSlideDown {    0% {        opacity: .8    }    100% {        opacity: 0    }}@keyframes csCloseBtnSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@keyframes csSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@-webkit-keyframes csSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@-moz-keyframes csSlideUp {    0% {        -webkit-transform: translateY(10px);        transform: translateY(10px);        opacity: 0    }    100% {        -webkit-transform: translateY(0);        transform: translateY(0);        opacity: 1    }}@media screen and (min-width:0) and (max-width:600px) {    #flox-chat-mob-ancr {        display: block;        z-index: 1000000;        opacity: 0    }    #flox-mobile-anchor {        width: auto;        height: 51px;        display: block    }    #flox-chat-close,    #flox-chat-img,    #flox-chat-mob-ancr {        bottom: 42px    }}@media screen and (min-width:600px) and (max-width:1023px) {    #flox-chat-iframe-wrapper {        bottom: 400px    }    #flox-chat-close,    #flox-chat-img,    #flox-chat-mob-ancr {        bottom: 42px    }}#flox-chat-close.slideCloseButtonUp{    animation-name: csCloseBtnSlideUp;    -webkit-animation-name: csCloseBtnSlideUp;    animation-duration: .5s;    -webkit-animation-duration: .5s;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    width: auto;    display: flex;    opacity: 1;}#flox-chat-close.cs-close-top{    height: 12px;    line-height: 12px;    padding: 7px;    border-radius: 25px;    webkit-box-shadow: -2px 2px 25px rgba(95, 95, 95, 0.64);    -moz-box-shadow: -2px 2px 25px rgba(95, 95, 95, 0.64);    box-shadow: -2px 2px 25px rgba(95, 95, 95, 0.64);}#flox-chat-img.slideright {    animation-name: csSlideUp;    -webkit-animation-name: csSlideUp;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    animation-duration: .5s;    -webkit-animation-duration: .5s;    width: auto;    opacity: 1;}#flox-chat-img.slideleft {    animation-name: csSlideDown;    -webkit-animation-name: csSlideDown;    animation-duration: .5s;    -webkit-animation-duration: .5s;    animation-timing-function: linear;    -webkit-animation-timing-function: linear;    padding: 0;    opacity: 0;    z-index: -1000}@keyframes rightFadeInOut {    0% {        position: absolute;        right: 100px;        opacity: 0    }    50% {        opacity: 0    }    100% {        right: 0;        position: absolute;        opacity: 1    }}@-webkit-keyframes rightFadeInOut {    0% {        position: absolute;        right: 100px;        -webkit-opacity: 0    }    50% {        -webkit-opacity: 0    }    100% {        right: 0;        position: absolute;        -webkit-opacity: 1    }}@-moz-keyframes rightFadeInOut {    0% {        position: absolute;        right: 100px;        opacity: 0    }    50% {        opacity: 0    }    100% {        right: 0;        position: absolute;        opacity: 1    }}@keyframes leftFadeInOut {    0% {        position: absolute;        right: 0;        opacity: 1    }    10% {        opacity: 0    }    100% {        opacity: 0;        right: 100px    }}@-moz-keyframes leftFadeInOut {    0% {        position: absolute;        right: 0;        opacity: 1    }    10% {        opacity: 0    }    100% {        opacity: 0;        right: 100px    }}@-webkit-keyframes leftFadeInOut {    0% {        position: absolute;        right: 0;        -webkit-opacity: 1    }    10% {        -webkit-opacity: 0    }    100% {        -webkit-opacity: 0;        right: 100px    }}@-webkit-keyframes float {    0%,    100% {        box-shadow: 0 5px 15px 0 rgba(175, 175, 175, .6);        transform: translatey(0)    }    50% {        box-shadow: 0 15px 15px 0 rgba(175, 175, 175, .2);        transform: translatey(-3px)    }}#flox-text-item {    color: #FFF;    overflow: hidden;    font-size: 16px;    right: 0}#flox-text-items.slideright {    animation-name: rightFadeInOut;    animation-duration: .21s;    opacity: 1;    -webkit-opacity: 1}#flox-text-items.slideleft {    opacity: 0;    width: auto;    animation-name: leftFadeInOut;    -webkit-animation-name: leftFadeInOut;    animation-duration: .21s;    -webkit-animation-duration: .21s}#flox-chat-mob-ancr {    width: 160px;    display: none}#flox-chat-close.flox-hideHeader {    top: 0!important;    right: 0!important;    padding: 0!important;    width: auto}.flox-hideHeader img {    width: 18px;    height: 18px;    padding: 3px;    background-color: grey;    border-radius: 7px}.flox-circle_2:before,.flox-circle_3:before {    content: '';    background: #fff}.cb-circle {    width: 250px;    border: 5px solid #00bfb6;    padding: 80px 0;    margin: 30px auto;    border-radius: 50%;    font-size: 24px;    font-weight: 900;    position: relative;    color: #00bfb6}.flox-circle_2,.flox-circle_2:before {    position: absolute;    width: 25px;    padding: 20px}.flox-circle_2 {    border: 5px solid #00bfb6;    border-radius: 50%;    right: -15px;    bottom: 15px}.flox-circle_2:before {    border-radius: 50%;    right: 0;    bottom: 0}.flox-circle_3,.flox-circle_3:before {    position: absolute;    width: 5px;    padding: 10px 15px}.flox-circle_3 {    border: 5px solid #00bfb6;    border-radius: 50%;    right: -35px;    bottom: 13px}.flox-circle_3:before {    border-radius: 50%;    right: 0;    bottom: 0}.flox-toolTipBox {    z-index: 100;    cursor: pointer;    width: auto;    border: 1px solid #eaeaea;    padding: 10px 10px 10px 20px;    color: #797979;    position: fixed;    transform: translatey(0);    animation: float 3s ease-in-out infinite}.default_arrow:after,.default_arrow:before {    content: '';    width: 0;    height: 0;    position: absolute;    border-left: 7px solid transparent;    border-bottom: 10px solid transparent}.default_arrow:before {    border-right: 10px solid #949591;    border-top: 7px solid #949591;    right: 22px;    bottom: -18px}.default_arrow:after {    border-right: 10px solid #fff;    border-top: 7px solid #fff;    right: 24px;    bottom: -13px}.flox-toolTipHeaderWrapper {    display: inline-block;    margin-right: 20px;    text-align: left;    vertical-align: middle}#flox-toolTipImage {    background-color: #26acae;    vertical-align: middle;    margin-bottom: 0}.flox-toolTipBoxCaption {    font-size: 11px;    line-height: 15px}.flox-toolTipHeader {    font-size: 14px;    line-height: 18px;    font-weight: 600;    font-family: 'Open Sans'}",enableBotDelay?setTimeout(function(){tt&&document.body.appendChild(generateToolTipBox()),loadIframeContent(),xd&&setTimeout(function(){ef||(navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i)?window.open(e+"&acid="+apxrClientId+getBotQueryParamsString(),"_blank"):openBotEvents())},userTimer)},loadDelayTimeOut):(tt&&document.body.appendChild(generateToolTipBox()),loadIframeContent(),xd&&setTimeout(function(){ef||(navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/BlackBerry/i)||navigator.userAgent.match(/Windows Phone/i)?window.open(e+"&acid="+apxrClientId+getBotQueryParamsString(),"_blank"):openBotEvents())},userTimer))}},validateDocContentAndLoadBot=function(){enableLoadOnDocReady?"interactive"===document.readyState||"complete"===document.readyState?loadBotContent():document.addEventListener("DOMContentLoaded",loadBotContent):loadBotContent()},launchApxor=function(a,p,x,o,r){["init","setUserId","setUserProperties","setSessionProperties","logPageView","logEvent","setAppVersion","getClientId","getSessionId"].forEach(function(m){Apxor[m]=function(){this._q.push({m:m,args:arguments})}}),(r=p.createElement(x)).type="text/javascript",r.async=!0,r.src="https://unpkg.com/apxor@1.5.30/dist/apxor.min.js",p.head.appendChild(r),Apxor.init(apxrId,{debug:!0,idle_time_out:120,version:webBotId},function(data){console.log("Apxor Client ID: "+data.client_id),validateDocContentAndLoadBot(),apxrClientId=data.client_id},function(){console.log("Apxor SDK is not initialized"),validateDocContentAndLoadBot(),enableApxor=!1})};botExistence()||(enableApxor?launchApxor(window,document,"script"):validateDocContentAndLoadBot()),window.addEventListener("message",function(e){var data=e[e.message?"message":"data"];data&&"floxLoadIframe"==data&&(document.getElementById("flox-chat-iframe").contentWindow.postMessage("animateHideWelcome","*"),document.querySelector("#flox-chat-img").style.display="block",document.querySelector("#flox-toolTipBox")&&(document.querySelector("#flox-toolTipBox").style.display="block"))},!1);