$.ajaxSetup({
    headers:
    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

function getHTMLChatUser( msje ){
    return '<div id="wpcb-template-human-bubble"><div class="wpcb-bubble human">'+ msje +'</div></div>';
}

function getHTMLChatBot( msje ){
    return '<div id="wpcb-template-bot-bubble"><div class="wpcb-bubble bot">'+ msje +'</div></div>';
}

$(document).ready(function(){
    $(document).on('keydown', 'input.inputTextChat', function(ev) {
        var _this = $(this);
        var divBox = $("#wpcb-conversation-content");
        
        if(ev.which === 13) {
            // Will change backgroundColor to blue as example
            if ( $.trim(_this.val()) != "" ){
                var _text = _this.val();
                _this.val("");
                divBox.append( getHTMLChatUser($.trim(_text)) );
                
                $.post("/api/mensaje", {
                    'text': $.trim(_text)
                }, function(data){
                    if ( data.length > 0 ) {
                        for(var i=0; i<data.length; i++){
                            var text = data[i];
                            divBox.append( getHTMLChatBot(text) );
                        }
                    }
                });
            }
            
            // Avoid form submit
            return false;
        }
    });
});