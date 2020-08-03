var hashUser = 'buyer'
    , hashQID = ''
    , requests = []
    , singleFAQ = '';

$(document).ready(function () {
    // Show or hide the sticky footer button
    $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                    $('.go-top').fadeIn(200);
            } else {
                    $('.go-top').fadeOut(200);
            }
    });

    // Animate the scroll to top
    $('.go-top').click(function(event) {
           // event.preventDefault();

            $('html, body').animate({scrollTop: 0}, 300);
    })
    var faq = JSON.parse($('#h_faqJson').val());
    var pageURL = $(location).attr("href");
    var spurl = pageURL.split("/");
    spurl = spurl[spurl.length - 1];
    spurl = decodeURIComponent((spurl + '').replace(/\+/g, '%20'));
    spurl = spurl.replace(/\s/g, '');
    spurl = spurl.replace(",", "");
    spurl = spurl.replace(/'/g, '');
    spurl = spurl.replace(/"/g, "");
    spurl = spurl.replace(/\./g, '');
    spurl = spurl.toLowerCase();
    if (spurl != '' && spurl != null) {
        
        if(window.location.hash) {
            hashUser = spurl.split('#')[0]; 
            var hash2 = spurl.split('#')[1];
            hashQID = hash2.split('_')[0];
            singleFAQ = (typeof hash2.split('_')[1] !== "undefined")?hash2.split('_')[1]:'';
            var ajax1 = $.ajax({
                    url: "/userFaqs/getFaqForId",
                    type: "POST",
                    data:  {id:hashQID},
                    success:function(qText){
                        if(qText!='') {
                            var s = JSON.parse(JSON.stringify(qText));
                            $('#searchId').val(s);
                            $('#h_selected_faq').val(hashQID);
                        }
                    }
                });

            requests.push(ajax1);

            $.when.apply($,requests).done(function(){
                $.each(arguments, function (i, data) {
                    $('#srchbtn').attr('action','/userFaqs/'+hashUser);
                    //$("#srchbtn")[0].submit();
                    var el = hashUser+''+hashQID;
                    $('#'+el).parent().closest('.father').parent().closest('.grandfather').removeClass('collapse').addClass('collapse in').attr("aria-expanded", "true");
                    $('#'+el).parent().closest('.father').parent().removeClass('glyphicon-plus').addClass('glyphicon-minus');
                    $('#'+el).parent().closest('.father').removeClass('collapse').addClass('collapse in').attr("aria-expanded", "true");
                    $('#'+el).removeClass('glyphicon-plus').addClass('glyphicon-minus');
                    if(singleFAQ==''){
                        $('#'+el).siblings().removeClass('glyphicon-plus').addClass('glyphicon-minus');
                        $('#'+el).siblings().children('.child').removeClass('collapse').addClass("collapse in").attr("aria-expanded", "true");
                    }
                    $('#'+el).children('.child').removeClass('collapse').addClass("collapse in").attr("aria-expanded", "true");
                    $('html, body').animate({
                        scrollTop: $("#"+el).offset().top
                    }, 2000);
                    
                });
                return false;
            });
        }
    }
    $("#searchId").on("click", function() {
        if($(this).val()) { 
            $(this).val('');
            $('#h_selected_faq').val('');
        }
    });
    $("#SearchHash").on("click", function() {
        submitFaqForm();
        return false;
    });
    $("#SpeechHash").on("click", function() {
        startDictation();
        return false;
    });
    $(document).keypress(function(e){
        if(e.which == 27){
            location.reload(true);
        }
    });
    autocomplete(document.getElementById("searchId"), faq);
});
function submitFaqForm(){
    var searchId = $('#searchId').val();
    if (searchId == '' || searchId == null) {
        $('#hiddenButton').trigger('click');
        $('#error-msg').html('Please enter valid question or keywords for FAQ search!!');
        return false;
    }
    else {
        if($('#h_selected_faq').val()!=='')
        {
            var type = $('#h_selected_user').val();
            $('#srchbtn').attr('action','/userFaqs/'+type);
            var quesId = $('#h_selected_faq').val();
            var redirect_url = '/userFaqs/'+type+'#'+quesId+'_one';
            window.location.href = redirect_url;
            (function(){
                setTimeout(function(){
                    location.reload(true);
                },500);
            })();
            return false;
        }else {
            $('#submit-loader').css('display', 'block');
            $("#srchbtn")[0].submit();
        }
    }
    
}
function startDictation() {
    $('#searchId').val('');
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
        var recognition = new webkitSpeechRecognition();
        console.log(recognition);
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = "en-US";
        recognition.start();
        $('#loader_m').css('display', 'block');
        recognition.onresult = function (e) {
            var s = '';
            setTimeout(function(){
                s += e.results[0][0].transcript;
                $('#searchId').val(s);
                (function(s){
                    $("#srchbtn").on("submit", function (e) {
                        e.preventDefault();//stop submit event
                        var self = $(this);//this form
                        $("#searchId").val(s);//change input
                        $("#srchbtn").off("submit");//need form submit event off.
                        self.submit();//submit form
                    });
                })(s);
            },2000);

            (function(){
                setTimeout(function(){ 
                    $('#loader_m').css('display', 'none');
                    $("#srchbtn")[0].submit();
                },4000);
            })();

            $('#searchId').val(e.results[0][0].transcript);
            recognition.stop();
        };
        recognition.onerror = function (e) {
            if(e.error == 'no-speech') {
                $('#loader_m').css('display', 'none');
                $('#hiddenButton').trigger('click');  
            };
            
            recognition.stop();
        }
    }
    else{
        $('#hiddenButton').trigger('click');
        $('#error-msg').html('Please allow micro phone in your browser!!');
    }
}
function jsUcfirst(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
     the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
        var a, b, ul,li, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items tree well");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        ul = document.createElement("ul");
        $.each(arr, function(user,userData) {
            /*check if the item starts with the same letters as the text field value:*/
            li = document.createElement("li");
            li.innerHTML = '<span class="arrow">'+jsUcfirst(user)+'</span>';
            li.addEventListener("click", function (e) {
                this.querySelector(".nested").classList.toggle("hide");
                this.querySelector("span").classList.toggle("arrow-down");
            });
            var ul2 = document.createElement("ul");
            ul2.setAttribute("class","nested");
            $.each(userData, function(idx,faqData) {
                $.each(faqData, function(fId,fData){
                    var findTxt = fData.toUpperCase();
                    var txtStrt = findTxt.search(val.toUpperCase());
                    if (txtStrt != -1) {
                        
                    /*create a DIV element for each matching element:*/
                        b = document.createElement("li");
                        b.setAttribute("class", "gem-q");

                        //b.label('Did you mean :');
                        
                        //b.innerHTML = "<strong>" + fData.substr(0, val.length) + "</strong>";

                        b.innerHTML = fData;
                        var re = new RegExp('(' + val.trim().split(/\s+/).join('|') + ')', "gi");
                        var html = $(b).html();
                        $(b).html(html.replace(re, '<strong>$1</strong>'));
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input name='h_suggester_item' type='hidden' user='"+user+"' qId='"+idx+"' value='" + fData + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function (e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            $('#h_selected_faq').val($(this).find('input:hidden[name=h_suggester_item]').attr('qId'));
                            $('#h_selected_user').val($(this).find('input:hidden[name=h_suggester_item]').attr('user'));
                            /*close the list of autocompleted values,
                             (or any other open lists of autocompleted values:*/
                            closeAllLists();
                            $('#submit-loader').css('display', 'block');
                            $('#SearchHash').trigger('click');
                        });
                        ul2.appendChild(b);
                        
                    }
                });
            });
            li.appendChild(ul2);
            ul.appendChild(li);
        });
        var li = document.createElement("li");
        li.innerHTML = '<span class="arrow">None Of the Above</span>';
        li.addEventListener("click", function (e) {
            this.querySelector(".nested").classList.toggle("hide");
            this.querySelector("span").classList.toggle("arrow-down");
        });
        var ul2 = document.createElement("ul");
        ul2.setAttribute("class","nested");
        var b = document.createElement("li");
        b.setAttribute("class", "gem-q");
        //b.innerHTML = 'you can reach us at :<a href=”https://gem.gov.in/gemtickets”> Support Desk </a>or contact Customer Care No : <br/><br/>1-800-419-3436 / 1-800-102-3436';
        b.innerHTML = 'Couldn\'t find the phrase you are sending for...<br/>For Buyer vidoes <a style="cursor:pointer;color:blue;" target="_blank" href="/training/videos/buyers">click here </a><br/>and for Seller videos <a target="_blank" style="cursor:pointer;color:blue;" href="training/videos/sellers">click here</a>';
        b.addEventListener("click", function (e) {
            e.preventDefault();//stop submit event
            $('#hiddenContactButton').trigger('click');
            $('#searchId').val('');
            closeAllLists();
        });
        ul2.appendChild(b);
        li.appendChild(ul2);
        ul.appendChild(li);
        a.appendChild(ul);
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keyup", function (e) {
        var x = $('#'+this.id + "autocomplete-list");
        if (x)
            x = $(x).children().children().children('.nested').children();
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
             increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
             decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x)
                    x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x)
            return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length)
            currentFocus = 0;
        if (currentFocus < 0)
            currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
         except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    $(document).click(function(e){
        if ($(e.target).is('.autocomplete-items,.autocomplete-items *')) {
            return;
        }
        else
        {
            closeAllLists(e.target);
            //Perform your event operations
        }
    });
}
function voiceSpeek() {
    setTimeout( console.log('OK'), 300);
    var text = $('#speakAns').html();
    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.voice = voices[9];
    msg.text = text;
    speechSynthesis.speak(msg);
}