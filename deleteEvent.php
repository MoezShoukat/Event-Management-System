<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$host = 'localhost';
$dbname = 'events';
$dbusername = 'root';
$dbpassword = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        // Basic input validation
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
        
        if ($id === false) {
            throw new Exception("Invalid event ID");
        }

        // Simple delete query with prepared statement
        $stmt = $conn->prepare("DELETE FROM events WHERE id = :id");
        $result = $stmt->execute([':id' => $id]);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete event']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
    }
} catch (Exception $e) {
    // Sanitize the error message before outputting it
    $sanitizedMessage = htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    error_log($sanitizedMessage);
    echo json_encode(['success' => false, 'message' => $sanitizedMessage]);
}
?>
