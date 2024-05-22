<?php
// Bot responses
$responses = array(
    "hi" => "Hello! How can I help you today?",
    "how are you" => "I'm just a bot, but thank you for asking!",
    "bye" => "Goodbye! Have a great day!",
    "postpartum" => "The postpartum period begins soon after the delivery of the baby and usually lasts six to eight weeks and ends when the mother's body has nearly returned to its pre-pregnant state. The postpartum period for a woman and her newborn is very important for both short-term and long-term health and well-being.",
    "postpartum recovery" => "Postpartum recovery can include physical and emotional changes. Are you experiencing any specific concerns?",
    "postpartum depression" => "Postpartum depression is a serious condition. It's important to seek support from healthcare professionals if you're experiencing symptoms.",
    // Add more specific responses for other postpartum-related questions
    "weight loss" => "Losing weight after pregnancy can take time and patience. It's important to focus on healthy eating and gentle exercise.",
    "postpartum exercise" => "Gentle exercise can be beneficial for postpartum recovery, but it's important to listen to your body and not overdo it.",
    "postpartum bleeding" => "Some bleeding after childbirth is normal, but it's important to monitor it and contact your healthcare provider if you have concerns.",
    "postpartum hair loss" => "Hair loss after pregnancy is common and usually temporary. It's caused by hormonal changes and should improve over time.",
    "postpartum constipation" => "Constipation can be a common issue after childbirth. Drinking plenty of water and eating fiber-rich foods can help alleviate symptoms.",
    // Add more responses here...
    // You can continue adding more responses as needed
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
    foreach ($responses as $key => $response) {
        if (is_array($key) && in_array($input, $key)) {
            return $response;
        } elseif ($input === $key) {
            return $response;
        }
    }

    // If no match found, return a default response
    return "I'm sorry, I didn't understand that.";
}
?>
