function urlParam(name, dfault)
{
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null)
       return dfault
    else
       return results[1] || dfault
}

var Child = {
    init: function () {
        var client = new Eureca.Client()
        
        client.exports.parent = function () {
            return urlParam('parent', '')
        }
        
        // Generic signal handler
        client.exports.signal = function (name, data) {}
        
        // Refresh handler
        client.exports.refresh = function () {}
        
        client.exports.changed = function (link) {
            window.history.pushState(null, null, link + '&parent=true')
            $('#pjax_reload').click()
        }
    }
}