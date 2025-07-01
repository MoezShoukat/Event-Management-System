<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "new_events"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['name'];
    $eventDate = $_POST['date'];
    $eventTime = $_POST['time'];
    $eventLocation = $_POST['location'];
    $eventDescription = $_POST['description'];

    
    $stmt = $conn->prepare("INSERT INTO events (name, date, time, location, description) VALUES (?, ?, ?, ?, ?)");
    
   
    if ($stmt) {
        $stmt->bind_param("sssss", $eventName, $eventDate, $eventTime, $eventLocation, $eventDescription);

        if ($stmt->execute()) {
            echo "<script>alert('Event created successfully!'); window.location.href='event.php#eventList';</script>";
            exit(); 
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); 
    } else {
        echo "Error preparing statement: " . $conn->error; 
    }
}

$conn->close();
?>
