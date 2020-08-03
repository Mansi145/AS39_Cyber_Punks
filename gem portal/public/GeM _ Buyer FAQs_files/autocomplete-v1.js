function bindSuggester(serviceName){
    var that = $('input.suggester')
        ,   box = $('<ul></ul>')
            .css({
                position: 'absolute',
                backgroundColor: 'white',
                border: '1px solid #e3e3e3',
                padding: '7px',
                borderRadius: '4px',
                paddingLeft: '0px',
                paddingRight: '0px',
                background: 'white;',
                width: that.width()+100,
                margin: 0,
                paddingTop: '3px',
                paddingBottom: '3px',
                listStyleType: 'none',
                minWidth: that.width() + 4,
                color: '#555',
                textAlign: 'left',
                'overflow-y': 'scroll',
                //'left': '337.078px ',
                'max-height': '220px'
            })
            .hide()
            .appendTo('body')
        ,   wordsJson = serviceName
        ,   enteredValue = that.val()
        ,   to_complete = enteredValue.split(' ').pop().toLowerCase()
        ,   selection
        ,   length
        ,   active = false
        ,   hide = function(){
                box.hide();
                active = false;
            }
        ,   show = function(){
                var offset = that.offset();
                box.css({
                    top: offset.top + that.height()+20,
                    left: offset.left
                }).empty().show();
                selection = null;
                active = true;
            }
        ,   arrow_up = 38
        ,   arrow_down = 40
        ,   enter = 13
        ,   tab = 9
        ,   esc = 27
        ,   boldString = function (str, find){
                var re = new RegExp(find, 'g');
                return str.replace(re, '<b>'+find+'</b>');
            };
    $('input.suggester').keyup(function(event) {
        enteredValue = that.val();
        to_complete = enteredValue.split(' ').pop().toLowerCase()
        if(to_complete.length >= 1){
            var suggestions = $.grep(wordsJson, function(word, i){
                return word.toLowerCase().indexOf(to_complete.toLowerCase()) !== -1 
            });
            if(suggestions.length){
                selection = null;
                length = suggestions.length;
                show()
                $.each(suggestions, function(i, suggestion){
                    var postfix = suggestion.slice(to_complete.length, suggestion.length);
                    var text = enteredValue + postfix;
                    //$('<li>' + enteredValue + '<em style="color: black">' + postfix + '</em>' + '</li>')
                    $('<li><p style="color: black;margin: 0 0 4px;">' + boldString(suggestion,enteredValue) + '</p></li>')
                        .css({
                            paddingleft: 0,
                            paddingRight: 0,
                            margin: 0,
                            paddingLeft: '5px',
                            paddingRight: '5px',
                            cursor: 'pointer'
                        })
                        .data('text', suggestion)
                        .hover(
                            function(){
                                $(this).css('background-color', 'LightBlue');
                            },
                            function(){
                                $(this).css('background-color', 'transparent');
                            }
                        )
                        .click(function(){
                            hide()
                            var html = '<li class="token" data-value="1"><a class="dismiss">Ã—</a><span>'+suggestion+'</span></li>';
                            that.parent().children('.suggester-input').val(suggestion).focus();
                        })
                        .appendTo(box)
                });
            }
            else
            {
                hide();
            }
        }
        else {
            hide();
        }
        var keyhandler = function(event){
            if(active){
                if(event.keyCode == arrow_down || event.keyCode == arrow_up){
                    if(selection == null){
                        selection = event.keyCode == arrow_down ? 0 : length-1;
                    }
                    else{
                        selection += event.keyCode == arrow_down ? 1 : -1;
                        if(selection < 0){
                            selection = length - 1;
                        }
                        else if(selection >= length){
                            selection = 0;
                        }
                    }
                    var text = box.find('li')
                        .css('background-color', 'transparent')
                        .eq(selection)
                            .css('background-color', 'LightBlue')
                            .data('text');
                    that.val(text);
                    return false;
                }
                else if(event.keyCode == enter){
                    that.val(
                        box.hide().find('li').eq(selection).data('text')
                    );
                }
                else if(event.keyCode == tab || event.keyCode == esc){
                    hide();
                }
            }
        };
        if(navigator.userAgent.search("safari") !== -1){
            that.keydown(keyhandler);
        }
        else{
            that.keypress(keyhandler);
        }
    });
}
function bindSuggesterRate(serviceName){
    var that = $('input.suggesterRate')
        ,   box = $('<ul></ul>')
            .css({
                position: 'absolute',
                backgroundColor: 'white',
                border: '1px solid #e3e3e3',
                padding: '7px',
                borderRadius: '4px',
                paddingLeft: '0px',
                paddingRight: '0px',
                background: 'white;',
                width: that.width() + 34,
                margin: 0,
                paddingTop: '3px',
                paddingBottom: '3px',
                listStyleType: 'none',
                minWidth: that.width(),
                color: '#555',
                textAlign: 'left',
                'overflow-y': 'scroll',
                //'left': '337.078px ',
                'max-height': '220px'
            })
            .hide()
            .appendTo('body')
        ,   wordsJson = serviceName
        ,   enteredValue = that.val()
        ,   to_complete = enteredValue.split(' ').pop().toLowerCase()
        ,   selection
        ,   length
        ,   active = true
        ,   hide = function(){
                box.hide();
                active = false;
            }
        ,   show = function(){
                var offset = that.offset();
                box.css({
                    top: offset.top + that.height(),
                    left: offset.left
                }).empty().show();
                selection = null;
                active = true;
            }
        ,   arrow_up = 38
        ,   arrow_down = 40
        ,   enter = 13
        ,   tab = 9
        ,   esc = 27
        ,   boldString = function (str, find){
                var re = new RegExp(find, 'g');
                return str.replace(re, '<b>'+find+'</b>');
            };
    $('input.suggesterRate').keyup(function(event) {
        enteredValue = $('#min_text').val();
        to_complete = enteredValue.split(' ').pop().toLowerCase();
        
        if(to_complete.length >= 1){
            var suggestions = $.grep(wordsJson, function(word, i){
                return word.toLowerCase().indexOf(to_complete.toLowerCase()) !== -1 
            });
            if(suggestions.length){
                selection = null;
                length = suggestions.length;
                show()
                $.each(suggestions, function(i, suggestion){
                    var postfix = suggestion.slice(to_complete.length, suggestion.length);
                    var text = enteredValue + postfix;
                    //$('<li>' + enteredValue + '<em style="color: black">' + postfix + '</em>' + '</li>')
                    
                    $('<li><p style="color: black;margin: 0 0 4px;">' + boldString(suggestion,enteredValue) + '</p></li>')
                        .css({
                            paddingleft: 0,
                            paddingRight: 0,
                            margin: 0,
                            paddingLeft: '5px',
                            paddingRight: '5px',
                            cursor: 'pointer'
                        })
                        .data('text', suggestion)
                        .hover(
                            function(){
                                $(this).css('background-color', 'LightBlue');
                            },
                            function(){
                                $(this).css('background-color', 'transparent');
                            }
                        )
                        .click(function(){
                            hide()
                            var html = '<li class="token" data-value="1"><a class="dismiss">Ã—</a><span>'+suggestion+'</span></li>';
                            $('#min_text').val(suggestion).focus();
                            $('#ministry').val(suggestion);
                            getDept();
                        })
                        .appendTo(box)
                });
            }
            else
            {
                hide();
            }
        }
        else {
            hide();
        }
        var keyhandler = function(event){
            if(active){
                if(event.keyCode == arrow_down || event.keyCode == arrow_up){
                    if(selection == null){
                        selection = event.keyCode == arrow_down ? 0 : length-1;
                    }
                    else{
                        selection += event.keyCode == arrow_down ? 1 : -1;
                        if(selection < 0){
                            selection = length - 1;
                        }
                        else if(selection >= length){
                            selection = 0;
                        }
                    }
                    var text = box.find('li')
                        .css('background-color', 'transparent')
                        .eq(selection)
                            .css('background-color', 'LightBlue')
                            .data('text');
                    that.val(text);
                    return false;
                }
                else if(event.keyCode == enter){
                    that.val(
                        box.hide().find('li').eq(selection).data('text')
                    );
                }
                else if(event.keyCode == tab || event.keyCode == esc){
                    hide();
                }
            }
        };
        if(navigator.userAgent.search("safari") !== -1){
            that.keydown(keyhandler);
        }
        else{
            that.keypress(keyhandler);
        }
    });
}

function bindSuggesterRateDept(serviceName){
    var that = $('input.suggesterRateDept')
        ,   box = $('<ul></ul>')
            .css({
                position: 'absolute',
                backgroundColor: 'white',
                border: '1px solid #e3e3e3',
                padding: '7px',
                borderRadius: '4px',
                paddingLeft: '0px',
                paddingRight: '0px',
                background: 'white;',
                width: that.width() + 34,
                margin: 0,
                paddingTop: '3px',
                paddingBottom: '3px',
                listStyleType: 'none',
                minWidth: that.width(),
                color: '#555',
                textAlign: 'left',
                'overflow-y': 'scroll',
                //'left': '337.078px ',
                'max-height': '220px'
            })
            .hide()
            .appendTo('body')
        ,   wordsJson = serviceName
        ,   enteredValue = that.val()
        ,   to_complete = enteredValue.split(' ').pop().toLowerCase()
        ,   selection
        ,   length
        ,   active = false
        ,   hide = function(){
                box.hide();
                active = false;
            }
        ,   show = function(){
                var offset = that.offset();
                box.css({
                    top: offset.top + that.height(),
                    left: offset.left
                }).empty().show();
                selection = null;
                active = true;
            }
        ,   arrow_up = 38
        ,   arrow_down = 40
        ,   enter = 13
        ,   tab = 9
        ,   esc = 27
        ,   boldString = function (str, find){
                var re = new RegExp(find, 'g');
                return str.replace(re, '<b>'+find+'</b>');
            };
    $('input.suggesterRateDept').keyup(function(event) {
        enteredValue = $('#dep_text').val();
        to_complete = enteredValue.split(' ').pop().toLowerCase();
        
        if(to_complete.length >= 1){
            var suggestions = $.grep(wordsJson, function(word, i){
                return word.toLowerCase().indexOf(to_complete.toLowerCase()) !== -1 
            });
            if(suggestions.length){
                selection = null;
                length = suggestions.length;
                show()
                $.each(suggestions, function(i, suggestion){
                    var postfix = suggestion.slice(to_complete.length, suggestion.length);
                    var text = enteredValue + postfix;
                    //$('<li>' + enteredValue + '<em style="color: black">' + postfix + '</em>' + '</li>')
                    
                    $('<li><p style="color: black;margin: 0 0 4px;">' + boldString(suggestion,enteredValue) + '</p></li>')
                        .css({
                            paddingleft: 0,
                            paddingRight: 0,
                            margin: 0,
                            paddingLeft: '5px',
                            paddingRight: '5px',
                            cursor: 'pointer'
                        })
                        .data('text', suggestion)
                        .hover(
                            function(){
                                $(this).css('background-color', 'LightBlue');
                            },
                            function(){
                                $(this).css('background-color', 'transparent');
                            }
                        )
                        .click(function(){
                            hide()
                            var html = '<li class="token" data-value="1"><a class="dismiss">Ã—</a><span>'+suggestion+'</span></li>';
                            $('#dep_text').val(suggestion).focus();
                            $('#department').val(suggestion);
                            depChange();
                            box.remove();
                        })
                        .appendTo(box)
                });
            }
            else
            {
                hide();
            }
        }
        else {
            hide();
        }
        var keyhandler = function(event){
            if(active){
                if(event.keyCode == arrow_down || event.keyCode == arrow_up){
                    if(selection == null){
                        selection = event.keyCode == arrow_down ? 0 : length-1;
                    }
                    else{
                        selection += event.keyCode == arrow_down ? 1 : -1;
                        if(selection < 0){
                            selection = length - 1;
                        }
                        else if(selection >= length){
                            selection = 0;
                        }
                    }
                    var text = box.find('li')
                        .css('background-color', 'transparent')
                        .eq(selection)
                            .css('background-color', 'LightBlue')
                            .data('text');
                    that.val(text);
                    return false;
                }
                else if(event.keyCode == enter){
                    that.val(
                        box.hide().find('li').eq(selection).data('text')
                    );
                }
                else if(event.keyCode == tab || event.keyCode == esc){
                    hide();
                }
            }
        };
        if(navigator.userAgent.search("safari") !== -1){
            that.keydown(keyhandler);
        }
        else{
            that.keypress(keyhandler);
        }
    });
}


function bindSuggestermobile(serviceName){
    var that = $('input.suggestermobile')
        ,   box = $('<ul></ul>')
            .css({
                position: 'absolute',
                backgroundColor: 'white',
                border: '1px solid #e3e3e3',
                padding: '7px',
                borderRadius: '4px',
                paddingLeft: '0px',
                paddingRight: '0px',
                background: 'white;',
                width: $('input.suggestermobile').width() + 40,
                margin: 0,
                paddingTop: '3px',
                paddingBottom: '3px',
                listStyleType: 'none',
                minWidth: that.width() + 4,
                color: '#555',
                textAlign: 'left',
                'overflow-y': 'scroll',
                //'left': '337.078px ',
                'max-height': '220px'
            })
            .hide()
            .appendTo('body')
        ,   wordsJson = serviceName
        ,   enteredValue = that.val()
        ,   to_complete = enteredValue.split(' ').pop().toLowerCase()
        ,   selection
        ,   length
        ,   active = false
        ,   hide = function(){
                box.hide();
                active = false;
            }
        ,   show = function(){
                var offset = that.offset();
                box.css({
                    top: offset.top + that.height() + 20,
                    left: offset.left + 10
                }).empty().show();
                selection = null;
                active = true;
            }
        ,   arrow_up = 38
        ,   arrow_down = 40
        ,   enter = 13
        ,   tab = 9
        ,   esc = 27
        ,   boldString = function (str, find){
                var re = new RegExp(find, 'g');
                return str.replace(re, '<b>'+find+'</b>');
            };
    $('input.suggestermobile').keyup(function(event) {
        enteredValue = that.val();
        to_complete = enteredValue.split(' ').pop().toLowerCase()
        if(to_complete.length >= 1){
            var suggestions = $.grep(wordsJson, function(word, i){
                return word.toLowerCase().indexOf(to_complete.toLowerCase()) !== -1 
            });
            if(suggestions.length){
                selection = null;
                length = suggestions.length;
                show()
                $.each(suggestions, function(i, suggestion){
                    var postfix = suggestion.slice(to_complete.length, suggestion.length);
                    var text = enteredValue + postfix;
                    //$('<li>' + enteredValue + '<em style="color: black">' + postfix + '</em>' + '</li>')
                    $('<li><p style="color: black;margin: 0 0 4px;">' + boldString(suggestion,enteredValue) + '</p></li>')
                        .css({
                            paddingleft: 0,
                            paddingRight: 0,
                            margin: 0,
                            paddingLeft: '5px',
                            paddingRight: '5px',
                            cursor: 'pointer'
                        })
                        .data('text', suggestion)
                        .hover(
                            function(){
                                $(this).css('background-color', 'LightBlue');
                            },
                            function(){
                                $(this).css('background-color', 'transparent');
                            }
                        )
                        .click(function(){
                            hide()
                            var html = '<li class="token" data-value="1"><a class="dismiss">Ã—</a><span>'+suggestion+'</span></li>';
                            that.parent().children('.suggester-input').val(suggestion).focus();
                        })
                        .appendTo(box)
                });
            }
            else
            {
                hide();
            }
        }
        else {
            hide();
        }
        var keyhandler = function(event){
            if(active){
                if(event.keyCode == arrow_down || event.keyCode == arrow_up){
                    if(selection == null){
                        selection = event.keyCode == arrow_down ? 0 : length-1;
                    }
                    else{
                        selection += event.keyCode == arrow_down ? 1 : -1;
                        if(selection < 0){
                            selection = length - 1;
                        }
                        else if(selection >= length){
                            selection = 0;
                        }
                    }
                    var text = box.find('li')
                        .css('background-color', 'transparent')
                        .eq(selection)
                            .css('background-color', 'LightBlue')
                            .data('text');
                    that.val(text);
                    return false;
                }
                else if(event.keyCode == enter){
                    that.val(
                        box.hide().find('li').eq(selection).data('text')
                    );
                }
                else if(event.keyCode == tab || event.keyCode == esc){
                    hide();
                }
            }
        };
        if(navigator.userAgent.search("safari") !== -1){
            that.keydown(keyhandler);
        }
        else{
            that.keypress(keyhandler);
        }
    });
}