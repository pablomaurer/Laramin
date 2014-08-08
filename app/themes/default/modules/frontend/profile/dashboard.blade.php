@extends('layouts.master')

@section('content')
<h1>Dashboard</h1>
<p>This is my body content. i'm in dashboard.php</p>
<button id="sendSocket">Send Socket</button>
@stop

@section('footerScripts')
@parent
<script src="https://cdn.socket.io/socket.io-1.0.6.js"></script>
<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script>
    var socket = io.connect('localhost:3000');

    // Add a connect listener
    socket.on('connect',function() {
        console.log('Client has connected to the server!');
    });
    // Get Message from Server
    socket.on('message',function(data) {
        console.log('Received a message from the server!',data);
    });
    // Add a disconnect listener
    socket.on('disconnect',function() {
        console.log('The client has disconnected!');
    });

    // Sends a message to the server via sockets
    function sendMessageToServer(message) {
        socket.send(message);
    }
</script>

<script>
$(document).ready(function(){

    $("#sendSocket").click(function() {
        sendMessageToServer('dada');
    });
    /*
    console.log("welcome to my socket test");

    var socket = io.connect();

    console.log(socket);

    // If you receive a message
    socket.on('chat', function (data) {
        var zeit = new Date(data.zeit);
        console.log('Zeit: ' + zeit.getTime() + ' Name: ' + data.name + ' Nachricht:' + data.text);
    });

    console.log(socket);

    function send(){
        socket.emit('chat', { name: 'MyName', text: 'Hi together!' });
    }

    console.log(socket);
    */
});
</script>
@stop