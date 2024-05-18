<?php
session_start();
include "../session_st.php";
$_SESSION['username']=$fn ;
// if (!isset($_SESSION['username'])) {
//     $_SESSION['username'] = 'User' . rand(1000, 9999); // Simple user assignment for demonstration
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiuser Chat System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffe6f2; /* Light pink background */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        #chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
        }
        #chat-box {
            flex: 1;
            height: calc(80vh - 40px); /* Adjusted height to be 80% of the view height minus padding */
            overflow-y: scroll;
            border: 1px solid #ff99cc; /* Pink border */
            padding: 20px;
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        #message-box-container {
            display: flex;
            padding: 10px;
            background-color: #ffe6f2;
            border-top: 1px solid #ff99cc; /* Pink border */
        }
        #message-box {
            flex: 1;
            border-radius: 20px;
            padding: 10px;
            border: 1px solid #ff99cc; /* Pink border */
        }
        #dashboard-button{
            margin-left: 10px;
            border-radius: 20px;
            background-color: #ff66b2; /* Pink button */
            border: none;
            color: white;
        }
        #send-button {
            margin-left: 10px;
            border-radius: 20px;
            background-color: #ff66b2; /* Pink button */
            border: none;
            color: white;
        }
        #send-button:hover {
            background-color: #ff3385; /* Darker pink on hover */
        }
        .message {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffccf2; /* Light pink message background */
        }
        .message strong {
            color: #d63384; /* Dark pink for usernames */
        }
        h1 {
            color: #d63384; /* Dark pink for the header */
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div id="chat-container" class="container">
        <div class="row">
            <div class="col-12">
            <button id="dashboard-button" class="btn btn-primary" onclick="location.href='../index.php'">Return to Dashboard</button>

                <h1 class="text-center text-pink">Multiuser Chat System</h1>
                <div id="chat-box"></div>
                <div id="message-box-container">
                    <input type="text" id="message-box" class="form-control" placeholder="Enter your message...">
                    <button id="send-button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchMessages() {
                $.ajax({
                    url: 'fetch_messages.php',
                    success: function(data) {
                        $('#chat-box').html(data);
                        $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight); // Scroll to the bottom
                    }
                });
            }

            fetchMessages();
            setInterval(fetchMessages, 3000); // Fetch new messages every 3 seconds

            $('#send-button').click(function() {
                var message = $('#message-box').val();
                if (message.trim() != '') {
                    $.ajax({
                        url: 'send_message.php',
                        method: 'POST',
                        data: { message: message },
                        success: function(response) {
                            $('#message-box').val('');
                            fetchMessages();
                        }
                    });
                }
            });

            $('#message-box').keypress(function(e) {
                if (e.which == 13) { // Enter key pressed
                    $('#send-button').click();
                }
            });
        });
    </script>
</body>
</html>
