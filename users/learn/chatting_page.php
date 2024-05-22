<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Bot Chatting Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #fce4ec; /* Light pink background */
        } 
        .container {
            margin-top: 50px;
            height: calc(100vh - 100px); /* Adjust the height of the container */
            display: flex;
            flex-direction: column;
        }
        .chat-window {
            background-color: #f8bbd0; /* Light pink chat window */
            padding: 20px;
            border-radius: 10px;
            flex-grow: 1; /* Let the chat window grow to fill remaining space */
            overflow-y: auto; /* Add vertical scroll if content overflows */
        }
        #chat-display p {
            margin: 5px 0;
        }
        #chat-form {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center; /* Align items vertically in the flex container */
            padding: 10px; /* Add padding to the form */
            background-color: #fff; /* White background for the form */
            border-radius: 10px; /* Rounded corners for the form */
        }
        #message {
            flex: 1;
            margin-right: 10px;
        }
        button[type="submit"] {
            background-color: #ff69b4; /* Pink send button */
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #ff1493; /* Darker pink on hover */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="chat-window" id="chat-display">
        <!-- Chat messages will be displayed here -->
    </div>
    <form id="chat-form">
        <input type="text" id="message" class="form-control" placeholder="Type your message here...">
        <button type="submit" class="btn btn-send">Send</button>
    </form>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Function to display messages in the chat window
    function displayMessage(sender, message) {
        $('#chat-display').append('<p><strong>' + sender + ':</strong> ' + message + '</p>');
        // Scroll to bottom of chat display
        $('#chat-display').scrollTop($('#chat-display')[0].scrollHeight);
    }

    // Function to send user message and receive bot response
    $('#chat-form').submit(function(e){
        e.preventDefault();
        var userMessage = $('#message').val();
        displayMessage('You', userMessage);

        // Send user message to server for processing
        $.post('bot.php', { message: userMessage }, function(data){
            displayMessage('Bot', data);
        });

        $('#message').val(''); // Clear input field after sending message
    });
});
</script>

</body>
</html>
