<?php
include 'db_config.php';

if (isset($_POST['message'])) {
    $user_message = trim($_POST['message']);  // Trim spaces

    if (empty($user_message)) {
        echo "Please enter a valid question!";
        exit;
    }

    // Use prepared statements for security
    $query = "SELECT answer FROM responses WHERE LOWER(question) LIKE LOWER(?) LIMIT 1";
    $stmt = $conn->prepare($query);
    $searchQuery = "%$user_message%";  // Allow partial matching
    $stmt->bind_param("s", $searchQuery);
    $stmt->execute();
    $stmt->bind_result($answer);
    $stmt->fetch();
    $stmt->close();

    // If an answer is found, return it; otherwise, show a default response
    if (!empty($answer)) {
        echo $answer;
    } else {
        echo "I'm still learning! Please check resources at [www.roadmap.com](https://www.roadmap.com)";
    }
}
?>
