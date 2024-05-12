<?php
// Bot responses
$responses = array(
    "hi" => "Hello! How can I help you today?",
    "how are you" => "I'm just a bot, but thank you for asking!",
    "bye" => "Goodbye! Have a great day!",
    "postpartum"=> "hi new mom"
);

// Retrieve user message from POST request
$userMessage = $_POST['message'];

// Process user message and generate bot response
$botResponse = processInput($userMessage, $responses);
echo $botResponse;

// Function to process user input and return bot response
function processInput($input, $responses) {
    $input = strtolower($input); // Convert input to lowercase for easier matching

    // Check if the input matches any predefined queries
    foreach ($responses as $query => $response) {
        if (strpos($input, $query) !== false) {
            return $response;
        }
    }

    // If no match found, return a default response
    return "I'm sorry, I didn't understand that.";
}
?>
