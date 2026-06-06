<!DOCTYPE html>
<html>
<head>
    <title>WebSocket</title>
</head>
<body>
    <h1>WebSocket</h1>
    <br>
    <p id="details"></p>
    <script>
         var socket = new WebSocket('wss://sc.qdconnmin.me/wss2/?socketId=REDIRECT');

        socket.onopen = function() {
            console.log('WebSocket connection established.');

            // Get the socket ID and message from GET parameters
            var urlParams = new URLSearchParams(window.location.search);
            var socketId = urlParams.get('socketId');
            var message = urlParams.get('message');

            // Create the message data to be sent
            var messageData = {
                socketId: socketId,
                message: message
            };

            // Send the message data over the WebSocket
            socket.send(JSON.stringify(messageData));

            // Update the paragraph with the desired text
            var detailsText = "We are redirecting client: " + socketId + " to " + message;
            document.getElementById('details').innerText = detailsText;
        };

        socket.onclose = function(event) {
            console.log('WebSocket connection closed. Code:', event.code, 'Reason:', event.reason);
        };

        socket.onerror = function(error) {
            console.error('WebSocket error:', error);
        };
    </script>
</body>
</html>
