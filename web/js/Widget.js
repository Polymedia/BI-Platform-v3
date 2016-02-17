var params = window.location.search.replace("?", "");
if (params)
    params = params.split('&')

$('form').each(function () {
    var self = $(this); 
    if (self.attr('method') == 'get') {
        for (var i = 0; i < params.length; ++i) {
            var param = params[i].split('=')
            
            if (self.attr('id') == decodeURIComponent(param[0]).split('[')[0])
                continue
            
            $('<input>').attr({
                type: 'hidden',
                name: decodeURIComponent(param[0]),
                value: decodeURIComponent(param[1].replace(/\+/g,  " "))
            }).appendTo(self)
        }
    }
})
