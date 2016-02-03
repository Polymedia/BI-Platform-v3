var express = require('express')
var http = require('http')
var pg = require('pg')
var eureca = require('eureca.io')
var config = require('./config.json')

// Namespaces
var Client = pg.Client
var RpcServer = eureca.Server 

// Basic setup
var app = express(app)
var server = http.createServer(app)
var rpc_server = new RpcServer({allow: ['signal', 'changed', 'parent', config.signal]})
rpc_server.attach(server)

// Handle web clients
var proxies = {}
var subscribers = {}
rpc_server.onConnect(function (connection) {
    console.log('Client connected:', connection.id, connection.remoteAddress)
    var client = connection.clientProxy
    
    // Subscribe to parent if exists
    client.parent().onReady(function (id) {
        if (id) {
            console.log('Subscribe to parent events:', id)
            subscribers[id].push(client)
        }
    })
        
    subscribers[connection.id] = []
    proxies[connection.id] = client
})
rpc_server.onDisconnect(function (connection) {
    console.log('Client disconnected:', connection.id, connection.remoteAddress)
    delete proxies[connection.id]
    delete subscribers[connection.id]
})
rpc_server.exports.id = function () {
    return this.connection.id
}
rpc_server.exports.change = function (link) {
    var clients = subscribers[this.connection.id]
    for (var index in clients)
        clients[index].changed(link)
}

// Handle signal notifications
var client = new Client(config.connection)
client.connect()
client.on('notification', function (message) {
    if (message.name === 'notification' 
        && message.channel === config.signal) {
        console.log('Signal recieved:', message.channel)
        for (var name in proxies) {
            console.log('Sending to client:', name)
            var proxy = proxies[name]
            proxy.signal(message.channel, message.payload)
            if (message.channel in proxy)
                proxy[message.channel]()
        }
    }      
})
client.query('LISTEN ' + config.signal)

// For testing purposes only
if (process.argv.length > 2 && process.argv[2] === 'debug')
{
    var path = require('path')
    var ECT = require('ect')
    
    // Setup template renderer
    var ect = ECT({ watch: true, root: __dirname + '/views', ext : '.ect' });
    app.set('view engine', 'ect');
    app.engine('ect', ect.render);

    // Setup static files
    app.use(express.static(path.join(__dirname, 'web')));

    // Serve
    app.get('/', function (request, response) {
        response.render('index')
    })
    
    app.get('/:id', function (request, response) {
        response.render('linked', {id: request.params['id']})
    })   
}

// Start server
console.log('Start server at 127.0.0.1:' + config.port)
server.listen(config.port)