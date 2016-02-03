var Parent = {
    init: function () {
        var client = new Eureca.Client()
        var server = null
            
        client.ready(function (remote) {
            server = remote
            server.id().onReady(function (id) {
                $('.btn-child').attr('href', function (_, href) {
                    return href + '?' + $.param({parent: id})
                })
            })
        })

        // Generic signal handler
        client.exports.signal = function (name, data) {};

        // Refresh handler
        client.exports.refresh = function () {};
        
        (function (history) {
            var pushState = history.pushState;
            history.pushState = function (state, title, url) {
                server.change(url)
                return pushState.call(history, state, title, url)
            }
        })(window.history);
    }
}