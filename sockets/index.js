// google for rooms join etc
// http://socket.io/docs/rooms-and-namespaces/
//http://www.volkomenjuist.nl/blog/2013/10/20/laravel-4-and-nodejsredis-pubsub-realtime-notifications/
//http://davidwalsh.name/websocket
// Require HTTP module (to start server) and Socket.IO
var http = require('http'), io = require('socket.io');

// Start the server at port 8080
var server = http.createServer(function(req, res){

    // Send HTML headers and message
    res.writeHead(200,{ 'Content-Type': 'text/html' });
    res.end('<h1>Hello Socket Lover!</h1>');
});
server.listen(3000);

// Create a Socket.IO instance, passing it our server
var socket = io.listen(server);

// Add a connect listener
socket.on('connection', function(client){

    console.log('Client connected');

    // Success!  Now listen to messages to be received
    client.on('message',function(event){
        console.log('Received message from client!',event);
        client.send('ui');
    });
    client.on('disconnect',function(){
        console.log('Client has disconnected');
    });

});

/*var interval = setInterval(function() {
    client.send('This is a message from the server!  ' + new Date().getTime());
},5000);*/

/*var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    res.sendfile('index.html');
});


io.on('connection', function(socket){
    console.log('a user connected');

    socket.on('disconnect', function(){
        console.log('user disconnected');
    });

    io.on('connection', function(socket){
        socket.on('chat message', function(msg){
            io.emit('chat message', msg);
        });
    });
});

http.listen(3000, function(){
    console.log('listening on *:3000');
});*/