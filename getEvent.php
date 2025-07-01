<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'new_events';
$dbusername = getenv('DB_USERNAME') ?: 'root';
$dbpassword = getenv('DB_PASSWORD') ?: '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch events from the database
    $stmt = $conn->query("SELECT * FROM events");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($events)) {
        error_log("No events found in the database.");
    } else {
        error_log("Events fetched successfully: " . print_r($events, true));
    }

    // Set the content type to JSON
    header('Content-Type: application/json');

    // Return data as JSON
    echo json_encode($events);
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'A database error occurred.']);
    die();
}
?>

